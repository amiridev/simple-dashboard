@extends('admin.layout.master')
@section('styles')
@endsection

@section('scripts')
@endsection

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">


                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-box">
                            <h5 class="pb-1">ویرایش شهر: "{{$city->name}} "</h5>

                            <form action="{{route('dashboard.cities.update', ['city'=> $city->id])}}" method="post"
                                  data-parsley-validate novalidate>
                                @method('PUT')
                                @csrf()
                                <div class="form-group">
                                    <label for="name"> نام*</label>
                                    <input type="text" name="name" parsley-trigger="change" required
                                           value="{{$city->name}}"
                                           placeholder="عنوان را وارد کنید" class="form-control" id="title">
                                    @error('name')
                                    <div class="error">{{ $errors->first('name') }}</div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label for="province_id">استان </label>
                                    <select class="form-control select2" name="province_id" id="province_id">
                                        @foreach($provinces as $province)
                                            @if($city->province_id == $province->id)
                                                <option value="{{$province->id}}" selected>{{$province->name}}</option>
                                            @else
                                                <option value="{{$province->id}}">{{$province->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('province_id')
                                    <div class="error">{{ $errors->first('province_id') }}</div>
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
                           href="{{route('dashboard.cities.delete', ['city' => $city->id])}}">
                            حذف این شهر
                        </a>
                    </div><!-- end col -->
                </div>
            </div>
        </div>

    </div>
@endsection


