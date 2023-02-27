$(document).ready(function() {
    $('#bill').keyup(function() {
        var query = $('#bill').val();
        if(query != ''){
            $.ajax({
                url:"/billdataPlugins/autocompleteSearch",
                method:"POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{query:query},
                success:function(data){
                    console.log(data)
                    $('#billList').fadeIn();
                    $('#billList').html(data);
                }
            });
        }
        else{
            $('#billList').fadeOut();
            $('#billList').html();
        }
    });
    $(document).on('click','.showdatalist',function() {
        $('#bill').val($(this).text());
        $('#billList').fadeOut();
    });
});