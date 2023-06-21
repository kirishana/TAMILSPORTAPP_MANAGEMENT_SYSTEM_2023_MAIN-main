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
                    foreach ($places as $d) {
                        if($d->marks== $d->first_place){
                            $name="First Place";
                        }
                        elseif($d->marks== $d->second_place){
                            $name="Second Place";

                        }
                        elseif($d->marks== $d->third_place){
                            $name='Third Place';
                        }
                       
                        echo "['" .$name. "', " . $d->count_row . '],';
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