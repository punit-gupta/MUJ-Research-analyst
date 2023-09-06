<?php 
$dept1=str_replace(" ","%20",$dept);
$dept1=str_replace("&","%26",$dept);
?>
<div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-content">
                                    <div >
                                        <div class="text-left">
                                           <a href="department.php?dept=<?php echo $dept1; ?>"> <button type="button" class="btn btn-success m-b-10 m-l-5" >Dashboard</button></a>
                                           <a href="deapartmental_report.php?dept=<?php echo $dept1; ?>"> <button type="button" class="btn btn-info m-b-10 m-l-5" >Graph</button></a>
                                           <a href="department_coll.php?dept=<?php echo $dept1; ?>"> <button type="button" class="btn btn-warning m-b-10 m-l-5" >Collaboration</button></a>
                                           <a href="faculty_report.php?dept=<?php echo $dept1; ?>"> <button type="button" class="btn btn-danger m-b-10 m-l-5" >Faculty</button></a>
                                           <a href="update_dept_faculty.php?dept=<?php echo $dept1; ?>"> <button type="button" class="btn btn-danger m-b-10 m-l-5" >Other</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>