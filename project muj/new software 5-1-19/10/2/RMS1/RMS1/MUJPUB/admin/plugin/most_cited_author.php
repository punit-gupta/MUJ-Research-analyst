<div class="col-lg-4">
                        <div class="card">
                            <div class="card-title">
                                <h4>Citation Count </h4>

                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Year</th>
                                                <th>Citation</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                              
                                                $query = "SELECT year, count(cite) FROM `cite` CROSS JOIN article WHERE cite.uid=article.uid GROUP BY year";
                                                $result = mysqli_query($connect, $query);
                                              
                                            
                                                while($row1 = mysqli_fetch_array($result)):;

                                                   
                                                   ?> 
                                            <tr>
                                                <th scope="row"><?php echo $row1[0]; ?></th>
                                                <td class="color-primary"><a href='../admin/selected2.php?year=<?php echo $row1[0]; ?>&index=SCOPUS'><?php echo $row1[1]; ?></a></td>
                                                    
                                            </tr>
                                            
                                            <?php endwhile;  ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>