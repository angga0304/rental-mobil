@extends('adminlte::page')

@section('title', 'Profile')

@section('content_header')
    <h1>Profile</h1>
@stop

@section('content')
    @include('flash::message')
    <div class="form-group">
        {!! Form::label('name', 'Name : ') !!}
        {{ $user->name }}
    </div>
    <div class="form-group">
        {!! Form::label('name', 'Alamat : ') !!}
        {{ $user->alamat }}
    </div>
    
    <div class="form-group">
        {!! Form::label('name', 'No Telpon : ') !!}
        {{ $user->telp }}
    </div>
    <div class="form-group">
        {!! Form::label('name', 'No SIM : ') !!}
        {{ $user->sim }}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop