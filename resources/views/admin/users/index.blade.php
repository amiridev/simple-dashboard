@extends('admin.layout.master')

@section('top-style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/datatable/datatables.css')}}">
@endsection

@section('mid-scripts')
    <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('dashboard.users.datatable') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'family', name: 'family'},
                    {data: 'username', name: 'username'},
                    {data: 'email', name: 'email'},
                    {data: 'mobile', name: 'mobile'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
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
                                <a href="{{route('dashboard.users.create')}}" type="button"
                                   class="btn btn-outline-info mb-1 mr-4">
                                    کاربر سایت جدید
                                </a>
                            </div>
                        </div>
                        <h4 class="header-title m-t-0 m-b-30">لیست کاربران سایت</h4>

                        <table id="users-table"
                               class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نام</th>
                                <th>نام خانوادگی</th>
                                <th>نام کاربری</th>
                                <th>ایمیل</th>
                                <th>موبایل</th>
                                <th>تاریخ بروزرسانی</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                        </table>
                        {{--                        {{$users->links()}}--}}
                    </div>

                </div><!-- end col -->
            </div>
        </div> <!-- container -->

    </div> <!-- content -->
@endsection
