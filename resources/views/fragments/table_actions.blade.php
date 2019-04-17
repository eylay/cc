<td align="center">
    <a href="{{url("{$keyword}s/{$$keyword->id}/edit")}}" class="btn btn-outline-success btn-sm">
        <i class="fa fa-edit ml-1"></i>
        ویرایش
    </a>
</td>
<td align="center">
    <form action="{{url("{$keyword}s/{$$keyword->id}")}}" method="post" id="delete-$keyword-{{$$keyword->id}}">
        @csrf
        @method("DELETE")
        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="popover" data-placement="top" data-title="آیا مطمئن هستید؟" data-html="true" data-trigger="focus" tabindex="0"
        data-content='
            <div class="p-3">
                <button type="submit" form="delete-{{$keyword}}-{{$$keyword->id}}" class="btn btn-warning mx-1"> بلی </button>
                <button type="button" class="btn btn-info mx-1"> خیر </button>
            </div>
        '>
            <i class="fa fa-trash ml-1"></i>
            حذف
        </button>
    </form>
</td>
