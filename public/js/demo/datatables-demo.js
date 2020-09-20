// Call the dataTables jQuery plugin
$(document).ready(function() {


    $table = $('#dataTable').DataTable({
        "language":{
            "url" : "/vendor/datatables/indonesia.json",
            "sEmptyTable" : "Tidads"
        },
    });

        // Setup - add a text input to each footer cell
        $('#dataTableReport tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Cari '+title+'" />' );
        } );
        $table = $('#dataTableReport').DataTable({
            "language":{
                "url" : "/vendor/datatables/indonesia.json",
                "sEmptyTable" : "Tidads"
            },
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ],

            initComplete: function () {
                // Apply the search
                this.api().columns().every( function () {
                    var that = this;

                    $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    });
                });
            }
        });
});
