@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
          <strong>EMS List</strong>
          <a class="btn btn-sm btn-primary pull-right"   title="Add stockitem" href="{{action('StockitemsController@create')}}">
              <i class="fa fa-plus"></i>
          </a>  
         
        </div>

        <div class="panel-body">
          <table class="table table-bordered" id="stockitems">
            <thead>
              <tr>
                <th>Common Name</th>
                <th>Brand Name</th>
                <th>Code</th>
                <th>Category</th>
                <th>Unit Of Measure</th>
                <th>Unit Price</th>
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
      $('#stockitems').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{!! url('get_stockitems') !!}',
          columns: [
            { data: 'common_name', name: 'common_name' },
            { data: 'brand_name', name: 'brand_name' },
            { data: 'code', name: 'code' },
            { data: 'category', name: 'category' },
            { data: 'unit_of_measure', name: 'unit_of_measure' },
            { data: 'unit_price', name: 'unit_price' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
          ]
        });
    });
</script>
@endpush
