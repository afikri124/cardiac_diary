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
                        <a class="btn btn-primary btn-block btn-mail" href="{{ route('activity.new')}}">
                            <i data-feather="plus"></i>New Activity
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
                                    <th scope="col">Date Time</th>
                                    <th scope="col">Activity</th>
                                    <th scope="col">Oxygen Level</th>
                                    <th scope="col">SYS</th>
                                    <th scope="col">DIA</th>
                                    <th scope="col" width="60px">Action</th>
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
                url: "{{url('activity/get_all')}}",
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
                    data: 'activity',
                },
                {
                    render: function (data, type, row, meta) {
                        var x = row.oxygen_lvl + "%";
                        return x;
                    },
                },
                {
                    data: 'bloodpressure_sys',
                },
                
                {
                    data: 'bloodpressure_dia',
                },
                {
                    render: function (data, type, row, meta) {
                        var x = row.id;
                        var html =
                            `<a class="btn btn-success btn-sm px-2" title="Update" href="{{ url('activity/edit/` +
                            x + `') }}"><i class="fa fa-pencil-square-o"></i></a>`;
                        return html;
                    },
                    orderable: false,
                    className: "text-end"
                }
            ]
        });
    });

</script>
@endsection
