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
          <table class="table table-bordered" id="users">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
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
    $('#users').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! url('get_users') !!}',
        columns: [
          { data: 'name', name: 'name' },
          { data: 'email', name: 'email' },
          { data: 'phone', name: 'phone' },
          {data: 'action', name: 'action', orderable: false, searchable: false}

        ]
      });
    });
  </script>

@endsection
