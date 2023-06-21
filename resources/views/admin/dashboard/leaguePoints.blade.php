<div id="club-first-counts" class="chart" style="min-width: 335px; height: 425px; margin: 0 auto"></div>




<script>
       google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart2);

            function drawChart2() {

                var data = google.visualization.arrayToDataTable([
                    ['Club', 'Partcipated User Count'],

                    @php
                    foreach ($points as $d) {
                        $leagues = DB::table('leagues')
                            ->where('id', $d->league_id)
                            ->first();
                        echo "['" . $leagues->name . "', " . $d->sum . '],';
                    }
                  

                    @endphp
                ]);

                var options = {
                    is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('club-first-counts'));

                chart.draw(data, options);
            }

      
</script>  