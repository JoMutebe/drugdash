@extends('layouts.app')

@section('content')
  <div class="container">
    <h3>Add new county</h3>
      {!! Form::open(['action' => 'CountyController@store']) !!}
      <div class="form-group">
          {!! Form::label('name', 'County Name') !!}
          {!! Form::text('name', '',['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('district_id', 'District') !!}
          <select class="form-control" name="district_id" id="district_id" data-parsley-required="true">
          @foreach ($districts as $district)
          {
            <option value="{{ $district->id }}">{{ $district->name }}</option>
          }
          @endforeach
        </select>
      </div>


      <div class="form-group">
          <button type="submit" class="btn btn-primary">
              Submit
          </button>
      </div>
      {!! Form::close() !!}
  </div>
@endsection
