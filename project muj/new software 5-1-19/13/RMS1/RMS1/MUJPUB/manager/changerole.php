<?php

				include 'database_conf.php'; 
							$role=$_GET["role"];
							
							$f1 = (isset($_GET["f1"]) ? $_GET["f1"] : "0");
							$f2 = (isset($_GET["f2"]) ? $_GET["f2"] : "0");
							$f3 = (isset($_GET["f3"]) ? $_GET["f3"] : "0");
							$f4 = (isset($_GET["f4"]) ? $_GET["f4"] : "0");
							$f5 = (isset($_GET["f5"]) ? $_GET["f5"] : "0");
							$f6 = (isset($_GET["f6"]) ? $_GET["f6"] : "0");
							$f7 = (isset($_GET["f7"]) ? $_GET["f7"] : "0");
							$f8 = (isset($_GET["f8"]) ? $_GET["f8"] : "0");
							$f9 = (isset($_GET["f9"]) ? $_GET["f9"] : "0");
							$f10 = (isset($_GET["f10"]) ? $_GET["f10"] : "0");
							$f11 = (isset($_GET["f11"]) ? $_GET["f11"] : "0");
							$f12 = (isset($_GET["f12"]) ? $_GET["f12"] : "0");
							$f13 = (isset($_GET["f13"]) ? $_GET["f13"] : "0");
													
						$query1 = "UPDATE `prevlages` SET `f1`=$f1,`f2`=$f2,`f3`=$f3,`f4`=$f4,`f5`=$f5,`f6`=$f6,`f7`=$f7,`f8`=$f8,`f9`=$f9,`f10`=$f10,`f11`=$f11,`f12`=$f12,`f13`=$f13 where role='$role';";
						$result = mysqli_query($connect, $query1);
							if($result )
							{ echo "yes";
								 header("Location: role.php"); 
							}
							else
							{echo "try again";
								 header("Location: login.php"); 
							}
								
								
							?>	