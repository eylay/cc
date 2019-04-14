@extends('layouts.dashboard')
@section('meta')
    <title> تراکنش جدید </title>
@endsection
@section('content')

    <div class="text-center mb-3">
        <button type="button" class="btn btn-outline-success" id="add-row">
            <i class="fa fa-plus ml-1"></i> مورد جدید
        </button>
    </div>

    <div class="card card-body">
        <form action="{{url("transactions")}}" method="post" id="new-transaction"
            data-gift-percent="10" data-discount-percent="5">
            @csrf

            {{-- <div class="row">
                <div class="form-group col-md-3 mx-auto">
                    <label for="customer"> انتخاب مشتری </label>
                    <select class="selectpicker mt-2" name="customer_id" id="customer" data-live-search="true" title="جستجوی مشتری">
                        @foreach ($customers as $customer)
                            <option value="{{$customer->id}}" @if(old('customer_id') == $customer->id) selected @endif>
                                {{$customer->name()}} - {{$customer->mobile()}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div> --}}

            <div id="transaction-rows">
                <div class="row transaction-row">

                    <div class="col-md-5">

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="service"> نام محصول یا خدمات </label>
                                <input type="text" name="service[]" value="{{old('service')}}" id="service" class="form-control mt-2">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="amount"> قیمت اولیه (به تومان)</label>
                                <input type="number" name="first_amount[]" value="{{old('amount')}}" id="amount" class="form-control first-amount mt-2">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="cash-discount"> تخفیف نقدی </label>
                                <input type="number" name="cash_discount[]" value="{{old('cash_discount') ?? 0}}" id="cash-discount" class="form-control cash-discount mt-2">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="count"> تعداد </label>
                                <input type="number" name="count[]" value="{{old('count') ?? 1}}" id="count" class="form-control count mt-2">
                            </div>

                            <div class="form-group col-md-2 align-self-end">
                                <a href="javascript:void" class="delete-row hidden" title="حذف این ردیف" data-toggle="tooltip">
                                    <i class="fa fa-trash text-danger fa-2x"></i>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-7 align-self-center">
                        <div class="row">
                            <div class="col-md-6 p-1">
                                <ul class="list-group p-0">
                                    <li class="list-group-item list-group-item-info">
                                        تخفیف :
                                        <span class="final-club-discount" title="تخفیف باشگاه مشتریان" data-toggle="tooltip"> 0 </span>
                                        <i class="fa fa-plus text-primary"></i>
                                        <span class="final-cash-discount" title="تخفیف نقدی" data-toggle="tooltip"> 0 </span>
                                        تومان

                                    </li>
                                    <li class="list-group-item list-group-item-info">
                                        تعداد : <span class="final-count"> 1 </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 p-1">
                                <ul class="list-group p-0">
                                    <li class="list-group-item list-group-item-info">
                                        قابل پرداخت : <span class="final-payable"> 0 </span> تومان
                                    </li>
                                    <li class="list-group-item list-group-item-info">
                                        اعتبار هدیه : <span class="final-gift"> 0 </span> تومان
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <hr class="w-100">

                    <div class="hidden-inputs" class="hidden">
                        {{-- will be updated via jquery --}}
                        <input type="hidden" class="club-discount" name="club_discount[]" value="0">
                        <input type="hidden" class="payable-amount" name="payable_amount[]" value="0">
                        <input type="hidden" class="gift-amount" name="gift_amount[]" value="0">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 mx-auto">
                    <button type="submit" class="btn btn-primary btn-block"> ثبت تراکنش </button>
                </div>
            </div>

            <div class="fixed-bottom p-1 bg-dark hidden total-calcs">
                <table class="table table-dark text-center">
                    <thead>
                        <tr>
                            <th class="text-light"> قیمت کل </th>
                            <th class="text-light"> مجموع تخفیفات </th>
                            <th class="text-light"> قابل پرداخت کل </th>
                            <th class="text-light"> اعتبار هدیه کل </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="total-amount"> 0 </td>
                            <td id="total-discount"> 0 </td>
                            <td id="total-payable"> 0 </td>
                            <td id="total-gift"> 0 </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </form>
    </div>
@endsection
