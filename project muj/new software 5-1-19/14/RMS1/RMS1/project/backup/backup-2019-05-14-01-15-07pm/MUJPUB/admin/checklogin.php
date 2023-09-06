<?php

							include 'database_conf.php'; 
							$id=$_POST["email"];
							$pass=$_POST["pass"];
							
							$strJsonFileContents = file_get_contents("../config.json");
							$array = json_decode($strJsonFileContents, true);
							
							
							$query = "SELECT * FROM `login` WHERE id='$id' and pass='$pass'";
							
							$result = mysqli_query($connect, $query);
							$rowcount=mysqli_num_rows($result);
							if($rowcount>=1)
							{
								// Start the session
								session_start();
								while($row1 = mysqli_fetch_array($result)):;
								$_SESSION["Name"] = "$row1[0]";
								$_SESSION["project"] = $array["project"];
								$_SESSION["email"] = "$row1[2]";
								$_SESSION["level"] = "$row1[4]";
								$_SESSION["depts"] = "$row1[5]";
								header("Location: aindex.php"); 
								 endwhile;
							}
							else
							{echo "try again";
								 header("Location: login.php"); 
							}
								
								
							?>	