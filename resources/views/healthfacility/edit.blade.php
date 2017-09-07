@extends('layouts.app')

@section('title','Edit HealthFacility')

@section('content')
	<div class="container">
  <div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Edit Healthfacility Information</div>
                {!! Form::model($healthfacility,['method' => 'PATCH','route' => ['healthfacilities.update',$healthfacility]])!!}
              <div class="row">
       <div class="col-md-6">
         <div class="form-group">
          {!! Form::label('incharge_name', 'Name of Incharge') !!}
          {!! Form::text('incharge_name', $healthfacility->incharge_name,['class' => 'form-control']) !!}
        </div>

      <div class="form-group">
          {!! Form::label('incharge_tel', 'Incharge Telephone') !!}
          {!! Form::text('incharge_tel', $healthfacility->incharge_tel,['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
          {!! Form::label('store_manager_name', 'Store Manager Name') !!}
          {!! Form::text('store_manager_name', $healthfacility->store_manager_name,['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
          {!! Form::label('store_manager_tel', 'Store Manager Telephone') !!}
          {!! Form::text('store_manager_tel', $healthfacility->store_manager_tel,['class' => 'form-control']) !!}
      </div>

        <div class="form-group">
            {!! Form::label('bio_stat_name', 'Bio Stat Name') !!}
            {!! Form::text('bio_stat_name', $healthfacility->bio_stat_name,['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('bio_stat_tel', 'Bio Stat Tel') !!}
            {!! Form::text('bio_stat_tel', $healthfacility->bio_stat_tel,['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('code', 'Healthfacility Code') !!}
            {!! Form::text('code', $healthfacility->code,['class' => 'form-control']) !!}
        </div>

      <div class="form-group">
          <button type="submit" class="btn btn-primary">
              Submit
          </button>
      </div>
      {!! Form::close() !!}
  </div>
@endsection