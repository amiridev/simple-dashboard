@extends('admin.layout.master')
@section('styles')
@endsection

@section('mid-script')
    <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#provinces-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('dashboard.provinces.datatable') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
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
                                <a href="{{route('dashboard.provinces.create')}}" type="button"
                                   class="btn btn-outline-info mb-1 mr-4">
                                    ایجاد استان جدید
                                </a>
                            </div>
                        </div>
                        <h4 class="header-title m-t-0 m-b-30">لیست استان ها</h4>

                        <table id="provinces-table"
                               class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نام</th>
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


