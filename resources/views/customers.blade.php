
@extends('layouts.layout')

@section('title', 'Clientes')


@section('content')
<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Clientes</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Catálogos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Clientes</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header Close -->

        <!-- Start::row-1 -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Listado de clientes
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-sm btn-orange btn-wave waves-light" onclick="openModal(3, 0)"><i class="ri-add-line fw-semibold align-middle me-1" ></i>Clientes</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="file-export" class="table table-bordered text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Razón social</th>
                                        <th>R.F.C</th>
                                        <th>C. Postal</th>
                                        <th>Correo</th>
                                        <th>Estatus</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody id="register-customers">
                                    @foreach ($clientes as $cliente)
                                        <tr>
                                            <td id="nombre{{ $cliente->id }}">{{ $cliente->name }}</td>
                                            <td id="rfc{{ $cliente->id }}">{{ $cliente->rfc }}</td>
                                            <td id="codigoPostal{{ $cliente->id }}">{{ $cliente->cp }}</td>
                                            <td id="correo{{ $cliente->id }}">{{ $cliente->email }}</td>
                                            <td id="status{{ $cliente->id }}">
                                                <span id="statusSpan{{ $cliente->id }}" class="badge bg-{{ $cliente->is_active ? 'success' : 'danger' }}-transparent" data-value="{{ $cliente->is_active }}">
                                                    {{ $cliente->is_active ? 'Activo' : 'Inactivo' }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-icon btn-sm btn-info-transparent rounded-pill"  onclick="openModal(3,{{ $cliente->id }})"><i
                                                            class="ri-edit-line"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
        <!--End::row-1 -->
    </div>
</div>
<!-- End::app-content -->

@endsection

<script>

    const validaCliente = (id) => {
        $('#formularioCliente').validate({
            rules:{
                nombre:{
                    required: true,
                },
                rfc:{
                    required: true,
                    minlength: 12,
                    maxlength: 13,
                    ValidarRFC: true

                },
                codigoPostal:{
                    required: true,
                    minlength: 5,
                    maxlength: 5,
                    digits: true
                },
                correo:{
                    required: true,
                    minlength: 5
                }
            },
            messages:{
                nombre:{
                    required: 'Ingresa el nombre del producto'
                },
                rfc:{
                    required: 'Ingresa el RFC',
                    minlength: 'Al menos 12 caracteres',
                    maxlength: 'Máximo 13 caracteres',
                },
                codigoPostal:{
                    required: 'Ingresa el CP',
                    minlength: 'Al menos 5 caracteres',
                    maxlength: 'Máximo 5 caracteres',
                    digits: 'Unicamente puedes ingresar números'
                },
                correo:{
                    required: 'Ingresa el correo',
                    email: 'Ingresa el correo con el formato requerido'
                }
            },
            ...estilosValidate,
            submitHandler: function(form){
                let status = $('#status').prop('checked') ? 1 : 0;
                let id_cliente = $('#id').val();
                $.ajax({
                    url: "{{ route('crearEditarCliente')}}",
                    type: 'POST',
                    data:  $(form).serialize(),
                    dataType: "json",
                    beforeSend: () => {
                        $('.loader').show();
                        $('#modalBase').modal('hide');
                    },
                    success: function(response) {
                        let {error,id_last} = response;
                        if(error){
                            console.log("Error true");
                        }
                        else{
                            if (id !== 0) {
                                ['nombre', 'rfc', 'codigoPostal', 'correo'].forEach(function(field){
                                    $(`#${field}${id_cliente}`).text($(`#${field}`).val());
                                })
                                $('#status' + id_cliente).html(`
                                    <span id="statusSpan${id_cliente}" class="badge bg-${status ? 'success' : 'danger'}-transparent" data-value="${status}">
                                            ${status ? 'Activo' : 'Inactivo'}
                                    </span>
                                `);
                            } else {
                                $('#file-export').DataTable().destroy();
                                $('#register-customers').append(`
                                    <tr>
                                        <td id="nombre${id_last}">${$('#nombre').val()}</td>
                                        <td id="rfc${id_last}">${$('#rfc').val()}</td>
                                        <td id="codigoPostal${id_last}">${$('#codigoPostal').val()}</td>
                                        <td id="correo${id_last}">${$('#correo').val()}</td>
                                        <td id="status${id_last}">
                                            <span id="statusSpan${id_last}"  class="badge bg-${status ? 'success' : 'danger'}-transparent" data-value="${status}">
                                                ${status ? 'Activo' : 'Inactivo'}
                                            </span>
                                        </td>
                                        <td id="accion${id_last}">
                                            <div class="hstack gap-2 fs-15">
                                                <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-info-transparent rounded-pill" onclick="openModal(3,${id_last})">
                                                    <i class="ri-edit-line"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                `);
                                initializeDataTable();
                            }
                        }
                    }
                });
            }
        });
    }

    </script>
