$(document).ready(function(){
    const $btn_export = $('#export');
    const $btn_xlsx = $('#xlsx');
    const $btn_xls = $('#xls');
    const $btn_csv = $('#csv');

    function PostDataRedirect(data, dataName, location) {
        var form = document.createElement("form");
        var csrfVar = $('meta[name="csrf-token"]').attr('content');

        form.method = "POST";
        form.action = location;

        var csrf = document.createElement("input");
            csrf.setAttribute("type","hidden");
            csrf.setAttribute("name","_token");
            csrf.setAttribute("value",csrfVar);
            form.appendChild(csrf);
        
        if (data.constructor === Array && dataName.constructor === Array) {
            for (var i = 0; i < data.length; i++) {
                var element = document.createElement("input");
                element.type = "hidden";
                element.value = data[i];
                element.name = dataName[i];
                form.appendChild(element);
            }
        } else {
            var element1 = document.createElement("input");
            element1.type = "hidden";
            element1.value = data;
            element1.name = dataName;
            form.appendChild(element1);
        }
        
        document.body.appendChild(form);
        
        form.submit(); 
        form.remove();
        }
    
    $btn_xlsx.on('click',function() {

        var name = $('#bill').val();
        var datetime1 = $('#linkedPickers1Input').val();
        var datetime2 = $('#linkedPickers2Input').val();
        const filetype="xlsx";

        PostDataRedirect([name,datetime1,datetime2,filetype],['name','datetime1','datetime2','filetype'],'/billdataPlugins/exports')

    })

    $btn_export.on('click',function() {

        var name = $('#bill').val();
        var datetime1 = $('#linkedPickers1Input').val();
        var datetime2 = $('#linkedPickers2Input').val();
        const filetype="xlsx";

        PostDataRedirect([name,datetime1,datetime2,filetype],['name','datetime1','datetime2','filetype'],'/billdataPlugins/exports')
    })

    $btn_xls.on('click',function() {

        var name = $('#bill').val();
        var datetime1 = $('#linkedPickers1Input').val();
        var datetime2 = $('#linkedPickers2Input').val();
        const filetype="xls";

        PostDataRedirect([name,datetime1,datetime2,filetype],['name','datetime1','datetime2','filetype'],'/billdataPlugins/exports')
    })

    $btn_csv.on('click',function() {

        var name = $('#bill').val();
        var datetime1 = $('#linkedPickers1Input').val();
        var datetime2 = $('#linkedPickers2Input').val();
        const filetype="csv";

        PostDataRedirect([name,datetime1,datetime2,filetype],['name','datetime1','datetime2','filetype'],'/billdataPlugins/exports')
    })
})
