@extends('admin.layout.master')

@section('top-style')
    <link href="{{asset('assets/plugins/jstree/style.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('mid-script')
    <script src="{{asset('assets/plugins/jstree/jstree.min.js')}}"></script>
    <script src="{{asset('assets/pages/jquery.tree.js')}}"></script>
@endsection

@section('content')

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">کاربران</h4>

                        <div class="widget-chart-1">
                            <div class="widget-detail-1">
                                <h2 class="m-b-0"> {{$count['users']}} </h2>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-lg-3 col-md-6">
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">برندها</h4>

                        <div class="widget-chart-1">
                            <div class="widget-detail-1">
                                <h2 class="m-b-0"> {{$count['brands']}} </h2>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-lg-3 col-md-6">
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">دسته بندی ها</h4>

                        <div class="widget-chart-1">
                            <div class="widget-detail-1">
                                <h2 class="m-b-0"> {{$count['categories']}} </h2>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-30">محصولات</h4>

                    <div class="widget-chart-1">
                        <div class="widget-detail-1">
                            <h2 class="m-b-0"> {{$count['products']}} </h2>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
            <div class="row">
                <div class="col-md-9">
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30"> لیست درختی دسته بندی ها سیستم </h4>

                        <div id="basicTree">
                            <ul>
                                @foreach($categories as $cat)
                                    @if(blank($cat->children))
                                        <li data-jstree='{"type":"file"}'>{{$cat->title}}</li>
                                    @else
                                        <li>
                                            {{$cat->title}}
                                            <ul>
                                                @foreach($cat->children as $child)
                                                    <li data-jstree='{"icon":"zmdi zmdi-view-dashboard"}'>
                                                        {{$child->title}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div><!-- end col -->

            </div>
        </div><!-- end col -->
    </div>

@endsection
