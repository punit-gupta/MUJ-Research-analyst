<html>
<body>
                
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="jquery.autocomplete.js"></script>
<style>
body{width:610px;}
.frmSearch {}
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}

</style>
<script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "readCountry.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>


<input type="text" id="search-box" placeholder="Country Name" />
<div id="suggesstion-box"></div>


	
<table border>
<tr style="width:100%">
<td width='50%'>
											
										<table>
                                        <thead>
                                            
                                        </thead>
										
										
										
											 <tbody>
											   
												<?php 
												$connect=mysqli_connect("localhost","root","","muj");
													$name = (isset($_GET["uid"]) && $_GET["uid"] != "" ? $_GET["uid"] : "");

									   
									
													$sno = 1;
													
													$query = "SELECT * FROM article where uid='$name'";
													$result = mysqli_query($connect, $query);
												$url="";
												while($row1 = mysqli_fetch_array($result)):;
												     $url=$row1[7];
												?>
												<div class="input-group input-group-rounded">
												
												  <tr> <td>Title</td> 				<td><input class="form-control"type="text" name="title" value="<?php echo $row1[1];?>" size="45"></td></tr>
												  <tr> <td>doi</td> 				<td><input class="form-control"type="text" name="doi" value="<?php echo $row1[6];?>" size="45"></td></tr>
												   <tr> <td>URLS</td> 				<td><a href="<?php echo $row1[7];?>" onclick="return popitup('<?php echo $row1[7];?>')" ><?php echo $row1[7];?></a></td></tr>
    											  <tr> <td>Affiliation</td> 		<td><textarea rows="4" cols="50" align="center"><?php echo $row1[8];?></textarea ></td></tr>
												
												<form action = "update_dept3.php" method = "GET" align=center>
												 <?php
												 $query1 = "SELECT * FROM author where uid='$row1[27]'";
														$result1 = mysqli_query($connect, $query1);
														$auth='';
														 $rowcount=mysqli_num_rows($result1);
														 $o=0;
														while($row2 = mysqli_fetch_array($result1)):;
																											
														$auth=$row2[0];
														$o=$o+1;
													?>	
														
												  <tr>
												  <td><?php echo $auth;?></td>
												  <td>
												  <?php
												  $a=$row2[2];?>
										  <div class="input-group input-group-rounded">		
										<input type="hidden"  name="uid" value="<?php echo $row1[27];?>" >
										  
										  <input type="hidden"  name="aname<?php echo $o;?>" value="<?php echo $auth;?>">
										  <table>
										  <tr><td>
										  <select onchange="val<?php echo $o;?>()" id="dept<?php echo $o;?>1" name="dept<?php echo $o;?>" class="form-control input-rounded">
													
													<option value="NA"  >Other</option>
													<?php 
													
													 $query = "SELECT * FROM `departments` "; 
													 $result = mysqli_query($connect, $query);
                                                                                       
														while($row1 = mysqli_fetch_array($result)):;
													  echo "<option value='".$row1[0]."' >".$row1[0]."</option>";
                                                      endwhile;
													
													?>
													</select>
													
      
  
													</td></tr>
													<tr><td>
																								
													  <input type="text" id="name<?php echo $o;?>1" name="typeahead" class="typeahead tt-query" autocomplete="off" spellcheck="false"  placeholder="Type your Query"></td></tr>
													<tr><td>
													<input type="text" id="aname<?php echo $o;?>1" name="aname<?php echo $o;?>1" value="<?php echo $row2[2];?>" style="width:100%;">
													</td></tr>
													</table>
												<script>
												document.getElementById('name<?php echo $o;?>1').style.display = 'none';
												
												function val<?php echo $o;?>() {
													d = document.getElementById("dept<?php echo $o;?>1").value;
												
													 if (d.localeCompare("NA")) {
																document.getElementById('aname<?php echo $o;?>1').style.display = 'none';
																document.getElementById('name<?php echo $o;?>1').style.display = 'block';
															}
															else 
															document.getElementById('aname<?php echo $o;?>1').style.display = 'block';
															
														}
												</script>
										 
										
										  </div>
										</td>
												  </tr>
												<?php 
												$dept=array("","","","","","","","","","","","","","","","","","","","","","","","","");
												endwhile;
												 ?>
												 <input type="hidden"  name="count" value="<?php echo $o;?>">
												 <input type="submit" class="btn btn-primary m-b-10 m-l-5" value="Insert">
												 </form>
												</div>
												
									   <?php ;endwhile;?> 
												
												 
											</tbody>
												
										</table>

</td>
<td>
								<iframe src='<?php echo $url;?>' width="100%" height="100%">
							<p>Your browser does not support iframes.</p>
							</iframe>
							</td>
</tr>

</table>
</body>
<html>
