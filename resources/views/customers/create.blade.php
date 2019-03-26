@extends('layouts.dashboard')
@section('meta')
    <title> ثبت مشتری جدید </title>
@endsection
@section('content')
    <div class="card card-body">
        <h2 class="text-primary"> اضافه کردن مشتری جدید </h2>
        <hr>
        <form class="row justify-content-center" action="{{url('customers')}}" method="post">
            @csrf

            <div class="col-md-4 form-group">
                <label for="name"> نام مشتری </label>
                <input type="text" name="name" value="{{old('name')}}" id="name" class="form-control">
            </div>
            <div class="col-md-4 form-group">
                <label for="mobile"> موبایل </label>
                <input type="text" name="mobile" value="{{old('mobile')}}" id="mobile" class="form-control">
            </div>
            <div class="col-md-4 form-group">
                <label for="birthday"> تاریخ تولد </label>
                <input type="text" name="birthday" value="{{old('birthday')}}" id="birthday" class="form-control pdp" autocomplete="off">
            </div>
            <div class="col-md-4 form-group text-center">

                <label class="d-block"> جنسیت </label>

                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="male" value="1" class="custom-control-input"
                        @if(old('male') === "1") checked @endif>
                    <span class="custom-control-label">
                        <span class="mr-4"> آقا </span>
                    </span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="male" value="0" class="custom-control-input"
                    @if(old('male') === "0") checked @endif
                    >
                    <span class="custom-control-label">
                        <span class="mr-4"> خانم </span>
                    </span>
                </label>

            </div>
            <div class="w-100"></div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-block"> اضافه کردن مشتری </button>
            </div>
        </form>
    </div>
@endsection
