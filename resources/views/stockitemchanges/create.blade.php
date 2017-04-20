@extends('layouts.app')

@section('content')
  <div class="container">
    <h3>Add New Stock Item Change</h3>
      {!! Form::open(['action' => 'StockitemchangesController@store']) !!}
      <div class="form-group">
          {!! Form::label('item_id', 'Item ID') !!}
          {!! Form::text('item_id', '',['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('healthfacility_id', 'Healthfacility ID') !!}
          <select class="form-control" name="healthfacility_id" id="healthfacility_id" data-parsley-required="true">
          @foreach ($healthfacilities as $healthfacility)
          {
            <option value="{{ $healthfacility->id }}">{{ $healthfacility->name }}</option>
          }
          @endforeach
        </select>
      </div>
      <div class="form-group">
          {!! Form::label('type', 'Type') !!}
          {!! Form::text('type', '',['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
          {!! Form::label('occured_at', 'Occured at') !!}
          {!! Form::text('occured_at', '',['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
          {!! Form::label('value', 'Value') !!}
          {!! Form::text('value', '',['class' => 'form-control']) !!}
      </div>


      <div class="form-group">
          <button type="submit" class="btn btn-primary">
              Submit
          </button>
      </div>
      {!! Form::close() !!}
  </div>
@endsection
