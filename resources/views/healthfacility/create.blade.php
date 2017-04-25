@extends('layouts.app')

@section('content')
  <div class="container">
    <h3>Add new Healthcenter</h3>
      {!! Form::open(['action' => 'HealthfacilityController@store']) !!}
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
              {!! Form::label('name', 'Name') !!}
              {!! Form::text('name', '',['class' => 'form-control']) !!}
          </div>

          <div class="form-group">
              {!! Form::label('level','Hospital Level') !!}
              <select class="form-control" id="level" name="level">
                  <option value="Health Center II">Health Center II</option>
                  <option value="Health Center III">Health Center III</option>
                  <option value="Health Center IV">Health Center IV</option>
                  <option value="Distrit Referal Hospital">District Referal Hospital</option>

              </select>
          </div>

          <div class="form-group">
              {!! Form::label('address', 'Address') !!}
              {!! Form::text('address', '',['class' => 'form-control']) !!}
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
              <select class="form-control" name="subcounty_id" id="subcounty_id" data-parsley-required="true">
              @foreach ($subcounties as $sub)
              {
                <option value="{{ $sub->id }}">{{ $sub->name }}</option>
              }
              @endforeach
            </select>
          </div>

          <div class="form-group">
              {!! Form::label('parish_id', 'Parish') !!}
              <select class="form-control" name="parish_id" id="parish_id" data-parsley-required="true">
              @foreach ($parishes as $par)
              {
                <option value="{{ $par->id }}">{{ $par->name }}</option>
              }
              @endforeach
            </select>
          </div>
          <div class="form-group">
              {!! Form::label('village_id', 'Village') !!}
              <select class="form-control" name="village_id" id="village_id" data-parsley-required="true">
              @foreach ($villages as $par)
              {
                <option value="{{ $par->id }}">{{ $par->name }}</option>
              }
              @endforeach
            </select>
          </div>
          <div class="form-group">
              {!! Form::label('general_tel', 'General Telephone') !!}
              {!! Form::text('general_tel', '',['class' => 'form-control']) !!}
          </div>

          <div class="form-group">
              {!! Form::label('code', 'Healthfacility Code') !!}
              {!! Form::text('code', '',['class' => 'form-control']) !!}
          </div>



        </div>

        <div class="col-md-6">


          <div class="form-group">
              {!! Form::label('general_email', 'General Email') !!}
              {!! Form::text('general_email', '',['class' => 'form-control']) !!}
          </div>

          <div class="form-group">
              {!! Form::label('incharge_name', 'Name of Incharge') !!}
              {!! Form::text('incharge_name', '',['class' => 'form-control']) !!}
          </div>

          <div class="form-group">
              {!! Form::label('incharge_tel', 'Incharge Telephone') !!}
              {!! Form::text('incharge_tel', '',['class' => 'form-control']) !!}
          </div>

          <div class="form-group">
              {!! Form::label('store_manager_name', 'Store Manager Name') !!}
              {!! Form::text('store_manager_name', '',['class' => 'form-control']) !!}
          </div>

          <div class="form-group">
              {!! Form::label('store_manager_tel', 'Store Manager Tel') !!}
              {!! Form::text('store_manager_tel', '',['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
              {!! Form::label('number_of_staff', 'Number of Staff') !!}
              {!! Form::text('number_of_staff', '',['class' => 'form-control']) !!}
          </div>

          <div class="form-group">
              {!! Form::label('bio_stat_name', 'Bio Stat Name') !!}
              {!! Form::text('bio_stat_name', '',['class' => 'form-control']) !!}
          </div>

          <div class="form-group">
              {!! Form::label('bio_stat_tel', 'Bio Stat Tel') !!}
              {!! Form::text('bio_stat_tel', '',['class' => 'form-control']) !!}
          </div>

          <div class="form-group">
              {!! Form::label('x_cord', 'X Cordinates') !!}
              {!! Form::text('x_cord', '',['class' => 'form-control']) !!}
          </div>

          <div class="form-group">
              {!! Form::label('y_cord', 'Y Cordinates') !!}
              {!! Form::text('y_cord', '',['class' => 'form-control']) !!}
          </div>
        </div>
      </div>


      <div class="form-group">
          <button type="submit" class="btn btn-primary">
              Submit
          </button>
      </div>
      {!! Form::close() !!}
  </div>
@endsection
