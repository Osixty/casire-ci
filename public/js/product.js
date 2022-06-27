$(document).ready(function() {
    table = $('#datatablesProduk').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "info": false,
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('product/product_ajax_list') ?>",
            "type": "POST",
            "data": function(data) {
                //   data.keadaan = $('input:radio[name="keadaan"]:checked').val();
            }
        },

        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0, 4], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],
    });
});