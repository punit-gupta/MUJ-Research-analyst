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
                                             
                                                $query = "SELECT * FROM `citation`";
                                                $result = mysqli_query($connect, $query);
                                              
												$total=0;
                                                while($row1 = mysqli_fetch_array($result)):;
												$total=$total+ $row1[1];
                                                   
                                                   ?> 
                                            <tr>
                                                <th scope="row"><?php echo $row1[0]; ?></th>
                                                <td class="color-primary"><?php echo $row1[1]; ?></td>
                                                    
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