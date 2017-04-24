@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
          <strong>Sub Counties</strong>
          <a class="btn btn-sm btn-primary pull-right"   title="Add SubCounty" href="{{action('SubcountyController@create')}}">
              <i class="fa fa-plus"></i>
          </a>
        </div>

        <div class="panel-body">
          <table class="table table-bordered" id="subcounties">
            <thead>
              <tr>
                <th>Name</th>
                <th>District</th>
                <th>County</th>
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
      $('#subcounties').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{!! url('get_subcounties') !!}',
          columns: [
            { data: 'name', name: 'name' },
            { data: 'district_id', name: 'district_id' },
            { data: 'county_id', name: 'county_id' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
          ]
        });
    });
</script>
@endpush
