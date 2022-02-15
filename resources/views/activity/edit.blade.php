@extends('layouts.master')
@section('title', 'Edit Activity')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
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
<li class="breadcrumb-item active">Edit</li>
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
                        <label class="col-sm-3 col-form-label">Date & time Start</label>
                        <div class="col-sm-5">
                            <input class="datepicker-here form-control digits" autocomplete="off" type="text"
                                data-language="en" name="date" required value="{{ date('m/d/Y', strtotime($data->date_time)) }}">
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group clockpicker">
                                <input class="form-control" name="time" type="text" autocomplete="off" required value="{{ date('H:i', strtotime($data->date_time)) }}"><span
                                    class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Date & time End</label>
                        <div class="col-sm-5">
                            <input class="datepicker-here form-control digits" autocomplete="off" type="text"
                                data-language="en" name="date_end" value="{{ ($data->date_time_end == null ? '': date('m/d/Y', strtotime($data->date_time_end)) ) }}">
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group clockpicker">
                                <input class="form-control" name="time_end" type="text" autocomplete="off" value="{{ ($data->date_time_end == null ? '': date('H:i', strtotime($data->date_time_end)) ) }}"><span
                                    class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Activity Type</label>
                        <div class="col-sm-9">
                            <select class="form-select digits select2" id="activity_type" name="activity_type">
                                <option {{ ($data->activity_type == "Walking" ? "selected": "") }}>Walking</option>
                                <option {{ ($data->activity_type == "Standing" ? "selected": "") }}>Standing</option>
                                <option {{ ($data->activity_type == "Sitting" ? "selected": "") }}>Sitting</option>
                                <option {{ ($data->activity_type == "Stairs Climb" ? "selected": "") }}>Stairs Climb</option>
                                <option {{ ($data->activity_type == "Running" ? "selected": "") }}>Running</option>
                                <option {{ ($data->activity_type == "Resting" ? "selected": "") }}>Resting</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Activity Details</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="3" cols="5" name="activity">{{ $data->activity }}</textarea>
                        </div>
                    </div>
                    <!-- <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Oxygen Level</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input class="form-control" type="number" name="OxygenLevel" title="Oxygen Level" value="{{ $data->oxygen_lvl }}">
                                <div class="input-group-append"><span class="input-group-text">%</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Blood Pressure SYS</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">SYS</span></div>
                                <input class="form-control" type="number" name="SYS" title="Blood Pressure SYS" value="{{ $data->bloodpressure_sys }}">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Blood Pressure DIA</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">DIA</span></div>
                                <input class="form-control" type="number" name="DIA" title="Blood Pressure DIA" value="{{ $data->bloodpressure_dia }}">
                            </div>
                        </div>
                    </div> -->

                    @foreach ($errors->all() as $error)
                    <p class="text-danger m-0">{{ $error }}</p>
                    @endforeach
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">Save</button>
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
<script src="{{asset('assets/js/time-picker/clockpicker.js')}}"></script>
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script type="text/javascript">
    $('.select2').select2({});
</script>
@endsection
