@extends('layouts.app')

@section('content')
  <div class="container">
    <h3>Add New Issue</h3>
      {!! Form::open(['action' => 'IssueController@store']) !!}
      <div class="form-group">
          {!! Form::label('id', 'Issue ID') !!}
          {!! Form::text('id', '',['class' => 'form-control']) !!}
      </div>
    <div class="form-group">
          {!! Form::label('district_id', 'District ID ') !!}
          <select class="form-control" name="district_id" id="district_id" data-parsley-required="true">
          @foreach ($districts as $district)
          {
            <option value="{{ $district->id }}">{{ $district->name }}</option>
          }
          @endforeach
        </select>
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
          {!! Form::label('description', 'Description') !!}
          {!! Form::textarea('description', '',['class' => 'form-control']) !!}
      </div>



      <div class="form-group">
          <button type="submit" class="btn btn-primary">
              Submit
          </button>
      </div>
      {!! Form::close() !!}
  </div>
@endsection
