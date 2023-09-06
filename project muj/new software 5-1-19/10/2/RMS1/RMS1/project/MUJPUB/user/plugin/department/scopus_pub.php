<div class="col-lg-4">
                        <div class="card">
                            <div class="card-title">
                                <h4>SCOPUS Publication  </h4>

                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Year</th>
                                                <th>SCOPUS Count</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                             
                                            
                                                $query = "SELECT year, COUNT(*) AS `num` FROM article where `index scopus` ='SCOPUS'  and uid in (SELECT DISTINCT uid FROM author where department='$dept') GROUP BY year";
                                                $result = mysqli_query($connect, $query);
                                              
												$total=0;
                                                while($row1 = mysqli_fetch_array($result)):;
												$total=$total+ $row1[1];
                                                   
                                                   ?> 
                                            <tr>
                                                <th scope="row"><?php echo $row1[0]; ?></th>
                                                <td class="color-primary"><a href='../user/selected2d.php?year=<?php echo $row1[0]; ?>&index=SCOPUS&dept=<?php echo $dept; ?>'><?php echo $row1[1]; ?></a></td>
                                                    
                                            </tr>
                                            
                                            <?php endwhile;  ?>
											<tr>
                                                <th scope="row">Total</th>
                                                <td class="color-primary"><?php echo $total; ?></td>
                                                    
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>