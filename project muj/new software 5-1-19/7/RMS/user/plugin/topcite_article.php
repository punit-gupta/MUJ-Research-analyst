<div class="col-lg-4">
                        <div class="card">
                            <div class="card-title">
                                <h4>Top 5 Cited Articles </h4>

                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Authors</th>
                                                <th>Count</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $hostname = "localhost";
                                                $username = "root";
                                                $password = "";
                                                $databaseName = "mujpub";
                                                $sno = 1;
                                                $connect = mysqli_connect($hostname, $username, $password, $databaseName);
                                            
                                                $query = "SELECT article.title, cite.cite ,article.uid FROM `cite` CROSS JOIN article WHERE cite.uid=article.uid and cite.cite>30 ORDER BY `cite`.`cite`";
                                                $result = mysqli_query($connect, $query);
                                              
												$i=1;
                                                while($i<6):;
													$row1 = mysqli_fetch_array($result);
                                                   $i=$i+1;
                                                   ?> 
                                            <tr>
                                                <th scope="row"><?php echo $row1[0]; ?></th>
												<form id="myForm<?php echo $sno;?>" action="../user/article.php" method="get">
												<input type="hidden" name="name" id="hiddenField" value="<?php echo $row1[27];?>"/>
											
												<td> <a href="../user/article.php?name=<?php echo $row1[2];?>"><?php echo $row1[1];?></a></td>
												
											
                                                
                                                    
                                            </tr>
                                            
                                            <?php $sno=$sno+1; endwhile;  ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>						