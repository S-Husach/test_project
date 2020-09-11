<script type="text/javascript">
$(".curve_chart").hide();
</script>

<div class="card-deck mb-4 text-center">
    <div class="container spinner_chart">
        <div class="spinner-border text-primary">
            <span class="sr-only"></span>
        </div>
    </div>
    <div id="curve_chart" class="curve_chart" style="width: 1400px; height: 400px">
    </div>
</div>

<script type="text/javascript">

// $(document).ready(function() {
//     $.ajax({
//         url:"/chart",
//         dataType: 'json',
//         success: function(amount)
//         {
//             console.log('ajax')
//         }
//     });
// });

$(document).ready(function() {

            var analytics = <?php echo $amount; ?>

// console.log(analytics);

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
            };

            $(".spinner_chart").hide();
            $(".curve_chart").show();

});
</script>
