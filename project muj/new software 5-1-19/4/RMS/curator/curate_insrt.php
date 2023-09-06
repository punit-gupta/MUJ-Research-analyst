<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mujpub1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$title		=($_GET["title"] != "" ? $_GET["title"] : "");
$journal	=($_GET["journal"] != "" ? $_GET["journal"] : "");
$year		=($_GET["year"] != "" ? $_GET["year"] : "");
$volume		=($_GET["volume"] != "" ? $_GET["volume"] : "");
$pages		=($_GET["pages"] != "" ? $_GET["pages"] : "");
$doi		=($_GET["doi"] != "" ? $_GET["doi"] : "");
$url		=($_GET["url"] != "" ? $_GET["url"] : "");
$affiliation=($_GET["affiliation"] != "" ? $_GET["affiliation"] : "");
$abstract	=($_GET["Abstract"] != "" ? $_GET["Abstract"] : "");
$publisher	=($_GET["publisher"] != "" ? $_GET["publisher"] : "");
$document_type=($_GET["document_type"] != "" ? $_GET["document_type"] : "");
$isbn		=($_GET["ISSN"] != "" ? $_GET["ISSN"] : "");
$issn		=($_GET["ISBN"] != "" ? $_GET["ISBN"] : "");
$scopus		=($_GET["SCOPUS"] != "" ? $_GET["SCOPUS"] : "");
$sci		=($_GET["SCI"] != "" ? $_GET["SCI"] : "");
$esci		=($_GET["ESCI"] != "" ? $_GET["ESCI"] : "");
$ugc		=($_GET["UGC"] != "" ? $_GET["UGC"] : "");

		

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "mujpub1";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT * FROM article where doi='$doi'";
$result = mysqli_query($connect, $query);
$rowcount=mysqli_num_rows($result);
if($rowcount>=1)
{
	echo $title." already exists <br>";
}else{
		
if($doi!='')
{
$sql = "INSERT INTO `article` (`author`, `title`, `journal`, `year`,`volume`, `pages`, `doi`, `url`, `affiliation`, `abstract`, `keyword`, `correspondence_address1`, `publisher`, `issn`,`isbn`, `language`, `abbrev_source_title`, `document_type`, `source`,`index scopus`, `index SCI`, `index esci`, `index ugc`, `date`) 
VALUES ('', '$title', '$journal ', '$year', '$volume','$pages','$doi', '', '$affiliation', '$abstract', '', '', '$publisher', '$issn', '$isbn', '', '', '$document_type','','$scopus','$sci','$esci','$ugc',now())";

if ($conn->query($sql) === TRUE) 
{
  echo "<b>New</b>".$title." <br>";
								$sql = "DELETE FROM `article` WHERE doi='$doi';";
									if ($conn->query($sql) === TRUE) 
									{echo "New author successfully";
									}
								$query1 = "SELECT * FROM `authorc where doi='$doi'";
								
								$result1 = mysqli_query($connect, $query1);					
		
								while($row1 = mysqli_fetch_array($result1)):;
								$sql = "INSERT INTO `author` (`author`, `doi`, `department`,`date`) VALUES ('$row1[0]', ' $row1[1]', '',now());";
								if ($conn->query($sql) === TRUE)
									{
									echo "New author successfully";
									$sql = "DELETE FROM `articlec` WHERE doi='$doi';";
									if ($conn->query($sql) === TRUE) 
									{echo "New author successfully";
									}
									
									} else {
									echo "Error: " . $sql . "<br>" . $conn->error;
									}
									endwhile;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	
	}

}
}
 
$conn->close();?>


