google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawVisualization);

function drawVisualization() {

    //call data todo : authentication
    var tmp = $.ajax({
        url:"productions/get",
        method:"get",
        dataType : "json",
        success:function(data)
        {
            //prepare data
            var data = google.visualization.arrayToDataTable(data);

            var options = {
                title : 'Monthly Coffee Production by Country',
                vAxis: {title: 'Cups'},
                hAxis: {title: 'Month'},
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    });


}
