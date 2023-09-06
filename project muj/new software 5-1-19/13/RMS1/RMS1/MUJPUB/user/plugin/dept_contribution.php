<div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Department Contribution</h4>

                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>Department</th>
                                                <th>Contribution</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                
                                                $query = "SELECT department,COUNT(DISTINCT uid) FROM author where type='MUJ' GROUP by department ORDER BY `COUNT(DISTINCT uid)` DESC";
                                                $result = mysqli_query($connect, $query);
												
												$query1 = "select count(article.uid) from article ";
                                                $result1 = mysqli_query($connect, $query1);
												$sum=mysqli_fetch_row($result1);
												$sum1=$sum[0];
                                             
												$total=0;
                                                while($row1 = mysqli_fetch_array($result)):;
												$total=$total+ $row1[1];
													$dept=str_replace(" ","%20",$row1[0]);
													$dept=str_replace("&","%26",$row1[0]);
                                                   ?> 
                                            <tr>
                                                <th scope="row"><a href='../user/department.php?dept=<?php echo $dept; ?>'><?php echo $row1[0]; ?></a></th>
                                                <td ><?php echo number_format(($row1[1]/$sum1)*100,2,'.', ''); ?>%</td>
                                                    
                                            </tr>
                                            
                                            <?php endwhile;  ?>
											
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>	