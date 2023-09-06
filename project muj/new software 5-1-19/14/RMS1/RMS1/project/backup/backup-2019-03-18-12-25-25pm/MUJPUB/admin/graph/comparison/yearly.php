<div class="col-sm-10 col-md-10">
                        <div class="card">
                            <div class="card-title">
                              <h4>Citation vs Author Count vs Yearly Publication </h4>

                            </div>
                            <div class="sales-chart">
                              <canvas id="chartJSContainer7"></canvas>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
					<?php
                                                $color = array("red", "green", "orange", "blue", "yellow"); 
                                                $lable = "";
												$data="";
												$s=0;
												$s1="";
                                                $query = "SELECT * FROM `yearp`  GROUP BY org";
                                                $result = mysqli_query($connect, $query);
                                                $rowcount=mysqli_num_rows($result);                                   
                                                while($row1 = mysqli_fetch_array($result)):;
												    
												$lable=$lable.$row1[0];
													
													$query = "SELECT * FROM `yearp` where org='$row1[0]' GROUP BY year";
													$result1 = mysqli_query($connect, $query);
													while($row2 = mysqli_fetch_array($result1)):;
													if($data=="")
													{$data=$row2[2];}
													else
													{$data=$data.",".$row2[2];
													}
													endwhile;
													
													$s1=$s1."{
																label: '".$row1[0]."',
																fill: false,
																backgroundColor: window.chartColors.".$color[$s] .",
																borderColor: window.chartColors.".$color[$s] .",
																data: [".$data."]
															},";
													$data="";
												$s=$s+1;
												endwhile;
                                              
										       //echo $s1;
												?> 
					
					
					
					
					
<script>


		var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};
		 function getRandomInt() {
   
  var o = Math.round, r = Math.random, s = 255;
    return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + r().toFixed(1) + ')';
}  

		var config = {
			type: 'line',
			data: {
				labels: ['2013', '2014', '2015', '2016', '2017', '2018', '2019'],
				datasets: [<?php echo $s1;?>
				
				
				]
			},
			options: {
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
                        //ctx.fillText(data, bar._model.x, bar._model.y  );
                    });
                });
            }
        },
			scales: {
				yAxes: [{
					display: true,
					gridLines: {
						display : true
					},
					ticks: {
						display: true,
											
					},
					scaleLabel: {
								display: true,
								labelString: 'Publication Count'
							}
				}],
				xAxes: [{
					gridLines: {
						display : false
					},
					ticks: {
									},
					scaleLabel: {
								display: true,
								labelString: 'Year'
							}
				}]
			},	
			
				title: {
					display: true,
					text: ''
				},
				
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chartJSContainer7').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};
	</script>