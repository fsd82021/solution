
@if($name && $value)

<a href="{{route($name.'.show',$value->id)}}" class="btn btn-sm btn-clean
btn-icon mr-2" title="@lang('general.locales.show')">
    <i class="fa fa-eye"></i>
</a>

<a href="{{route($name.'.edit',$value->id)}}" class="btn btn-sm btn-clean
btn-icon mr-2 custimizeEditBtn" title="@lang('general.locales.edit')">
    <i class="fa fa-edit"></i>
</a>


<form id="delete-form-{{ $value->id }}" style="display: inline-table;" action="{{ route($name.'.destroy',$value->id) }}"
    method="post">
    @csrf
    @method('delete')
    <button type="button" class="btn btn-sm btn-clean btn-icon"
            title="@lang('general.locales.delete')" onclick="confirmDelete
    ('delete-form-{{ $value->id }}')">
        <i class="fa fa-trash"></i>
    </button>
</form>
@endif


