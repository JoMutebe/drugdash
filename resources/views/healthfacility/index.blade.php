@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
          <strong>Health Centers</strong>
          <a class="btn btn-sm btn-primary pull-right"   title="Add HealthCenter" href="{{action('HealthfacilityController@create')}}">
              <i class="fa fa-plus"></i>
          </a>
        </div>

        <div class="panel-body">
          <table class="table table-bordered" id="healthfacilities">
            <thead>
              <tr>
                <th>Name</th>
                <th>District</th>
                <th>Parish</th>
                <th>Village</th>
                <th>Type</th>
                <th>General Tel</th>
                <th>Actions</th>
              </tr>
            </thead>
          </table>
			  </div>

    </div>
  </div>
@endsection

@push('scripts')
<script>
    jQuery(document).ready(function ($) {
      $('#healthfacilities').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{!! url('get_healthfacilities') !!}',
          columns: [
            { data: 'name', name: 'name' },
            { data: 'district_id', name: 'district_id' },
            { data: 'parish_id', name: 'parish_id' },
            { data: 'village_id', name: 'village_id' },
            { data: 'level', name: 'level' },
            { data: 'general_tel', name:'general_tel'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
          ]
        });
    });
</script>
@endpush
