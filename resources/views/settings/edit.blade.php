@extends('layouts.dashboard')
@section('meta')
    <title> تنظیمات </title>
@endsection
@section('content')
    <div class="card card-body">

        <form class="row justify-content-center" action="{{url("settings/update")}}" method="post">
            @csrf

            <div class="col-md-3 form-group">
                <label for="discount-percent"> تخفیف باشگاه مشتریان </label>
                <input type="number" name="discount_percent" value="{{old('discount_percent') ?? $setting->discount_percent}}" id="discount-percent" class="form-control" required>
            </div>
            <div class="col-md-3 form-group">
                <label for="gift-percent"> اعتبار هدیه باشگاه مشتریان </label>
                <input type="number" name="gift_percent" value="{{old('gift_percent') ?? $setting->gift_percent}}" id="gift-percent" class="form-control" required>
            </div>

            <hr class="w-100">
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-block"> ذخیره </button>
            </div>
        </form>
    </div>
@endsection
