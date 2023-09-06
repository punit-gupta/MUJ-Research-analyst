										<?php include 'database_conf.php';	  ?>

										
                                           <?php 
											include 'report_filter.php';
											
											
											
											
											
											?>
											
											<?php
										    	
											if(empty($where))
											{
												$query = "SELECT * FROM article INNER JOIN cite on article.uid=cite.uid";
											}
											else
											{
												
												$query = "SELECT * FROM article INNER JOIN cite on article.uid=cite.uid where ".$where;
												
											}
											
											if(!empty($dept)|| !empty($dept1)||!empty($auth))
											{
												$query = "select * from article INNER join cite on article.uid=cite.uid where article.uid in (SELECT DISTINCT(author.uid) FROM `article` INNER JOIN author ON article.uid=author.uid where ".$where." )";
							
											}
											
											
											
											//echo $query;
												$result = mysqli_query($connect, $query);
										  
											?>
							<style>
							.esum{
								display:list-item;
								margin-left:1.5em;
								list-style-type:decimal;
							}
							
							</style>
							<div id="editsum"> 
							 <?php  while($row1 = mysqli_fetch_array($result)):;
											$query1 = "SELECT * FROM author where uid='$row1[27]' ORDER by ord";
													$result1 = mysqli_query($connect, $query1);
													$auth='';
													$affiliation='';
													 $rowcount=mysqli_num_rows($result1);
													 $o=1;
													while($row2 = mysqli_fetch_array($result1)):;
														if($rowcount==$o &$rowcount!=1 )
													{
													$auth=$auth."and ".$row2[0];
													$affiliation=$affiliation."and ".$row2[2];
													}
													else if($o==1)
													{
												     $auth=$row2[0];
													 $affiliation=$row2[2];
													 }
													else
													{$auth=$auth.",".$row2[0];
													 $affiliation=$affiliation.",".$row2[2];
													}
													$o++;
													
													endwhile;?>			
                            <div class="esum">
                              <h6 align="justify">   <?php echo $auth;?>."<?php echo $row1[1];?>".<?php echo $row1[2];?>.<?php echo $row1[3];?>,<?php echo $row1[4];?>,pp.<?php echo $row1[5];?>.  <a href='article.php?name=<?php echo $row1[27];?>' ><span class="badge badge-success">Link</span><span style="color:orange"><?php if($row1['cite']>0) echo "SCOPUS Cite.(".$row1['cite'].")";?></span></a>
							</h6>
							</div>
							<?php endwhile;?> 
							</div>