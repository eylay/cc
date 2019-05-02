<table class="table table-bordered table-hover table-responsive-lg">
    <thead>
        <tr>
            <th> # </th>
            @admin
                <th> مشتری </th>
            @endadmin
            <th> مجموع تخفیفات </th>
            <th> قابل پرداخت </th>
            <th> دریافتی </th>
            <th> اعتبار خرج شده </th>
            <th> اعتبار هدیه </th>
            <th> تاریخ و ساعت </th>
            <th colspan="2"> عملیات </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $i => $transaction)
            <tr>
                <th> {{$i+1}} </th>
                @admin
                    <td>
                        @if ($transaction->customer)
                            <a href="{{url("customers/$transaction->customer_id")}}" class="text-primary">
                                {{$transaction->customer->user->name ?? '?' }}
                            </a>
                        @else
                            <em> مشتری یافت نشد </em>
                        @endif
                    </td>
                @endadmin
                <td> {{number_format($transaction->discount_amount)}} </td>
                <td> {{number_format($transaction->payable_amount)}} </td>
                <td> {{number_format($transaction->received_amount)}} </td>
                <td> {{number_format($transaction->gift_spent)}} </td>
                <td> {{number_format($transaction->gift_amount)}} </td>
                <td> {{carbon_to_jdate($transaction->created_at)}} </td>
                <td align="center">
                    <a href="{{url("transactions/$transaction->id")}}" class="btn btn-outline-primary btn-sm">
                        <i class="fa fa-list ml-1"></i>
                        جزییات
                    </a>
                </td>
                @admin
                    <td align="center">
                        <form action="{{url("transactions/$transaction->id")}}" method="post" id="delete-transaction-{{$transaction->id}}">
                            @csrf
                            @method("DELETE")
                            <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="popover" data-placement="top" data-title="آیا مطمئن هستید؟" data-html="true" data-trigger="focus" tabindex="0"
                            data-content='
                                <div class="p-3">
                                    <button type="submit" form="delete-transaction-{{$transaction->id}}" class="btn btn-warning mx-1"> بلی </button>
                                    <button type="button" class="btn btn-info mx-1"> خیر </button>
                                </div>
                            '>
                                <i class="fa fa-reply ml-1"></i>
                                مرجوع کردن
                            </button>
                        </form>
                    </td>
                @endadmin
            </tr>
        @endforeach
    </tbody>
</table>
