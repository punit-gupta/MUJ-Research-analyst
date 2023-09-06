<div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Collaborations</h4>
                                <div class="card-title-right-icon">
                                    <ul>

                                    </ul>
                                </div>
                            </div>
                            <div class="Vector-map-js">
                                <div id="vmap" class="vmap"></div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
					<?php
                                                $lable = "";
												$data="";
												$s=1;
                                                $result1 = mysqli_query($connect, "SELECT SUM(count) FROM `country`");
												$sum=mysqli_fetch_row($result1);
												$sum1=$sum[0];
												
												
                                                $query = "SELECT * FROM country where count>0";
                                                $result = mysqli_query($connect, $query);
                                                     $rowcount=mysqli_num_rows($result);                                   
                                                while($row1 = mysqli_fetch_array($result)):;
													 $sa=strtolower($row1[2]) ;
													 $lable=$lable."'".$sa."':'".$row1[1]."',";
													 
                                                      endwhile;
												?> 

					
					
	<link href="css/lib/vector-map/jqvmap.min.css" rel="stylesheet">			
	<script src="js/lib/vector-map/jquery.vmap.js"></script>
    <!-- scripit init-->
    <script src="js/lib/vector-map/jquery.vmap.min.js"></script>
    <!-- scripit init-->
    <script >var sample_data = {<?php echo $lable;?>};</script>
    <!-- scripit init-->
    <script src="js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <!-- scripit init-->
	
    <!-- scripit init-->
    <script src="js/lib/vector-map/vector.init.js"></script>