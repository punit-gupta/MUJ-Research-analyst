<div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Document Type</h4>
                            </div>
							 <div class="sales-chart">
                              <div id="chartdiv11"></div>
                            </div>
                           
                        </div>
                        <!-- /# card -->
                    </div>
					<style>
					#chartdiv11 {
  width: 100%;
  max-height: 600px;
  height: 100vh;
}
					</style>
    <script src="graph/contribution/core.js"></script>
    <script src="graph/contribution/charts.js"></script>
    <script src="graph/contribution/themes/animated.js"></script>
    
					
					<?php
                                              
												
											
                                                $lable = "";
												$data="";
												$s1=1;
												$s2=1;
                                                $color="";
                                                $query = "SELECT document_type, COUNT(uid) FROM `article` GROUP BY document_type ORDER BY `COUNT(uid)` DESC ";
												$query1 = "select count(article.uid) from article";
                                                $result1 = mysqli_query($connect, $query1);
												$sum=mysqli_fetch_row($result1);
												$sum1=$sum[0];
												//echo $sum1."-";
												$result = mysqli_query($connect, $query);
                                                     $rowcount=mysqli_num_rows($result);                                   
                                                while($row1 = mysqli_fetch_array($result)):;
													if($s1==$rowcount)
													{
												     $s=($row1[1]/$sum1)*100;
													 $lable=$lable."{ 'country':'".$row1[0]."', 'litres': ".$s."},";
													 }
													else
													{$lable=$lable."\"".$row1[0]."\",";
													 
													   $s=($row1[1]/$sum1)*100;
													
													 $lable=$lable."{ 'country':'".$row1[0]."', 'litres': ".$s."},";
													 }
													
												   $s1=$s1+1;
												   $s2=$s2+$s;
                                                      endwhile;
                                             
										          
												?> 
                                           
                                            
                                    
											

   <script >	
   
   am4core.useTheme(am4themes_animated);

var chart = am4core.create("chartdiv11", am4charts.PieChart3D);


chart.legend = new am4charts.Legend();
chart.colors.saturation = 0.3;
chart.data = [<?php echo $lable; ?>];

chart.innerRadius = am4core.percent(40);

var series = chart.series.push(new am4charts.PieSeries3D());
series.dataFields.value = "litres";
series.dataFields.category = "country";
</script>