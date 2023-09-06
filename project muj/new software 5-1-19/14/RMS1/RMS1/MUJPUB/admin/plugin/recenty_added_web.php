<div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Recently Published Web of Science</h4>

                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Type</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                             
                                                $query = "SELECT * FROM `article` where `web`='WEB' ORDER BY `article`.`year`  DESC limit 5 ";
                                                $result = mysqli_query($connect, $query);
                                              
                                            
                                                while($row1 = mysqli_fetch_array($result)):;

                                                   
                                                   ?> 
                                            <tr>
                                                <td scope="row"><a href='article.php?name=<?php echo $row1[27];?>'><?php echo $row1['title']; ?> (<?php echo $row1['year']; ?>)</a></td>
											   <td class="color-primary"><?php echo $row1['document_type']; ?></td>
                                                    
                                            </tr>
                                            
                                            <?php endwhile;  ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>