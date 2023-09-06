			<div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                              <h4>Top 15 Affiliations</h4>

                            </div>
                            <div class="sales-chart">
                              <div id="chartdiv1"></div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
					
					<style>
					#chartdiv1 {
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
												$s=1;
                                                
                                                $query = "SELECT * FROM collaborators ORDER BY `collaborators`.`count`  DESC LIMIT 15";
                                                $result = mysqli_query($connect, $query);
                                                     $rowcount=mysqli_num_rows($result);                                   
                                                while($row1 = mysqli_fetch_array($result)):;
													
													 $lable=$lable."{ 'country':'".$row1[0]."', 'visits': ".$row1[2]."},";
												   $s=$s+1;
                                                      endwhile;
                                               
										
												?> 
                                           
                                            
                                    
											

   <script >am4core.useTheme(am4themes_animated);

var chart = am4core.create("chartdiv1", am4charts.XYChart);


chart.colors.saturation = 0.4;

chart.data = [<?php echo $lable; ?>];


var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.minGridDistance = 20;

var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.maxLabelPosition = 0.98;

var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.categoryY = "country";
series.dataFields.valueX = "visits";
series.tooltipText = "{valueX.value}";
series.sequencedInterpolation = true;
series.defaultState.transitionDuration = 1000;
series.sequencedInterpolationDelay = 100;
series.columns.template.strokeOpacity = 0;

chart.cursor = new am4charts.XYCursor();
chart.cursor.behavior = "panY";


// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
series.columns.template.adapter.add("fill", function (fill, target) {
	return chart.colors.getIndex(target.dataItem.index);
});
</script>