@extends('layouts.dashboard')
@section('meta')
    <title> لیست تراکنش ها </title>
@endsection
@section('content')
    <div class="card card-body">

        @include('transactions.partials.table')

        <div class="mt-4 center-pagination">
            {{$transactions->links()}}
        </div>
    </div>
@endsection
