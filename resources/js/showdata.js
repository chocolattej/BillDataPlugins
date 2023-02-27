$(document).ready(function(){
    const $btn = $('#showdata_btn');
    const $data = $('#showdata');

    $btn.on('click',function() {

        var name = $('#bill').val();
        var datetime1 = $('#linkedPickers1Input').val();
        var datetime2 = $('#linkedPickers2Input').val();

        $.ajax({
            url:"/billdataPlugins/showdata",
            method:"POST",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{name:name,datetime1:datetime1,datetime2:datetime2},
            success:function(table_data){
                // alert(table_data)
                // console.log(table_data);
                $data.html(table_data);
            }
        });
    });
});
