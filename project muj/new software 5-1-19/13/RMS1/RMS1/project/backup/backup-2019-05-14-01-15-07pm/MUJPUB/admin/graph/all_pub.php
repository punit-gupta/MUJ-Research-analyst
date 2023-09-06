<div class="col-sm-12 col-md-8">
                        <div class="card">
                            <div class="card-title">
                              <h4>Publications</h4>

                            </div>
                            <div class="sales-chart">
                              <canvas id="singelBarChart"></canvas>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
					


   
<?php
                                                
                                                $lable = "";
												$data="";
												$data1="";
												$data2="";
												$s=1;
                                                
                                                $query = "SELECT year, COUNT(*) AS `num` FROM article GROUP BY year";
                                                $result = mysqli_query($connect, $query);
                                                     $rowcount=mysqli_num_rows($result);                                   
                                                while($row1 = mysqli_fetch_array($result)):;
													if($s==$rowcount)
													{$lable=$lable."\"".$row1[0]."\"";
												     $data=$data.$row1[1];}
													else
													{$lable=$lable."\"".$row1[0]."\",";
													 $data=$data.$row1[1].",";
													 }
												   $s=$s+1;
                                                      endwhile;
												
												$query = "SELECT year, COUNT(*) AS `num` FROM article where `index scopus`='SCOPUS' GROUP BY year";
                                                $result = mysqli_query($connect, $query);
                                                     $rowcount=mysqli_num_rows($result);                                   
                                                while($row1 = mysqli_fetch_array($result)):;
													if($s==$rowcount)
													{
												     $data1=$data1.$row1[1];}
													else
													{
													 $data1=$data1.$row1[1].",";
													 }
												   $s=$s+1;
                                                      endwhile;
													  
													  
												$query = "SELECT year, COUNT(*) AS `num` FROM article where `index SCI`='SCI' GROUP BY year";
                                                $result = mysqli_query($connect, $query);
                                                     $rowcount=mysqli_num_rows($result);                                   
                                                while($row1 = mysqli_fetch_array($result)):;
													if($s==$rowcount)
													{
												     $data2=$data2.$row1[1];}
													else
													{
													 $data2=$data2.$row1[1].",";
													 }
												   $s=$s+1;
                                                      endwhile;	  
										
												?> 
                                           
                                            
                                    
											

   <script >( function ( $ ) {
	"use strict";

	// single bar chart
	var ctx = document.getElementById( "singelBarChart" );
	ctx.height = 150;
	var myChart = new Chart( ctx, {
		type: 'bar',
		data: {
			labels: [<?php echo $lable?> ],
			datasets: [
				
							{
					label: "SCI/ESCI/SCIE",
					data: [<?php echo $data2?>],
					borderColor: "rgba(0, 123, 0, 0.9)",
					borderWidth: "0",
					backgroundColor: "rgba(0, 123, 0, 0.5)"
                            },
							{
					label: "SCOPUS",
					data: [<?php echo $data1?>],
					borderColor: "rgba(0, 0, 255, 0.9)",
					borderWidth: "0",
					backgroundColor: "rgba(0, 0, 255, 0.5)"
                            },
							{
					label: "Total",
					data: [<?php echo $data?>],
					borderColor: "rgba(123, 0, 0, 0.9)",
					borderWidth: "0",
					backgroundColor: "rgba(123,0, 0, 0.5)"
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


} )( jQuery );
</script>
