@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
          <strong>Issue</strong>
          <a class="btn btn-sm btn-primary pull-right"   title="Add Issue" href="{{action('IssueController@create')}}">
              <i class="fa fa-plus"></i>
          </a>
        </div>

        <div class="panel-body">
          <table class="table table-bordered" id="issues">
            <thead>
              <tr>
                <th>Issue ID</th>
                <th>District ID</th>
                <th>Healthfacility ID</th>
                <th>Description</th>
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
      $('#issues').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{!! url('get_issues') !!}',
          columns: [
            { data: 'id', name: 'id' },
            { data: 'district_id', name: 'district_id' },
            { data: 'healthfacility_id', name: 'healthfacility_id' },
            { data: 'description', name: 'description' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
          ]
        });
    });
</script>
@endpush
