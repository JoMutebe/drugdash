@extends('layouts.app')

@section('title','Edit Stockitem')

@section('content')
  <div class="container">
  <div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Add Stock Item</div>
                {!! Form::model($stockitems,['method' => 'PATCH','route' => ['stockitems.update',$stockitems]])!!}
              <div class="row">
       <div class="col-md-6">
         <div class="form-group">
          {!! Form::label('common_name', 'Common Name') !!}
          {!! Form::text('common_name', $stockitems->common_name,['class' => 'form-control']) !!}
        </div>

      <div class="form-group">
          {!! Form::label('brand_name', 'Brand Name') !!}
          {!! Form::text('brand_name', $stockitems->brand_name,['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
          {!! Form::label('code', 'Code') !!}
          {!! Form::text('code', $stockitems->code,['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
          {!! Form::label('category', 'Category') !!}
          {!! Form::text('category', $stockitems->category,['class' => 'form-control']) !!}
      </div>

        <div class="form-group">
            {!! Form::label('unit_of_measure', 'Unit of Measure') !!}
            {!! Form::text('unit_of_measure', $stockitems->unit_of_measure,['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('unit_price', 'Unit Price') !!}
            {!! Form::text('unit_price', $stockitems->unit_price,['class' => 'form-control']) !!}
        </div>

      <div class="form-group">
          <button type="submit" class="btn btn-primary">
              Submit
          </button>
      </div>
      {!! Form::close() !!}
  </div>
@endsection