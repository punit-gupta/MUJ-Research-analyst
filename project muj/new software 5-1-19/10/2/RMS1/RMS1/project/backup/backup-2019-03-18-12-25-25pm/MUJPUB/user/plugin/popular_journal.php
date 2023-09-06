<div class="col-lg-4">
                        <div class="card">
                            <div class="card-title">
                                <h4>Popular Journals</h4>

                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>Journal</th>
                                                <th>Count</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                
                                                $query = "SELECT journal, COUNT(journal)as count FROM `article` GROUP BY journal ORDER BY `COUNT(journal)` count> 4 where DESC";
                                                $result = mysqli_query($connect, $query);
                                              
                                             
                                             $total=0;
                                                while($row1 = mysqli_fetch_array($result)):;
												$total=$total+ $row1[1];

                                                   
                                                   ?> 
                                            <tr>
                                                <th scope="row"><?php echo $row1[0]; ?></th>
                                                <td ><a href='../user/selected2.php?year=<?php echo $row1[0]; ?>&index=SCI' ><?php echo $row1[1]; ?></a></td>
                                                    
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