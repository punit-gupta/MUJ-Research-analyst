<div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Top 5 Authors </h4>

                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
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
                                                $databaseName = "mujpub1";
                                                $sno = 1;
                                                $connect = mysqli_connect($hostname, $username, $password, $databaseName);
                                            
                                                $query = "SELECT author, COUNT(*) AS `num` FROM author where department!='NA' GROUP BY author order by num desc";
                                                $result = mysqli_query($connect, $query);
                                              
												$i=1;
                                                while($i<6):;
													$row1 = mysqli_fetch_array($result);
                                                   $i=$i+1;
                                                   ?> 
                                            <tr>
                                                <th scope="row"><?php echo $row1[0]; ?></th>
                                                <td class="color-primary"><a href=../user/selected2.php?year=<?php echo $row1[0]; ?>&index=SCI><?php echo $row1[1]; ?></a></td>
                                                    
                                            </tr>
                                            
                                            <?php endwhile;  ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>						