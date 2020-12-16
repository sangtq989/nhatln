$(document).ready(function() {
    var url = $('input[name="info"]').attr('data-url');
    var page = $('input[name="info"]').attr('data-page');

    $('#product-table').DataTable( {
        ajax: '/?url=home/ajaxPaginationProduct'
    } );
})