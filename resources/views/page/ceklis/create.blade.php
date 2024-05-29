@extends('layouts.base_admin.base_dashboard')@section('judul', 'List Pengajuan')
@section('script_head')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>

    </style>
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Ceklis</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Beranda</a>
                        </li>
                        <li class="breadcrumb-item active">Ceklis Respon Time</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Ceklis</h3>
            </div>
            <form method="POST" action="{{route('ceklis.store')}}">
                @csrf
                <div class="container">
                    @foreach ($data as $item)
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ $item->tools_name }}</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    @foreach ($item->list_tools as $tools)
                                        <div class="col-sm-6" id="{{'checkbox-form'.$item->id.$tools->id}}">
                                            <div class="form-group">
                                                <label>
                                                    {{ $tools->description }}
                                                </label>
                                                <div class="form-check">
                                                    <input type="checkbox" id="{{ 'disabledcheckboxtools'.$item->id.'listtools'.$tools->id }}"
                                                        onchange="toggleInput('{{ 'tools'.$item->id.'listtools'.$tools->id }}' , '{{ 'disabledcheckboxtools'.$item->id.'listtools'.$tools->id }}')"
                                                        class="form-check-input">
                                                    <label class="form-check-label"
                                                        for="{{ 'disabledcheckboxtools'.$item->id.'listtools'.$tools->id }}">
                                                        Standby
                                                    </label>
                                                </div>
                                                @foreach ($item->checking_process_tools as $question)
                                                <label
                                                    for="{{ 'tools'.$item->id.'listtools'.$tools->id.'question'.$question->id }}">
                                                    {{ $question->description }}
                                                </label>
                                                <input
                                                    onkeypress="return isNumberKey(event)"
                                                    id="{{ 'tools'.$item->id.'listtools'.$tools->id.'question'.$question->id }}"
                                                    name="{{ 'tools'.$item->id.'listtools'.$tools->id.'question'.$question->id }}"
                                                    type="text" class="form-control" placeholder="Response time"
                                                    {{-- required --}}
                                                    min="1">
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>

    <script>
        function toggleInput(inputid, checkboxid) {
            var form = document.getElementById("myForm");
            var inputField = document.getElementById(inputid);
            var checkbox = document.getElementById(checkboxid);
            if (checkbox.checked) {
                inputField.value = 'standby';
                // inputField.disabled = true;
            } else {
                inputField.disabled = false;
                inputField.value = '';   
            }
        }

        function isNumberKey(event){
            var charCode = (event.which) ? event.which : event.keyCode
            // Check if the entered key is a number and not equal to 0
            if (charCode > 48 && charCode < 58) {
                return true;
            } else {
                return false;
            }
        }
    </script>
@endsection

@section('script_footer')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
@endsection
