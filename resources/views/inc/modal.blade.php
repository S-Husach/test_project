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