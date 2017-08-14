@extends('layouts.app')

@section('content')
<div class="row top_tiles">
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
      <div class="count">7</div>
      <h3>New Alerts</h3>
      <!-- <p>Lorem ipsum psdea itgum rixt.</p>
 -->    </div>
  </div>
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="fa fa-comments-o"></i></div>
      <div class="count">3</div>
      <h3>New Recent supplies</h3>
      
    </div>
  </div>
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
      <div class="count">0</div>
      <h3>Pending orders</h3>
      
    </div>
  </div>
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="fa fa-check-square-o"></i></div>
      <div class="count">5</div>
      <h3>Unresoloved Issues</h3>
      
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="x_panel">
      <div class="x_title">
        <h2>Recent Alerts <small>All centers</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <article class="media event danger">
          <a class="pull-left date">
            <p class="month">April</p>
            <p class="day">23</p>
          </a>
          <div class="media-body">
            <a class="title" href="#">No TB Drugs(Kabarwa HC)</a>
            <p>We will be running out of TB drugs soon.</p>
          </div>
        </article>
        <article class="media event">
          <a class="pull-left date">
            <p class="month">May</p>
            <p class="day">1</p>
          </a>
          <div class="media-body">
            <a class="title" href="#">No gloves (Malerwa HC)</a>
            <p>We have no gloves. We really need a resupply of gloves.</p>
          </div>
        </article>
        <article class="media event">
          <a class="pull-left date">
            <p class="month">May </p>
            <p class="day">5</p>
          </a>
          <div class="media-body">
            <a class="title" href="#">Expiring Coartem</a>
            <p>We have about 5 boxes of cortem that are running expiring end of June. If you need any, please arrange to get a supply from us.</p>
          </div>
        </article>        
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="x_panel">
      <div class="x_title">
        <h2>Recent supplies <small>Sessions</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
      <article class="media event">
          <a class="pull-left date">
            <p class="month">April</p>
            <p class="day">3</p>
          </a>
          <div class="media-body">
            <a class="title" href="#">Bukedea HC 4</a>
            <p>We received our items for the second quarter.</p>
          </div>
        </article>
        <article class="media event">
          <a class="pull-left date">
            <p class="month">April</p>
            <p class="day">4</p>
          </a>
          <div class="media-body">
            <a class="title" href="#">Kabarwa HC</a>
            <p>Some items missing from the second quarter supply.</p>
          </div>
        </article>
        <article class="media event">
          <a class="pull-left date">
            <p class="month">April</p>
            <p class="day">5</p>
          </a>
          <div class="media-body">
            <a class="title" href="#">Malerwa HC</a>
            <p>Our supply was perfect. Everything we requested was supplied!</p>
            
          </div>
        </article>
        
        
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12"  id="graph"  style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div>
<div class="row">
  <div class="col-md-12"  id="container"  style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div>
<div class="row">
  <div class="col-md-12"  id="data"  style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div>
@endsection

@push('scripts')
<script>
   Highcharts.chart('graph', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Monthly Average Condom Usage'
    },
    subtitle: {
        text: 'Source: Bukedea District'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Unit of measurement ( Boxes)'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Kabarwa HC',
        data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
    }, {
        name: 'Malerwa  HC',
        data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
    },
    {
        name: 'Bukedea HC 4',
        data: [2.0, 9.9, 11.5, 34.5, 18.4, 21.5, 14.2, 6.5, 3.3, 1.3, 0.9, 0.6]
    },]
});
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Average Monthly StockOut Tallies'
    },
    subtitle: {
        text: 'Source: Bukedea District'
    },
   xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Kabarwa HC',
        data: [-3.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
    }, {
        name: 'Malerwa  HC',
        data: [3.9, 4.2, -4.0, 8.5, 11.9, 15.2, 17.0, -2.0, 14.2, 10.3, -6.6, 4.8]
    },
    {
        name: 'Bukedea HC 4',
        data: [-2.0, 9.9, 11.5, 34.5, -3.0, 21.5, 14.2, 6.5, 3.3, -1.3, 0.9, 0.6]
    },]
});
Highcharts.chart('data', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Average Monthly Stock Usage Comparisons'
    },
    subtitle: {
        text: 'Source: Bukedea District'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Unit of measurement ( Boxes)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} boxes</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Kabarwa HC',
        data: [49.9, 71.5, 40.4, 30.2, 44.0, 50.0, 90.6, 20.5, 90.4, 30.1, 95.6, 20.4]

    }, {
        name: 'Malerwa  HC',
        data: [83.6, 78.8, 98.5, 93.4, 6.0, 84.5, 5.0, 104.3, 91.2, 83.5, 106.6, 92.3]

    }, {
        name: 'Bukedea HC 4',
        data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

    }]
});
</script>

@endpush