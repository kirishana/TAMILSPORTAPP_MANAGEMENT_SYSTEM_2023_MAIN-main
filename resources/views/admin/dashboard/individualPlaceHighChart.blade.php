<div id="club-first-counts" style="width: 100%; height: 400px;"></div>
<script>
     //reults
     var clubs = <?php echo json_encode($clubNames); ?>;
        var clubNames = [];
        for (var j = 0; j < clubs.length; j++) {
            clubNames.push(clubs[j])
        }
        var firstPlaceCount = <?php echo json_encode($firstPlaceCount); ?>;
        var firstPlaceCounts = [];
        for (var i = 0; i < firstPlaceCount.length; i++) {
            firstPlaceCounts.push(firstPlaceCount[i])
        }
        var firstPlaceClubCounts = firstPlaceCounts.map(i => Number(i))
        var secondPlaceCount = <?php echo json_encode($secondPlaceCount); ?>;
        var secondPlaceCounts = [];
        for (var i = 0; i < secondPlaceCount.length; i++) {

            secondPlaceCounts.push(secondPlaceCount[i])
        }
        var secondPlaceClubCounts = secondPlaceCounts.map(i => Number(i));

        var thirdPlaceCount = <?php echo json_encode($thirdPlaceCount); ?>;
        var thirdPlaceCounts = [];
        for (var i = 0; i < thirdPlaceCount.length; i++) {

            thirdPlaceCounts.push(thirdPlaceCount[i])
        }
        var thirdPlaceClubCounts = thirdPlaceCounts.map(i => Number(i));

        $('#club-first-counts').highcharts({

            chart: {
                type: 'column'
            },

            title: {
                text: 'Total fruit consumption, grouped by gender'
            },




            xAxis: {
                categories: clubNames
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'Number of WinCounts'
                }
            },

            tooltip: {
                formatter: function() {
                    return '<b>' + this.x + '</b><br/>' +
                        this.series.name + ': ' + this.y + '<br/>' +
                        'Total: ' + this.point.stackTotal;
                }
            },

            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },

            series: [{
                    name: 'First Place',
                    data: firstPlaceClubCounts,
                    stack: 'yes'
                },
                {
                    name: 'Second Place',
                    data: secondPlaceClubCounts,
                    stack: 'no'
                },

                {
                    name: 'Third Place',
                    data: thirdPlaceClubCounts,
                    stack: 'notneed'
                },
                
            ]
        });
</script>