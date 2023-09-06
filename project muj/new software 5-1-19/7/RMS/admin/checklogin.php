<?php

							$hostname = "localhost";
							$username = "root";
							$password = "";
							$databaseName = "mujpub";
							$id=$_POST["email"];
							$pass=$_POST["pass"];
							$connect = mysqli_connect($hostname, $username, $password, $databaseName);
							$query = "SELECT * FROM `login` WHERE id='$id' and pass='$pass'";
							
							$result = mysqli_query($connect, $query);
							$rowcount=mysqli_num_rows($result);
							if($rowcount>=1)
							{
								// Start the session
								session_start();
								while($row1 = mysqli_fetch_array($result)):;
								$_SESSION["Name"] = "$row1[0]";
								$_SESSION["email"] = "$row1[2]";
								$_SESSION["level"] = "$row1[4]";
								header("Location: aindex.php"); 
								 endwhile;
							}
							else
							{echo "try again";
								 header("Location: login.php"); 
							}
								
								
							?>	