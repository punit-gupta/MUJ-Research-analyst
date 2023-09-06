<div class="col-lg-10">
                        <div class="card">
                            <div class="card-title">
                                <h4>Department Contribution</h4>
                            </div>
							 <div class="sales-chart">
                              <canvas id="chart-area"></canvas>
                            </div>
                           
                        </div>
                        <!-- /# card -->
                    </div>
					
					<?php
                                              
												
											
                                                $lable = "";
												$data="";
												$s1=1;
												$s2=1;
                                                $color="";
                                                $query = "SELECT department,COUNT(DISTINCT uid), department FROM author where type='MUJ' GROUP by department";
												$query1 = "select count(article.uid) from article ";
                                                $result1 = mysqli_query($connect, $query1);
												$sum=mysqli_fetch_row($result1);
												$sum1=$sum[0];
												//echo $sum1."-";
												$result = mysqli_query($connect, $query);
                                                     $rowcount=mysqli_num_rows($result);                                   
                                                while($row1 = mysqli_fetch_array($result)):;
													if($s1==$rowcount)
													{$lable=$lable."\"".$row1[0]."\"";
												     $s=($row1[1]/$sum1)*100;
													 $data=$data.$s;
													 
													 }
													else
													{$lable=$lable."\"".$row1[0]."\",";
													 
													   $s=($row1[1]/$sum1)*100;
													 $data=$data.$s.",";
													 }
													 $color=$color."getRandomInt(),";
												   $s1=$s1+1;
												   $s2=$s2+$s;
                                                      endwhile;
                                             // echo $s2;
										          
												?> 
                                           
                                            
                                    
											

   <script >	
   function getRandomInt() {
   
   var letters = "0123456789ABCDEF"; 
  
    // html color code starts with # 
    var color = '#'; 
  
    // generating 6 times as HTML color code consist 
    // of 6 letter or digits 
    for (var i = 0; i < 6; i++) 
       color += letters[(Math.floor(Math.random() * 16))]; 
   

	return color;
	
}
   var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: [<?php echo $data?>],
					backgroundColor: [
						<?php echo $color;?>
					
					],
					
				}],
					labels: [<?php echo $lable?> ],
			},
			options: {responsive: true,
         legend: {
            display: true, position: 'bottom',
         },
         tooltips: {
            enabled: true
         }
				
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};
</script>