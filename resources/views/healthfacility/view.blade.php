@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12"><h3>{{$healthfacility->name}} {{$healthfacility->level}}</h3></div>

  </div>
</div>
<div class="container">
  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-body">
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
  <div class="col-md-8">
    <div class="panel panel-info">
      <div class="panel-heading">
        Drug Stock Levels
        <button class="btn btn-default btn-sm pull-right" id="addResponse" data-toggle="modal" data-target="#supplyModal" title="New supply">
              <i class="glyphicon glyphicon-plus pull-right"></i>
          </button>


      </div>
      <div class="panel-body">
        <table class="table table-stripped" id="supply-table">
          <thead>
            <tr>
              <th>Drug/supply</th>
              <th>Type</th>
              <th>Value</th>
              <th>Last update</th>
              <th>Unit of measure</th>
              <th>Balance at hand</th>
              <th>Actions</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>

  </div>

</div>
<!-- Supply modal-->
<div id="supplyModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">Add New Supply </h4>
             </div>
             <div class="modal-body">
             {!! Form::open(['action' => 'StockitemchangesController@store']) !!}
             <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input type="hidden" name="healthfacility_id" id="healthfacility_id" value="{{ $healthfacility->id }}">

            <input type="hidden" name="district_id" id="district_id" value="{{ $healthfacility->district_id }}">
          <div class="form-group">
          {!! Form::label('item_id', 'Item ID') !!}
          {!! Form::text('item_id', '',['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
          {!! Form::label('type', 'Type') !!}
          <select class="form-control" id="category" name="category">
              <option value="education-and-skills-development">Increment</option>
              <option value="health-and-wellbeing">Decrement</option>
         </select>
        
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
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             </div>
         </div>
     </div>
</div>
<div class="container">
  <div class="col-md-6">
    <div class="panel panel-danger">
      <div class="panel-heading">
        Health center issues
        <button class="btn btn-default btn-sm pull-right" id="newIssue" data-toggle="modal" data-target="#issueModal" title="Report new issue">
            <i class="glyphicon glyphicon-plus pull-right"></i>
        </button>
      </div>
      <div class="panel-body">
        <table class="table table-stripped" id="issues-table">
          <thead>
            <tr>
              <th>Description</th>
              <th>Status</th>
              <th>Urgency</th>
              <th>Raised by</th>
              <th>Date raised</th>
              <th>Actions</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Issues modal-->
<div id="issueModal" class="modal fade" role="dialog">
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

                <input type="hidden" name="healthfacility_id" id="healthfacility_id" value="{{ $healthfacility->id }}">

                <input type="hidden" name="district_id" id="district_id" value="{{ $healthfacility->district_id }}">

                <input type="hidden" name="status" id="status" value="Open">

                <div class="form-group">
                  {!! Form::label('urgency','Urgency') !!}
                  <select class="form-control" id="category" name="category">
                    <option value="education-and-skills-development">Very High</option>
                    <option value="health-and-wellbeing">High</option>
                    <option value="economic-development">Normal </option>
                    <option value="others">Low </option>
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

<!-- Supplies modal-->
<div id="supplyModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">Add Supply/Usage information`</h4>
             </div>
             <div class="modal-body">

              {!! Form::open(['action' => 'IssueController@store']) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <input type="hidden" name="healthfacility_id" id="healthfacility_id" value="{{ $healthfacility->id }}">

                <input type="hidden" name="district_id" id="district_id" value="{{ $healthfacility->district_id }}">

                <input type="hidden" name="status" id="status" value="Open">

                <div class="form-group">
                  {!! Form::label('urgency','Urgency') !!}
                  <select class="form-control" id="category" name="category">
                    <option value="education-and-skills-development">Very High</option>
                    <option value="health-and-wellbeing">High</option>
                    <option value="economic-development">Normal </option>
                    <option value="others">Low </option>
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
