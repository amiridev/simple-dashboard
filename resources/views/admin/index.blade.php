@extends('admin.layout.master')

@section('top-style')
    <link href="{{asset('assets/plugins/jstree/style.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('mid-script')
    <script src="{{asset('assets/plugins/jstree/jstree.min.js')}}"></script>
    <script src="{{asset('assets/pages/jquery.tree.js')}}"></script>
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <div class="card-box">
                    <div class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                           aria-expanded="false">
                            <i class="zmdi zmdi-more-vert"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">فعال</a></li>
                            <li><a href="#">متن اول</a></li>
                            <li><a href="#">متن دوم</a></li>
                            <li class="divider"></li>
                            <li><a href="#">متن پاورقی</a></li>
                        </ul>
                    </div>

                    <h4 class="header-title m-t-0 m-b-30">دسته بندی ها </h4>

                    <div id="basicTree">
                        <ul>
                            <li>Mr.Admin
                                <ul>
                                    <li data-jstree='{"opened":true}'>Assets
                                        <ul>
                                            <li data-jstree='{"type":"file"}'>Css</li>
                                            <li data-jstree='{"opened":true}'>Plugins
                                                <ul>
                                                    <li data-jstree='{"selected":true,"type":"file"}'>Plugin
                                                        one
                                                    </li>
                                                    <li data-jstree='{"type":"file"}'>Plugin two</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li data-jstree='{"opened":true}'>Email Template
                                        <ul>
                                            <li data-jstree='{"type":"file"}'>Email one</li>
                                            <li data-jstree='{"type":"file"}'>Email two</li>
                                        </ul>
                                    </li>
                                    <li data-jstree='{"icon":"zmdi zmdi-view-dashboard"}'>Dashboard</li>
                                    <li data-jstree='{"icon":"zmdi zmdi-format-underlined"}'>Typography</li>
                                    <li data-jstree='{"opened":true}'>User Interface
                                        <ul>
                                            <li data-jstree='{"type":"file"}'>Buttons</li>
                                            <li data-jstree='{"type":"file"}'>Cards</li>
                                        </ul>
                                    </li>
                                    <li data-jstree='{"icon":"zmdi zmdi-collection-text"}'>Forms</li>
                                    <li data-jstree='{"icon":"zmdi zmdi-view-list"}'>Tables</li>
                                </ul>
                            </li>
                            <li data-jstree='{"type":"file"}'>Frontend</li>
                        </ul>
                    </div>
                </div>
            </div><!-- end col -->

        </div>
    </div><!-- end col -->
@endsection
