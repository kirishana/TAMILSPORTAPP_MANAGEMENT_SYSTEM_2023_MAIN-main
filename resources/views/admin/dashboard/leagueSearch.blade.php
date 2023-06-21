<div id="piechart" class="chart" style="width: 100%; height: 350px;">
</div>


<script>
    var leagueId=<?php echo json_encode($registrations); ?>;
    
   
        google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Role', 'Registered User Count'],

                    @php
                    foreach ($registrations as $d) {
                        $league = DB::table('leagues')
                            ->where('id', $d->league_id)
                            ->first();
                        echo "['Single Events', " . $d->count_row . '],';
                    }
                    foreach ($grpregistrations as $d) {
                        $league = DB::table('leagues')
                            ->where('id', $d->league_id)
                            ->first();
                        echo "['Group Events', " . $d->count_row . '],';
                    }
                    @endphp
                ]);

                var options = {
                    title: "League"+' '+' '+<?php echo json_encode($ongngLeagues?$ongngLeagues->name:''); ?>,
                    is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
            


       
    }
      
</script>  


