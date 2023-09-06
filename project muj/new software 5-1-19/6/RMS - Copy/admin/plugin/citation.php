<div class="col-lg-4">
                        <div class="card">
                            <div class="card-title">
                                <h4>Citation Count </h4>

                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Year</th>
                                                <th>Citation</th>
                                                
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
                                            
                                                $query = "SELECT * FROM `citation`";
                                                $result = mysqli_query($connect, $query);
                                              
												$total=0;
                                                while($row1 = mysqli_fetch_array($result)):;
												$total=$total+ $row1[1];
                                                   
                                                   ?> 
                                            <tr>
                                                <th scope="row"><?php echo $row1[0]; ?></th>
                                                <td class="color-primary"><a href=../user/selected2.php?year=<?php echo $row1[0]; ?>&index=SCOPUS><?php echo $row1[1]; ?></a></td>
                                                    
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