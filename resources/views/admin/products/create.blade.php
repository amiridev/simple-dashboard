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
                            <form action="{{route('dashboard.products.store')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf()
                                <div class="form-group">
                                    <label for="picture">تصویر*</label>
                                    <input type="file" name="picture"
                                           class="form-control" id="picture">
                                    @error('picture')
                                    <div class="error">{{ $errors->first('picture') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category_ids">دسته بندی ها </label>
                                    <select
                                        class="form-control select2"
                                        name="category_ids[]"
                                        id="category_ids"
                                        multiple
                                    >
                                        @foreach($categories as $cat)
                                            <option value="{{$cat->id}}">{{$cat->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_ids')
                                    <div class="error">{{ $errors->first('category_ids') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="brand_id">برند </label>
                                    <select class="form-control select2" name="brand_id" id="brand_id">
                                        <option selected></option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                    <div class="error">{{ $errors->first('brand_id') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">عنوان*</label>
                                    <input type="text" name="title"
                                           value="{{old('title')}}"
                                           placeholder="عنوان را وارد کنید" class="form-control" id="title">
                                    @error('title')
                                    <div class="error">{{ $errors->first('title') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">قیمت*</label>
                                    <input type="number" name="price"
                                           value="{{old('price')}}"
                                           min="0"
                                           placeholder="قیمت را وارد کنید" class="form-control" id="price">
                                    @error('price')
                                    <div class="error">{{ $errors->first('price') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="discount_price"> تخفیف*</label>
                                    <input type="number" name="discount_price"
                                           value="{{old('discount_price')}}"
                                           min="0"
                                           placeholder="توضیح قیمت را وارد کنید" class="form-control"
                                           id="discount_price">
                                    @error('discount_price')
                                    <div class="error">{{ $errors->first('discount_price') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inventory">موجودی*</label>
                                    <input type="number" name="inventory"
                                           min="0"
                                           value="{{old('inventory')}}"
                                           placeholder="موجودی را وارد کنید" class="form-control" id="inventory">
                                    @error('inventory')
                                    <div class="error">{{ $errors->first('inventory') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="short_desc">توضیح کوتاه*</label>
                                    <input type="text" name="short_desc"
                                           value="{{old('short_desc')}}"
                                           placeholder="توضیح کوتاه را وارد کنید" class="form-control" id="short_desc">
                                    @error('short_desc')
                                    <div class="error">{{ $errors->first('short_desc') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="long_desc">توضیح بلند*</label>
                                    <textarea
                                        name="long_desc"
                                        placeholder="توضیح بلند را وارد کنید"
                                        class="form-control"
                                        id="long_desc"
                                    >{{old('long_desc')}}</textarea>
                                    @error('long_desc')
                                    <div class="error">{{ $errors->first('long_desc') }}</div>
                                    @enderror
                                </div>

                                <input type="checkbox" name="status">
                                <label for="status">وضعبت فعال پس از ثبت</label>
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


