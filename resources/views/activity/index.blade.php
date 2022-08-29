@extends('layouts.master')
@section('title', 'Activity')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatable-extension.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@yield('title')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 project-list">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center justify-content-md-end">
                        <a class="btn btn-success btn-block btn-mail mr-2" href="{{ route('activity.live')}}">
                            <i data-feather="plus"></i>Live Activity
                        </a>
                        <a class="btn btn-primary btn-block btn-mail" href="{{ route('activity.new')}}">
                            <i data-feather="plus"></i>Scheduled Activity
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="">
                        <table class="table table-hover" id="datatable" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col">Start</th>
                                    <th scope="col">End</th>
                                    <th scope="col">Activity</th>
                                    <th scope="col">Details</th>
                                    <!-- <th scope="col">Oxygen Level</th>
                                    <th scope="col">SYS</th>
                                    <th scope="col">DIA</th> -->
                                    <th scope="col" width="120px">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script>
    "use strict";
    setTimeout(function () {
        (function ($) {
            "use strict";
            $(".select2").select2({
                allowClear: true
            });
        })(jQuery);
    }, 350);
</script>
<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            language: {
                searchPlaceholder: 'Search activity...',
                sSearch: '_INPUT_ &nbsp;',
                lengthMenu: '<span>Show:</span> _MENU_',
            },
            ajax: {
                url: "{{route('activity.get_all')}}",
                data: function (d) {
                        d.search = $('input[type="search"]').val()
                },
            },
            columns: [
                {
                    render: function (data, type, row, meta) {
                        return moment(row.date_time).format("DD MMM YYYY HH:mm");
                    },
                },
                {
                    render: function (data, type, row, meta) {
                        var x = row.id;
                        var html = moment(row.date_time_end).format("DD MMM YYYY HH:mm");
                        if(row.date_time_end == null){
                            html = `<a class="btn btn-light text-danger btn-sm px-2" title="Stop Activity" onclick="return confirm('Are you sure you want to stop this activity?')" href="{{ url('activity/stop/` +
                            x + `') }}"><i class="fa fa-stop"></i> Stop</a> `
                        }
                        return html;
                    },
                },
                {
                    render: function (data, type, row, meta) {
                        return row.activity_type;
                    },
                },
                {
                    data: 'activity',
                },
                // {
                //     render: function (data, type, row, meta) {
                //         var x = row.oxygen_lvl + "%";
                //         return x;
                //     },
                // },
                // {
                //     data: 'bloodpressure_sys',
                // },
                
                // {
                //     data: 'bloodpressure_dia',
                // },
                {
                    render: function (data, type, row, meta) {
                        var x = row.id;
                        var html =
                            `<a class="btn btn-warning btn-sm px-2 m-1" title="View" href="{{ url('activity/live/` +
                            x + `') }}"><i class="fa fa-eye"></i></a>`
                            +
                            `<a class="btn btn-info btn-sm px-2 m-1" title="Update" href="{{ url('activity/edit/` +
                            x + `') }}"><i class="fa fa-pencil-square-o"></i></a>`
                            + `<a class="btn btn-danger btn-sm px-2 m-1" title="Delete" onclick="return confirm('Are you sure?')" href="{{ url('activity/delete/` +
                            x + `') }}"><i class="fa fa-trash"></i></a>`;
                        return html;
                    },
                    orderable: false,
                    className: "text-center"
                }
            ]
        });
    });

</script>
@endsection
