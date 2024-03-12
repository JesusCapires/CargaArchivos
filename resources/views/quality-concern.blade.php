@extends('layouts.layout')

@section('title', 'Criterios de calidad')


@section('content')

<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Criterios de calidad</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Catálogos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Criterios</li>
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
                            Listado de criterios de calidad
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-sm btn-orange btn-wave waves-light" onclick="openModal(2,0)"><i class="ri-add-line fw-semibold align-middle me-1"></i>Criterio</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="file-export" class="table table-bordered text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Criterio</th>
                                        <th>Estatus</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>

                                <tbody id="register-works">
                                @foreach ($qualityConcerns as $qualityConcern)
                                    <tr>
                                        <td id="descripcion{{ $qualityConcern->id }}">{{ $qualityConcern->description }}</td>
                                        <td id="status{{ $qualityConcern->id }}">
                                            <span id="statusSpan{{ $qualityConcern->id }}" class="badge bg-{{ $qualityConcern->is_active ? 'success' : 'danger' }}-transparent" data-value="{{ $qualityConcern->is_active }}">
                                                {{ $qualityConcern->is_active ? 'Activo' : 'Inactivo' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="hstack gap-2 fs-15">
                                                <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-info-transparent rounded-pill" onclick="openModal(2, {{ $qualityConcern->id }})">
                                                    <i class="ri-edit-line"></i>
                                                </a>
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
    const validaTrabajo = (id) => {
        $('#formularioTrabajo').validate({
            rules:{
                descripcion:{
                    required: true
                }
            },
            messages:{
                descripcion:{
                    required: 'Ingresa el criterio'
                }
            },
            ...estilosValidate,
            submitHandler: function(form){
                let id_trabajo = $('#id').val();
                let status = $('#status').prop('checked') ? 1 : 0;
                $.ajax({
                    url: "{{ route('crearEditarCalidad')}}",
                    type: 'POST',
                    data:  $(form).serialize(),
                    dataType: "json",
                    beforeSend: () => {
                        $('#modalBase').modal('hide');
                    },
                    success: function(response) {
                        let {error,id_last} = response;
                        if(error){
                            console.log("Error true");
                        }
                        else{
                            if (id !== 0) {
                                console.log("Trabajo existe");
                                $('#id' + id_trabajo).text($('#id').val());
                                $('#descripcion' + id_trabajo).text($('#descripcion').val());
                                $('#status' + id_trabajo).html(`
                                    <span id="statusSpan${id_trabajo}" class="badge bg-${status ? 'success' : 'danger'}-transparent" data-value="${status}">
                                            ${status ? 'Activo' : 'Inactivo'}
                                    </span>
                                `);
                            } else {
                                console.log("Trabajo nuevo");
                                $('#file-export').DataTable().destroy();
                                $('#register-works').append(`
                                    <tr>
                                        <td id="descripcion${id_last}">${$('#descripcion').val()}</td>
                                        <td id="status${id_last}">
                                            <span id="statusSpan${id_last}"  class="badge bg-${status ? 'success' : 'danger'}-transparent" data-value="${status}">
                                                ${status ? 'Activo' : 'Inactivo'}
                                            </span>
                                        </td>
                                        <td id="accion${id_last}">
                                            <div class="hstack gap-2 fs-15">
                                                <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-info-transparent rounded-pill" onclick="openModal(2, ${id_last})">
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
