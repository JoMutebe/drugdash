@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
          <strong>Stock Item Changes</strong>
          <a class="btn btn-sm btn-primary pull-right"   title="Add stockitemchange" href="{{action('StockitemchangesController@create')}}">
              <i class="fa fa-plus"></i>
          </a>
        </div>

        <div class="panel-body">
          <table class="table table-bordered" id="stockitemchanges">
            <thead>
              <tr>
                <th>Item ID</th>
                <th>Healthfacility ID</th>
                <th>Type</th>
                <th>Occured At</th>
                <th>Value</th>
                <th>Actions<th>
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
      $('#stockitemchanges').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{!! url('get_stockitemchanges') !!}',
          columns: [
            { data: 'item_id', name: 'item_id' },
            { data: 'healthfacility_id', name: 'healthfacility_id' },
            { data: 'type', name: 'type' },
            { data: 'occured_at', name: 'occured_at' },
            { data: 'value', name: 'value' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
          ]
        });
    });
</script>
@endpush
