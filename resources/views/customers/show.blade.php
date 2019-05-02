@extends('layouts.dashboard')
@section('meta')
    <title> {{$customer->name()}} </title>
@endsection
@section('content')

    @include('customers.partials.customer_details')

    <div class="card card-body">
        <h3 class="mb-4"> آخرین تراکنش ها </h3>
        @include('transactions.partials.table', ['transactions' => $customer->transactions->take(10)])

        <div class="row mt-3">
            <div class="col-md-6 mx-auto text-center">
                @if (count($customer->transactions) > 10)
                    <a href="{{url("transactions")}}" class="btn btn-outline-primary"> <i class="fa fa-eye ml-1"></i> مشاهده همه تراکنش های این مشتری </a>
                @endif
            </div>
        </div>

    </div>

@endsection
