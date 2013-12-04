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
})
