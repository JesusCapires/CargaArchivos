

@extends('layouts.layout')

@section('title', 'Usuarios')


@section('content')

 <!-- Start::app-content -->
 <div class="main-content app-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Usuarios</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Catálogos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
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
                            Gestión de Usuarios
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-sm btn-orange btn-wave waves-light"><i class="ri-add-line fw-semibold align-middle me-1"></i>Usuario</button>
                            <!-- <div class="dropdown ms-2">
                                <button class="btn btn-icon btn-secondary-light btn-sm btn-wave waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ti ti-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:void(0);">All Invoices</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0);">Paid Invoices</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0);">Pending Invoices</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0);">Overdue Invoices</a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="file-export" class="table table-bordered text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Correo</th>
                                        <th>Rol</th>
                                        <th>Estatus</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm avatar-rounded bg-primary">
                                                    SJ
                                                </div>
                                                <div>
                                                    <div class="lh-1 ms-1">
                                                        <span>Joanna Smith</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Tiger Nixon@gmail.com</td>
                                        <td>System Architect</td>
                                        <td><span class="badge bg-success-transparent">Active</span></td>
                                        <td>
                                            <div class="hstack gap-2 fs-15">
                                                <a href="javascript:void(0);"
                                                    class="btn btn-icon btn-sm btn-info-transparent rounded-pill"><i
                                                        class="ri-edit-line"></i></a>
                                                <a href="javascript:void(0);"
                                                    class="btn btn-icon btn-sm btn-danger-transparent rounded-pill"><i
                                                        class="ri-delete-bin-line"></i></a>
                                            </div>
                                        </td>
                                    </tr>
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
