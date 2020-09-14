<!-- <div class="widget_data">
  <div class="container">
    <div class="card-deck mb-3 text-center">

      <div class="card mb-4 shadow-sm">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Top Donation</h4>
        </div>
        <div class="card-body">
          <h1 class="widget_max_amount card-title pricing-card-title"></h1>
          <small class="widget_max_name text-muted"></small>
          <div class="spinner_max spinner-border text-primary">
            <span class="sr-only"></span>
          </div>
        </div>
      </div>
      <div class="card mb-4 shadow-sm">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Current Month Amount</h4>
        </div>
        <div class="card-body">
          <h1 class="widget_totalMonth card-title pricing-card-title"></h1>
          <div class="spinner_totalMonth spinner-border text-primary">
              <span class="sr-only"></span>
          </div>
        </div>
      </div>
      <div class="card mb-4 shadow-sm">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">All Time Amount</h4>
        </div>
        <div class="card-body">
          <h1 class="widget_total card-title pricing-card-title"></h1>
          <div class="spinner_total spinner-border text-primary">
            <span class="sr-only"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->

<script>
$(document).ready(function() {
    $.ajax({
        url:"/widget",
        dataType: 'json',
        success: function(value)
        {
          $widget_max_amount = [
          value.max.amount,
          value.max.amount
          ];
        // console.log($widget_max_amount);

            if (value.max) {
                $('.widget_max_amount').text('$' + value.max.amount);
                $('.widget_max_name').text(value.max.name);
                $(".spinner_max").hide();
            }
            if (value.totalMonth) {
                $('.widget_totalMonth').text('$' + value.totalMonth);
                $(".spinner_totalMonth").hide();
            }
            if (value.total) {
                $('.widget_total').text('$' + value.total);
                $(".spinner_total").hide();
            }
        }
    });
});
</script>