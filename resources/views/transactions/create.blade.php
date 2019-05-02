@extends('layouts.dashboard')
@section('meta')
    <title> تراکنش جدید </title>
@endsection
@section('content')

    @if ($step == 2)
        <div class="text-center mb-3">
            <button type="button" class="btn btn-outline-success" id="add-row">
                <i class="fa fa-plus ml-1"></i> مورد جدید
            </button>
        </div>
    @endif

    <div class="card card-body">
        <form action="{{url("transactions")}}" method="post" id="new-transaction"
            data-gift-percent="10" data-discount-percent="5" data-customer-credit="{{$customer->credit ?? 0}}">

            @csrf
            <input type="hidden" name="step" value="{{$step}}">
            <input type="hidden" name="cid" value="{{request('cid')}}">
            <input type="hidden" name="transaction_gift_amount" value="0" id="transaction-gift-amount">
            <input type="hidden" name="transaction_gift_spent" value="0" id="transaction-gift-spent">
            <input type="hidden" name="transaction_received_amount" value="0" id="transaction-received-amount">
            <input type="hidden" name="transaction_payable_amount" value="0" id="transaction-payable-amount">
            <input type="hidden" name="transaction_discount_amount" value="0" id="transaction-discount-amount">
            <input type="hidden" name="transaction_total_amount" value="0" id="transaction-total-amount">

            @if ($step == 1)
                <div class="row">
                    <div class="form-group col-md-3 mr-auto">
                        <label for="customer"> انتخاب مشتری </label>
                        <select class="selectpicker mt-2" name="customer_id" id="customer" data-live-search="true" title="جستجوی مشتری">
                            @foreach ($customers as $customer)
                                <option value="{{$customer->id}}" @if(old('customer_id') == $customer->id) selected @endif>
                                    {{$customer->name()}} - {{$customer->mobile()}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3 ml-auto">
                        <label for="customer"> کد مشتری </label>
                        <input type="text" name="customer_code" value="{{old('customer_code')}}" class="form-control mt-3">
                    </div>
                </div>
                <hr>
            @endif


            @if ($step == 2)

                @include('customers.partials.customer_details')

                <div id="transaction-rows">
                    <div class="row transaction-row">

                        <div class="col-md-8">

                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="service"> نام محصول یا خدمات </label>
                                    <input type="text" name="service[]" value="{{old('service')}}" id="service" class="form-control mt-2">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="amount"> قیمت اولیه (به تومان)</label>
                                    <input type="number" name="first_amount[]" value="{{old('amount')}}" id="amount" class="form-control first-amount mt-2" required>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="cash-discount"> تخفیف نقدی </label>
                                    <input type="number" name="cash_discount[]" value="{{old('cash_discount') ?? 0}}" id="cash-discount" class="form-control cash-discount mt-2">
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="count"> تعداد </label>
                                    <input type="number" name="count[]" value="{{old('count') ?? 1}}" id="count" class="form-control count mt-2">
                                </div>

                                <div class="form-group col-md-1 align-self-end">
                                    <a href="javascript:void" class="delete-row hidden" title="حذف این ردیف" data-toggle="tooltip">
                                        <i class="fa fa-trash text-danger fa-2x"></i>
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4 align-self-center">
                            <ul class="list-group p-0">
                                <li class="list-group-item list-group-item-info">
                                    تخفیف :
                                    <span class="final-club-discount" title="تخفیف باشگاه مشتریان" data-toggle="tooltip"> 0 </span>
                                    <i class="fa fa-plus text-primary"></i>
                                    <span class="final-cash-discount" title="تخفیف نقدی" data-toggle="tooltip"> 0 </span>
                                    تومان

                                </li>
                                <li class="list-group-item list-group-item-info">
                                    قابل پرداخت : <span class="final-payable"> 0 </span> تومان
                                </li>
                            </ul>
                        </div>

                        <hr class="w-100">

                        <div class="hidden-inputs" class="hidden">
                            {{-- will be updated via jquery --}}
                            <input type="hidden" class="club-discount" name="club_discount[]" value="0">
                            <input type="hidden" class="payable-amount" name="payable_amount[]" value="0">
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-md-2 mx-auto">
                    <button type="submit" class="btn btn-primary btn-block">
                        @if ($step == 1)
                            جستجوی مشتری
                        @else
                            ثبت تراکنش
                        @endif
                    </button>
                </div>
            </div>

            <div class="fixed-bottom p-1 bg-dark hidden total-calcs">
                <table class="table table-dark text-center">
                    <thead>
                        <tr>
                            <th class="text-light"> قیمت کل </th>
                            <th class="text-light"> مجموع تخفیفات </th>
                            <th class="text-light"> قابل پرداخت کل </th>
                            <th class="text-light"> دریافتی از مشتری </th>
                            <th class="text-light"> اعتبار خرج شده </th>
                            <th class="text-light"> اعتبار هدیه </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="total-amount"> 0 </td>
                            <td id="total-discount"> 0 </td>
                            <td id="total-payable"> 0 </td>
                            <td id="total-customer-payable"> 0 </td>
                            <td id="total-spent-gift"> 0 </td>
                            <td id="total-gift"> 0 </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </form>
    </div>
@endsection
