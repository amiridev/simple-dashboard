@extends('admin.layout.master')

@section('top-style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/datatable/datatables.css')}}">
@endsection

@section('mid-script')
    <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#products-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('dashboard.products.datatable') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'picture', name: 'picture' },
                    { data: 'title', name: 'title' },
                    { data: 'slug', name: 'slug' },
                    { data: 'price', name: 'price' },
                    { data: 'discount_price', name: 'discount_price' },
                    { data: 'inventory', name: 'inventory' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action' }
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
                                <a href="{{route('dashboard.products.create')}}" type="button"
                                   class="btn btn-outline-info mb-1 mr-4">
                                    ایجاد محصولات جدید
                                </a>
                            </div>
                        </div>
                        <h4 class="header-title m-t-0 m-b-30">لیست محصولات </h4>

                        <table id="products-table"
                               class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>تصویر</th>
                                <th>عنوان</th>
                                <th>اسلاگ</th>
                                <th>قیمت</th>
                                <th>تخفیف</th>
                                <th>موجودی</th>
                                <th>تاریخ ایجاد</th>
                                <th>تاریخ بروزرسانی</th>
                                <th>وضعیت</th>
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
