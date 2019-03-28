@extends('layouts.dashboard')
@section('meta')
    <title> تراکنش جدید </title>
@endsection
@section('content')
    <div class="card card-body">
        <form class="row justify-content-center" action="{{url("transactions")}}" method="post" id="new-transaction"
            data-gift-percent="10" data-discount-percent="5">
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
                <label for="amount"> قیمت اولیه (به تومان)</label>
                <input type="number" name="amount" value="{{old('amount')}}" id="amount" class="form-control first-amount mt-2">
            </div>

            <div class="col-md-3">
                <ul class="list-group p-0">
                    <li class="list-group-item list-group-item-info">
                        تخفیف : <span class="final-discount"> 0 </span> تومان
                    </li>
                    <li class="list-group-item list-group-item-info">
                        قابل پرداخت : <span class="final-payable"> 0 </span> تومان
                    </li>
                    <li class="list-group-item list-group-item-info">
                        اعتبار هدیه : <span class="final-gift"> 0 </span> تومان
                    </li>
                </ul>
            </div>

            <hr class="w-100">
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-block"> ثبت تراکنش </button>
            </div>

        </form>
    </div>
@endsection
