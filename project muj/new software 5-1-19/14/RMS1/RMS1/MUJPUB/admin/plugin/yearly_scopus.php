<div class="col-lg-8">
                        <div class="card">
                            <div class="card-title">
                                <h4>SCOPUS Publication year wise </h4>

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
												<th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                 $year=2013;
                                            
                                                while($year<2020)
                                                {
                                                    $query = "SELECT document_type, COUNT(*) AS `num` FROM article where year='$year' and  `index scopus` ='SCOPUS' GROUP BY document_type";
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
                                                     if( $row1[0]=='Editorial'||$row1[0]=='Retracted'||$row1[0]=='Letter'||$row1[0]=='Erratum')
                                                         {$o_count=$o_count+$row1[1];}

                                                         $sum=$sum+$row1[1];
                                                   endwhile;
                                                   ?> 
                                            <tr align="center">
                                                <th scope="row"><?php echo $year; ?></th>
                                                <td ><a href='../admin/selected.php?year=<?php echo $year; ?>&type=Book&index=SCOPUS' ><?php echo $b_count; ?><a></td>
                                                <td><a href='../admin/selected.php?year=<?php echo $year; ?>&type=Journal&index=SCOPUS'><?php echo $j_count; ?></a></td>
                                                <td><a href='../admin/selected.php?year=<?php echo $year; ?>&type=Conference%20Paper&index=SCOPUS'><?php echo $c_count; ?></a></td>
                                                <td><a href='../admin/selected.php?year=<?php echo $year; ?>&type=Book%20Chapter&index=SCOPUS' ><?php echo $bc_count; ?></a></td>
                                                <td><a href='../admin/selected.php?year=<?php echo $year; ?>&type=other&index=SCOPUS' ><?php echo $o_count; ?></a></td>
                                                <td ><?php echo $sum; ?></td>
                                            </tr>
                                            
                                            <?php $year=$year+1; }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
					</div>