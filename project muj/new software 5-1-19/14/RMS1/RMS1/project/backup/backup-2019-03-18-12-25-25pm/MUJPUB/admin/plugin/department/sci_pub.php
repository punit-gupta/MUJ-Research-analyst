<div class="col-lg-4">
                        <div class="card">
                            <div class="card-title">
                                <h4>SCI/ESCI/SCIE Publication</h4>

                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>Year</th>
                                                <th>Count</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                             
                                                $query = "SELECT year, COUNT(*) AS `num` FROM article where `index SCI` ='SCI'  and uid in (SELECT DISTINCT uid FROM author where department='$dept')  GROUP BY year";
                                                $result = mysqli_query($connect, $query);
                                              
                                             
                                             $total=0;
                                                while($row1 = mysqli_fetch_array($result)):;
												$total=$total+ $row1[1];

                                                   
                                                   ?> 
                                            <tr>
                                                <th scope="row"><?php echo $row1[0]; ?></th>
                                                <td ><a href='../admin/selected2d.php?year=<?php echo $row1[0]; ?>&index=SCI&dept=<?php echo $dept; ?>'><?php echo $row1[1]; ?></a></td>
                                                    
                                            </tr>
                                            
                                            <?php endwhile;  ?>
											<tr>
                                                <th scope="row">Total</th>
                                                <td class="color-primary"><span class="badge badge-primary">&nbsp;<?php echo $total; ?>&nbsp;</span></td>
                                                    
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>	