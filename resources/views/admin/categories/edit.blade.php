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
                            <h5 class="pb-1">ویرایش دسته بندی "{{$category->title}}"</h5>
                            <form action="{{route('dashboard.categories.update', ['category'=> $category->id])}}"
                                  method="post"
                                  enctype="multipart/form-data">
                                @method('PUT')
                                @csrf()
                                <div class="form-group">
                                    <label for="picture">تصویر*</label>
                                    <img
                                        src="{{$category->picture_url}}"
                                        alt="{{$category->title}}"
                                        style="width: 50px; height: 50px"
                                    />
                                    <input type="file" name="picture"
                                           value="{{$category->picture}}"
                                           placeholder="تصویر رو اضافه کنید" class="form-control" id="picture">
                                    @error('picture')
                                    <div class="error">{{ $errors->first('picture') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="parent_id">والد</label>
                                    <select class="form-control select2" name="parent_id" id="parent_id">
                                        <option selected></option>
                                        @foreach($categories as $cat)
                                            @if($cat->id == $category->parent_id)
                                                <option value="{{$cat->id}}" selected>{{$cat->title}}</option>
                                            @elseif($cat->id == $category->id)
                                                <option value="{{$cat->id}}" disabled>{{$cat->title}}</option>
                                            @else
                                                <option value="{{$cat->id}}">{{$cat->title}}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">عنوان *</label>
                                    <input type="text" name="title" parsley-trigger="change" required
                                           value="{{$category->title}}"
                                           placeholder="عنوان را وارد کنید" class="form-control" id="title">
                                    @error('title')
                                    <div class="error">{{ $errors->first('title') }}</div>
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
                           href="{{route('dashboard.categories.delete', ['category' => $category->id])}}">
                            حذف این دسته بندی
                        </a>
                        @if(session('deleted') == false)
                            <p class="text-danger font-bold">
                                حذف با خطا مواجه شد
                            </p>
                        @endif
                    </div><!-- end col -->
                </div>
            </div>
        </div>

    </div>

@endsection


