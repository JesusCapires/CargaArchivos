@extends('layouts.layout')

@section('title', 'Productos')


@section('content')
<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Productos</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Catálogos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Productos</li>
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
                            Listado de productos
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-sm btn-orange btn-wave waves-light" onclick="openModal(1, 0)"><i class="ri-add-line fw-semibold align-middle me-1" ></i>Producto</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="file-export" class="table table-bordered text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Num. Parte</th>
                                        <th>Descripción</th>
                                        <th>Estatus</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody id="register-products">
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td id="producto{{ $producto->id }}">{{ $producto->sku }}</td>
                                            <td id="descripcion{{ $producto->id }}">{{ $producto->description }}</td>
                                            <td id="status{{ $producto->id }}">
                                                <span id="statusSpan{{ $producto->id }}" class="badge bg-{{ $producto->is_active ? 'success' : 'danger' }}-transparent" data-value="{{ $producto->is_active }}">
                                                    {{ $producto->is_active ? 'Activo' : 'Inactivo' }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-info-transparent rounded-pill" onclick="openModal(1,{{ $producto->id }})">
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


const validaProducto = (id) => {
    $('#formularioProducto').validate({
        rules:{
            producto:{
                required: true,
                minlength: 5
            },
            descripcion:{
                required: true,
                minlength: 5
            }
        },
        messages:{
            producto:{
                required: 'Ingresa el nombre del producto',
                minlength: 'Al menos 5 caracteres'
            },
            descripcion:{
                required: 'Ingresa la descripción',
                minlength: 'Al menos 5 caracteres'
            }
        },
        ...estilosValidate,
        submitHandler: function(form){
            let id_producto = $('#id').val();
            let sku = $('#producto').val();
            let descripcion = $('#descripcion').val();
            let status = $('#status').prop('checked') ? 1 : 0;
            $.ajax({
                url: "{{ route('crearEditarProducto')}}",
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
                            console.log('Registro existente');
                            console.log(status);
                            $('#producto' + id_producto).text(sku);
                            $('#descripcion' + id_producto).text(descripcion);
                            $('#status' + id_producto).html(`
                            <span id="statusSpan${id_producto}" class="badge bg-${status ? 'success' : 'danger'}-transparent" data-value="${status}">
                                    ${status ? 'Activo' : 'Inactivo'}
                            </span>
                            `);
                        } else {
                            console.log('Registro nuevo');
                            console.log(id_last);
                            $('#file-export').DataTable().destroy();
                            $('#register-products').append(`
                                <tr>
                                    <td id="producto${id_last}">${sku}</td>
                                    <td id="descripcion${id_last}">${descripcion}</td>
                                    <td id="status${id_last}">
                                        <span id="statusSpan${id_last}"  class="badge bg-${status ? 'success' : 'danger'}-transparent" data-value="${status}">
                                            ${status ? 'Activo' : 'Inactivo'}
                                        </span>
                                    </td>
                                    <td id="accion${id_last}">
                                        <div class="hstack gap-2 fs-15">
                                            <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-info-transparent rounded-pill" onclick="openModal(1, ${id_last})">
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
