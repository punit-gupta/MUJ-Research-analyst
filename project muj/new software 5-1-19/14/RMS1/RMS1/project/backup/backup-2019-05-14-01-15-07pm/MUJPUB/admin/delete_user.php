<?php

				include 'database_conf.php'; 
							$id=$_GET["id"];
							
							
							
													
						$query1 = "DELETE FROM `login` WHERE id='$id'";
						echo $query1;
						$result = mysqli_query($connect, $query1);
							if($result )
							{ echo "yes";
								 header("Location: login_create.php"); 
							}
							else
							{echo "try again";
								
							}
								
								
							?>	