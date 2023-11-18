@extends('adminlte::page')

@section('title', 'Update mobil')
@section('content_header')
    <h1>{{ 'Update mobil' }}</h1>
@stop

@section('content')
@include('flash::message')
    {!! Form::open(array('url' => route('cars.updates', $car['id']),'method'=>'POST','class'=>'form-horizontal','id'=>'form-question')) !!}
        <div class="row">
            {!! Form::token() !!}
            <div class="form-group">
                {!! Form::label('merk', 'Merk') !!}
                {!! Form::text('merk', $car['merk'], array('class' => 'form-control')) !!}
                @if( $errors->has('merk') )
                    <span class="text-danger tooltip-field"><span>{{ $errors->first('merk') }}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                {!! Form::label('model', 'Model') !!}
                {!! Form::text('model', $car['model'], array('class' => 'form-control')) !!}
                @if( $errors->has('model') )
                    <span class="text-danger tooltip-field"><span>{{ $errors->first('model') }}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                {!! Form::label('plat', 'Plat Nomor') !!}
                {!! Form::text('plat', $car['plat'], array('class' => 'form-control')) !!}
                @if( $errors->has('plat') )
                    <span class="text-danger tooltip-field"><span>{{ $errors->first('plat') }}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                {!! Form::label('price', 'Sewa perhari') !!}
                {!! Form::number('price', $car['price'], array('class' => 'form-control')) !!}
                @if( $errors->has('price') )
                    <span class="text-danger tooltip-field"><span>{{ $errors->first('price') }}</span>
                @endif
            </div>
        </div>
        {!! Form::submit('Submit') !!}
    {!! Form::close() !!}
 
@stop