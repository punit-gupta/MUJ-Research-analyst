<div class="col-lg-6">
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
                                              
												
												$hostname = "localhost";
                                                $username = "root";
                                                $password = "";
                                                $databaseName = "mujpub";
                                                $lable = "";
												$data="";
												$s=1;
                                                $connect = mysqli_connect($hostname, $username, $password, $databaseName);
                                                $query = "SELECT department,COUNT(DISTINCT uid), department FROM author where type='MUJ' GROUP by department";
												$query1 = "SELECT count(uid)  FROM article";
                                                $result1 = mysqli_query($connect, $query1);
												$sum=mysqli_fetch_array($result1);
												$sum1=$sum[0];
												$result = mysqli_query($connect, $query);
                                                     $rowcount=mysqli_num_rows($result);                                   
                                                while($row1 = mysqli_fetch_array($result)):;
													if($s==$rowcount)
													{$lable=$lable."\"".$row1[0]."\"";
												     $s=($row1[1]/$sum1)*100;
													 $data=$data.$s;
													 
													 }
													else
													{$lable=$lable."\"".$row1[0]."\",";
													 
													   $s=($row1[1]/$sum1)*100;
													 $data=$data.$s.",";
													 }
												   $s=$s+1;
                                                      endwhile;
                                              
										          mysqli_close($connect);
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
						getRandomInt(),
						getRandomInt(),
						getRandomInt(),
						getRandomInt(),
						getRandomInt(),
						getRandomInt(),
						getRandomInt(),
					
					],
					label: 'Dataset 1'
				}],
					labels: [<?php echo $lable?> ],
			},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};
</script>