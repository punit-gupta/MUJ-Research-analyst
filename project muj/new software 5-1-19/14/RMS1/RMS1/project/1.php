<?php

						
						$path_relative=dirname( dirname(__FILE__) );
						copy_directory($path_relative.'/MUJPUB',$path_relative.'/project/backup');

						function copy_directory($src,$dst) {
							$dir = opendir($src);
							@mkdir($dst);
							while(false !== ( $file = readdir($dir)) ) {
								if (( $file != '.' ) && ( $file != '..' )) {
									if ( is_dir($src . '/' . $file) ) {
										copy_directory($src . '/' . $file,$dst . '/' . $file);
									}
									else {
										copy($src . '/' . $file,$dst . '/' . $file);
									}
								}
							}
							closedir($dir);
						}


?>