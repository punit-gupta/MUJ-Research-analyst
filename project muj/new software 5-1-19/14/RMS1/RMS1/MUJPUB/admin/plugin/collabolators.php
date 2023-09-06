<div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Top 15 Collaborators</h4>

                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>Institute</th>
                                                <th>Publication Count</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                
                                                $query = "SELECT * FROM collaborators ORDER BY `collaborators`.`count`  DESC LIMIT 15";
                                                $result = mysqli_query($connect, $query);
												
                                                while($row1 = mysqli_fetch_array($result)):;
												

                                                   
                                                   ?> 
                                            <tr>
                                                <th scope="row"><?php echo $row1[0]; ?></a></th>
                                                <td ><?php echo $row1[2] ?></td>
                                                    
                                            </tr>
                                            
                                            <?php endwhile;  ?>
											
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>	