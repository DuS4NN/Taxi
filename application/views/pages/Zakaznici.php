<div class="content" >
    <div style="width: 50%; margin: auto;">
        <br>
        <table id="book-table" class="display" style="width:100%">
            <thead>
            <tr><td>ID</td><td>Tel. číslo zákazníka</td><td>Dátum volania</td><td>Operations</td></tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <br>
    <div style="width:50%;  margin:auto;">
        <div id="chart_div" style="width:500px; margin: auto" "></div>
</div>
</div>

<script type="text/javascript">

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {


        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Hour');
        data.addColumn('number', 'Count');
        data.addRows([

            <?php
            foreach ($result as $value){
                echo "['".$value['hour']."',".$value['count']."],";
            }
            ?>
        ]);



        var options = {
            title: 'Ceľkový počet zákazníkov v jedotlivých hodinách',
            hAxis: {
                title: 'Deň',
                format: 'h:mm a',

            },
            vAxis: {
                title: 'Počet zákazníkov'
            }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>


</body>
</html>

<script type="text/javascript">
    $(document).ready(function() {
        $('#book-table').DataTable({
            "ajax": {
                url : "<?php echo site_url("Zakaznici/books_page") ?>",
                type : 'GET'
            },

            dom: 'Bfrtip',
            buttons: [
                {
                    text: 'Add',
                    action: function ( e, dt, node, config ) {
                        window.location = ' <?php echo base_url('Zakaznici/add') ?>';
                    }
                }
                ,'csv','excel','pdf','print']
        } );
    } );
</script>

<script type="text/javascript" src="https://cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/tabletools/2.2.2/swf/copy_csv_xls_pdf.swf"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>
