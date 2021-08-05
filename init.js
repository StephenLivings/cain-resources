$(document).ready( function (){
    $('.datatable').DataTable({
        ajax: '/includes/route.php?type=get',
        columns:[
            {data: 'temp_keyid'},
            {data: 'temp_name'},
            {data: 'temp_keyid',
                fnCreatedCell: function (td, id){
                    $(td).html('div class="text-right"> <a href="update.php?id=+'temp_keyid+'">Update</a> <a href="delete.php?id=+'temp_keyid+'">Delete</a></div>')
                }
            }
        ],
        columnDefs: [{
            target: [3],
orderable:false
        }]
    });

 $('.form').validate({
     rules:{
         temp_name: {
             required:true
         }
     },
submitHandler:function(form){
    form.submit();
}
 });   

});