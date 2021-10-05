@extends('admin.layout.master')

@section('top-style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/datatable/datatables.css')}}">
@endsection

@section('mid-script')
    <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#admins-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('dashboard.admins.datatable') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'family', name: 'family'},
                    {data: 'username', name: 'username'},
                    {data: 'email', name: 'email'},
                    {data: 'mobile', name: 'mobile'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'login_at', name: 'login_at'},
                    {data: 'action', name: 'action'}
                ],
                language: {
                    url: "{{asset('assets/js/datatable/datatables/datatables.json')}}"
                },
                order: [
                    [0, 'desc']
                ]
            });
        });
    </script>
@endsection

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <div class="dropdown pull-right">
                            <div class="row p-1">
                                <a href="{{route('dashboard.admins.create')}}" type="button"
                                   class="btn btn-outline-info mb-1 mr-4">
                                    کاربر پنل جدید
                                </a>
                            </div>
                        </div>
                        <h4 class="header-title m-t-0 m-b-30">لیست کاربران پنل</h4>

                        <table id="admins-table"
                               class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نام</th>
                                <th>نام خانوادگی</th>
                                <th>نام کاربری</th>
                                <th>ایمیل</th>
                                <th>موبایل</th>
                                <th>تـ ایجاد</th>
                                <th>تـ بروزرسانی</th>
                                <th>تـ ورود</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div><!-- end col -->
            </div>
        </div> <!-- container -->

    </div> <!-- content -->
@endsection
