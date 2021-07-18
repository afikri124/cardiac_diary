@extends('layouts.master')
@section('title', 'Dashboard')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Dashboard</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Latest Activity') }}</div>

                <div class="card-body">
                    @if($data != null)
                    <div class="row mb-3">
                        <label class="col-md-4">
                            <h6 class="form-label">Date & time</h6>
                        </label>
                        <div class="col-md-8">
                            <span>{{ date('d F Y  H:i', strtotime($data->date_time)) }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4">
                            <h6 class="form-label">Activity</h6>
                        </label>
                        <div class="col-md-8">
                            <span>{{ $data->activity }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4">
                            <h6 class="form-label">Oxygen Level</h6>
                        </label>
                        <div class="col-md-8">
                            <span>{{ $data->oxygen_lvl }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4">
                            <h6 class="form-label">Blood Pressure (SYS)</h6>
                        </label>
                        <div class="col-md-8">
                            <span>{{ $data->bloodpressure_sys }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4">
                            <h6 class="form-label">Blood Pressure (DIA)</h6>
                        </label>
                        <div class="col-md-8">
                            <span>{{ $data->bloodpressure_dia }}</span>
                        </div>
                    </div>
                    @else
                    <p>No data available in Database</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 d-flex justify-content-center">
            <a class="btn btn-primary btn-block btn-mail" href="{{ route('activity.new')}}">
                New Activity
            </a>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection
