@extends('layouts.master')
@section('title', 'Activity')

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
<li class="breadcrumb-item active">Live</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @csrf
                <div class="card-header">
                    <h4 class="card-title mb-0">@yield('title')</h4>
                    <div class="card-options"><a class="card-options-collapse" href="#"
                            data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                            class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                class="fe fe-x"></i></a></div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-md-4">
                            <h6 class="form-label">Start</h6>
                        </label>
                        <div class="col-md-8">
                            <span>{{ date('d F Y  H:i', strtotime($data->date_time)) }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4">
                            <h6 class="form-label">End</h6>
                        </label>
                        <div class="col-md-8">
                            <span>
                                @if($data->date_time_end == null)
                                <i>still ongoing</i>
                                @else
                                {{ date('d F Y  H:i', strtotime($data->date_time_end)) }}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4">
                            <h6 class="form-label">Activity</h6>
                        </label>
                        <div class="col-md-8">
                            <span>{{ $data->activity_type }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4">
                            <h6 class="form-label">Details</h6>
                        </label>
                        <div class="col-md-8">
                            <span>{{ $data->activity }}</span>
                        </div>
                    </div>
                </div>
                @if($data->date_time_end == null)
                <div class="card-footer text-end">
                    <a class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to stop this activity?')" title="Stop Activity"
                        href="{{ route('activity.stop', $data->id ) }}">
                        <i class="fa fa-stop"></i> Stop
                    </a>
                </div>
                @endif
            </div>
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
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script type="text/javascript">
    $('.select2').select2({});

</script>
@endsection
