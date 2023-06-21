<div id="club" class="groupchart" style="min-width: 335px; height: 425px; margin: 0 auto"></div>




<script>
       google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart2);

            function drawChart2() {

                var data = google.visualization.arrayToDataTable([
                    ['Club', 'Partcipated User Count'],

                    @php
                    // dd(Auth::user()->id);
                    foreach ($placesGroup as $d) {
                        $marks= $d->marks;

if ($marks==$d->group_first_place) {
  $name= "FIRST PLACE";
} elseif ($marks==$d->group_second_place) {
  $name= "SECOND PLACE";
} elseif ($marks==$d->group_third_place) {
  $name= "THIRD PLACE";
}
                       
                        echo "['" .$name. "', " . $d->count_row . '],';
                    }
                  

                    @endphp
                ]);

                var options = {
                    is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('club'));

                chart.draw(data, options);
            }

      
</script>  