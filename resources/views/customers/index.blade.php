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
                        <td> {{$customer->code}} </td>
                        <td> {{$customer->gender()}} </td>
                        <td> {{print_date($customer->birthday)}} </td>
                        <td align="center">
                            <a href="{{url("customers/$customer->id/edit")}}" class="btn btn-outline-success"> ویرایش </a>
                        </td>
                        <td align="center">
                            <a href="#" class="btn btn-outline-danger"> حذف </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4 center-pagination">
            {{$customers->links()}}
        </div>
    </div>
@endsection
