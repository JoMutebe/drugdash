@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    

  </div>
</div>
<div class="container">
  <div class="col-md-12">
   <div class="panel panel-info">
  <div class="panel-heading">
     {{$stockitems->common_name}} {{$stockitems->brand_name}}
     <div class="btn-group pull-right">
   <a href="/stockitems/{{$stockitems->id}}/edit" class="btn btn-default btn-sm" title="Edit Stockitem Details">Edit</a>
    </div>    
   </div>
   <div class="panel-body">
       

        <table class="countries_list">
          <tbody>
            <tr>
              <td>Common Name</td>
              <td class="fs15 fw700 text-right">{{$stockitems->common_name}}</td>
            </tr>
            <tr>
              <td>Brand Name</td>
              <td class="fs15 fw700 text-right">{{$stockitems->brand_name}}</td>
            </tr>
            <tr>
              <td>Code</td>
              <td class="fs15 fw700 text-right">{{$stockitems->code}}</td>
            </tr>
            <tr>
              <td>Category</td>
              <td class="fs15 fw700 text-right">{{$stockitems->category}}</td>
            </tr>
            <tr>
              <td>Unit of Measure</td>
              <td class="fs15 fw700 text-right">{{$stockitems->unit_of_measure}}</td>
            </tr>  
            <tr>
              <td>Unit of Price</td>
              <td class="fs15 fw700 text-right">{{$stockitems->unit_price}}</td>
            </tr>
          </tbody>
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
          ]
        });
    });
</script>
@endpush