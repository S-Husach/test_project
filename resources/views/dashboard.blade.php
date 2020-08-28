@extends('layouts.app')

@section('content')

<div class="container">
  <div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Top Donator</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">
            ${{$max->amount}}
        </h1>
        <small class="text-muted">{{$max->name}}</small>
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Current Month Amount</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">${{$totalMonth}}</h1>
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">All Time Amount</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">${{$total}}</h1>
      </div>
    </div>
  </div>
</div>

<div class="card-deck mb-4 text-center">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

var analytics = <?php echo $amount; ?>

google.charts.load('current', {'packages':['corechart', 'line']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = new google.visualization.DataTable();
    var data = google.visualization.arrayToDataTable(analytics);
    var options = {
      title: 'Donation Statistics',
      curveType: 'none',
      legend: { position: 'bottom' },
    };
    var chart = new google.visualization.LineChart(
        document.getElementById('curve_chart')
    );
    chart.draw(data, options);
}
</script>
<div id="curve_chart" style="width: 1400px; height: 400px"></div>
</div>

<div class="container">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Donator Name</th>
                <th>Email</th>
                <th>Amount</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $donate)
            <tr>
                <td>{{$donate->name}}</td>
                <td>{{$donate->email}}</td>
                <td>{{$donate->amount}}</td>
                <td>{{$donate->message}}</td>
                <td>{{$donate->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center">
        {{$data->links()}} 
    </div>
</div>

@endsection