<div class="col-lg-4">
                        <div class="card">
                            <div class="card-title">
                                <h4>Top 5 Authors </h4>

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
                                                
                                            
                                                $query = "SELECT author,emp, COUNT(*) AS `num` FROM author where department!='NA'  and uid in (SELECT DISTINCT uid FROM author where department='$dept') and type='MUJ' GROUP BY author order by num desc LIMIT 5";
                                                $result = mysqli_query($connect, $query);
                                              
												$i=1;
                                                while($row1 = mysqli_fetch_array($result)):;
												   ?> 
                                            <tr>
                                                <th scope="row"><?php echo $row1[0]; ?></th>
												
											
                                                <td> <a href="profile.php?id=<?php echo $row1["emp"];?>" ><?php echo $row1[2];?></a></td>
                                                    
                                            </tr>
                                            
                                            <?php $sno=$sno+1; endwhile;  ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>						