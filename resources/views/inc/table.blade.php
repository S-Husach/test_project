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

<script>
$(document).ready(function(){

    $(document).on('click', '.pagination a', function(event)
    {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
    });

    function fetch_data(page)
    {
        $.ajax({
            url:"/pagination/?page="+page,

            success: function(data)
            {
                // console.log('data', data);
                $('.table_data').html(data);
            }
        });
    }
});
</script>