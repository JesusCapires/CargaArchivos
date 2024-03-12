
@extends('layouts.layout')

@section('title', 'Productos')


@section('content')
<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Cuadro de mando</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Cuadro de mando</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Quatum</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header Close -->

        <!-- Start::row-1 -->
        <div class="row">
            <div class="col-xxl-7 col-xl-12 col-lg-12 col-md-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">Inspecciones</div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Total a inspecionar</th>
                                        <th scope="col">Estatus</th>
                                        <th scope="col">Piezas OK</th>
                                        <th scope="col">Piezas NOK</th>
                                        <th scope="col">Proceso</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span>
                                                </span>SVDVDS
                                            </div>
                                        </td>
                                        <td>3000</td>
                                        <td><span class="badge bg-success-transparent">Completada</span></td>
                                        <td>273</td>
                                        <td>400</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 52%" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span>
                                                </span>SVDVDS
                                            </div>
                                        </td>
                                        <td>2700</td>
                                        <td><span class="badge bg-warning-transparent">En proceso</span></td>
                                        <td>590</td>
                                        <td>10</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 91%" aria-valuenow="91" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span>
                                                </span>SVDVDS
                                            </div>
                                        </td>
                                        <td>Service Manager</td>
                                        <td><span class="badge bg-success-transparent">Completada</span></td>
                                        <td>5000</td>
                                        <td>0
                                        </td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span>
                                                </span>SVDVDS
                                            </div>
                                        </td>
                                        <td>6000</td>
                                        <td><span class="badge bg-danger-transparent">Cancelada</span></td>
                                        <td>1800</td>
                                        <td>0
                                        </td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 21%" aria-valuenow="21" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-5 col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">
                            Piezas en el mes actual
                        </div>
                    </div>
                    <div class="card-body py-4 px-0">
                        <div id="jobs-summary"></div>
                    </div>
                    <div class="card-footer p-4 my-2">
                        <div class="row row-cols-12">
                            <div class="col p-0">
                                <div class="text-center">
                                    <span class="text-success fs-12 mb-1 hrm-jobs-legend  d-inline-block ms-2">Correctas
                                    </span>
                                    <div><span class="fs-16 fw-semibold">15,153</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col p-0">
                                <div class="text-center">
                                    <span class="text-danger fs-12 mb-1 hrm-jobs-legend  d-inline-block ms-2">Incorrectas
                                    </span>
                                    <div><span class="fs-16 fw-semibold">120</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End::row-1 -->

        <!-- Start::row-2 -->
        <div class="row">
            <div class="col-xxl-5 col-xl-12">
                <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="card custom-card hrm-main-card primary">
                            <div class="card-body">
                                <div class="d-flex align-items-top">
                                    <div class="me-3">
                                        <span class="avatar bg-primary">
                                            <i class="bi bi-journal-check fs-18"></i>
                                        </span>
                                    </div>
                                    <div class="flex-fill">
                                        <span class="fw-semibold text-muted d-block mb-2">Total Inspecciones</span>
                                        <h5 class="fw-semibold mb-2">22,124</h5>
                                        <p class="mb-0">
                                            <span class="badge bg-primary-transparent">Este mes</span>
                                        </p>
                                    </div>
                                    <div>
                                        <span class="fs-14 fw-semibold text-success">+1.03%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="card custom-card hrm-main-card secondary">
                            <div class="card-body">
                                <div class="d-flex align-items-top">
                                    <div class="me-3">
                                        <span class="avatar bg-success">
                                            <i class="bi bi-bookmark-star fs-18"></i>
                                        </span>
                                    </div>
                                    <div class="flex-fill">
                                        <span class="fw-semibold text-muted d-block mb-2">Piezas correctas</span>
                                        <h5 class="fw-semibold mb-2">528</h5>
                                        <p class="mb-0">
                                            <span class="badge bg-success-transparent">Este mes</span>
                                        </p>
                                    </div>
                                    <div>
                                        <span class="fs-14 fw-semibold text-success">+0.36%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="card custom-card  hrm-main-card warning">
                            <div class="card-body">
                                <div class="d-flex align-items-top">
                                    <div class="me-3">
                                        <span class="avatar bg-warning">
                                            <i class="ri-service-line fs-18"></i>
                                        </span>
                                    </div>
                                    <div class="flex-fill">
                                        <span class="fw-semibold text-muted d-block mb-2">Total Clients</span>
                                        <h5 class="fw-semibold mb-2">8,289</h5>
                                        <p class="mb-0">
                                            <span class="badge bg-warning-transparent">This Month</span>
                                        </p>
                                    </div>
                                    <div>
                                        <span class="fs-14 fw-semibold text-danger">-1.28%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="card custom-card  hrm-main-card danger">
                            <div class="card-body">
                                <div class="d-flex align-items-top">
                                    <div class="me-3">
                                        <span class="avatar bg-danger">
                                            <i class="bi bi-bookmark-x fs-18"></i>
                                        </span>
                                    </div>
                                    <div class="flex-fill">
                                        <span class="fw-semibold text-muted d-block mb-2">Piezas incorrectas</span>
                                        <h5 class="fw-semibold mb-2">1,453</h5>
                                        <p class="mb-0">
                                            <span class="badge bg-danger-transparent">Este mes</span>
                                        </p>
                                    </div>
                                    <div>
                                        <span class="fs-14 fw-semibold text-success">+4.25%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-7 col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between align-items-center d-sm-flex d-block">
                        <div class="card-title mb-sm-0 mb-2">
                            Tendencias de calidad Ok
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary-light btn-sm btn-wave">1W</button>
                            <button type="button" class="btn btn-primary-light btn-sm btn-wave">1M</button>
                            <button type="button" class="btn btn-primary-light btn-sm btn-wave">6M</button>
                            <button type="button" class="btn btn-primary btn-sm btn-wave">1Y</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="performanceReport"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End::row-2 -->

    </div>
</div>
<!-- End::app-content -->

@endsection



{{-- <!DOCTYPE html>

@include('init')

@include('head')

<body>

    @include('switcher')

    @include('loader')

    <div class="page">

        @include('header')

        @include('aside')



        <!-- Footer Start -->
        @include('footer')
        <!-- Footer End -->

    </div>

    @include('scroll')

    {{-- @include('assets-dash') --}}


{{-- </body>

</html> --}}
