
					
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Articles</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
												
												<?php
												
												$sno=0;
												  $a="";
												  $a=$a." article.uid";
												   if(isset($_GET["Title"]))
												   {
													   echo "<th>Title</th>";
													   $a=$a." ,article.title";
												   }
												   if(isset($_GET["author"]))
												   {
													   echo "<th>Author</th>";
												
												   }
												   if(isset($_GET["jc"]))
												   {
													   echo "<th>Journal/Conference</th>";
													   $a=$a." ,article.journal";
												   }
												   if(isset($_GET["doi"]))
												   {
													   echo "<th>DOI</th>";
													   $a=$a." ,article.doi";
												   }
												   if(isset($_GET["page"]))
												   {
													   echo "<th>Page</th>";
													   $a=$a." ,article.pages";
												   }
												   if(isset($_GET["volume"]))
												   {
													   echo "<th>Volume</th>";
													   $a=$a." ,article.volume";
												   }
												   if(isset($_GET["year"]))
												   {
													   echo "<th>Year</th>";
													   $a=$a." ,article.year";
												   }
												   if(isset($_GET["issn"]))
												   {
													   echo "<th>ISSN</th>";
													   $a=$a." ,article.issn";
												   }
												   if(isset($_GET["isbn"]))
												   {
													   echo "<th>ISBN</th>";
													   $a=$a." ,article.isbn";
												   }
												   if(isset($_GET["indexing"]))
												   {
													   echo "<th>Indexing</th>";
													   $a=$a." ,article.year";
												   }
												   if(isset($_GET["affiliation"]))
												   {
													   echo "<th>Affiliation</th>";
													   
												   }
												   if(isset($_GET["citation"]))
												   {
													   echo "<th>Citation</th>";
													  $a=$a." ,cite.cite";
												   }
												   
												?>
												
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                           <?php 
											include 'report_filter.php';?>
											
											<?php
										    	
											if(empty($where))
											{
												$query = "SELECT $a FROM article INNER JOIN cite on article.uid=cite.uid";
											}
											else
											{
												
												$query = "SELECT $a FROM article INNER JOIN cite on article.uid=cite.uid where ".$where;
											}
											
											if(!empty($dept))
											{
												$query = "select $a from article INNER join cite on article.uid=cite.uid where article.uid in (SELECT DISTINCT(author.uid) FROM `article` INNER JOIN author ON article.uid=author.uid where ".$where." )";
							
											}
											echo $query;
												$result = mysqli_query($connect, $query);
										   while($row1 = mysqli_fetch_array($result)):;
											$query1 = "SELECT * FROM author where uid='$row1[0]' ORDER by ord";
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
													
													endwhile;
											?>
											<tr>
											<td><?php echo $sno;?></td>
											<?php
												  $a="";
												  $b=1;
												   if(isset($_GET["Title"]))
												   {
													   echo "<td><a href='article.php?name=$row1[0]' > $row1[$b]</a></td>";
													   $b++;
													
												   }
												   if(isset($_GET["author"]))
												   {
													   echo "<td>$auth</td>";
													  
												   }
												   if(isset($_GET["jc"]))
												   {
													   echo "<td> $row1[$b]</td>";
													   $b++;
												   }
												   if(isset($_GET["doi"]))
												   {
													   echo "<td>$row1[$b]</td>";
													   $b++;
												   }
												   if(isset($_GET["page"]))
												   {
													   echo "<td> $row1[$b]</td>";
													   $b++;
												   }
												   if(isset($_GET["volume"]))
												   {
													  echo "<td> $row1[$b]</td>";
													   $b++;
												   }
												   if(isset($_GET["year"]))
												   {
													   echo "<td> $row1[$b]</td>";
													   $b++;
												   }
												   if(isset($_GET["issn"]))
												   {
													   echo "<td> $row1[$b]</td>";
													   $b++;
												   }
												   if(isset($_GET["isbn"]))
												   {
													   echo "<td> $row1[$b]</td>";
													   $b++;
												   }
												   if(isset($_GET["indexing"]))
												   {
													   echo "<th>Indexing</th>";
													   $b++;
												   }
												   if(isset($_GET["affiliation"]))
												   {
													  echo "<td> $affiliation</td>";
													   
													   
												   }
												   if(isset($_GET["citation"]))
												   {
													   echo "<td> $row1[$b]</td>";
													  $b++;
												   }
												?>
												</tr>
											<?php $sno=$sno+1;endwhile;?> 
                                          
                                          
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                    