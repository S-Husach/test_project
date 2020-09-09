@extends('layouts.app')

@include('inc.header')

@section('content')

<!-- Modal -->

<!-- <div class="table_data"> -->

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
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" value="Submit">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Script -->

<script>
$(function() {
    $('#add_donation').submit(function(event){
        var route = $('add_donation').data('route');
        var form_data = $(this);
        $.ajax({
            type: 'POST',
            url: route,
            data:form_data.serialize(),
            success: function() {
                $('#add_donation')[0].reset();
                $('#donationModal').modal('hide');
            }
        });
        event.preventDefault();
    });
});
</script>

<!-- Info Windows -->

@include('inc.widget')

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

@include('inc.table')

@endsection