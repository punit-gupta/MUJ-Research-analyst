<div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Faculty Authors</h4>

                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>Author</th>
                                                <th>Department</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                
                                                $query = "select *  from author where department='$dept' and type='MUJ' and emp!='' group by emp";
                                                $result = mysqli_query($connect, $query);
                                               $sno=0;
                                            // echo $query;
                                             $total=0;
                                                while($row1 = mysqli_fetch_array($result)):;
												
                                                   ?> 
                                            <tr>
                                                <th scope="row"><?php echo $row1[0]; ?></th>
                                                
                                                    
												<td> <?php echo $row1['department'];?></td>
												</form>
													
													
													
                                            </tr>
                                            
                                            <?php $sno=$sno+1; endwhile;  ?>
											
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>	