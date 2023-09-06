<div class="col-sm-10 col-md-6">
                        <div class="card">
                            <div class="card-title">
                              <h4>Publications</h4>

                            </div>
                            <div class="sales-chart">
                              <canvas id="singelBarChart12"></canvas>
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
                                                $a=1;
												$list = array();
												$scopus = array();
												$web = array();
                                                $query = "SELECT year, COUNT(*) AS `num` FROM article where uid in (SELECT DISTINCT uid FROM author where department='$dept' )  GROUP BY year";
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
													 $list[$a]=$row1[0];
													 $scopus[$a]=0;
													 $web[$a]=0;
												   $s=$s+1;
												   $a++;
                                                      endwhile;
												
											
												$query = "SELECT year, COUNT(*) AS `num` FROM article where `index scopus` ='SCOPUS'  and uid in (SELECT DISTINCT uid FROM author where department='$dept')  GROUP BY year";
												
                                                $result = mysqli_query($connect, $query);
                                                     $rowcount=mysqli_num_rows($result);                                   
                                                while($row1 = mysqli_fetch_array($result)):;
													$scopus[array_search($row1[0], $list)]=$row1[1];
                                                      endwhile;
													  
													  
												
											$query = "SELECT year, COUNT(*) AS `num` FROM article where `web`='WEB'  and uid in (SELECT DISTINCT uid FROM author where department='$dept')  GROUP BY year";
												
                                                $result = mysqli_query($connect, $query);
                                                     $rowcount=mysqli_num_rows($result);                                   
                                                while($row1 = mysqli_fetch_array($result)):;
													$web[array_search($row1[0], $list)]=$row1[1];
                                                      endwhile;	  
										
												$a=1;
										    for( $a=1;$a<count($web);$a++) 
											{ 
												if($a==1)
												{$data1=$scopus[$a];
													$data2=$web[$a];
													}
												else{
													$data1=$data1.",".$scopus[$a];
													$data2=$data2.",".$web[$a];
												}
											} 
											
											 
												?> 
                                           
                                            
                                    
											

   <script >( function ( $ ) {
	"use strict";

	// single bar chart
	var ctx = document.getElementById( "singelBarChart12" );
	ctx.height = 150;
	var myChart = new Chart( ctx, {
		type: 'bar',
		data: {
			labels: [<?php echo $lable?> ],
			datasets: [
				
							{
					label: "SCI/SCIE/ESCI",
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
