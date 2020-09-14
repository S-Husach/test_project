<script type="text/javascript">
$(document).ready(function() {
    $.ajax({
        url:"/chart",
        dataType: 'json',
        success: function(analytics)
        {
            if (analytics) {
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
            };
        }
    });
});
</script>