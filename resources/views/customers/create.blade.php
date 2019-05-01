@extends('layouts.dashboard')
@section('meta')
    @if ($customer->id)
        <title> ویرایش مشتری - {{$customer->user->name}} </title>
    @else
        <title> ثبت مشتری جدید </title>
    @endif
@endsection
@section('content')
    <div class="card card-body">
        @if ($customer->id)
            <h2 class="text-primary"> ویرایش مشتری </h2>
        @else
            <h2 class="text-primary"> اضافه کردن مشتری جدید </h2>
        @endif
        <hr>
        <form class="row justify-content-center" action="{{url("customers/$customer->id")}}" method="post">
            @csrf
            @if ($customer->id)
                @method('PUT')
            @endif

            <div class="col-md-3 form-group">
                <label for="name"> نام مشتری </label>
                <input type="text" name="name" value="{{old('name') ?? $customer->user->name ?? null}}" id="name" class="form-control">
            </div>
            <div class="col-md-3 form-group">
                <label for="mobile"> موبایل </label>
                <input type="text" name="mobile" value="{{old('mobile') ?? $customer->user->mobile ?? null}}" id="mobile" class="form-control">
            </div>
            <div class="col-md-3 form-group">
                <label for="credit"> اعتبار اولیه </label>
                <input type="number" name="credit" value="{{old('credit') ?? $customer->credit ?? null}}" id="credit" class="form-control">
            </div>
            <div class="col-md-3 form-group">
                <label for="birthday"> تاریخ تولد </label>
                <input type="text" name="birthday" value="{{old('birthday') ?? $customer->birthday ? pdp($customer->birthday) : null}}" id="birthday" class="form-control pdp" autocomplete="off">
            </div>
            <div class="col-md-4 form-group text-center">

                <label class="d-block"> جنسیت </label>

                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="male" value="1" class="custom-control-input"
                        @if((old('male') !== null && old('male') === "1") || old('male') === null && $customer->male === 1) checked @endif>
                    <span class="custom-control-label">
                        <span class="mr-4"> آقا </span>
                    </span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="male" value="0" class="custom-control-input"
                    @if((old('male') !== null && old('male') === "0") || old('male') === null && $customer->male === 0) checked @endif
                    >
                    <span class="custom-control-label">
                        <span class="mr-4"> خانم </span>
                    </span>
                </label>

            </div>
            <div class="w-100"></div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-block">
                    @if ($customer->id)
                        ویرایش مشتری
                    @else
                        اضافه کردن مشتری
                    @endif
                </button>
            </div>
        </form>
    </div>
@endsection
