			<div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                              <h4>Collaboration Over Oceans</h4>

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
	<script src="graph/contribution/maps.js"></script>
    <script src="graph/contribution/charts.js"></script>
    <script src="graph/contribution/themes/animated.js"></script>	
 <script src="graph/contribution/geodata/worldLow.js"></script>	
					
<?php
                                                $lable = "";
												$data="";
												$s=1;
                                                $result1 = mysqli_query($connect, "SELECT SUM(count) FROM `country`");
												$sum=mysqli_fetch_row($result1);
												$sum1=$sum[0];
												
												
                                                $query = "SELECT * FROM country";
                                                $result = mysqli_query($connect, $query);
                                                     $rowcount=mysqli_num_rows($result);                                   
                                                while($row1 = mysqli_fetch_array($result)):;
													 
													
													if($row1[1]>0)
													 {$s=100;
														//echo$row1[0]."=". $row1[2]."=".$row1[1]."<br>";
														}
														else
														{$s=rand(10,40);
														 	
														}
													
													 $lable=$lable."{ id:'".$row1[2]."', value: ".$s."},";
													 
                                                      endwhile;
												?> 
                                           
                                            
                                    
											

   <script >am4core.useTheme(am4themes_animated);

var chart = am4core.create("chartdiv1", am4maps.MapChart);


try {
    chart.geodata = am4geodata_worldLow;
}
catch (e) {
    chart.raiseCriticalError(new Error("Map geodata could not be loaded. Please download the latest <a href=\"https://www.amcharts.com/download/download-v4/\">amcharts geodata</a> and extract its contents into the same directory as your amCharts files."));
}


chart.projection = new am4maps.projections.Miller();

var title = chart.chartContainer.createChild(am4core.Label);
title.text = "Coolaboration Over Oceans";
title.fontSize = 20;
title.paddingTop = 30;
title.align = "center";

var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());
var polygonTemplate = polygonSeries.mapPolygons.template;
polygonTemplate.tooltipText = "{name}:{value.value}";
polygonSeries.useGeodata = true;
polygonSeries.heatRules.push({ property: "fill", target: polygonSeries.mapPolygons.template, min: am4core.color("#ffffff"), max: am4core.color("#0000FF") });


/*add heat legend
var heatLegend = chart.chartContainer.createChild(am4maps.HeatLegend);
heatLegend.valign = "bottom";
heatLegend.series = polygonSeries;
heatLegend.width = am4core.percent(100);
heatLegend.orientation = "horizontal";
heatLegend.padding(30, 30, 30, 30);
heatLegend.valueAxis.renderer.labels.template.fontSize = 10;
heatLegend.valueAxis.renderer.minGridDistance = 40;
*/
polygonSeries.mapPolygons.template.events.on("over", function (event) {
  handleHover(event.target);
})

polygonSeries.mapPolygons.template.events.on("hit", function (event) {
  handleHover(event.target);
})

function handleHover(mapPolygon) {
  if (!isNaN(mapPolygon.dataItem.value)) {
    heatLegend.valueAxis.showTooltipAt(mapPolygon.dataItem.value)
  }
  else {
    heatLegend.valueAxis.hideTooltip();
  }
}

polygonSeries.mapPolygons.template.events.on("out", function (event) {
  heatLegend.valueAxis.hideTooltip();
})


// life expectancy data

polygonSeries.data = [<?php echo $lable;?> ];

// excludes Antarctica
polygonSeries.exclude = ["AQ"];

</script>