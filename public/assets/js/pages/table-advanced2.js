$(document).ready(function() {
  

    //table2
    /* Formatting function for row details - modify as you need */
    function format(d) {

        // `d` is the original data object for the row
        return '<table class="table table-striped" cellpadding="5" style="padding-left:50px;">' +
            '<tr>' +
            '<td>User name:</td>' +
            '<td>' + d.UserName + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>contact no:</td>' +
            '<td>' + d.contact + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Extra info:</td>' +
            '<td>And any further details here (images etc)...</td>' +
            '</tr>' +
            '</table>';

    }


        var table2 = $('#table2').DataTable( {
            "ajax": "../assets/js/pages/data.txt",
            "columns": [
                {
                    "className":      'details-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
                },
                { "data": "#" },
                { "data": "FirstName" },
                { "data": "LastName" },
                { "data": "UserE-mail" }
            ],
            "order": [[1, 'asc']],
            "responsive":true
        } );

        // Add event listener for opening and closing details
        $('#table2 tbody').on('click', 'td', function() {
            var tr = $(this).closest('tr');
            $("#table2_wrapper table.dataTable").removeClass("collapsed");
            var row = table2.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format(row.data())).show();
                tr.addClass('shown');
                tr.next().children().css("pointer-events","none");
            }

        });



    //table3

        var table3 = $('#table3').DataTable({
            "responsive": true
        });

        $('button.toggle-vis').on('click', function(e) {
            e.preventDefault();

            // Get the column API object
            var column = table3.column($(this).attr('data-column'));

            // Toggle the visibility
            column.visible(!column.visible());
        });
//table4

    // $.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
    //     return $(value).val();
    // };
    //
    // var table = $("#example").DataTable({
    //     columnDefs: [
    //         { "type": "html-input", "targets": [1, 2, 3] }
    //     ]
    // });

//table5
    $("#table5").DataTable({
        "responsive": true
    });

    $('select').select2({
        placeholder: "Select a value",
        theme: "bootstrap"
    });

    $.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
        return $(value).val();
    };


    /* Create an array with the values of all the input boxes in a column */
    $.fn.dataTable.ext.order['dom-text'] = function  ( settings, col )
    {
        return this.api().column( col, {order:'index'} ).nodes().map( function ( td, i ) {
            return $('input', td).val();
        } );
    }

    /* Create an array with the values of all the input boxes in a column, parsed as numbers */
    $.fn.dataTable.ext.order['dom-text-numeric'] = function  ( settings, col )
    {
        return this.api().column( col, {order:'index'} ).nodes().map( function ( td, i ) {
            return $('input', td).val() * 1;
        } );
    }

    /* Create an array with the values of all the select options in a column */
    $.fn.dataTable.ext.order['dom-select'] = function  ( settings, col )
    {
        return this.api().column( col, {order:'index'} ).nodes().map( function ( td, i ) {
            return $('select', td).val();
        } );
    }


    //table4

    var table =new  $('#table4').DataTable( {
        "columns": [
            null,
            { "orderDataType": "dom-text-numeric" },
            { "orderDataType": "dom-text", type: 'string' },
            { "orderDataType": "dom-select" }
        ],
        columnDefs: [
            { "type": "html-input", "targets": [1, 2, 3] }
        ]
    } );

    $("#table4 td input").on('change', function() {
        var $td = $(this).parent();
        $td.find('input').attr('value', this.value);
        table.cell($td).invalidate().draw();
    });
    $("#table4 td select").on('change', function() {
        var $td = $(this).parent();
        var value = this.value;
        $td.find('option').each(function(i, o) {
            $(o).removeAttr('selected');
            if ($(o).val() == value) $(o).attr('selected', true);
        })
        table.cell($td).invalidate().draw();
    });



});










