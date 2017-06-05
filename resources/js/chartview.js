/**
 * Connects to webservice to
 * retrieve the data to load the
 * chart.
 */
function postForChart() {
    $.ajax({
        type: "POST",
        url: "/etailinsights/api/log_service.php",
        data: "logs",
        dataType: "json",
        success: function(response)
        {
            var dataTitles = [];
            var logCount = [];
            for(var i = 0; i < response.length;i++){
                dataTitles[i] = response[i]['location']['ip'];

                logCount[i] = response[i]['logs'].length;
            }
            loadGraph("Successful Visits",logCount,dataTitles);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}
/**
 * Builds chart with the data that gets passed into it
 * @param title - String - title you want displayed for the chart
 * @param data - array of numbers data
 * @param dataTitles - array of titles to the number data
 */
function loadGraph(title,data,dataTitles){
    var ctx = document.getElementById("Chart").getContext('2d');
    var logChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: dataTitles,
            datasets: [{
                label: title,
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.8)',
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 206, 86, 0.8)',
                    'rgba(75, 192, 192, 0.8)',
                    'rgba(153, 102, 255, 0.8)',
                    'rgba(255, 159, 64, 0.8)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
}

$(document).ready(function () {
    //launches function to make web request on page load
    postForChart();
});