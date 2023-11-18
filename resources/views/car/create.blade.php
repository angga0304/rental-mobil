@extends('adminlte::page')

@section('title', 'Daftar mobil')
@section('content_header')
    <h1>{{ 'Daftar mobil' }}</h1>
@stop

@section('content')
@include('flash::message')
    {!! Form::open(array('url' => route('cars.stores'),'method'=>'POST','class'=>'form-horizontal','id'=>'form-question')) !!}
        <div class="row">
            {!! Form::token() !!}
            <div class="form-group">
                {!! Form::label('merk', 'Merk') !!}
                {!! Form::text('merk', old('merk'), array('class' => 'form-control')) !!}
                @if( $errors->has('merk') )
                    <span class="text-danger tooltip-field"><span>{{ $errors->first('merk') }}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                {!! Form::label('model', 'Model') !!}
                {!! Form::text('model', old('model'), array('class' => 'form-control')) !!}
                @if( $errors->has('model') )
                    <span class="text-danger tooltip-field"><span>{{ $errors->first('model') }}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                {!! Form::label('plat', 'Plat Nomor') !!}
                {!! Form::text('plat', old('plat'), array('class' => 'form-control')) !!}
                @if( $errors->has('plat') )
                    <span class="text-danger tooltip-field"><span>{{ $errors->first('plat') }}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                {!! Form::label('price', 'Sewa perhari') !!}
                {!! Form::number('price', old('price'), array('class' => 'form-control')) !!}
                @if( $errors->has('price') )
                    <span class="text-danger tooltip-field"><span>{{ $errors->first('price') }}</span>
                @endif
            </div>
        </div>
        {!! Form::submit('Submit') !!}
    {!! Form::close() !!}
 
@stop