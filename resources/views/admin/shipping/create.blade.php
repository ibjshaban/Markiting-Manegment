@extends('admin.index')
@push('css')
    <style>.flag-text { margin-left: 10px; }</style>

@endpush
@section('content')


    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">
                <div class="">
			<span>
			{{ !empty($title)?$title:'' }}
			</span>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only"></span>
                    </a>
                    <div class="dropdown-menu" role="menu">
                        <a href="{{ aurl('shipping') }}" style="color:#343a40" class="dropdown-item">
                            <i class="fas fa-list"></i> {{ trans('admin.show_all') }}</a>
                    </div>
                </div>
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            {!! Form::open(['url'=>aurl('/shipping'),'id'=>'shipping','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
            <div class="row">

                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('country',trans('admin.country')) !!}
                        {{--                        {!! Form::select('country','country',old('country'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}--}}
                        <select name="country" class="form-control select2">
                            <option value="{{ old('country') }}"></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('vehicle_types',trans('admin.vehicle_types')) !!}
                        {!! Form::select('vehicle_types',['salon_car'=>trans('admin.salon_car'),'x4_car'=>trans('admin.x4_car'),'container_20'=>trans('admin.container_20'),'container_40'=>trans('admin.container_40'),],old('vehicle_types'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('cost',trans('admin.cost')) !!}
                        {!! Form::number('cost',old('cost'),['class'=>'form-control','placeholder'=>trans('admin.cost')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('shipping_type',trans('admin.shipping_type'),['class'=>' control-label']) !!}
                        {!! Form::text('shipping_type',old('shipping_type'),['class'=>'form-control','placeholder'=>trans('admin.shipping_type')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('count',trans('admin.count'),['class'=>' control-label']) !!}
                        {!! Form::number('count',old('count'),['class'=>'form-control','placeholder'=>trans('admin.count')]) !!}
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="add" class="btn btn-primary btn-flat"><i
                    class="fa fa-plus"></i> {{ trans('admin.add') }}</button>
            <button type="submit" name="add_back" class="btn btn-success btn-flat"><i
                    class="fa fa-plus"></i> {{ trans('admin.add_back') }}</button>
            {!! Form::close() !!}    </div>
    </div>
@endsection

