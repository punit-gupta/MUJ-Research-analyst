
<div class="col-sm-6 col-md-6">
                        <div class="card">
                            <div class="card-title">
                              <h4>SCOPUS Article</h4>

                            </div>
                            <div class="sales-chart">
                              <canvas id="singelBarChart5"></canvas>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
  
   <script >
    function getRandomInt() {
   
  var o = Math.round, r = Math.random, s = 255;
    return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + r().toFixed(1) + ')';

   
	
}  
   var options = {
  type: 'bubble',
  data: {
	  
    datasets: [
	 {
													label: 'MUJ',
													data: [{
														x: 2.107634543179,
														y: 398,
														r: 14,
														z:35,
													  }
													],
													backgroundColor:getRandomInt(),
													opacity: 0.5
												  },{
													label: 'Shoolini',
													data: [{
														x: 9.4485207100592,
														y: 326,
														r: 25.2,
														z:63,
													  }
													],
													backgroundColor:getRandomInt(),
													opacity: 0.5
												  },{
													label: 'Sastra',
													data: [{
														x: 5.9851034482759,
														y: 4388,
														r: 32.4,
														z:81,
													  }
													],
													backgroundColor:getRandomInt(),
													opacity: 0.5
												  },{
													label: 'JSS',
													data: [{
														x: 7.8876595744681,
														y: 513,
														r: 16,
														z:40,
													  }
													],
													backgroundColor:getRandomInt(),
													opacity: 0.5
												  },{
													label: 'MAHE',
													data: [{
														x: 2.4598870688209,
														y: 1796,
														r: 53.6,
														z:134,
													  }
													],
													backgroundColor:getRandomInt(),
													opacity: 0.5
												  },     
      ]
  },  options: {
        "hover": {
            "animationDuration": 1
        },
        "animation": {
            "duration": 3,
            "onComplete": function () {
                var chartInstance = this.chart,
                ctx = chartInstance.ctx;
				
                ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                ctx.textAlign = 'center';
                ctx.textBaseline = 'bottom';

                this.data.datasets.forEach(function (dataset, i) {
                    var meta = chartInstance.controller.getDatasetMeta(i);
                    meta.data.forEach(function (bar, index) {
                        var data = dataset.label;                            
                        ctx.fillText(data, bar._model.x, bar._model.y - dataset.data[0].r );
                    });
                });
            }
        },
		
        legend: {
            "display": true
        },
			scales: {
				yAxes: [{
					display: true,
					gridLines: {
						display : true
					},
					ticks: {
						display: true,
						min:0,
						max:4924						
					},
					scaleLabel: {
								display: true,
								labelString: 'Author Count'
							}
				}],
				xAxes: [{
					gridLines: {
						display : false
					},
					ticks: {
						min:0,
						max: 10
					},
					scaleLabel: {
								display: true,
								labelString: 'Average Citation'
							}
				}]
			},
			
      tooltips: {
         callbacks: {
            label: function(t, d) {
               return d.datasets[t.datasetIndex].label + 
                      ': (' + t.xLabel + ')';
            },
			
         }
      }
   }
}

var ctx = document.getElementById('chartJSContainer').getContext('2d');
new Chart(ctx, options);
</script>		
