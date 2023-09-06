<div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Popular Journals</h4>

                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>Journal</th>
                                                <th>Count</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                
                                                $query = "select article.journal,COUNT(article.journal) from article INNER join cite on article.uid=cite.uid where article.uid in (SELECT DISTINCT(author.uid) FROM `article` INNER JOIN author ON article.uid=author.uid where (author.department='$dept') ) GROUP BY article.journal  DESC LIMIT 5";
												
                                                $result = mysqli_query($connect, $query);
                                              //echo $query;
                                             
                                             $total=0;
                                                while($row1 = mysqli_fetch_array($result)):;
												$total=$total+ $row1[1];

                                                   
                                                   ?> 
                                            <tr>
                                                <th scope="row"><?php echo $row1[0]; ?></th>
                                                <td ><a href='../user/selectedjd.php?name=<?php echo $row1[0];?>&dept=<?php echo $dept1;?>' ><?php echo $row1[1]; ?></a></td>
                                                    
                                            </tr>
                                            
                                            <?php endwhile;  ?>
											
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>	