@extends('layouts.dashboard')
@section('meta')
    <title> تراکنش جدید </title>
@endsection
@section('content')
    <div class="card card-body">
        <form class="row justify-content-center" action="{{url("transactions")}}" method="post">
            @csrf

            <div class="form-group col-md-3">
                <label for="customer"> انتخاب مشتری </label>
                <select class="selectpicker mt-2" name="customer_id" id="customer" data-live-search="true" title="جستجوی مشتری">
                    @foreach ($customers as $customer)
                        <option value="{{$customer->id}}" @if(old('customer_id') == $customer->id) selected @endif>
                            {{$customer->name()}} - {{$customer->mobile()}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-3">
                <label for="service"> نام محصول یا خدمات </label>
                <input type="text" name="service" value="{{old('service')}}" id="service" class="form-control mt-2">
            </div>

            <div class="form-group col-md-3">
                <label for="amount"> قیمت اولیه محصول </label>
                <input type="number" name="amount" value="{{old('amount')}}" id="amount" class="form-control mt-2">
            </div>

            <hr class="w-100">
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-block"> ثبت تراکنش </button>
            </div>

        </form>
    </div>
@endsection
