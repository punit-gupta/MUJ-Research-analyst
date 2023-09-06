
                            
						<?php 
						include 'database_conf.php';
						
						if(isset($_GET["name"]))
						{$name=$_GET["name"];
						
						$file = 'PUB.zip';
						$path_current = dirname( __FILE__ ); // /var/www/subdir

						$path_relative=dirname( dirname(__FILE__) );
						echo $path_current."<br>";
						echo $path_relative;

						// get the absolute path to $file
						$path = pathinfo(realpath($file), PATHINFO_DIRNAME);

						$zip = new ZipArchive;
						$res = $zip->open($file);
						if ($res === TRUE) {
						  // extract it to the path we determined above
						  $zip->extractTo($path_relative);
						  $zip->close();
						  echo "<br>$file extracted to $path<br>";
						} else {
						  echo "Doh! I couldn't open $file<br>";
						}

						$old_name = $path_relative."\PUB" ;
								$new_name = $path_relative."\\".$name ; 
								echo $new_name;
								if(file_exists($new_name))
								{ 
								   echo "Error While Renaming $old_name <br>" ;
								}
								else
								{
								   if(rename( $old_name, $new_name))
								   { 
									$sql = "CREATE DATABASE ".$name.";";
									if ($connect->query($sql) === TRUE) 
									{
											$query = '';
											$sqlScript = file('PUB.sql');
											$conn = new mysqli($hostname, $username, $password, $name);
											foreach ($sqlScript as $line)	{
												
												$startWith = substr(trim($line), 0 ,2);
												$endWith = substr(trim($line), -1 ,1);
												
												if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
													continue;
												}
													
												$query = $query . $line;
												if ($endWith == ';') {
													mysqli_query($conn,$query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
													$query= '';	
													$connect->query("DROP DATABASE".$name."");													
												}
											}
											echo '<div class="success-response sql-import-response">SQL file imported successfully</div>';

												
											  										
									} else {
											echo "Error creating database: " . $connect->error;
									}

							      echo "<br> Successfully Renamed $old_name to $new_name <br>" ;
									echo "";
								   }
								  else
								  {
									  
								   echo "A File With The Same Name Already Exists <br>" ;
								  }
								}
								
						}			?>