@extends('layouts.app')

@section('content')
  <div class="container">
    <h3>{{$district->name}} District</h3>
  </div>

  <div class="row top_tiles">
    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="count">1</div>
        <h3>HC IV's</h3>
      </div>
    </div>
    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="count">4</div>
        <h3>HC III's</h3>
      </div>
    </div>
    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="count">6</div>
        <h3>HC II's</h3>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div id='sample' class="panel body">

        </div>
      </div>

      <div class="col-md-6">
        <div id='bar' class="panel body">

        </div>
      </div>
    </div>

  </div>

@endsection
@push('scripts')
<script>
  Highcharts.chart('sample', {
  chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
  },
  title: {
      text: 'Health Centers by Type'
  },
  tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
      pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
              enabled: true,
          }
      }
  },
  series: [{
      name: 'Health Center type',
      colorByPoint: true,
      data: [{
          name: 'HC IV',
          y: 1
      }, {
          name: 'HC III',
          y: 5,
          sliced: true,
          selected: true
      }, {
          name: 'HC II',
          y: 6
      }]
  }]
});

  Highcharts.chart('bar', {
    title: {
        text: 'SRH Usage'
    },
    xAxis: {
        categories: ['Kabarwa HC', 'Bukedea HC IV', 'Malera HC', 'Kacumbara HC', 'HC Name 5']
    },

    series: [{
        type: 'column',
        name: 'Condoms',
        data: [3, 2, 1, 3, 4]
    }, {
        type: 'column',
        name: 'Pills',
        data: [2, 3, 5, 7, 6]
    }, {
        type: 'column',
        name: 'IUDs',
        data: [4, 3, 3, 9, 0]
    }, {
        type: 'spline',
        name: 'Average',
        data: [3, 2.67, 3, 6.33, 3.33],
        marker: {
            lineWidth: 2,
            lineColor: Highcharts.getOptions().colors[3],
            fillColor: 'white'
        }
    }]
  });
</script>
@endpush
