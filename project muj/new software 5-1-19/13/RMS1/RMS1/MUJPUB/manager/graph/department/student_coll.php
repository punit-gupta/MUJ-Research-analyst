<div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Student Collaboration</h4>
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
                                                
												$query1 = "select count(article.uid) from article INNER join cite on article.uid=cite.uid where article.uid in (SELECT DISTINCT(author.uid) FROM `article` INNER JOIN author ON article.uid=author.uid where type='MUJ' and department='$dept' )";
                                                $result1 = mysqli_query($connect, $query1);
												$sum=mysqli_fetch_row($result1);
												$sum1=$sum[0];
												//echo $sum1."-";
												
												$query1 = "select count(article.uid) from article INNER join cite on article.uid=cite.uid where article.uid in (SELECT DISTINCT(author.uid) FROM `article` INNER JOIN author ON article.uid=author.uid where type='MUJ' and department='$dept'and emp='student' )";
                                                $result1 = mysqli_query($connect, $query1);
												$sum=mysqli_fetch_row($result1);
												$lable1=$sum[0];
												
												$lable2=$sum1-$lable1;
                                               // echo $sum1."-".$lable2."-".$lable1;
										          
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
					data: [<?php echo $lable1?>,<?php echo $lable2?>],
					backgroundColor: [
						getRandomInt(),getRandomInt()
					
					],
					
				}],
					labels: ["Student","faculty" ],
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