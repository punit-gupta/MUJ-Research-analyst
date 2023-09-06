<div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Publication Indexing </h4>

                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Year</th>
                                                <th>SCI Count</th>
                                                
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
                                            
                                                $query = "SELECT year, COUNT(*) AS `num` FROM article where `index SCI` ='SCI' GROUP BY year";
                                                $result = mysqli_query($connect, $query);
                                              
                                             
                                                while($row1 = mysqli_fetch_array($result)):;

                                                   
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