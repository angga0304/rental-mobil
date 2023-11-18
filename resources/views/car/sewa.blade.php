@extends('adminlte::page')

@section('title', 'Rent Car')
@section('content_header')
    <h1>{{ 'Rent Car' }}</h1>
@stop

@section('content')
    @include('flash::message')
    {!! Form::open(array('method'=>'GET','class'=>'form-horizontal','id'=>'form-filter')) !!}
    <div class="row">
        <div class="form-group col-md-4">
            {!! Form::label('merk', 'Merk') !!}
            {!! Form::select('merk', $merk, $selectedMerk, array('class' => 'form-control', 'id' => 'merk-select')) !!}
        </div>
        <div class="form-group col-md-4">
            {!! Form::label('model', 'Model') !!}
            {!! Form::select('model', $model, $selectedModel, array('class' => 'form-control', 'id' => 'model-select')) !!}
        </div>
        <div class="form-group col-md-4">
            {!! Form::submit('Filter') !!}
        </div>
    </div>
    {!! Form::close() !!}
    <table class="table" id="instruction-table" data-tables="true">
        <thead class="thead-light">
            <tr>
                <th>{{ 'Merk' }}</th>
                <th>{{ 'Model' }}</th>
                <th>{{ 'Plat nomor' }}</th>
                <th>{{ 'Price' }}</th>
                <th>{{ 'Available' }}</th>
                <th>{{ 'Action' }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($cars as $car)
        <tr>
            <td>{{ $car->merk }}</td>
            <td>{{ $car->model }}</td>
            <td>{{ $car->plat }}</td>
            <td>{{ $car->price }}</td>
            <td>
                @if ($car->available)
                Yes
                @else
                No
                @endif
            </td>
            <td>
                <form action="{{ route('cars.destroy',$car->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('cars.rentcar',$car->id) }}">Rent</a>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
 
@stop

@section('js')
  $("#model-select").on('change', function() {
    $("form-filter").submit();
  });
  $("#merk-select").on('change', function() {
    $("form-filter").submit();
  });
@stop