@extends('layouts.app')

@section('content')
  <div class="container">
    <h3>{{$healthfacility->name}} {{$healthfacility->level}}</h3>
    <div class="row">
      <div class="col-md-6">
        <div class="dashboard-widget-content">
                        <div class="col-md-8 hidden-small">
                          <h2 class="line_30">General Health Facility Information</h2>

                          <table class="countries_list">
                            <tbody>
                              <tr>
                                <td>Name of Incharge</td>
                                <td class="fs15 fw700 text-right">{{$healthfacility->incharge_name}}</td>
                              </tr>
                              <tr>
                                <td>Incharge Telephone</td>
                                <td class="fs15 fw700 text-right">{{$healthfacility->incharge_tel}}</td>
                              </tr>
                              <tr>
                                <td>Store Manager Name</td>
                                <td class="fs15 fw700 text-right">{{$healthfacility->store_manager_name}}</td>
                              </tr>
                              <tr>
                                <td>Store Manager Telephone</td>
                                <td class="fs15 fw700 text-right">{{$healthfacility->store_manager_tel}}</td>
                              </tr>
                              <tr>
                                <td>Bio Statistician Name</td>
                                <td class="fs15 fw700 text-right">{{$healthfacility->bio_stat_name}}</td>
                              </tr>
                              <tr>
                                <td>Bio Statistician Telephone</td>
                                <td class="fs15 fw700 text-right">{{$healthfacility->bio_stat_tel}}</td>
                              </tr>
                              <tr>
                                <td>Health Center Code</td>
                                <td class="fs15 fw700 text-right">{{$healthfacility->code}}</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div id="world-map-gdp" class="col-md-8 col-sm-12 col-xs-12" style="height:230px;"></div>
                      </div>
      </div>
      <div class="col-md-5">
        <div id='bar' class="panel body">

        </div>
      </div>
      </div>
    </div>
  </div>


  @endsection

  @push('scripts')
  <script>
  Highcharts.chart('bar', {
    title: {
        text: 'SRH Usage'
    },
    xAxis: {
        categories: ['January', 'February', 'March', 'April', 'May']
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
