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
                        <a href="{{ aurl('transaction') }}" style="color:#343a40" class="dropdown-item">
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

            {!! Form::open(['url'=>aurl('/transaction'),'id'=>'transaction','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
            <div class="row">

                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('transaction_number',trans('admin.transaction_number'),['class'=>' control-label']) !!}
                        {!! Form::number('transaction_number',old('transaction_number'),['class'=>'form-control','placeholder'=>trans('admin.transaction_number')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('amount',trans('admin.amount'),['class'=>' control-label']) !!}
                        {!! Form::number('amount',old('amount'),['class'=>'form-control','placeholder'=>trans('admin.amount')]) !!}
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('marketer_id',trans('admin.marketer_id')) !!}
                        {!! Form::select('marketer_id',App\Models\Marketer::pluck('name_ar','id'),old('marketer_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 photo">
                    <div class="form-group">
                        <label for="'photo'">{{ trans('admin.photo') }}</label>
                        <div class="input-group">
                            <div class="custom-file">
                                {!! Form::file('photo',['class'=>'custom-file-input','placeholder'=>trans('admin.photo'),"accept"=>it()->acceptedMimeTypes("pdf"),"id"=>"photo"]) !!}
                                {!! Form::label('photo',trans('admin.photo'),['class'=>'custom-file-label']) !!}
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
