@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
          Districts
          <a class="btn btn-sm btn-primary pull-right"   title="Add district" href="{{action('DistrictController@create')}}">
              <i class="fa fa-plus"></i>
          </a>


        </div>

        <div class="panel-body">
          <table class="table table-bordered" id="districts">
            <thead>
              <tr>
                <th>Name</th>
                <th>Region</th>
                <th>DHO Name</th>
                <th>DHO Tel</th>
                <th>Actions</th>
              </tr>
            </thead>
          </table>
			  </div>

    </div>
  </div>

  <script>
  $(document).ready(function() {
    $.noConflict(true);
    $('#districts').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! url('get_districts') !!}',
        columns: [
          { data: 'name', name: 'name' },
          { data: 'region', name: 'region' },
          { data: 'dho_name', name: 'dho_name' },
          { data: 'dho_office_tel', name: 'dho_office_tel'},
          {data: 'action', name: 'action', orderable: false, searchable: false}

        ]
      });
    });
  </script>

@endsection
