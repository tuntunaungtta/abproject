$(document).ready(function(){
    $('#tbl-searchlist').DataTable({
        "columnDefs":[{
            "targets": 3,
            "render": function(data){
                return '<a href = "index.php/Job/job_detail?id='+data+'">View Detail</a>';
            }
        }],

        'serverSide':true,
        'ajax': {
            'url': baseurl+'/index.php/Job/load_data',
            'type': 'POST',
            'data': function(d){
                var frmdata = $('#search-form').serializeArray();
                $.each(frmdata, function(key, val) {
                    d[val.name] = val.value;
                });
            }
        }
    });
    $('#btn-search').click(function() {
        var table = $('#tbl-searchlist').DataTable();
        table.ajax.reload(null,true);
    })
});
