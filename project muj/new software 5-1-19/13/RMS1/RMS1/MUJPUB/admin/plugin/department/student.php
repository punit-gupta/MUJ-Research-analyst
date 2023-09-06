<div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Student Authors</h4>

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
                                                
                                                $query = "select author, department from author where department='$dept' and type='MUJ' and emp='' group by author";
                                                $result = mysqli_query($connect, $query);
                                               $sno=0;
                                            // echo $query;
                                             $total=0;
                                                while($row1 = mysqli_fetch_array($result)):;
												
                                                   ?> 
                                            <tr>
                                                <th scope="row"><?php echo $row1[0]; ?></th>
                                                
                                                    
													
													<form id="myForm<?php echo $sno;?>" action="../admin/page10.php" method="POST">
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