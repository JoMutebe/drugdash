@extends('layouts.app')

@section('content')
<div class="container">
  <h3>{{$healthfacility->name}} {{$healthfacility->level}}</h3>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="dashboard-widget-content">
      <div class="col-md-8 hidden-small">
        <h2 class="line_30">General Health Facility Information</h2>

        <table class="countries_list">
          <tbody>
            <tr>
              <td>Name of Incharge</td>
              <td class="fs15 fw700 text-right">{{$healthfacility->incharge_name}}</td>
            </tr>
            <tr>
              <td>Incharge Telephone</td>
              <td class="fs15 fw700 text-right">{{$healthfacility->incharge_tel}}</td>
            </tr>
            <tr>
              <td>Store Manager Name</td>
              <td class="fs15 fw700 text-right">{{$healthfacility->store_manager_name}}</td>
            </tr>
            <tr>
              <td>Store Manager Telephone</td>
              <td class="fs15 fw700 text-right">{{$healthfacility->store_manager_tel}}</td>
            </tr>
            <tr>
              <td>Bio Statistician Name</td>
              <td class="fs15 fw700 text-right">{{$healthfacility->bio_stat_name}}</td>
            </tr>
            <tr>
              <td>Bio Statistician Telephone</td>
              <td class="fs15 fw700 text-right">{{$healthfacility->bio_stat_tel}}</td>
            </tr>
            <tr>
              <td>Health Center Code</td>
              <td class="fs15 fw700 text-right">{{$healthfacility->code}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-md-6">
  <div class="panel-body">
  <button class="btn btn-primary pull-right" id="issues" data-toggle="modal" data-target="#myModal" title="Add issue">
  <i class="glyphicon glyphicon-plus pull-right"></i>
</button>
  <table class="table table-bordered" id="issues">
      <thead>
        <tr>
          <th>Issue ID</th>
          <th>Descriptiom</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
     <div class="modal-dialog">

         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">Add Issue</h4>
             </div>
             <div class="modal-body">
              {!! Form::open(['action' => 'IssueController@store']) !!}
             <input type="hidden" name="_token" value="{{ csrf_token() }}">

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
             <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             </div>
         </div>

     </div>
</div>
@endsection
@push('scripts')
<script>
    jQuery(document).ready(function ($) {
      $('#issues').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{!! url('get_issues') !!}',
          columns: [
            { data: 'id', name: 'id' },
            { data: 'description', name: 'dho_name' },
          ]
        });
    });
</script>
@endpush
