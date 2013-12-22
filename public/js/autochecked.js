$(document).ready(function() {
$("#all_check").on('click',function()
{
    console.log($(this).prop("checked"))
    if($(this).prop("checked"))
    {
        $(".all_checked:checkbox:enabled").prop('checked',true);
    }
    else{
        $(".all_checked:checkbox:enabled").prop('checked',false);
    }
})
//$("#all_edit").on('click',function()
//{
//    var a = '';
//    ($('.all_checked:input[type=checkbox]:checked')).each(function(){
//        a=a+$(this).val()+',';
//
//    })
//    console.log(a.slice(0,-1));
//    return false;
//})
    $(".all_edit").on('click', function(){
        $("#check_form").submit();
        return false;
    })
})
