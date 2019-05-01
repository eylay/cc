@extends('layouts.dashboard')

@section('meta')
    <title> داشبرد ادمین </title>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card card-body text-center">
                <h3> اعتبار شما </h3>
                <span class="badge badge-info py-3"> {{number_format(current_customer()->credit ?? 0)}} </span>
            </div>
        </div>
    </div>
@endsection
