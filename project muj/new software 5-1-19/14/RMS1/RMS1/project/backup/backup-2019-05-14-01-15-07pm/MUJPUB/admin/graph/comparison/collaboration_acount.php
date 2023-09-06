<div class="col-sm-10 col-md-10">
                        <div class="card">
                            <div class="card-title">
                              <h4>Citation vs Article Count vs Collaboration </h4>

                            </div>
                            <div class="sales-chart">
                              <canvas id="chartJSContainer17"></canvas>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
					
                         <?php
                                                
                                                 $color = array('rgba(255,0,0,0.4)','rgba(255,255,0,0.4)',  'rgba(0,128,0,0.4)', 'rgba(255,0,255,0.4)', 'rgba(223, 149, 20,0.4)'); 
												$data=" ";
												$s=0;
                                                $max=0;
												$max1=0;
												$radious1=0;
												$radious=10;
												
												
                                                $query = "SELECT * FROM `compare` WHERE 1 ORDER BY `compare`.`collaborator` DESC";
                                                $result = mysqli_query($connect, $query);
                                                                                   
                                                while($row1 = mysqli_fetch_array($result)):;
												if($max<$row1[9])
												{
												$max=$row1[9];
												}
												
												if($max1<$row1[3])
												{
												$max1=$row1[3];
												}
												$doc=$row1[2];
												$cite=$row1[1];
												$avr=$cite/$doc;
												$r=($row1[9]/100)*$radious;
												
												
												if($max1<$row1[2])
												{
												$max1=$row1[2];
												$radious1=$r;
												}
												 $data=$data."{
													label: '".$row1[0]."',
													data: [{
														x: ".$avr.",
														y: ".$row1[2].",
														r: ".$r.",
														z:".$row1[9].",
													  }
													],
													backgroundColor:'".$color[$s]."',
													BorderColor:'".$color[$s]."',
												  },";
												  $s=$s+1;
												endwhile;
													 ?>  
												
                                    
											

   <script >
   
   var options = {
  type: 'bubble',
  data: {
	  
    datasets: [
	<?php echo $data;?>
     
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
                ctx.fillStyle = 'black';
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
						max:<?php echo $max1+2000+$radious1;?>,
						
					},
					scaleLabel: {
								display: true,
								labelString: 'Article Count'
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

var ctx = document.getElementById('chartJSContainer17').getContext('2d');
new Chart(ctx, options);
</script>