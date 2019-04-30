@extends('layouts.dashboard')
@section('meta')
    <title> لیست مشتریان </title>
@endsection
@section('content')
    <div class="card card-body">
        <table class="table table-bordered table-hover table-responsive-lg">
            <thead>
                <tr>
                    <th> # </th>
                    <th> نام </th>
                    <th> موبایل </th>
                    <th> اعتبار </th>
                    <th> کد مشتری </th>
                    <th> جنسیت </th>
                    <th> تاریخ تولد </th>
                    <th colspan="2"> عملیات </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $i => $customer)
                    <tr>
                        <th> {{$i+1}} </th>
                        <td> {{$customer->user->name}} </td>
                        <td> {{$customer->user->mobile}} </td>
                        <td> {{number_format($customer->credit)}} </td>
                        <td> {{$customer->code}} </td>
                        <td> {{$customer->gender()}} </td>
                        <td> {{print_date($customer->birthday)}} </td>
                        @include('fragments.table_actions', ['keyword' => 'customer'])
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4 center-pagination">
            {{$customers->links()}}
        </div>
    </div>
@endsection
