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

                            <form action="{{route('dashboard.provinces.store')}}" method="post">
                                @csrf()
                                <div class="form-group">
                                    <label for="name">نام*</label>
                                    <input type="text" name="name"
                                           value="{{old('name')}}"
                                           placeholder="نام را وارد کنید" class="form-control" id="name">
                                    @error('name')
                                    <div class="error">{{ $errors->first('name') }}</div>
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


