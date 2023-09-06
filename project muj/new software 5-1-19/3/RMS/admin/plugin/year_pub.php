<div class="col-lg-8">
                        <div class="card">
                            <div class="card-title">
                                <h4>Publication year wise </h4>

                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Year</th>
                                                <th>Book</th>
                                                <th>Journal</th>
                                                <th>Conference</th>
                                                <th>Book Chapter</th>
                                                <th>Other</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $hostname = "localhost";
                                                $username = "root";
                                                $password = "";
                                                $databaseName = "mujpub1";
                                                $sno = 1;
                                                $connect = mysqli_connect($hostname, $username, $password, $databaseName);
                                                $year=2013;
                                            
                                                while($year<2020)
                                                {
                                                    $query = "SELECT document_type, COUNT(*) AS `num` FROM article where year='$year' GROUP BY document_type";
                                                $result = mysqli_query($connect, $query);
                                                $sum=0;$o_count=0;$b_count=0;$j_count=0;$c_count=0;$bc_count=0;
                                            
                                                while($row1 = mysqli_fetch_array($result)):;
                                                     if( $row1[0]=='Journal')
                                                         {$j_count=$row1[1];}
                                                     if( $row1[0]=='Conference Paper')
                                                         {$c_count=$row1[1];}
                                                     if( $row1[0]=='Book Chapter')
                                                         {$bc_count=$row1[1];}
                                                     if( $row1[0]=='Book')
                                                         {$b_count=$row1[1];}
                                                     if( $row1[0]=='Editorial'||$row1[0]=='Review'||$row1[0]=='Letter')
                                                         {$o_count=$o_count+$row1[1];}

                                                         $sum=$sum+$row1[1];
                                                   endwhile;
                                                   ?> 
                                            <tr align="center">
                                                <th scope="row"><?php echo $year; ?></th>
                                                <td ><a href=../user/selected.php?year=<?php echo $year; ?>&type=Book&user=admin ><?php echo $b_count; ?><a></td>
                                                <td><a href=../user/selected.php?year=<?php echo $year; ?>&type=Journal&user=admin ><?php echo $j_count; ?></a></td>
                                                <td><a href=../user/selected.php?year=<?php echo $year; ?>&type=Conference%20Paper&user=admin ><?php echo $c_count; ?></a></td>
                                                <td><a href=../user/selected.php?year=<?php echo $year; ?>&type=Book%20Chapter&user=admin ><?php echo $bc_count; ?></a></td>
                                                <td><a href=../user/selected.php?year=<?php echo $year; ?>&type=other&user=admin ><?php echo $o_count; ?></a></td>
                                                
                                            </tr>
                                            
                                            <?php $year=$year+1; }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
					</div>