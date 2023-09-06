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
                                                $hostname = "localhost";
                                                $username = "root";
                                                $password = "";
                                                $databaseName = "mujpub";
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