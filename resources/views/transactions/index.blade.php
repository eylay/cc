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
                    <th> تاریخ </th>
                    <th colspan="2"> عملیات </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $i => $transaction)
                    <tr>
                        <th> {{$i+1}} </th>
                        <td> نام مشتری ... </td>
                        <td> {{$transaction->created_at}} </td>
                        <td align="center">
                            <a href="{{url("transactions/$transaction->id/edit")}}" class="btn btn-outline-success"> ویرایش </a>
                        </td>
                        <td align="center">
                            <form action="{{url("transactions/$transaction->id")}}" method="post" id="delete-transaction-{{$transaction->id}}">
                                @csrf
                                @method("DELETE")
                                <button type="button" class="btn btn-outline-danger" data-toggle="popover" data-placement="top" data-title="آیا مطمئن هستید؟" data-html="true" data-trigger="focus" tabindex="0"
                                data-content='
                                    <div class="p-3">
                                        <button type="submit" form="delete-transaction-{{$transaction->id}}" class="btn btn-success mx-1"> بلی </button>
                                        <button type="button" class="btn btn-danger mx-1"> خیر </button>
                                    </div>
                                '>
                                    حذف
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4 center-pagination">
            {{$transactions->links()}}
        </div>
    </div>
@endsection
