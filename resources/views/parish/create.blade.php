@extends('layouts.app')

@section('content')
  <div class="container">
    <h3>Add new Subcounty</h3>
      {!! Form::open(['action' => 'ParishController@store']) !!}
      <div class="form-group">
          {!! Form::label('name', 'Parish Name') !!}
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
          {!! Form::label('county_id', 'County') !!}
          <select class="form-control" name="county_id" id="county_id" data-parsley-required="true">
          @foreach ($counties as $county)
          {
            <option value="{{ $county->id }}">{{ $county->name }}</option>
          }
          @endforeach
        </select>
      </div>

      <div class="form-group">
          {!! Form::label('subcounty_id', 'Subcounty') !!}
          <select class="form-control" name="subcounty_id" id="county_id" data-parsley-required="true">
          @foreach ($subcounties as $sub)
          {
            <option value="{{ $sub->id }}">{{ $sub->name }}</option>
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
