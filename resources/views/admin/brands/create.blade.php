@extends('admin.layout.master')
@section('styles')
@endsection

@section('scripts')
    <!-- App CSS -->
    <link href="{{asset('assets/css/bootstrap-rtl.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/core.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/components.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/pages.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/menu.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">


                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                                   aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">فعا</a></li>
                                    <li><a href="#">متن اول</a></li>
                                    <li><a href="#">متن دوم</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">متن پاورقی</a></li>
                                </ul>
                            </div>

                            <form action="{{route('dashboard.brands.store')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf()
                                <div class="form-group">
                                    <label for="picture">تصویر*</label>

                                    <input type="file" name="picture" parsley-trigger="change" required
                                           value="{{old('picture')}}"
                                           placeholder="تصویر رو اضافه کنید" class="form-control" id="picture">
                                    @error('picture')
                                    <div class="error">{{ $errors->first('picture') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">عنوان*</label>
                                    <input type="text" name="title" parsley-trigger="change" required
                                           value="{{old('title')}}"
                                           placeholder="عنوان را وارد کنید" class="form-control" id="title">
                                    @error('title')
                                    <div class="error">{{ $errors->first('title') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">توضیح*</label>
                                    <input type="text" name="description" parsley-trigger="change" required
                                           value="{{old('description')}}"
                                           placeholder="توضیح را وارد کنید" class="form-control"
                                           id="description">
                                    @error('description')
                                    <div class="error">{{ $errors->first('description') }}</div>
                                    @enderror

                                </div>
                                <div class="form-group text-right m-b-0">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">
                                        ثبت
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div><!-- end col -->
                </div>
            </div>
        </div>

    </div>

@endsection


