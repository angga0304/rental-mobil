@extends('adminlte::page')

@section('title', 'List rent')
@section('content_header')
    <h1>{{ 'List rent' }}</h1>
@stop

@section('content')
    @include('flash::message')
    {!! Form::open(array('method'=>'GET','class'=>'form-horizontal','id'=>'form-filter')) !!}
    <div class="row">
        <div class="form-group col-md-4">
            {!! Form::label('nomor', 'Plat Nomor') !!}
            {!! Form::text('nomor', $nomor, array('class' => 'form-control', 'id' => 'merk-select')) !!}
        </div>
        <div class="form-group col-md-4">
            {!! Form::submit('Cari') !!}
        </div>
    </div>
    {!! Form::close() !!}
    @if($count > 0)
    <table class="table" id="instruction-table" data-tables="true">
        <thead class="thead-light">
            <tr>
                <th>{{ 'Plat' }}</th>
                <th>{{ 'Tanggal Pinjam' }}</th>
                <th>{{ 'tanggal kembali' }}</th>
                <th>{{ 'Action' }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($rents as $rent)
        <tr>
            <td>{{ $rent->car->plat }}</td>
            <td>{{ $rent->rent_date }}</td>
            <td>{{ $rent->return_date }}</td>
            <td>
                <form action="{{ route('rents.destroy',$rent->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('rents.delete',$rent->id) }}">Kembalikan</a>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @endif
 
@stop