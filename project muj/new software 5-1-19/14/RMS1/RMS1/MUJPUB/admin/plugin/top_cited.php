<div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Top 5 Cited Articles</h4>

                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Article Citation</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                            
                                                $query = "SELECT * FROM article INNER JOIN cite on article.uid=cite.uid ORDER BY `cite`.`cite` DESC LIMIT 5";
                                                $result = mysqli_query($connect, $query);
                                              
												$rowcount=mysqli_num_rows($result);
                                                while($rowcount>=1 & $row1 = mysqli_fetch_array($result)):;
													$dept=$row1[1];
													$dept=str_replace(" ","%20",$dept);
													$dept=str_replace("&","%26",$dept);
                                                   $rowcount--;
                                                   ?> 
                                            <tr>
                                               <td scope="row"><a href='article.php?name=<?php echo $row1[27];?>'><?php echo $row1['title']; ?> (<?php echo $row1['year']; ?>)</a></td>
											   
                                                <td class="color-primary"><?php echo $row1['cite']; ?></td>
                                                    
                                            </tr>
                                            
                                            <?php endwhile;  ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>	