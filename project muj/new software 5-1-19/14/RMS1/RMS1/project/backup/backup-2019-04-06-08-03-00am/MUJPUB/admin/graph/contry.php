			<div class="col-lg-8">
                        <div class="card">
                            <div class="card-title">
                              <h4>Top 15 Country Collaboration</h4>

                            </div>
                            <div class="sales-chart">
                              
							<canvas id="bar-chart-horizontal12" width="800" height="450"></canvas>

                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
					
				
<?php
                                                $lable = "";
												$data="";
												$s=1;
                                                
                                                $query = "SELECT * FROM `country` where count>0 ORDER BY `country`.`count` DESC LIMIT 15 ";
                                               
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
                                               
										
												?> 
                                           
                                            
                                    
											

   <script >var myChart = new Chart(document.getElementById("bar-chart-horizontal12"), {
        type: 'horizontalBar',
        data: {
          labels: [<?php echo $lable;?>],
          datasets: [
            {
              label: "Publication:",
              borderColor: "rgba(0,0,255, 0.9)",
					borderWidth: "0",
					backgroundColor: "rgba(0,0,255, 0.5)",
              data: [<?php echo $data;?>]
            }
          ]
        },
        options: {
          legend: { display: false },
         
        }
    });
</script>
