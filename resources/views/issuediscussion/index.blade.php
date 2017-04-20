@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
          <strong>Issue Discussions</strong>
          <a class="btn btn-sm btn-primary pull-right"   title="Add Issue Discussion" href="{{action('IssuediscussionController@create')}}">
              <i class="fa fa-plus"></i>
          </a>
        </div>

        <div class="panel-body">
          <table class="table table-bordered" id="issuediscussions">
            <thead>
              <tr>
                <th>Issue Discussion ID</th>
                <th>Issue ID</th>
                <th>Description</th>
                <th>Actions</th>
              </tr>
            </thead>
          </table>
			  </div>

    </div>
  </div>

  <script>
  $(document).ready(function() {
    $.noConflict();
    $('#issuediscussions').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! url('get_issuediscussions') !!}',
        columns: [
          { data: 'id', name: 'id' },
          { data: 'issue_id', name: 'issue_id' },
          { data: 'description', name: 'description' },
          { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
      });
    });
  </script>

@endsection
