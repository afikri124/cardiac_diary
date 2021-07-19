@extends('layouts.master')
@section('title', 'New Activity')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/timepicker.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<!-- <h3></h3> -->
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Activity</li>
<li class="breadcrumb-item active">New</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form class="card" method="POST" action="">
                @csrf
                <div class="card-header">
                    <h4 class="card-title mb-0">@yield('title')</h4>
                    <div class="card-options"><a class="card-options-collapse" href="#"
                            data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                            class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                class="fe fe-x"></i></a></div>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Date & time</label>
                        <div class="col-sm-5">
                            <input class="datepicker-here form-control digits" autocomplete="off" type="text"
                                data-language="en" name="date" required>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group clockpicker">
                                <input class="form-control" name="time" type="text" autocomplete="off" required><span
                                    class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Activity</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="3" cols="5" name="activity"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Oxygen Level</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input class="form-control" type="number" id="OxygenLevel" name="OxygenLevel"
                                    title="Oxygen Level">
                                <div class="input-group-append"><span class="input-group-text" required>%</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Blood Pressure SYS</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">SYS</span></div>
                                <input class="form-control" type="number" id="SYS" name="SYS" title="Blood Pressure SYS"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Blood Pressure DIA</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">DIA</span></div>
                                <input class="form-control" type="number" id="DIA" name="DIA" title="Blood Pressure DIA"
                                    required>
                            </div>
                        </div>
                    </div>
                    @foreach ($errors->all() as $error)
                    <p class="text-danger m-0">{{ $error }}</p>
                    @endforeach
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">Create</button>
                    <a href="{{ url()->previous() }}">
                        <span class="btn btn-secondary">Back</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('assets/js/time-picker/jquery-clockpicker.min.js')}}"></script>
<script src="{{asset('assets/js/time-picker/highlight.min.js')}}"></script>
<script>
    'use strict';
    $('.clockpicker').clockpicker()
        .find('input').change(function () {
            console.log(this.value);
        });
</script>
@endsection
