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

                            <form action="{{route('dashboard.users.store')}}" method="post" data-parsley-validate
                                  novalidate>
                                @csrf()
                                <div class="form-group">
                                    <label for="name">نام*</label>
                                    <input type="text" name="name" parsley-trigger="change" required
                                           value="{{old('name')}}"
                                           placeholder="نام خود را وارد کنید" class="form-control" id="name">
                                    @error('name')
                                    <div class="error">{{ $errors->first('name') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="family">نام خانوادگی*</label>
                                    <input type="text" name="family" parsley-trigger="change" required
                                           value="{{old('family')}}"
                                           placeholder="نام خانوادگی خود را وارد کنید" class="form-control" id="family">
                                    @error('family')
                                    <div class="error">{{ $errors->first('family') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="username">نام کاربری*</label>
                                    <input type="text" name="username" parsley-trigger="change" required
                                           value="{{old('username')}}"
                                           placeholder="نام کاربری خود را وارد کنید" class="form-control" id="username">
                                    @error('username')
                                    <div class="error">{{ $errors->first('username') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mobile"> موبایل*</label>
                                    <input type="number" name="mobile" parsley-trigger="change" required
                                           value="{{old('mobile')}}"
                                           placeholder="شماره همراه خود را وارد کنید" class="form-control" id="mobile">
                                    @error('mobile')
                                    <div class="error">{{ $errors->first('mobile') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">آدرس ایمیل*</label>
                                    <input type="email" name="email" parsley-trigger="change" required
                                           value="{{old('email')}}"
                                           placeholder="ایمیل خود را وارد کنید" class="form-control" id="email">
                                    @error('email')
                                    <div class="error">{{ $errors->first('email') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">پسورد*</label>
                                    <input id="password" type="password" name="password" placeholder="پسورد" required
                                           class="form-control">
                                    @error('password')
                                    <div class="error">{{ $errors->first('password') }}</div>
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

