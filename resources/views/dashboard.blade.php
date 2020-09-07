@extends('layouts.app')

@section('content')

<!-- Modal -->

<div class="modal fade" id="donationModal" tabindex="-1" role="dialog" aria-labelledby="donationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="donationModalLabel">Donation form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form method="post" id="add_donation">
                    @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="John"
                    id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="email@exaple.com"
                    id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="amount">Your donation</label>
                    <input type="text" name="amount" placeholder="10$"
                    id="amount" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="message">Enter your message (optionaly)</label>
                    <textarea name="message" placeholder="Message"
                    id="message" class="form-control"></textarea>
                </div>
                <div class="form-group" align="center">
                    <input type="hidden" name="action" id="action" value="Submit" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" value="Submit">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Script -->
<!-- лишняя скобка после функции -->
<script>
$(document).ready(function()){
    $('#add_donation').on('submit', function(event){
        event.preventDefault();
        var action_url = '';
        if($('#action').val() =='Submit') {
            action_url = "{{ route('donation.submit')}};"
        }
        $.ajax({
            url: action_url,
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            success:function(data)
            {
                $('#add_donation')[0].reset();
                $('#donationModal').modal('hide');
            }
        })
    })
};
</script>
<!-- 
<div id="ajax_data">
 -->
<!-- Info Windows -->

<div class="container">
  <div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Top Donation</h4>
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

<!-- Chart -->

<div class="card-deck mb-4 text-center">
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

<!-- Table -->

<div class="table_data">
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
</div>

<!-- <script>
$(document).ready(function(){
    $(document).on('click', '.pagination a', function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
    });

    function fetch_data(page) {
        $.ajax({
            url:"/?page="+page,
            success:function(data)
            {
                $('#table_data').html(data);
            }
        })
    }
});
</script> -->
<!-- 07.09.2020 11:14 -->
@endsection