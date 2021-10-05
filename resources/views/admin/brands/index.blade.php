@extends('admin.layout.master')

@section('top-style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/datatable/datatables.css')}}">
@endsection

@section('mid-script')
    <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#brands-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('dashboard.brands.datatable') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'picture', name: 'picture'},
                    {data: 'slug', name: 'slug'},
                    {data: 'title', name: 'title'},
                    {data: 'description', name: 'description'},
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
                                <a href="{{route('dashboard.brands.create')}}" type="button"
                                   class="btn btn-outline-info mb-1 mr-4">
                                    ایجادبرند جدید
                                </a>
                            </div>
                        </div>
                        <h4 class="header-title m-t-0 m-b-30">لیست برندها</h4>

                        <table id="brands-table"
                               class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>تصویر</th>
                                <th>اسلاگ</th>
                                <th>عنوان</th>
                                <th>توضیح</th>
                                <th>تـ ایجاد</th>
                                <th>تـ بروزرسانی</th>
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

