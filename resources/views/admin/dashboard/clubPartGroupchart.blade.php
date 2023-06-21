<div id="club-first-counts" style="min-width: 335px; height: 425px; margin: 0 auto"></div>
<script>
        google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Role', 'Registered User Count'],

                    @php
                    
                    foreach ($venues as $venue) {
                        //$venue->leagues->pluck('name')->implode(' ')
                        echo "['" . $venue->name . "', " . $venue->leagues->count() . ',],';
                    }
                    
                    @endphp
                ]);

                var options = {
                    title: "Venues",
                    is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('venues'));

                chart.draw(data, options);




            }
          
</script>