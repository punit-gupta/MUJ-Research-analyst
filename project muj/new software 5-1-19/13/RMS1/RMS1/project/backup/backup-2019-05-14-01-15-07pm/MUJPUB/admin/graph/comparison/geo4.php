			<div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                              <h4>Collaboration and links Over Oceans</h4>

                            </div>
                            <div class="sales-chart">
                              <div id="chartdiv"></div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
	
	<script src="graph/contribution/core.js"></script>
	<script src="graph/contribution/maps.js"></script>
    <script src="graph/contribution/charts.js"></script>
    <script src="graph/contribution/themes/animated.js"></script>	
 <script src="graph/contribution/geodata/worldLow.js"></script>	
					
<?php
                                                $lable = "";
												$data="";
												$s=1;
                                                $result1 = mysqli_query($connect, "SELECT SUM(count) FROM `country` ");
												$sum=mysqli_fetch_row($result1);
												$sum1=$sum[0];
												
												
                                                $query = "SELECT *FROM `country` where count > 0 ";
                                                $result = mysqli_query($connect, $query);
                                                                                      
                                                while($row1 = mysqli_fetch_array($result)):;
													
													 $lable=$lable." ,{ 'svgPath': targetSVG, 'title':'".$row1[0]."','latitude': ".$row1[3].",'longitude': ".$row1[4].",'scale': 0.5}";
													 $data=$data."{
														  \"multiGeoLine\": [
															[
															  { \"latitude\": 20, \"longitude\": 77 },
															  { \"latitude\":".$row1[3].", \"longitude\":".$row1[4]." }
															]
														  ]
														},";
													 
                                                      endwhile;
													 
												?> 
                                           
                                  

<!-- Chart code -->
<script>
/**
 * ---------------------------------------
 * This demo was created using amCharts 4.
 * 
 * For more information visit:
 * https://www.amcharts.com/
 * 
 * Documentation is available at:
 * https://www.amcharts.com/docs/v4/
 * ---------------------------------------
 */

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Define marker path
var targetSVG = "M9,0C4.029,0,0,4.029,0,9s4.029,9,9,9s9-4.029,9-9S13.971,0,9,0z M9,15.93 c-3.83,0-6.93-3.1-6.93-6.93S5.17,2.07,9,2.07s6.93,3.1,6.93,6.93S12.83,15.93,9,15.93 M12.5,9c0,1.933-1.567,3.5-3.5,3.5S5.5,10.933,5.5,9S7.067,5.5,9,5.5 S12.5,7.067,12.5,9z";

// Create map instance
var chart = am4core.create("chartdiv", am4maps.MapChart);
var interfaceColors = new am4core.InterfaceColorSet();

// Set map definition
chart.geodata = am4geodata_worldLow;

// Set projection
chart.projection = new am4maps.projections.Mercator();

// Add zoom control
chart.zoomControl = new am4maps.ZoomControl();

// Set initial zoom
chart.homeZoomLevel = 1.5;
chart.homeGeoPoint = {
  latitude: 27,
  longitude: 30
};

// Create map polygon series
var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());
polygonSeries.exclude = ["AQ"];
polygonSeries.useGeodata = true;
polygonSeries.mapPolygons.template.nonScalingStroke = true;

// Add images
var imageSeries = chart.series.push(new am4maps.MapImageSeries());
var imageTemplate = imageSeries.mapImages.template;
imageTemplate.tooltipText = "{title}";
imageTemplate.nonScaling = true;

var marker = imageTemplate.createChild(am4core.Sprite);
marker.path = targetSVG;
marker.horizontalCenter = "middle";
marker.verticalCenter = "middle";
marker.scale = 0.7;
marker.fill = interfaceColors.getFor("alternativeBackground");

imageTemplate.propertyFields.latitude = "latitude";
imageTemplate.propertyFields.longitude = "longitude";
imageSeries.data = [<?php echo $lable;?> ];

// Add lines
var lineSeries = chart.series.push(new am4maps.MapLineSeries());
lineSeries.dataFields.multiGeoLine = "multiGeoLine";

var lineTemplate = lineSeries.mapLines.template;
lineTemplate.nonScalingStroke = true;
lineTemplate.arrow.nonScaling = true;
lineTemplate.arrow.width = 4;
lineTemplate.arrow.height = 6;
lineTemplate.stroke = interfaceColors.getFor("alternativeBackground");
lineTemplate.fill = interfaceColors.getFor("alternativeBackground");
lineTemplate.line.strokeOpacity = 0.4;

lineSeries.data = [<?php echo $data;?>];
</script>
