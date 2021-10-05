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
                            <h5 class="pb-1">ویرایش برند: "{{$brand->title}} "</h5>

                            <form action="{{route('dashboard.brands.update', ['brand'=> $brand->id])}}" method="post"
                                  data-parsley-validate novalidate>
                                @method('PUT')
                                @csrf()
                                <div class="form-group">
                                    <label for="picture">تصویر*</label>
                                    <img
                                        src="{{$brand->picture_url}}"
                                        alt="{{$brand->title}}"
                                        style="width: 50px; height: 50px"
                                    />
                                    <input type="file" name="picture" parsley-trigger="change" required
                                           value="{{$brand->picture}}"
                                           placeholder="تصویر رو اضافه کنید" class="form-control" id="picture">

                                    @error('picture')
                                    <div class="error">{{ $errors->first('picture') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title"> عنوان*</label>
                                    <input type="text" name="title" parsley-trigger="change" required
                                           value="{{$brand->title}}"
                                           placeholder="عنوان را وارد کنید" class="form-control" id="title">
                                    @error('title')
                                    <div class="error">{{ $errors->first('title') }}</div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label for="description">توضیح *</label>
                                    <input type="text" name="description" parsley-trigger="change" required
                                           value="{{$brand->description}}"
                                           placeholder="توضیح را وارد کنید" class="form-control" id="description">
                                    @error('description')
                                    <div class="error">{{ $errors->first('description') }}</div>
                                    @enderror
                                </div>

                                <div class="form-group text-right m-b-0 m-t-2">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">
                                        ثبت
                                    </button>
                                </div>
                            </form>
                        </div>

                        <a class="btn btn-danger btn-block waves-effect waves-light"
                           href="{{route('dashboard.brands.delete', ['brand' => $brand->id])}}">
                            حذف این برند
                        </a>
                    </div><!-- end col -->
                </div>
            </div>
        </div>

    </div>


@endsection


