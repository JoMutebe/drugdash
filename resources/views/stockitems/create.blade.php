@extends('layouts.app')

@section('content')
  <div class="container">
    <h3>Add New Stock Item </h3>
      {!! Form::open(['action' => 'StockitemsController@store']) !!}
      <div class="row">
       <div class="col-md-6">
         <div class="form-group">
          {!! Form::label('common_name', 'Common Name') !!}
          {!! Form::text('common_name', '',['class' => 'form-control']) !!}
        </div>

      <div class="form-group">
          {!! Form::label('brand_name', 'Brand Name') !!}
          {!! Form::text('brand_name', '',['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
          {!! Form::label('code', 'Code') !!}
          {!! Form::text('code', '',['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
          {!! Form::label('category', 'Category') !!}
          {!! Form::text('category', '',['class' => 'form-control']) !!}
      </div>

        <div class="form-group">
            {!! Form::label('unit_of_measure', 'Unit of Measure') !!}
            {!! Form::text('unit_of_measure', '',['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('unit_price', 'Unit Price') !!}
            {!! Form::text('unit_price', '',['class' => 'form-control']) !!}
        </div>





      <div class="form-group">
          <button type="submit" class="btn btn-primary">
              Submit
          </button>
      </div>
      {!! Form::close() !!}
  </div>
@endsection
