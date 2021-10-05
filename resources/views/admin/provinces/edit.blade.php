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
                            <h5 class="pb-1">ویرایش استان: "{{$province->name}} "</h5>

                            <form action="{{route('dashboard.provinces.update', ['province'=> $province->id])}}"
                                  method="post"
                                  data-parsley-validate novalidate>
                                @method('PUT')
                                @csrf()
                                <div class="form-group">
                                    <label for="name"> نام*</label>
                                    <input type="text" name="name" parsley-trigger="change" required
                                           value="{{$province->name}}"
                                           placeholder="نام را وارد کنید" class="form-control" id="name">
                                    @error('name')
                                    <div class="error">{{ $errors->first('name') }}</div>
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
                           href="{{route('dashboard.provinces.delete', ['province' => $province->id])}}">
                            حذف این استان
                        </a>
                    </div><!-- end col -->
                </div>
            </div>
        </div>

    </div>
@endsection

