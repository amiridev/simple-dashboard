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
                            <h5 class="pb-1">ویرایش محصولات "{{$product->title}}"</h5>
                            <form action="{{route('dashboard.products.update', ['product'=> $product->id])}}"
                                  method="post"
                                  enctype="multipart/form-data">
                                @method('PUT')
                                @csrf()
                                <div class="form-group">
                                    <label for="picture">تصویر*</label>
                                    <img
                                        src="{{$product->picture_url}}"
                                        alt="{{$product->title}}"
                                        style="width: 50px; height: 50px"
                                    />
                                    <input type="file" name="picture"
                                           value="{{$product->picture}}"
                                           placeholder="تصویر رو اضافه کنید" class="form-control" id="picture">
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
                                            @if($product->hasCategory($cat->id))
                                                <option value="{{$cat->id}}" selected>{{$cat->title}}</option>
                                            @else
                                                <option value="{{$cat->id}}">{{$cat->title}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('category_ids')
                                    <div class="error">{{ $errors->first('category_ids') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="brand_id">برند </label>
                                    <select class="form-control select2" name="brand_id" id="brand_id">
                                        @foreach($brands as $brand)
                                            @if($product->brand_id == $brand->id)
                                                <option value="{{$brand->id}}" selected>{{$brand->title}}</option>
                                            @else
                                                <option value="{{$brand->id}}">{{$brand->title}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                    <div class="error">{{ $errors->first('brand_id') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">عنوان *</label>
                                    <input type="text" name="title"
                                           value="{{$product->title}}"
                                           placeholder="عنوان را وارد کنید" class="form-control" id="title">
                                    @error('title')
                                    <div class="error">{{ $errors->first('title') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">قیمت *</label>
                                    <input type="number" min="0" name="price"
                                           value="{{$product->price}}"
                                           placeholder="قیمت را وارد کنید" class="form-control" id="price">
                                    @error('price')
                                    <div class="error">{{ $errors->first('price') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="discount_price">تخفیف *</label>
                                    <input type="number" min="0" name="discount_price"
                                           value="{{$product->discount_price}}"
                                           placeholder="توضیح قیمت را وارد کنید" class="form-control"
                                           id="discount_price">
                                    @error('discount_price')
                                    <div class="error">{{ $errors->first('discount_price') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inventory">موجودی *</label>
                                    <input type="number" min="0" name="inventory"
                                           value="{{$product->inventory}}"
                                           placeholder="موجودی را وارد کنید" class="form-control" id="inventory">
                                    @error('inventory')
                                    <div class="error">{{ $errors->first('inventory') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="short_desc">توضیح کوتاه *</label>
                                    <input type="text" name="short_desc"
                                           value="{{$product->short_desc}}"
                                           placeholder="توضیح کوتاه را وارد کنید" class="form-control" id="short_desc">
                                    @error('short_desc')
                                    <div class="error">{{ $errors->first('short_desc') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="long_desc">توضیح بلند *</label>
                                    <textarea name="long_desc"
                                              placeholder="توضیح بلند را وارد کنید"
                                              class="form-control"
                                              id="long_desc"
                                    >{{$product->long_desc}}</textarea>
                                    @error('long_desc')
                                    <div class="error">{{ $errors->first('long_desc') }}</div>
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
                           href="{{route('dashboard.products.delete', ['product' => $product->id])}}">
                            حذف این محصول
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


