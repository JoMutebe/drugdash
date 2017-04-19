@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
          <strong>Villages</strong>
          <a class="btn btn-sm btn-primary pull-right"   title="Add Village" href="{{action('VillageController@create')}}">
              <i class="fa fa-plus"></i>
          </a>
        </div>

        <div class="panel-body">
          <table class="table table-bordered" id="villages">
            <thead>
              <tr>
                <th>Name</th>
                <th>District</th>
                <th>County</th>
                <th>Subcounty</th>
                <th>Parish</th>
              </tr>
            </thead>
          </table>
			  </div>

    </div>
  </div>

  <script>
  $(document).ready(function() {
    $.noConflict();
    $('#villages').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! url('get_villages') !!}',
        columns: [
          { data: 'name', name: 'name' },
          { data: 'district_id', name: 'district_id' },
          { data: 'county_id', name: 'county_id' },
          { data: 'subcounty_id', name: 'subcounty_id' },
          { data: 'parish_id', name: 'parish_id' },
        ]
      });
    });
  </script>

@endsection
