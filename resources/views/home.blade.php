@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Halaman Dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <!-- Vertical Steppers -->
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="stepper-wrapper">
                                        <div class="stepper-item completed">
                                            <div class="step-counter">1</div>
                                            <div class="step-name">SP2BJ</div>
                                            <ul>
                                                <li>Paijo</li>
                                            </ul>
                                        </div>
                                        <div class="stepper-item completed">
                                            <div class="step-counter">2</div>
                                            <div class="step-name">SPBJ</div>
                                        </div>
                                        <div class="stepper-item">
                                            <div class="step-counter">3</div>
                                            <div class="step-name">BAST</div>
                                        </div>
                                        <div class="stepper-item">
                                            <div class="step-counter">4</div>
                                            <div class="step-name">PENAGIHAN</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
