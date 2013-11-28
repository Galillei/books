/**
 * Created by artsem on 11/21/13.
 */
$(document).ready(function(){
$("#addAuthor-element").on('click',function(){
    window.location = "/admin/catalog/add/author";
});
$("#addPublisher").on('click',function(){
        window.location = "/admin/catalog/add/publisher";
});
$("#addCategory-element").on('click',function(){
        window.location = "/admin/catalog/add/category";
});
})
