<div id="clubchart" class="clubchart" style="height: 350px; margin: 0 auto"></div>
<script>
      google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart2);

            function drawChart2() {

                var data = google.visualization.arrayToDataTable([
                    ['Club', 'Partcipated User Count'],

                    @php
                    foreach ($clubParticipantCounts as $d) {
                        $club = DB::table('clubs')
                            ->where('id', $d->club_id)
                            ->first();
                        echo "['" . $club->club_name . "', " . $d->count_row . '],';
                    }
                  
                    @endphp
                ]);

                var options = {
                    title: 'Club Participants',
                    is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('clubchart'));

                chart.draw(data, options);
            }

    </script>