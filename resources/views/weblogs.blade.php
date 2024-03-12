

@extends('layouts.layout')

@section('title', 'Bitacoras')


@section('content')
<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Bitacoras</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <!-- <li class="breadcrumb-item"><a href="javascript:void(0);">Catálogos</a></li> -->
                        <li class="breadcrumb-item active" aria-current="page">Bitacoras</li>
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
                            Gestión de actividades
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="file-export" class="table table-bordered text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Inspección</th>
                                        <th>Empleado</th>
                                        <th>Rol</th>
                                        <th>Actividad</th>
                                        <th>Fecha</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>ID-INSP-QA-001</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm me-2 avatar-rounded bg-primary">
                                                    JC
                                                </div>
                                                <div>
                                                    <div class="lh-1">
                                                        <span>Jesus Capires</span>
                                                    </div>
                                                    <div class="lh-1">
                                                        <span
                                                            class="fs-11 text-muted">jesuscap14@gmail.com</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Técnico</td>
                                        <td>Registro de detalles de inspección</td>
                                        <td>15-02-2024</td>
                                        <td>
                                            <div class="hstack gap-2 fs-15">
                                                <a href="javascript:void(0);"
                                                class="btn btn-icon btn-sm btn-danger-transparent rounded-pill"><i class="bi bi-file-earmark-pdf"></i></a>
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

