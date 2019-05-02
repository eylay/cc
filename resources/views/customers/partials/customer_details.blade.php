<div class="card card-body">
    <div class="row text-center">
        <div class="col-md-4 my-2">
            نام مشتری : <span class="badge badge-success p-2 mr-2"> {{$customer->name()}} </span>
        </div>
        <div class="col-md-4 my-2">
            شماره تماس مشتری : <span class="badge badge-info p-2 mr-2"> {{$customer->mobile()}} </span>
        </div>
        <div class="col-md-4 my-2">
            اعتبار مشتری : <span class="badge badge-warning p-2 mr-2"> {{ number_format($customer->credit) }} </span>
        </div>
    </div>
</div>
