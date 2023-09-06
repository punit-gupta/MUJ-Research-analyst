<?php include 'bibtexParse/PARSEENTRIES.php' ?>
<?php include 'bibtexParse/PARSECREATORS.php' ?>
<?php
$parse = NEW PARSEENTRIES();
$parse->expandMacro = FALSE;
$parse->removeDelimit = TRUE;
$parse->fieldExtract = TRUE;
$parse->openBib("2018(2).bib");
$parse->extractEntries();
$parse->closeBib();
list($preamble, $strings, $entries, $undefinedStrings) = $parse->returnArrays();
?>
<?php
$sno=0;
 foreach ( $entries as $entry ) {
$sno=$sno+1;	 ?>
	
	
	<li class="publication">
		<?php $title = $entry["title"]; ?>
		<span class="publication-title"><?php print($title); ?></span>
	</li>
	<li class="publication">
		<?php $journal = $entry["journal"]; ?>
		<span class="publication-title"><?php print($journal); ?></span>
	</li>
	<li class="publication">
		<?php $year = $entry["year"]; ?>
		<span class="publication-title"><?php print($year); ?></span>
	</li>
	<li class="publication">
		<?php $volume = $entry["volume"]; ?>
		<span class="publication-title"><?php print($volume); ?></span>
	</li>
		<li class="publication">
		<?php $pages = $entry["pages"]; ?>
		<span class="publication-title"><?php print($pages); ?></span>
	</li>
	<li class="publication">
		<?php $doi = $entry["doi"]; ?>
		<span class="publication-title"><?php print($doi); ?></span>
	</li>
	<li class="publication">
		<?php $url = $entry["url"]; ?>
		<span class="publication-title"><?php print($url); ?></span>
	</li>
	<li class="publication">
		<?php $affiliation = $entry["affiliation"]; ?>
		<span class="publication-title"><?php print($affiliation); ?></span>
	</li>
	<li class="publication">
		<?php $abstract = $entry["abstract"]; ?>
		<span class="publication-title"><?php print($abstract); ?></span>
	</li>
	
	
	<li class="publication">
		<?php $publisher = $entry["publisher"]; ?>
		<span class="publication-title"><?php print($publisher); ?></span>
	</li>
	<li class="publication">
		<?php $issn = $entry["issn"]; ?>
		<span class="publication-title"><?php print($issn); ?></span>
	</li>
	<li class="publication">
		<?php $document_type = $entry["document_type"]; ?>
		<span class="publication-title"><?php print($document_type); ?></span>
	</li>
	<?php
$creator = new PARSECREATORS();
 ?>
<span class="publication-authors">
	<?php
	$authors = $creator->parse($entry["author"]);
	$author_full_names = array();
	foreach ($authors as $author) {
		$author_full_name = implode(' ', $author);
		$author_full_names[] = $author_full_name;
	}
	$author_full_names = array_map('trim', $author_full_names);
	$author_list = implode(', ', $author_full_names);
	print($author_list); ?>
<span>
<?php  ?>
	<br>---------------------
		</br>
	
<?php } 
echo "total".$sno
?>