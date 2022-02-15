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
                                <i>still ongoing </i> <a class="text-danger btn btn-light btn-sm px-2"
                                    onclick="return confirm('Are you sure you want to stop this activity?')"
                                    title="Stop Activity"
                                    href="{{ route('activity.stop', $data->id ) }}">
                                    <i class="fa fa-stop"></i> Stop
                                </a>
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
                    @else
                    <p>No data available in Database</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-4">
        <div class="col-md-8 d-flex justify-content-center">
            <a class="btn btn-success btn-block btn-mail m-2" href="{{ route('activity.live')}}">
                Add Live Activity
            </a>
        </div>
        <div class="col-md-8 d-flex justify-content-center">
            <a class="btn btn-primary btn-block btn-mail m-2" href="{{ route('activity.new')}}">
                Add Scheduled Activity
            </a>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection
