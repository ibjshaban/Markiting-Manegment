@extends('admin.index')
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
                        <a href="{{ url('marketer/cleint') }}" style="color:#343a40" class="dropdown-item">
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

            {!! Form::open(['url'=>url('marketer/cleint'),'id'=>'cleint','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
            <div class="row">

                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('name_ar',trans('admin.name_ar'),['class'=>' control-label']) !!}
                        {!! Form::text('name_ar',old('name_ar'),['class'=>'form-control','placeholder'=>trans('admin.name_ar')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('name_en',trans('admin.name_en'),['class'=>' control-label']) !!}
                        {!! Form::text('name_en',old('name_en'),['class'=>'form-control','placeholder'=>trans('admin.name_en')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('email',trans('admin.email'),['class'=>'control-label']) !!}
                        {!! Form::email('email',old('email'),['class'=>'form-control','placeholder'=>trans('admin.email')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('password',trans('admin.password')) !!}
                        {!! Form::password('password',['class'=>'form-control','placeholder'=>trans('admin.password')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('address',trans('admin.address'),['class'=>' control-label']) !!}
                        {!! Form::text('address',old('address'),['class'=>'form-control','placeholder'=>trans('admin.address')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('mobile',trans('admin.mobile'),['class'=>' control-label']) !!}
                        {!! Form::number('mobile',old('mobile'),['class'=>'form-control','placeholder'=>trans('admin.mobile')]) !!}
                    </div>
                </div>
                  <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('transport_type',trans('admin.transport_type'),['class'=>' control-label']) !!}
                        {!! Form::text('transport_type',old('transport_type'),['class'=>'form-control','placeholder'=>trans('admin.transport_type')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('to_country',trans('admin.to_country'),['class'=>' control-label']) !!}
                        <select class="form-control gds-cr select2" name="to_country" country-data-region-id="gds-cr-one" data-language="{{ app('l') }}"></select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('to_city',trans('admin.to_city'),['class'=>' control-label']) !!}
                        <select class="form-control select2" name="to_city" id="gds-cr-one"></select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('note',trans('admin.note'),['class'=>' control-label']) !!}
                        {!! Form::textarea('note',old('note'),['class'=>'form-control','placeholder'=>trans('admin.note')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 photo_profile">
                    <div class="form-group">
                        <label for="'photo_profile'">{{ trans('admin.photo_profile') }}</label>
                        <div class="input-group">
                            <div class="custom-file">
                                {!! Form::file('photo_profile',['class'=>'custom-file-input','placeholder'=>trans('admin.photo_profile'),"accept"=>it()->acceptedMimeTypes("pdf"),"id"=>"photo_profile"]) !!}
                                {!! Form::label('photo_profile',trans('admin.photo_profile'),['class'=>'custom-file-label']) !!}
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">{{ trans('admin.upload') }}</span>
                            </div>
                        </div>
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
