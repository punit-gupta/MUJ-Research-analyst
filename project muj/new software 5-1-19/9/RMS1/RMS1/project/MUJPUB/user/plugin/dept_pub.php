<div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Department Publication </h4>

                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Department</th>
                                                <th>Article Count</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                            
                                                $query = "SELECT COUNT(DISTINCT uid), department FROM author where type='MUJ' GROUP by department";
                                                $result = mysqli_query($connect, $query);
                                              
												$rowcount=mysqli_num_rows($result);
                                                while($rowcount>=1 & $row1 = mysqli_fetch_array($result)):;
													$dept=$row1[1];
													$dept=str_replace(" ","%20",$dept);
													$dept=str_replace("&","%26",$dept);
                                                   $rowcount--;
                                                   ?> 
                                            <tr>
                                               
                                                  <td class="color-primary"><a href='../user/department.php?dept=<?php echo $dept; ?>'><?php echo $row1[1]; ?></a></td>
												   <th scope="row"><?php echo $row1[0]; ?></th>
                                                    
                                            </tr>
                                            
                                            <?php endwhile;  ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>	