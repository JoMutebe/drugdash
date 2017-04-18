@extends('layouts.app')

@section('content')
  <div class="container">
    <h3>Add new district</h3>
      {!! Form::open(['action' => 'DistrictController@store']) !!}
      <div class="form-group">
          {!! Form::label('name', 'District Name') !!}
          {!! Form::text('name', '',['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('dho_name', 'Name of DHO') !!}
          {!! Form::text('dho_name', '',['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('region', 'Region') !!}
          {!! Form::text('region', '',['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('dho_office_tel', 'District Health Officer Telephone') !!}
          {!! Form::text('dho_office_tel', '',['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('dho_mobile_tel', 'District Health Officer Mobile') !!}
          {!! Form::text('dho_mobile_tel', '',['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('zone', 'Zone') !!}
          {!! Form::text('zone', '',['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('medicines_manager_name', 'Medicines Manager Name') !!}
          {!! Form::text('medicines_manager_name', '',['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('medicines_manager_tel', 'Medicines Manager Telephone') !!}
          {!! Form::text('medicines_manager_tel', '',['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('address', 'Address') !!}
          {!! Form::text('address', '',['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
          <button type="submit" class="btn btn-primary">
              Submit
          </button>
      </div>
      {!! Form::close() !!}
  </div>
@endsection
