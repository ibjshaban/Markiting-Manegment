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
                        <a href="{{url('marketer/cleint')}}" class="dropdown-item" style="color:#343a40">
                            <i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
                        <a href="{{url('marketer/cleint/'.$cleint->id)}}" class="dropdown-item" style="color:#343a40">
                            <i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
                        <a class="dropdown-item" style="color:#343a40" href="{{url('marketer/cleint/create')}}">
                            <i class="fa fa-plus"></i> {{trans('admin.create')}}
                        </a>
                        <div class="dropdown-divider"></div>
                        <a data-toggle="modal" data-target="#deleteRecord{{$cleint->id}}" class="dropdown-item"
                           style="color:#343a40" href="#">
                            <i class="fa fa-trash"></i> {{trans('admin.delete')}}
                        </a>
                    </div>
                </div>
            </h3>
            @push('js')
                <div class="modal fade" id="deleteRecord{{$cleint->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{trans('admin.delete')}}</h4>
                                <button class="close" data-dismiss="modal">x</button>
                            </div>
                            <div class="modal-body">
                                <i class="fa fa-exclamation-triangle"></i> {{trans('admin.ask_del')}} {{trans('admin.id')}}
                                ({{$cleint->id}})
                            </div>
                            <div class="modal-footer">
                                {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['cleint.destroy', $cleint->id]
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

            {!! Form::open(['url'=>url('marketer/cleint/'.$cleint->id),'method'=>'put','id'=>'cleint','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
            <div class="row">

                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('name_ar',trans('admin.name_ar'),['class'=>'control-label']) !!}
                        {!! Form::text('name_ar', $cleint->name_ar ,['class'=>'form-control','placeholder'=>trans('admin.name_ar')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('name_en',trans('admin.name_en'),['class'=>'control-label']) !!}
                        {!! Form::text('name_en', $cleint->name_en ,['class'=>'form-control','placeholder'=>trans('admin.name_en')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('email',trans('admin.email'),['class'=>'control-label']) !!}
                        {!! Form::email('email', $cleint->email ,['class'=>'form-control','placeholder'=>trans('admin.email')]) !!}
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
                        {!! Form::label('address',trans('admin.address'),['class'=>'control-label']) !!}
                        {!! Form::text('address', $cleint->address ,['class'=>'form-control','placeholder'=>trans('admin.address')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('mobile',trans('admin.mobile'),['class'=>'control-label']) !!}
                        {!! Form::text('mobile', $cleint->mobile ,['class'=>'form-control','placeholder'=>trans('admin.mobile')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('transport_type',trans('admin.transport_type'),['class'=>' control-label']) !!}
                        {!! Form::text('transport_type',$cleint->transport_type,['class'=>'form-control','placeholder'=>trans('admin.transport_type')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('to_country',trans('admin.to_country'),['class'=>' control-label']) !!}
                        <select class="form-control gds-cr select2" name="to_country" country-data-region-id="gds-cr-one" data-language="{{ app('l') }}">
                            <option>{{ $cleint->to_country }}</option>
                        </select>
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
                        {!! Form::textarea('note',$cleint->note,['class'=>'form-control','placeholder'=>trans('admin.note')]) !!}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 photo_profile">
                    <div class="row">
                        <div class="col-md-9">
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
                        <div class="col-md-2" style="padding-top: 30px;">
                            @include("admin.show_image",["image"=>$cleint->photo_profile])
                        </div>
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
