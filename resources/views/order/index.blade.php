@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12" id="orders"  style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class = "table">
   <caption>Overall District ARV Orders</caption>
   
   <thead>
      <tr>
         <th>Health Center</th>
         <th>Order Date</th>
         <th>Status</th>
      </tr>
   </thead>
   
   <tbody>
      <tr class = "active">
         <td>Kabarwa HC</td>
         <td>23/Apr/2017</td>
         <td>Pending</td>
      </tr>
      
      <tr class = "success">
         <td>Bukedea HC4</td>
         <td>27/Apr/2017</td>
         <td>Delivered</td>
      </tr>
      
      <tr class = "warning">
         <td>Malerwa HC</td>
         <td>29/Apr/2017</td>
         <td>In Call to confirm</td>
      </tr>
      
      <tr class = "danger">
         <td>Kabarwa HC</td>
         <td>30/04/2017</td>
         <td>Declined</td>
      </tr>
   </tbody>
   
</table>

		</div>
	</div>
@endsection

@push('scripts')
<script type="text/javascript">
	Highcharts.chart('orders', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Average Supply/Usage ARVs'
    },
    subtitle: {
        text: 'Source: Bukedea district'
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
            text: 'Supply Usage'
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
        name: 'Supplied',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

    }, {
        name: 'Used',
        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

    },]
});
</script>

@endpush
