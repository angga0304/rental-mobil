@extends('adminlte::page')

@section('title', 'Daftar mobil')
@section('content_header')
    <h1>{{ 'Daftar mobil' }}</h1>
@stop

@section('content')
@include('flash::message')
    {!! Form::open(array('url' => route('cars.rentcarsubmit', $car->id),'method'=>'POST','class'=>'form-horizontal','id'=>'form-question')) !!}
        <div class="row">
            {!! Form::token() !!}
            <div class="form-group">
                {!! Form::label('rent_date', 'Tanggal peminjaman') !!}
                {!! Form::hidden('car_id', $car->id) !!}
                {!! Form::hidden('user_id', $user->id) !!}
                {!! Form::date('rent_date', old('rent_date'), array('class' => 'form-control')) !!}
                @if( $errors->has('rent_date') )
                    <span class="text-danger tooltip-field"><span>{{ $errors->first('rent_date') }}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                {!! Form::label('return_date', 'Tanggal pengembalian') !!}
                {!! Form::date('return_date', old('return_date'), array('class' => 'form-control')) !!}
                @if( $errors->has('return_date') )
                    <span class="text-danger tooltip-field"><span>{{ $errors->first('return_date') }}</span>
                @endif
            </div>
        </div>
        {!! Form::submit('Submit') !!}
    {!! Form::close() !!}
 
@stop