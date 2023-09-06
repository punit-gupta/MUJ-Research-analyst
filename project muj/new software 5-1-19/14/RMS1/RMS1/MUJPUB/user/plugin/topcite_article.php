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
                                               
                                                $query = "SELECT article.title, cite.cite FROM `cite` CROSS JOIN article WHERE cite.uid=article.uid and cite.cite>30 ORDER BY `cite`.`cite`";
                                                $result = mysqli_query($connect, $query);
                                              
												$i=1;
                                                while($i<6):;
													$row1 = mysqli_fetch_array($result);
                                                   $i=$i+1;
                                                   ?> 
                                            <tr>
                                                <th scope="row"><?php echo $row1[0]; ?></th>
												<form id="myForm<?php echo $sno;?>" action="../user/page10.php" method="POST">
												<input type="hidden" name="name1" id="hiddenField" value="<?php echo $row1[0];?>"/>
												<input type="hidden" name="field" id="hiddenField" value="author"/>
												<td> <a href="#" onclick="document.getElementById('myForm<?php echo $sno;?>').submit();"><?php echo $row1[1];?></a></td>
												</form>
											
                                                
                                                    
                                            </tr>
                                            
                                            <?php $sno=$sno+1; endwhile;  ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>						