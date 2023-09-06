<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title><?php session_start(); echo "".$_SESSION["project"]; ?></title>
	
	
	

    <link href="css/lib/sweetalert/sweetalert.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
      <?php include 'menua.php';?>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
            <div class="row">
                    <div class="col-12">
					
                        <div class="card">
						<?php
					

					/* backup the db OR just a table */
					function backup_tables($host,$user,$pass,$name,$folder,$tables = '*')
					{
						$return='';
						$link = mysql_connect($host,$user,$pass);
						mysql_select_db($name,$link);
						
						//get all of the tables
						if($tables == '*')
						{
							$tables = array();
							$result = mysql_query('SHOW TABLES');
							while($row = mysql_fetch_row($result))
							{
								$tables[] = $row[0];
							}
						}
						else
						{
							$tables = is_array($tables) ? $tables : explode(',',$tables);
						}
						
						//cycle through
						foreach($tables as $table)
						{
							$result = mysql_query('SELECT * FROM '.$table);
							$num_fields = mysql_num_fields($result);
							$return.= 'DROP TABLE '.$table.';';
							$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
							$return.= "\n\n".$row2[1].";\n\n";
							
							for ($i = 0; $i < $num_fields; $i++) 
							{
								while($row = mysql_fetch_row($result))
								{
									$return.= 'INSERT INTO '.$table.' VALUES(';
									for($j=0; $j < $num_fields; $j++) 
									{
										$row[$j] = addslashes($row[$j]);
										$row[$j] = ereg_replace("\n","\\n",$row[$j]);
										if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
										if ($j < ($num_fields-1)) { $return.= ','; }
									}
									$return.= ");\n";
								}
							}
							$return.="\n\n\n";
							echo "..";
						}
						
						//save file
						$handle = fopen("backup/".$folder."/".$name.'.sql','w+');
						fwrite($handle,$return);
						fclose($handle);
					}
					
					
					
					$folder = "backup-".date("Y-m-d-h-i-sa");
					mkdir ("backup/".$folder, 0755);
					#date=
					backup_tables('localhost','root','','pubm',$folder);
					
					//mkdir ("backup/".$folder."/project", 0755);
					//copy_directory($path_relative.'/project',$path_relative.'/project/backup/'.$folder."/project");
					
					
					echo "Back done:pubm <br>";
					
					
					
					
					$query = "SELECT * FROM project";
					$result = mysqli_query($connect, $query);
					
					/////////////////////////////////////////////
					while($row1 = mysqli_fetch_array($result)):;
					backup_tables('localhost','root','',$row1[0],$folder);
					mkdir ("backup/".$folder."/".$row1[2], 0755);
					
					$path_relative=dirname( dirname(__FILE__) );
					
					copy_directory($path_relative.'/'.$row1[2],$path_relative.'/project/backup/'.$folder."/".$row1[2]);
					echo "<br>Back done:".$row1[0];
					endwhile;
					///////////////////////////////////////////////
					
					
					
					$query = "INSERT INTO `backup`(`name`, `size`, `path`, `date`) VALUES ('".$folder."','','backup/".$folder."','".date("Y-m-d-h-i-sa")."')";
					$result = mysqli_query($connect, $query);
					
					
					function copy_directory($src,$dst) {
						//echo $src."-".$dst;
							$dir = opendir($src);
							@mkdir($dst);
							while(false !== ( $file = readdir($dir)) ) {
								if (( $file != '.' ) && ( $file != '..' )) {
									if ( is_dir($src . '/' . $file)  ) {
										
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
                        </div>
                        
                    </div>
                </div>

            </div>
            <!-- End PAge Content -->
        </div>
        <!-- End Container fluid  -->
        <!-- footer -->
        <footer class="footer"> © 2018 All rights reserved. Template designed by <a href="../../index.html">Colorlib</a></footer>
        <!-- End footer -->
    </div>
    <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>

    <script src="js/lib/sweetalert/sweetalert.min.js"></script>
    <!-- scripit init-->
    <script>
	
	document.querySelector('.add-user').onclick = function(){
    swal({
            title: "Enter an input !!",
            text: "Write something interesting !!",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: "Write something"
        },
        function(inputValue){
            if (inputValue === false) return false;
            if (inputValue === "") {
                swal.showInputError("You need to write something!");
                return false
            }
            swal("Hey !!", "You wrote: " + inputValue, "success");
        });
};
</script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>

	
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>

</html>
<!-- Localized -->