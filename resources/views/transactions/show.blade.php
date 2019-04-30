@extends('layouts.dashboard')
@section('meta')
    <title> جزییات تراکنش </title>
@endsection
@section('content')

    <div class="card card-body">
        <div class="row">
            <div class="col-md-6 my-2">
                نام مشتری :
                <a href="{{url("customers/$transaction->customer_id")}}"> {{$transaction->customer->user->name ?? '?'}} </a>
            </div>
            <div class="col-md-6 my-2 text-md-left">
                تاریخ و ساعت: {{carbon_to_jdate($transaction->created_at)}}
            </div>
        </div>

        <hr>

        <table class="table table-responsive-md table-bordered">
            <thead>
                <tr>
                    <th> ردیف </th>
                    <th> نام خدمات یا محصول </th>
                    <th> تعداد </th>
                    <th> قیمت اولیه </th>
                    <th> تخفیف نقدی </th>
                    <th> تخفیف باشگاه مشتریان </th>
                    <th> قابل پرداخت </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaction->items as $i => $item)
                    <tr>
                        <th>{{$i+1}}</th>
                        <td> {{$item->service ?? '-'}} </td>
                        <td> {{$item->count}} </td>
                        <td> {{number_format($item->first_amount)}} </td>
                        <td> {{number_format($item->cash_discount_with_count)}} </td>
                        <td> {{number_format($item->club_discount)}} </td>
                        <td> {{number_format($item->payable_amount)}} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="alert alert-info">
                    مجموع تخفیفات :
                    {{ number_format($transaction->discount_amount) }}
                </div>
            </div>
            <div class="col-md-4">
                <div class="alert alert-success">
                    دریافتی :
                    {{ number_format($transaction->received_amount) }}
                </div>
            </div>
            <div class="col-md-4">
                <div class="alert alert-warning">
                    اعتبار هدیه :
                    {{ number_format($transaction->gift_amount) }}
                </div>
            </div>
        </div>
    </div>


@endsection
