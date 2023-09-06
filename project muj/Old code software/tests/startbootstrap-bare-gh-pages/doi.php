


<html>
<head>
	<meta charset="utf-8">
	<title>MUJPUB</title>

	<!-- Demo styling -->
	<link href="docs/css/jq.css" rel="stylesheet">

	<!-- jQuery: required (tablesorter works with jQuery 1.2.3+) -->
	<script src="docs/js/jquery-1.2.6.min.js"></script>

	<!-- Pick a theme, load the plugin & initialize plugin -->
	<link href="dist/css/theme.default.min.css" rel="stylesheet">
	<script src="dist/js/jquery.tablesorter.min.js"></script>
	<script src="dist/js/jquery.tablesorter.widgets.min.js"></script>
	<script>
	$(function(){
		$('table').tablesorter({
			widgets        : ['zebra', 'columns'],
			usNumberFormat : false,
			sortReset      : true,
			sortRestart    : true
		});
	});
	</script>

        <style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
</style>
      <body>
	  
	 
      
	  
<div class="topnav">

  <a class="active" href="page1_1.php">Home</a>
  <a href="page2.php">All Article</a>
  <a href="page3.php">Journal/Conference</a>
  <a href="page4.php">Authors</a>
  <a href="page5.php">Year</a>
  <a href="page6.php">All Search</a>
  <a href="update.php">Update</a>
  <a href="doi.php">DOI Search</a>
</div>

<br><br>



<?php

$doi = (isset($_GET["doi"]) && $_GET["doi"] != "" ? $_GET["doi"] : "10.1037/0022-3514.65.6.1190");
$debug = (isset($_GET["debug"]) ? true : false);
error_reporting(0);
function doi_url($doi)
{
  return "http://dx.doi.org/" . $doi;
  //return "http://data.crossref.org/" . $doi;
}

function get_curl($url) 
{ 
  $curl = curl_init(); 
  $header[0] = "Accept: application/rdf+xml;q=0.5,"; 
  $header[0] .= "application/vnd.citationstyles.csl+json;q=1.0"; 
  curl_setopt($curl, CURLOPT_URL, $url); 
  curl_setopt($curl, CURLOPT_USERAGENT, 'Googlebot/2.1 (+http://www.google.com/bot.html)'); 
  curl_setopt($curl, CURLOPT_HTTPHEADER, $header); 
  curl_setopt($curl, CURLOPT_REFERER, 'http://www.google.com'); 
  curl_setopt($curl, CURLOPT_AUTOREFERER, true); 
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($curl, CURLOPT_TIMEOUT, 10); 
  $json = curl_exec($curl); 
  curl_close($curl); 
  return $json; 
}

function get_json_array($json)
{
  return json_decode($json, true);
}

function show_json($json, $debug=false) {
  if ($debug) {
    echo "<p>" . $json . "</p>";
  }
}

function show_json_array($json_array, $debug=false) {
  if ($debug) {
    echo "<pre class='json_array'>";
    print_r($json_array);
    echo "</pre>";
  }
}

function get_ama_citation($json_array, $doi, $doi_url)
{
  $title        = $json_array["title"];
  $author_array = $json_array["author"];
  $jtitle       = $json_array["container-title"];
  $pages        = $json_array["page"];
  
  if(isset($json_array["volume"]))
  $volume       = $json_array["volume"];
  
  if(isset($json_array["issue"]))
  $issue        = $json_array["issue"];
  
  if(isset($json_array["ISSN"]))
  $issn_array   = $json_array["ISSN"];
  
  if(isset($json_array["ISBN"]))
  $isbn_array   = $json_array["ISBN"];

  $url          = $json_array["URL"];
  $year         = $json_array["issued"]["date-parts"][0][0];

  $citation  = "";
  foreach ($author_array as $author)
  {$family = $author["family"];
	  
    $given = ($author["given"] ? $author["given"] : "");
    $given = str_replace(".", "", $given);
    $x = explode(" ", $given);
    $given = "";
    foreach ($x as $initial)
    {
      $given .= $initial[0];
    }
    $given = (strlen($given)>0 ? " " . $given : "");
    $authors[] = $family . $given;
	  
  }
  $author_count = count($authors);
  if ($author_count <= 6)
  {
    if (trim($authors[$author_count-1]) != "et al") { 
      $citation .= implode(", ", $authors) . ". ";
    } else {
      for($i=0; $i<3; $i++) {
        $author_list[] = $authors[$i];
      }
      $author_list[] = "et al";
      $citation .= implode(", ", $author_list) . ". ";
    }
  } else {
    $current_author = 0;
    foreach($authors as $author)
    {
      if ($current_author < 3)
      {
        $author_list[] = $author;
        $current_author++;
      }
    }
    $author_list[] = "et al";
    $citation .= implode(", ", $author_list) . ". ";
  }
  $citation .= trim(str_replace(".", "", $title)) . ". ";
  $citation .= trim(str_replace(".", "", $jtitle)) . ". ";
  $citation .= $year;
  $citation .= ($volume ? ";" . $volume : "");
  $citation .= ($issue ? "(" . $issue . ")" : "");
  $citation .= ($pages ? ":" . $pages . ". " : ". ");
  $citation .= ($doi ? "doi:&nbsp;<a href='" . $doi_url . "'>" . $doi . "</a>" : "");
  
  
  
  return $citation;
}

function insert($json_array, $doi, $doi_url)
{
  $title        = $json_array["title"];
  $author_array = $json_array["author"];
  $jtitle       = $json_array["container-title"];
  $pages        = $json_array["page"];
  $volume       = $json_array["volume"];
  $issue        = $json_array["issue"];
  $issn   		= $json_array["ISSN"];
  $isbn  		= $json_array["ISBN"];
  $url          = $json_array["URL"];
  $year         = $json_array["issued"]["date-parts"][0][0];

  $citation  = "";
  foreach ($author_array as $author)
  {$family = $author["family"];
	  
    $given = ($author["given"] ? $author["given"] : "");
    $given = str_replace(".", "", $given);
    $x = explode(" ", $given);
    $given = "";
    foreach ($x as $initial)
    {
      $given .= $initial[0];
    }
    $given = (strlen($given)>0 ? " " . $given : "");
    $authors[] = $family . $given;
	  
  }
  $author_count = count($authors);
  if ($author_count <= 6)
  {
    if (trim($authors[$author_count-1]) != "et al") { 
      $citation .= implode(", ", $authors) . ". ";
    } else {
      for($i=0; $i<3; $i++) {
        $author_list[] = $authors[$i];
      }
      $author_list[] = "et al";
      $citation .= implode(", ", $author_list) . ". ";
    }
  } else {
    $current_author = 0;
    foreach($authors as $author)
    {
      if ($current_author < 3)
      {
        $author_list[] = $author;
        $current_author++;
      }
    }
    $author_list[] = "et al";
    $citation .= implode(", ", $author_list) . ". ";
  }
  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mujpub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
  if($issn=='')
{$issn='NA';
}
if($isbn=='')
{$isbn='NA';
}
$title= str_replace("'"," ",$title);
   $sql = "INSERT INTO `article` (`author`, `title`, `journal`, `year`,`volume`, `pages`, `doi`, `url`, `affiliation`, `abstract`, `keyword`, `correspondence_address1`, `publisher`, `issn`,`isbn`, `language`, `abbrev_source_title`, `document_type`, `source`) 
	VALUES ('', '$title', '$jtitle ', '$year', '$volume','$pages','$doi', '', '', '', '', '', '', '$issn', '$isbn', '', '', '', '')";

	if ($conn->query($sql) === TRUE) 
	{
		echo "New record created successfully";
		foreach($authors as $author)
		{
		 
		//echo $author."-";
		$sql = "INSERT INTO `author` (`author`, `doi`, `department`) VALUES ('$author', '$doi', '');";
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}}
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
		
		
		
        
  
  
}

$doi_url      = doi_url($doi);
$json         = get_curl($doi_url);
$json_array   = get_json_array($json);

$ama_citation     = get_ama_citation($json_array, $doi, $doi_url);

if(isset($_GET['insert']))
{
	
	if($_GET['insert']=='yes')
	{
		
		insert($json_array, $doi, $doi_url);
	}
}

?>

<style>
  * { -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; } 
  
  input[type="text"] { width: 20em; }
 
</style>


<center>
<form method="get" action="">
<input type="text" name="doi" value="<?php echo $doi ?>">
<input type="submit" value="Search DOI">
<input type="checkbox" name="debug" <?php if (isset($_GET["debug"])) echo " checked"; ?>>debug
</form>
</center>


<h1>AMA Citation Format</h1>
<ol class="ama">
  <li><?php echo $ama_citation . "\n"; ?></li>
</ol>
<form action = "<?php $_PHP_SELF ?>" method = "GET" align=center>
		  <input type="hidden" value=yes name="insert">
		  <input type="hidden" value="<?php echo $doi;?>" name="doi">
		  <select name="type">
			<option value="Conference">Conference</option>
			<option value="journal">journal</option>
			<option value="chapter">chapter</option>
			<option value="book">book</option>
		  </select>
		  <select name="index">
			<option value="SCOPUS">SCOPUS</option>
			<option value="SCI">SCI</option>
			<option value="UGC">UGC</option>
			<option value="OTHER">OTHER</option>
		  </select>
		  <input type="submit" value="Insert">
</form>




<?php show_json_array($json_array, $debug); ?>

</body>
    <script type="text/javascript">
    $(document).ready(function(){
        $('.footable').footable();
    });
    </script>
</html>
