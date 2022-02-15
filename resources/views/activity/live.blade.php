@extends('layouts.master')
@section('title', 'Add Live Activity')

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
<li class="breadcrumb-item active">Add</li>
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
                        <label class="col-sm-3 col-form-label">Activity Type</label>
                        <div class="col-sm-9">
                            <select class="form-select digits select2" id="activity_type" name="activity_type">
                                <option value="" selected disabled>Select</option>
                                <option>Walking</option>
                                <option>Standing</option>
                                <option>Sitting</option>
                                <option>Stairs Climb</option>
                                <option>Running</option>
                                <option>Resting</option>
                                <option>Exercising</option>
                                <option>Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Activity Details</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="3" cols="5" name="activity">{{ old('activity') }}</textarea>
                        </div>
                    </div>
                    @foreach ($errors->all() as $error)
                    <p class="text-danger m-0">{{ $error }}</p>
                    @endforeach
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-success" type="submit"><i class="fa fa-play"></i> Start</button>
                    <a href="{{ url()->previous() }}">
                        <span class="btn btn-light"><i class="fa fa-angle-left"></i> Back</span>
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
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script type="text/javascript">
    $('.select2').select2({});
</script>
@endsection
