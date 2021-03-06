@extends('admin.index')
@section('content')


    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">
                <div class="">
                    <span>{{!empty($title)?$title:''}}</span>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only"></span>
                    </a>
                    <div class="dropdown-menu" role="menu">
                        <a href="{{aurl('marketer')}}" class="dropdown-item" style="color:#343a40">
                            <i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
                        <a href="{{aurl('marketer/'.$marketer->id)}}" class="dropdown-item" style="color:#343a40">
                            <i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
                        <a class="dropdown-item" style="color:#343a40" href="{{aurl('marketer/create')}}">
                            <i class="fa fa-plus"></i> {{trans('admin.create')}}
                        </a>
                        <div class="dropdown-divider"></div>
                        <a data-toggle="modal" data-target="#deleteRecord{{$marketer->id}}" class="dropdown-item"
                           style="color:#343a40" href="#">
                            <i class="fa fa-trash"></i> {{trans('admin.delete')}}
                        </a>
                    </div>
                </div>
            </h3>
            @push('js')
                <div class="modal fade" id="deleteRecord{{$marketer->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{trans('admin.delete')}}</h4>
                                <button class="close" data-dismiss="modal">x</button>
                            </div>
                            <div class="modal-body">
                                <i class="fa fa-exclamation-triangle"></i> {{trans('admin.ask_del')}} {{trans('admin.id')}}
                                ({{$marketer->id}})
                            </div>
                            <div class="modal-footer">
                                {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['marketer.destroy', $marketer->id]
                                ]) !!}
                                {!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger btn-flat']) !!}
                                <a class="btn btn-default btn-flat" data-dismiss="modal">{{trans('admin.cancel')}}</a>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endpush
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            {!! Form::open(['url'=>aurl('/marketer/'.$marketer->id),'method'=>'put','id'=>'marketer','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
            <div class="row">

                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('first_name_ar',trans('admin.first_name_ar'),['class'=>'control-label']) !!}
                        {!! Form::text('first_name_ar', $marketer->first_name_ar ,['class'=>'form-control','placeholder'=>trans('admin.first_name_ar')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('last_name_ar',trans('admin.last_name_ar'),['class'=>'control-label']) !!}
                        {!! Form::text('last_name_ar', $marketer->last_name_ar ,['class'=>'form-control','placeholder'=>trans('admin.last_name_ar')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('first_name_en',trans('admin.first_name_en'),['class'=>'control-label']) !!}
                        {!! Form::text('first_name_en', $marketer->first_name_en ,['class'=>'form-control','placeholder'=>trans('admin.first_name_en')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('last_name_en',trans('admin.last_name_en'),['class'=>'control-label']) !!}
                        {!! Form::text('last_name_en', $marketer->last_name_en ,['class'=>'form-control','placeholder'=>trans('admin.last_name_en')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('email',trans('admin.email'),['class'=>'control-label']) !!}
                        {!! Form::email('email', $marketer->email ,['class'=>'form-control','placeholder'=>trans('admin.email')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('password',trans('admin.password'),['class'=>'control-label']) !!}
                        {!! Form::password('password',['class'=>'form-control','placeholder'=>trans('admin.password')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('address_ar',trans('admin.address_ar'),['class'=>'control-label']) !!}
                        {!! Form::text('address_ar', $marketer->address_ar ,['class'=>'form-control','placeholder'=>trans('admin.address_ar')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('mobile',trans('admin.mobile'),['class'=>'control-label']) !!}
                        {!! Form::text('mobile', $marketer->mobile ,['class'=>'form-control','placeholder'=>trans('admin.mobile')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('address_en',trans('admin.address_en'),['class'=>'control-label']) !!}
                        {!! Form::text('address_en', $marketer->address_en ,['class'=>'form-control','placeholder'=>trans('admin.address_en')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 photo_profile">
                    <div class="row">
                        <div class="col-md-9">
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
                        <div class="col-md-2" style="padding-top: 30px;">
                            @include("admin.show_image",["image"=>$marketer->photo_profile])
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('amount_due',trans('admin.amount_due'),['class'=>' control-label']) !!}
                        {!! Form::number('amount_due',$marketer->amount_due,['class'=>'form-control','placeholder'=>trans('admin.amount_due')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('amount_paid',trans('admin.amount_paid'),['class'=>' control-label']) !!}
                        {!! Form::number('amount_paid',$marketer->amount_paid,['class'=>'form-control','placeholder'=>trans('admin.amount_paid')]) !!}
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="save" class="btn btn-primary btn-flat"><i
                    class="fa fa-save"></i> {{ trans('admin.save') }}</button>
            <button type="submit" name="save_back" class="btn btn-success btn-flat"><i
                    class="fa fa-save"></i> {{ trans('admin.save_back') }}</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
