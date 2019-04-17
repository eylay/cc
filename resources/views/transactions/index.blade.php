@extends('layouts.dashboard')
@section('meta')
    <title> لیست تراکنش ها </title>
@endsection
@section('content')
    <div class="card card-body">
        <table class="table table-bordered table-hover table-responsive-lg">
            <thead>
                <tr>
                    <th> # </th>
                    <th> مشتری </th>
                    <th> تاریخ و ساعت </th>
                    <th colspan="3"> عملیات </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $i => $transaction)
                    <tr>
                        <th> {{$i+1}} </th>
                        <td>
                            @if ($transaction->customer)
                                <a href="{{url("customers/$transaction->customer_id")}}" class="text-primary">
                                    {{$transaction->customer->user->name ?? '?' }}
                                </a>
                            @else
                                <em> مشتری یافت نشد </em>
                            @endif
                        </td>
                        <td> {{carbon_to_jdate($transaction->created_at)}} </td>
                        <td align="center">
                            <a href="{{url("transactions/$transaction->id")}}" class="btn btn-outline-primary btn-sm">
                                <i class="fa fa-list ml-1"></i>
                                جزییات
                            </a>
                        </td>
                        @include('fragments.table_actions', ['keyword' => 'transaction'])
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4 center-pagination">
            {{$transactions->links()}}
        </div>
    </div>
@endsection
