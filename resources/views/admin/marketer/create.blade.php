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
                        <a href="{{ aurl('marketer') }}" style="color:#343a40" class="dropdown-item">
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

            {!! Form::open(['url'=>aurl('/marketer'),'id'=>'marketer','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
            <div class="row">

                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('first_name_ar',trans('admin.first_name_ar'),['class'=>' control-label']) !!}
                        {!! Form::text('first_name_ar',old('first_name_ar'),['class'=>'form-control','placeholder'=>trans('admin.first_name_ar')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('last_name_ar',trans('admin.last_name_ar'),['class'=>' control-label']) !!}
                        {!! Form::text('last_name_ar',old('last_name_ar'),['class'=>'form-control','placeholder'=>trans('admin.last_name_ar')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('first_name_en',trans('admin.first_name_en'),['class'=>' control-label']) !!}
                        {!! Form::text('first_name_en',old('first_name_en'),['class'=>'form-control','placeholder'=>trans('admin.first_name_en')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('first_name_en',trans('admin.first_name_en'),['class'=>' control-label']) !!}
                        {!! Form::text('first_name_en',old('first_name_en'),['class'=>'form-control','placeholder'=>trans('admin.first_name_en')]) !!}
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
                        {!! Form::label('address_ar',trans('admin.address_ar'),['class'=>' control-label']) !!}
                        {!! Form::text('address_ar',old('address_ar'),['class'=>'form-control','placeholder'=>trans('admin.address_ar')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('address_en',trans('admin.address_en'),['class'=>' control-label']) !!}
                        {!! Form::text('address_en',old('address_en'),['class'=>'form-control','placeholder'=>trans('admin.address_en')]) !!}
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
                        {!! Form::label('amount_due',trans('admin.amount_due'),['class'=>' control-label']) !!}
                        {!! Form::number('amount_due',old('amount_due'),['class'=>'form-control','placeholder'=>trans('admin.amount_due')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('amount_paid',trans('admin.amount_paid'),['class'=>' control-label']) !!}
                        {!! Form::number('amount_paid',old('amount_paid'),['class'=>'form-control','placeholder'=>trans('admin.amount_paid')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 photo_profile">
                    <div class="form-group">
                        <label for="'photo_profile'">{{ trans('admin.photo_profile') }}</label>
                        <div class="input-group">
                            <div class="custom-file">
                                {!! Form::file('photo_profile',['class'=>'custom-file-input','placeholder'=>trans('admin.photo_profile'),"accept"=>it()->acceptedMimeTypes("image"),"id"=>"photo_profile"]) !!}
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
