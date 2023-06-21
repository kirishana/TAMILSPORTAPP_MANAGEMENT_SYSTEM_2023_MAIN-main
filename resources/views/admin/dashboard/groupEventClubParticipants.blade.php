
    <div id="club-group-event" class="groupEvent" style="height: 350px; margin: 0 auto"></div>
<script>
        google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(clubGroupParticipnats);

            function clubGroupParticipnats() {

                var data = google.visualization.arrayToDataTable([
                    ['Club', 'Partcipated User Count'],

                    @php
                    
                    foreach ($clubGroupParticipantCounts as $d) {
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

                var chart = new google.visualization.PieChart(document.getElementById('club-group-event'));

                chart.draw(data, options);
            }
    </script>