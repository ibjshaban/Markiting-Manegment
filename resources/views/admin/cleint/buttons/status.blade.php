
@if( $status == 'active')
    <div class="alert-success">{{ trans('admin.active') }}</div>
@else
    <div class="alert-danger">{{ trans('admin.inactive') }}</div>
@endif
