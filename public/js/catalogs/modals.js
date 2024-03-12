let csrf_token = $('meta[name=csrf-token]').attr('content');

const isStatus = (id) => Number($('#statusSpan' + id).attr('data-value')) === 1 ? 'checked' : '';

const getValue = (descripcion, id) => $('#'+descripcion+id).text();

const openModal = (accion, id) => {
    let estructura = '';
    let clases = 'modal-dialog';
    let titulo = '';

    switch (accion) {
        case 1:
            titulo = (id !== 0) ? 'Actualizar producto' : 'Crear producto';
            estructura = `
                <form id="formularioProducto" action="#" autocomplete="off">
                    <input type="hidden" name="_token" value="${csrf_token}">
                    <div class="row mb-3">
                        <div class="form-group col-md-12 mb-3">
                            <label class="form-label" for="producto">Num. Parte</label>
                            <input type="text" name="id" class="form-control d-none" id="id" value="${ (id !== 0) ? id: 0 }">
                            <input type="text" class="form-control" name="producto" id="producto" value="${ (id !== 0) ? getValue('producto', id): '' }">
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label class="form-label" for="descripcion">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion" value="${ (id !== 0) ? getValue('descripcion' , id): '' }">
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input form-checked-warning" type="checkbox" role="switch" id="status" name="status" ${ (id !== 0)  ? isStatus(id)  : 'checked' }>
                                <label class="form-check-label" for="switch-warning">Estatus</label>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                        <div class="col-6 text-end">
                            <button type="submit" class="btn btn-warning" onclick="validaProducto(${id})">Guardar</button>
                        </div>
                    </div>
                </form>
            `;
            break;
        case 2:
            titulo = (id !== 0) ? 'Actualizar criterio' : 'Crear criterio';
            estructura = `
                <form id="formularioTrabajo" action="#" autocomplete="off">
                    <input type="hidden" name="_token" value="${csrf_token}">
                    <div class="row mb-3">

                        <div class="form-group col-md-12 mb-3">
                            <label class="form-label" for="descripcion">Criterio</label>
                            <input type="text" name="id" class="form-control d-none" id="id" value="${ (id !== 0) ? id: 0 }">
                            <input type="text" class="form-control" name="descripcion" id="descripcion" value="${ (id !== 0) ? getValue('descripcion', id): '' }">
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input form-checked-warning" type="checkbox" role="switch" id="status" name="status" ${ (id !== 0)  ? isStatus(id)  : 'checked' }>
                                <label class="form-check-label" for="switch-warning">Estatus</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                        <div class="col-6 text-end">
                            <button type="submit" class="btn btn-warning" onclick="validaTrabajo(${id})">Guardar</button>
                        </div>
                    </div>
                </form>
            `;
            break;
        default:
            titulo = (id !== 0) ? 'Actualizar cliente' : 'Crear cliente';
            estructura = `
                <form id="formularioCliente" action="#" autocomplete="off">
                    <input type="hidden" name="_token" value="${csrf_token}">
                    <div class="row mb-3">
                        <div class="form-group col-md-12 mb-3">
                            <label class="form-label" for="nombre">Razón Social</label>
                            <input type="text" name="id" class="form-control d-none" id="id" value="${ (id !== 0) ? id: '' } ">
                            <input type="text" class="form-control" name="nombre" id="nombre"  value="${ (id !== 0) ? getValue('nombre', id): '' }">
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label class="form-label" for="rfc">R.F.C</label>
                            <input type="text" class="form-control" name="rfc" id="rfc" oninput="rfcChange()" value="${ (id !== 0) ? getValue('rfc', id): '' }">
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label class="form-label" for="codigoPostal">C. Postal</label>
                            <input type="text" class="form-control" name="codigoPostal" id="codigoPostal" oninput="validarSoloNums()" value="${ (id !== 0) ? getValue('codigoPostal', id): '' }">
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label class="form-label" for="correo">Correo</label>
                            <input type="email" class="form-control" name="correo" id="correo" value="${ (id !== 0) ? getValue('correo', id): '' }">
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input form-checked-warning" type="checkbox" role="switch" id="status" name="status" ${ (id !== 0)  ? isStatus(id)  : 'checked' }>
                                <label class="form-check-label" for="switch-warning">Estatus</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                        <div class="col-6 text-end">
                            <button type="submit" class="btn btn-warning" onclick="validaCliente(${id})">Guardar</button>
                        </div>
                    </div>
                </form>
            `;
            break;
    }
    $('#modalTitulo').empty().append(titulo);
    $('#modalTamano').removeClass().addClass(clases);
    $('#modalContenido').empty().append(estructura);
    $('#modalBase').modal('show');
}

//
