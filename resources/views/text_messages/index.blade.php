@extends('layouts.dashboard')
@section('meta')
    <title> لیست پیامک های ارسالی </title>
@endsection
@section('content')
    <div class="card card-body">
        <table class="table table-bordered table-hover table-responsive-lg">
            <thead>
                <tr>
                    <th> # </th>
                    <th> موبایل </th>
                    <th> متن پیام </th>
                    <th> عملیات </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $i => $message)
                    <tr>
                        <th> {{$i+1}} </th>
                        <td> {{$message->mobile}} </td>
                        <td> {{$message->body}} </td>
                        @include('fragments.table_actions', ['keyword' => 'message', 'no_edit' => true])
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4 center-pagination">
            {{$messages->links()}}
        </div>
    </div>
@endsection
