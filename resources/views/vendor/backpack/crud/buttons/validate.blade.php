@if ($crud->hasAccess('update'))
    @if ($entry->status != 'confirmed')
        <a href="{{ url($crud->route.'/'.$entry->getKey().'/validate') }} " class="btn btn-sm btn-link"><i class="la la-check-circle"></i> Validate</a>
    @else
        <a href="{{ url($crud->route.'/'.$entry->getKey().'/validate') }} " class="btn btn-sm btn-link"><i class="la la-times-circle"></i> Cancel</a>
    @endif
@endif