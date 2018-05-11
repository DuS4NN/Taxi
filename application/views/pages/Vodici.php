<div class="container">
    <div class="row">
        <h1>Zoznam vodičov</h1>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">Vodici <a href="<?php echo base_url('Vodici/add') ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
                    <table class="table table-striped">
                            <tr>
                                <th width="5%">ID</th>
                                <th width="20%">Meno</th>
                                <th width="20%">Priezvisko</th>
                                <th width="20%">Mesto</th>
                                <th width="25%">Ulica</th>
                                <th width="10%">Rok narodenia</th>
                                <th width="5%"></th>
                                <th width="5%"></th>
                                <th width="5%"></th>
                            </tr>

                            <?php
                            if(!empty($vodici)){
                                foreach ($vodici as $key => $value){
                                    echo '<tr>';
                                    echo '<td>'.$value->ID .'</td>';
                                    echo '<td>'.$value->Meno .'</td>';
                                    echo '<td>'.$value->Priezvisko .'</td>';
                                    echo '<td>'.$value->Mesto .'</td>';
                                    echo '<td>'.$value->Ulica .'</td>';
                                    echo '<td>'.$value->Rok_narodenia .'</td>';

                                    echo '<td> <a href="'.base_url('Vodici/view/'.$value->ID).'" class="glyphicon glyphicon-eye-open" ></a></td>';
                                    echo '<td> <a href="'.base_url('Vodici/edit/'.$value->ID).'" class="glyphicon glyphicon-edit" ></a></td>';
                                    echo '<td> <a href="'.base_url('Vodici/delete/'.$value->ID).'"  class="glyphicon glyphicon-trash" onclick="return confirm(\'Naozaj chcete vymazať túto položku?\')"></a></td>';

                                    echo '</tr>';
                                }
                            }else{
                                echo '<tr><td colspan="4">Vodici sa nenasli</td></tr>';
                            }
                            ?>

                    </table>
                </div>
            <div id="pagination" style="align-content: center">
                <ul class="pagination">
                    <?php foreach ($links as $link) {
                        echo "<li class=\"page-item\">". $link."</li>";
                    } ?>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="chart_div" class="container">

</div>

<script type="text/javascript">

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {


        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Vek');
        data.addColumn('number', 'Počet');
        data.addRows([

            <?php
                foreach ($result as $value){
                    echo "['".$value['age']."',".$value['number']."],";
                }
            ?>
        ]);



        var options = {'title':'Pomer vekových skupín vodičov',
            'width':600,
            'height':500};

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>



