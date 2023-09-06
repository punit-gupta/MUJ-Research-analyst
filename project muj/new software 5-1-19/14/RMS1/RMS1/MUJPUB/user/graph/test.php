
<div class="col-sm-6 col-md-6">
                        <div class="card">
                            <div class="card-title">
                              <h4>SCOPUS Article</h4>

                            </div>
                            <div class="sales-chart">
                              <canvas id="singelBarChart51"></canvas>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>

											
                                           
                                            
                                    
											

   <script >
   var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
	var path=loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
	path=path+"graph/scopus_article.json";
	alert(path);
$.ajax({
        url: path,
		type : 'GET',
		dataType : 'json',
        success: function (result) {
			
	// to show it in an alert window
			
            var data = [];
            data.push(result.thisWeek);
            
            var labels = result.labels;
            renderChart(data, labels);
			//alert(data);
			//alert(labels);
        },
        error: function (err) {
         
        }
    });
	
	
function renderChart(data, labels) {
	// single bar chart
	
	var ctx = document.getElementById( "singelBarChart51" );
	ctx.height = 150;
	var myChart = new Chart( ctx, {
		type: 'bar',
		data: {
			labels: labels,
			datasets: [
				{
					label: "All Article",
					data: data[0],
					borderColor: "rgba(255,0,0, 0.9)",
					borderWidth: "0",
					backgroundColor: "rgba(255,0,0, 0.5)"
                            }
                        ]
		},
		

 options: {
        "hover": {
            "animationDuration": 0
        },
        "animation": {
            "duration": 1,
            "onComplete": function () {
                var chartInstance = this.chart,
                ctx = chartInstance.ctx;

                ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                ctx.textAlign = 'center';
                ctx.textBaseline = 'bottom';

                this.data.datasets.forEach(function (dataset, i) {
                    var meta = chartInstance.controller.getDatasetMeta(i);
                    meta.data.forEach(function (bar, index) {
                        var data = dataset.data[index];                            
                        ctx.fillText(data, bar._model.x, bar._model.y - 5);
                    });
                });
            }
        },
        legend: {
            "display": true
        },
        tooltips: {
            "enabled": false
        },
        scales: {
            yAxes: [{
                display: true,
                gridLines: {
                    display : true
                },
                ticks: {
                    display: true,
                    beginAtZero:true
                }
            }],
            xAxes: [{
                gridLines: {
                    display : false
                },
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
}

</script>