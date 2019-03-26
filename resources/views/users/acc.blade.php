@extends('layouts.dashboard')

@section('meta')
    <title> مدیریت حساب کاربری </title>
@endsection

@section('content')
    <div class="card card-body">

        <h2 class="text-primary mb-3"> مدیریت حساب کاربری </h2>
        <div class="alert alert-info">
            <b> نام فعلی شما : {{$user->name}} </b>
            <br>
            <b> موبایل فعلی شما : {{$user->mobile}} </b>
        </div>
        <hr>

        <form class="row" action="{{url('acc')}}" method="post">
            @csrf
            <div class="form-group col-md-4">
                <label for="name"> تغییر نام </label>
                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
            </div>
            <div class="form-group col-md-4">
                <label for="mobile"> تغییر موبایل </label>
                <input type="text" class="form-control" name="mobile" id="mobile" value="{{old('mobile')}}">
            </div>
            <div class="form-group col-md-4">
                <label for="new-password"> رمز عبور جدید </label>
                <input type="password" class="form-control" name="new_password" id="new-password">
            </div>
            <div class="w-100"></div>
            <div class="form-group col-md-4 mx-auto">
                <label for="current-password"> رمز عبور فعلی </label>
                <input type="password" class="form-control" name="current_password" id="current-password">
            </div>
            <div class="w-100"></div>
            <div class="col-md-2 mx-auto">
                <button type="submit" class="btn btn-primary btn-block"> تایید </button>
            </div>
        </form>
    </div>
@endsection
