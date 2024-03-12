@extends('layouts.layout')

@section('title', 'Selecciones')


@section('content')

<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Selecciones</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <!-- <li class="breadcrumb-item"><a href="javascript:void(0);">Catálogos</a></li> -->
                        <li class="breadcrumb-item active" aria-current="page">Selecciones</li>
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
                            Gestión de Selecciones
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-sm btn-orange btn-wave waves-light" onclick="createSelection()"><i class="ri-add-line fw-semibold align-middle me-1"></i> Selección</button>
                            <div class="dropdown ms-2">
                                <button class="btn btn-icon btn-secondary-light btn-sm btn-wave waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ti ti-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:void(0);">All Invoices</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0);">Paid Invoices</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0);">Pending Invoices</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0);">Overdue Invoices</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <select class="form-control" name="estadoSeleccion" id="estadoSeleccion" onchange="obtieneSelecciones()">
                                    <option value="-1">Detenido</option>
                                    <option value="0">Cancelado</option>
                                    <option value="1" selected>Pendiente</option>
                                    <option value="2">En proceso</option>
                                    <option value="3">Terminado</option>
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="file-export" class="table table-bordered text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Cliente</th>
                                        <th>Part Number</th>
                                        <th>C. Calidad</th>
                                        <th>P. Sorted</th>
                                        <th>Pieces Ok</th>
                                        <th>Pieces Ng</th>
                                        <th>Hours</th>
                                        <th>Rate</th>
                                        <th>Precio</th>
                                        <th>Costo</th>
                                        <th>Responsable</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="registrosSeleccion">
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

@section('js')


    <script>
        let _token = $('meta[name=csrf-token]').attr('content')

        const obtieneSelecciones = () => {

            let ruta = `{{ route('obtieneSelecciones', ['id' => ':id'])}}`;
            $.ajax({
                url: ruta.replace(':id', $('#estadoSeleccion').val()),
                type: 'POST',
                data:  {_token},
                dataType: "json",
                beforeSend: () => {
                    // $('#modalBase').modal('hide');
                },
                success: (response) =>  {

                    $('#file-export').DataTable().clear().destroy();
                    let { selecciones } = response;
                    let datos = '';
                    selecciones.forEach(({ idSeleccion, nombreCliente, criterios, numeroParte, horas, rate, precio, costo, ok, nok, cantidad, nombreUsuario, creacion }) => {
                        let criteriosOrd = '</li><li>' + criterios.replace(/,/g, '</li><li>');

                        datos += `
                            <tr>
                                <td>${nombreCliente}</td>
                                <td>${numeroParte}</td>
                                <td>${criteriosOrd}</td>
                                <td id="cantidad${idSeleccion}">${cantidad}</td>
                                <td id="piezasOk${idSeleccion}">${ok}</td>
                                <td id="piezasNok${idSeleccion}">${nok}</td>
                                <td id="horas${idSeleccion}">${horas}</td>
                                <td id="rate${idSeleccion}">${rate}</td>
                                <td id="precio${idSeleccion}">${precio}</td>
                                <td id="costo${idSeleccion}">${costo.toFixed(2)}</td>
                                <td>${nombreUsuario}</td>
                                <td>${creacion}</td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-info-transparent rounded-pill" onclick="updateSelection(${idSeleccion})">
                                        <i class="ri-edit-line"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-info-transparent rounded-pill" onclick="verProcesoSelection(${idSeleccion})">
                                        <i class="ri-loader-2-fill"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-info-transparent rounded-pill" onclick="verFilesSelection(${idSeleccion})">
                                        <i class="bx bx-file"></i>
                                    </a>
                                </td>
                            </tr>
                        `;
                    });

                    $('#registrosSeleccion').append(datos);
                    initializeDataTable()
                }
            });
        }
        $(document).ready(function (){
            obtieneSelecciones();
        });

        const verFilesSelection = async (id) => {
            let estructura = `
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Nombre del archivo:</label>
                            <form method="POST" enctype="multipart/form-data" id="formularioCarge">
                                <input class="form-control mb-3" type="text" id="name" name="name" placeholder="nombre">
                                <input type="hidden" name="_token" value="${_token}">
                                <input class="form-control" type="file" id="file" name="file" multiple="">
                                <div class="d-flex align-items-end flex-column">
                                    <button type="sumbit" class="btn btn-sm btn-primary mt-2 p-2 ms-2" onclick="validaCarga()">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Archivos subidos</label>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Archivo</th>
                                        <th>Tamaño</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($files))
                                        @foreach ($files as $file)
                                            <tr>
                                                <td><a href="{{$file['link']}}" target="_blank">{{$file['name']}}</a></td>
                                                <td>{{$file['size']}}</td>
                                                <td>
                                                    <a href="{{route('seeFile', ['name' => $file['name']])}}" class="btn btn-icon btn-sm btn-info-transparent rounded-pill" target="_blank">
                                                        <i class="fe fe-eye"></i>
                                                    </a>
                                                    <a href="{{route('download', ['name' => $file['name']])}}" class="btn btn-icon btn-sm btn-info-transparent rounded-pill">
                                                        <i class="fe fe-download"></i>
                                                    </a>
                                                <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-info-transparent rounded-pill">
                                                        <i class="fe fe-trash-2"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            `;

            $('#modalTitulo').empty().append('Documentos');
            $('#modalTamano').removeClass().addClass('modal-dialog');
            $('#modalContenido').empty().append(estructura);
            $('#modalBase').modal('show');
            // $('#tableDetailsSelection').DataTable({dom: 'Bfrtip', language, buttons, order : [3, "desc"]});
        }

        const validaCarga = () => {
            let nombre = $('#name').val();
            let archivo = $('#file')[0].files[0];
            let _token = $('input[name="_token"]').val();

            console.log(nombre);
            console.log(_token);
            console.log(archivo);

            $('#formularioCarge').validate({
                rules: {
                name: {
                    required: true
                }
                },
                messages: {
                name: {
                    required: 'Este campo es obligatorio.'
                }
                },
                ...estilosValidate,
                submitHandler: (form) => {
                let formData = new FormData(form);
                formData.append('nombre', nombre);
                formData.append('archivo', archivo);

                $.ajax({
                    url: "{{ route('storeFile') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: (response) => {
                    console.log("archivo subido");
                    }
                });
                }
            });
            }


        let listaResponsables = @json($listaResponsables);
        let listaProductos = @json($listaProductos);
        let listaCriterios = @json($listaCriterios);

        const createSelection = () => {
            let responsables = '<option value="">Selecciona el responsable</option>';
                listaResponsables.forEach(( {id, name} ) => {
                responsables += `<option value="${id}">${name}</option>`
            });

            let productos = '<option value="">Selecciona el producto</option>';
            listaProductos.forEach(( {id, sku, description} ) => {
                productos += `<option value="${id}">${sku} -${description}</option>`
            });

            let criterios = '';
            listaCriterios.forEach(( {id, description} ) => {
                criterios += `<option value="${id}">${description}</option>`
            });
            let estructura = `
                <form id="formularioSeleccion" action="#" autocomplete="off">
                    <div class="row mb-3">
                        <div class="form-group col-md-12 mb-3">
                            <label class="form-label" for="responsable">Responsable</label>
                            <select class="form-control" name="responsable" id="responsable">${responsables}</select>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label class="form-label" for="producto">Num. Parte</label>
                            <select class="form-control" name="producto" id="producto">${productos}</select>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label class="form-label" for="criterios">Criterios de Calidad</label>
                            <select class="form-control" multiple="multiple" name="criterios" id="criterios">
                                ${criterios}
                            </select>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label class="form-label" for="cantidad">P. Sorted</label>
                            <input type="number" class="form-control" name="cantidad" id="cantidad">
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label class="form-label" for="observaciones">Observaciones</label>
                            <textarea class="form-control" rows="5" name="observaciones" id="observaciones"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                        <div class="col-6 text-end">
                            <button type="submit" class="btn btn-warning" onclick="validaSeleccion()">Guardar</button>
                        </div>
                    </div>
                </form>
            `;

            $('#modalTitulo').empty().append('Crear Selección');
            $('#modalTamano').removeClass().addClass('modal-dialog');
            $('#modalContenido').empty().append(estructura);
            $('#modalBase').modal('show');
            construyeSelect('criterios')
        }

        const validaSeleccion = () => {

            $('#formularioSeleccion').validate({
                rules:{
                    responsable:{
                        required: true
                    },
                    criterios: {
                        validaCriterio: true
                    },
                    cantidad: {
                        required: true,
                        number: true,
                        min: 1,

                    }
                },
                messages:{
                    responsable:{
                        required: 'Este campo es obligatorio.'
                    },
                    criterios:{
                        validaCriterio: 'Debes seleccionar al menos 1 criterio de calidad'
                    },
                    cantidad: {
                        required: 'Este campo es obligatorio.',
                        number: 'Ingrese un número valido',
                        min: 'Por favor ingrese un valor mayor o igual a 1.'
                    }
                },
                ...estilosValidate,
                submitHandler: (form) => {
                    let responsable = $('#responsable').val();
                    let producto = $('#producto').val();
                    let criterios = $('#criterios').val();
                    let cantidad = $('#cantidad').val();
                    let observaciones = $('#observaciones').val();

                    $.ajax({
                        url: "{{ route('crearSelecciones')}}",
                        type: 'POST',
                        data:  {_token, responsable, producto, criterios, cantidad, observaciones},
                        dataType: "json",
                        beforeSend: () => {
                            $('#modalBase').modal('hide');
                        },
                        success: (response) => {
                            $('#estadoSeleccion').val(1);
                            obtieneSelecciones();
                        }
                    });
                }
            });
        }

        const updateSelection = async(id) => {

            let ruta = `{{ route('editarSeleccion', ['id' => ':id'])}}`;
            let datos;
            await $.ajax({
                url: ruta.replace(':id', id),
                type: 'GET',
                data:  {},
                dataType: "json",
                beforeSend: () => {
                    // $('#modalBase').modal('hide');
                },
                success: (response) => {
                    datos = response.seleccion[0];
                }
            })

            let { cantidad, rate, price } = datos;


            let estructura = `
                <form id="formularioActualizacionSeleccion" action="#" autocomplete="off">
                    <div class="row mb-3">
                        <div class="form-group col-md-12 mb-3">
                            <label class="form-label" for="cantidad">P. Sorted</label>
                            <input type="number" class="form-control" name="cantidad" id="cantidad" value="${cantidad}">
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label class="form-label" for="observaciones">Rate</label>
                            <input type="number" class="form-control" name="rate" id="rate" value="${rate}">
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label class="form-label" for="observaciones">Precio</label>
                            <input type="number" class="form-control" name="precio" id="precio" value="${price}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                        <div class="col-6 text-end">
                            <button type="submit" class="btn btn-warning" onclick="validaActualizacionSeleccion(${id})">Guardar</button>
                        </div>
                    </div>
                </form>
            `;

            $('#modalTitulo').empty().append('Actualizar Selección');
            $('#modalTamano').removeClass().addClass('modal-dialog');
            $('#modalContenido').empty().append(estructura);
            $('#modalBase').modal('show');
        }


        const validaActualizacionSeleccion = (id) => {

            $('#formularioActualizacionSeleccion').validate({
                rules:{
                    cantidad: {
                        required: true,
                        number: true,
                        min: 1,
                    },
                    rate: {
                        required: true,
                        number: true,
                        min: 1,
                    },
                    precio: {
                        required: true,
                        number: true,
                        min: 1,
                    },

                },
                messages:{
                    cantidad: {
                        required: 'Este campo es obligatorio.',
                        number: 'Ingrese un número valido',
                        min: 'Por favor ingrese un valor mayor o igual a 1.'
                    },
                    rate: {
                        required: 'Este campo es obligatorio.',
                        number: 'Ingrese un número valido',
                        min: 'Por favor ingrese un valor mayor o igual a 1.'
                    },
                    precio: {
                        required: 'Este campo es obligatorio.',
                        number: 'Ingrese un número valido',
                        min: 'Por favor ingrese un valor mayor o igual a 1.'
                    }

                },
                ...estilosValidate,
                submitHandler: function(form){
                    let ruta = `{{ route('actualizarSeleccion', ['id' => ':id'])}}`;
                    let cantidad = $('#cantidad').val();
                    let rate = $('#rate').val();
                    let precio = $('#precio').val();
                    $.ajax({
                        url: ruta.replace(':id', id),
                        type: 'POST',
                        data:  {_token, cantidad, rate, precio},
                        dataType: "json",
                        beforeSend: () => {
                            $('#modalBase').modal('hide');
                        },
                        success: (response) => {
                            $('#cantidad'+id).text(cantidad);
                            $('#rate'+id).text(rate);
                            $('#horas'+id).text(cantidad / rate);
                            $('#precio'+id).text(precio);
                            $('#costo'+id).text(($('#horas'+id).text() * precio).toFixed(2));
                        }
                    })
                }
            });

        }

        const verProcesoSelection = async (id) => {

            let registros = '';
            let ruta = `{{ route("verDetalleSeleccion", ["id" => ':id'] )}}`;
            await $.ajax({
                url: ruta.replace(':id', id),
                type: 'GET',
                data: {},
                dataType: "json",
                beforeSend: () => {
                    // $('#loader').removeClass('d-none');
                },
                success: (response) => {
                    let { detalles } = response;
                    detalles.forEach(( { shift, date, ok, n_ok, logs, total, batch, serial }) => {
                        let logss = '</li><li>' + logs.replace(/,/g, '</li><li>');
                        registros += `
                            <tr>
                                <td>${shift}</td>
                                <td>${date}</td>
                                <td>${ok}</td>
                                <td>${n_ok}</td>
                                <td>${logss}</td>
                                <td>${total}</td>
                                <td>${batch}</td>
                                <td>${serial}</td>
                            </tr>
                        `;
                    });
                }
            });
            let estructura = `
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <form id="formAddSelection" action="#" autocomplete="off">
                            <div class="row">
                                <div class="form-group col-md-1 mb-3">
                                    <label class="form-label" for="shift">Shift</label>
                                    <select class="form-control" name="shift" id="shift">
                                        <option value="1">Turno 1</option>
                                        <option value="2">Turno 2</option>
                                        <option value="3">Turno 3</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 mb-3">
                                    <label class="form-label" for="piezasOk">Pieces Ok</label>
                                    <input type="number" class="form-control" name="piezasOk" id="piezasOk">
                                </div>
                                <div class="form-group col-md-2 mb-3">
                                    <label class="form-label" for="piezasNok">Pieces Ng</label>
                                    <input type="number" class="form-control" name="piezasNok" id="piezasNok">
                                </div>
                                <div class="form-group col-md-3 mb-3">
                                    <label class="form-label" for="batch">Batch</label>
                                    <input type="text" class="form-control" name="batch" id="batch" maxlength="45">
                                </div>
                                <div class="form-group col-md-3 mb-3">
                                    <label class="form-label" for="serial">Serial</label>
                                    <input type="text" class="form-control" name="serial" id="serial" maxlength="45">
                                </div>
                                <div class="col-md-1 mb-3">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-warning" onclick="addDetailSelection(${id})">Agregar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 mb-3 table-responsive">
                        <table class="table table-bordered" id="tableDetailsSelection">
                            <thead>
                                <tr>
                                    <th>Turno</th>
                                    <th>Fecha</th>
                                    <th>Ok</th>
                                    <th>Nok</th>
                                    <th>Log</th>
                                    <th>Total</th>
                                    <th>Batch</th>
                                    <th>Serial</th>
                                </tr>
                            </thead>
                            <tbody id="detallesSeleccion">
                                ${registros}
                            </tbody>
                        </table>
                    </div>
                </div>
            `;


            $('#modalTitulo').empty().append('Sorting Process');
            $('#modalTamano').removeClass().addClass('modal-dialog modal-xl');
            $('#modalContenido').empty().append(estructura);
            $('#modalBase').modal('show');
            $('#tableDetailsSelection').DataTable({dom: 'Bfrtip', language, buttons, order : [3, "desc"]});
        }

        const addDetailSelection = (id) => {

            $('#formAddSelection').validate({
                rules:{
                    shift: {
                        required: true,
                    },
                    piezasOk: {
                        required: true,
                        number: true,
                        min: 0,
                    },
                    piezasNok: {
                        required: true,
                        number: true,
                        min: 0,
                    },
                    batch: {
                        required: true,
                        minlength: 3,
                        maxlength: 45,
                    },
                    serial: {
                        required: true,
                        minlength: 3,
                        maxlength: 45,
                    }

                },
                messages:{
                    shift: {
                        required: 'Este campo es obligatorio.',
                    },
                    piezasOk: {
                        required: 'Este campo es obligatorio.',
                        number: 'Ingrese un número valido',
                        min: 'Por favor ingrese un valor mayor o igual a 0.'
                    },
                    piezasNok: {
                        required: 'Este campo es obligatorio.',
                        number: 'Ingrese un número valido',
                        min: 'Por favor ingrese un valor mayor o igual a 0.'
                    },
                    batch: {
                        required: 'Este campo es obligatorio.',
                        minlength: 'Por Favor introduzca al menos 3 caracteres.',
                        maxlength: 'Por favor introduzca no más de 45 caracteres.'
                    },
                    serial: {
                        required: 'Este campo es obligatorio.',
                        minlength: 'Por Favor introduzca al menos 3 caracteres.',
                        maxlength: 'Por favor introduzca no más de 45 caracteres.'
                    }
                },
                ...estilosValidate,
                submitHandler: function(form){

                    let shift = $('#shift').val();
                    let piezasOk = $('#piezasOk').val();
                    let piezasNok = $('#piezasNok').val();
                    let batch = $('#batch').val();
                    let serial = $('#serial').val();

                    $.ajax({
                        url: '{{ route("crearDetalleSeleccion")}}',
                        type: 'POST',
                        data: {_token, id, shift, piezasOk, piezasNok, batch, serial},
                        dataType: "json",
                        beforeSend: () => {
                            // $('#loader').removeClass('d-none');
                        },

                        success: (response) => {
                            let { totalOk,  totalNok} = response;
                            const fecha = new Date();
                            const fechaFinal = `${fecha.getFullYear()}-${(fecha.getMonth() + 1).toString().padStart(2, '0')}-${(fecha.getDate().toString()).padStart(2, '0')}`;
                            // $('#formAddSelection')[0].reset();
                            $('#piezasOk'+id).text(totalOk);
                            $('#piezasNok'+id).text(totalNok);
                            $('#tableDetailsSelection').DataTable().destroy();
                            $('#detallesSeleccion').append(`
                                <tr>
                                    <td>${shift}</td>
                                    <td>${fechaFinal}</td>
                                    <td>${piezasOk}</td>
                                    <td>${piezasNok }</td>
                                    <td>${piezasOk + piezasNok}</td>
                                    <td>${batch}</td>
                                    <td>${serial}</td>
                                </tr>
                            `);
                            $('#tableDetailsSelection').DataTable({dom: 'Bfrtip', language, buttons});
                        }
                    })
                }
            })
        }

    </script>
@endsection
