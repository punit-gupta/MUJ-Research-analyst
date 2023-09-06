 <?php 										$where="";
												$year="";
											if(isset($_GET["2013"] )&& empty($year))
											{
											  $year="article.year='".$_GET["2013"]."'";
											}
										    else if(isset($_GET["2013"] )&& !empty($year))
											{$year=$year." or article.year='".$_GET["2013"]."'";
											}
											
											if(isset($_GET["2014"] )&& empty($year))
											{
											  $year="article.year='".$_GET["2014"]."'";
											}
										    else if(isset($_GET["2014"] )&& !empty($year))
											{$year=$year." or article.year='".$_GET["2014"]."'";
											}
											
											if(isset($_GET["2015"] )&& empty($year))
											{
											  $year="article.year='".$_GET["2015"]."'";
											}
										    else if(isset($_GET["2015"] )&& !empty($year))
											{$year=$year." or article.year='".$_GET["2015"]."'";
											}
											
											if(isset($_GET["2016"] )&& empty($year))
											{
											  $year="article.year='".$_GET["2016"]."'";
											}
										    else if(isset($_GET["2016"] )&& !empty($year))
											{$year=$year." or article.year='".$_GET["2016"]."'";
											}
											
											if(isset($_GET["2017"] )&& empty($year))
											{
											  $year="article.year='".$_GET["2017"]."'";
											}
										    else if(isset($_GET["2017"] )&& !empty($year))
											{$year=$year." or article.year='".$_GET["2017"]."'";
											}
											
											if(isset($_GET["2018"] )&& empty($year))
											{
											  $year="article.year='".$_GET["2018"]."'";
											}
										    else if(isset($_GET["2018"] )&& !empty($year))
											{$year=$year." or article.year='".$_GET["2018"]."'";
											}
											
											if(isset($_GET["2019"] )&& empty($year))
											{
											  $year="article.year='".$_GET["2019"]."'";
											}
										    else if(isset($_GET["2019"] )&& !empty($year))
											{$year=$year." or article.year='".$_GET["2019"]."'";
											}
											
											if(isset($_GET["2020"] )&& empty($year))
											{
											  $year="article.year='".$_GET["2020"]."'";
											}
										    else if(isset($_GET["2020"] )&& !empty($year))
											{$year=$year." or article.year='".$_GET["2020"]."'";
											}
											
											if(!empty($year))
											{ $where=$where."(".$year.")";}
											
											
											
											//////////////////////////////////
											/////////////////////////////////
											$index="";
											
											if(isset($_GET["SCOPUS"] )&& empty($index))
											{
											  $index="article.`index scopus`='".$_GET["SCOPUS"]."'";
											}
										    else if(isset($_GET["SCOPUS"] )&& !empty($index))
											{$index=$index." or article.`index scopus`='".$_GET["SCOPUS"]."'";
											}
											
											if(isset($_GET["SCI"] )&& empty($index))
											{
											  $index="article.`index SCI`='".$_GET["SCI"]."'";
											}
										    else if(isset($_GET["SCI"] )&& !empty($index))
											{$index=$index." or article.`index SCI`='".$_GET["SCI"]."'";
											}
											
											if(isset($_GET["ESCI"] )&& empty($index))
											{
											  $index="article.`index esci`='".$_GET["ESCI"]."'";
											}
										    else if(isset($_GET["ESCI"] )&& !empty($index))
											{$index=$index." or article.`index esci`='".$_GET["ESCI"]."'";
											}
											
											
											if(!empty($index) &&!empty($where) )
											{ $where=$where." and (".$index.")";
											}
											else if(!empty($index) &&empty($where))
											{$where=$where."  (".$index.")";
												
											}
											//////////////////////////////////////////
											////////////////////////////////////////
											
											$type="";
											if(isset($_GET["JOURNAL"] )&& empty($type))
											{
											  $type="article.document_type='Journal'";
											}
										    else if(isset($_GET["JOURNAL"] )&& !empty($type))
											{$type=$type." or article.document_type='Journal'";
											}
											
											if(isset($_GET["CONFERENCE"] )&& empty($type))
											{
											  $type="article.document_type='Conference Paper'";
											}
										    else if(isset($_GET["CONFERENCE"] )&& !empty($type))
											{$type=$type." or article.document_type='Conference Paper'";
											}
											
											if(isset($_GET["BOOK"] )&& empty($type))
											{
											  $type="article.document_type='BOOK'";
											}
										    else if(isset($_GET["BOOK"] )&& !empty($type))
											{$type=$type." or article.document_type='".$_GET["BOOK"]."'";
											}
											
											if(isset($_GET["BOOKC"] )&& empty($type))
											{
											  $type="article.document_type='Book Chapter'";
											}
										    else if(isset($_GET["BOOKC"] )&& !empty($type))
											{$type=$type." or article.document_type='Book Chapter'";
											}
											
											if(isset($_GET["OTHER"] )&& empty($type))
											{
											  $type="article.document_type='Editorial' or article.document_type='Letter'or article.document_type='Erratum'or article.document_type='Retracted'";
											}
										    else if(isset($_GET["OTHER"] )&& !empty($type))
											{$type=$type." or article.document_type='Editorial' or article.document_type='Letter'or article.document_type='Erratum'or article.document_type='Retracted'";
											}
											
											if(!empty($type) &&!empty($where) )
											{ $where=$where." and (".$type.")";
											}
											else if(!empty($type) &&empty($where))
											{$where=$where."  (".$type.")";
												
											}
											
											
											///////////////////////////////////////////////////////////////
											//////////////////////////////////////////////////////////////
											
											$dept="";
											if(isset($_GET["D1"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D1"]."'";
											}
										    else if(isset($_GET["D1"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D1"]."'";
											}
											
											if(isset($_GET["D2"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D2"]."'";
											}
										    else if(isset($_GET["D2"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D2"]."'";
											}
											if(isset($_GET["D3"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D3"]."'";
											}
										    else if(isset($_GET["D3"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D3"]."'";
											}
											if(isset($_GET["D4"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D4"]."'";
											}
										    else if(isset($_GET["D4"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D4"]."'";
											}
											if(isset($_GET["D5"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D5"]."'";
											}
										    else if(isset($_GET["D5"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D5"]."'";
											}
											if(isset($_GET["D6"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D6"]."'";
											}
										    else if(isset($_GET["D6"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D6"]."'";
											}
											if(isset($_GET["D7"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D7"]."'";
											}
										    else if(isset($_GET["D7"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D7"]."'";
											}
											if(isset($_GET["D8"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D8"]."'";
											}
										    else if(isset($_GET["D8"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D8"]."'";
											}
											if(isset($_GET["D9"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D9"]."'";
											}
										    else if(isset($_GET["D9"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D9"]."'";
											}
											if(isset($_GET["D10"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D10"]."'";
											}
										    else if(isset($_GET["D10"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D10"]."'";
											}
											if(isset($_GET["D11"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D11"]."'";
											}
										    else if(isset($_GET["D11"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D11"]."'";
											}
											if(isset($_GET["D12"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D12"]."'";
											}
										    else if(isset($_GET["D12"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D12"]."'";
											}
											
											if(isset($_GET["D13"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D13"]."'";
											}
										    else if(isset($_GET["D13"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D13"]."'";
											}
											if(isset($_GET["D14"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D14"]."'";
											}
										    else if(isset($_GET["D14"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D14"]."'";
											}
											if(isset($_GET["D15"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D15"]."'";
											}
										    else if(isset($_GET["D15"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D15"]."'";
											}
											if(isset($_GET["D16"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D16"]."'";
											}
										    else if(isset($_GET["D16"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D16"]."'";
											}
											if(isset($_GET["D17"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D17"]."'";
											}
										    else if(isset($_GET["D17"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D17"]."'";
											}
											if(isset($_GET["D18"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D18"]."'";
											}
										    else if(isset($_GET["D18"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D18"]."'";
											}
											if(isset($_GET["D19"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D19"]."'";
											}
										    else if(isset($_GET["D19"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D19"]."'";
											}
											if(isset($_GET["D20"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D20"]."'";
											}
										    else if(isset($_GET["D20"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D20"]."'";
											}
											if(isset($_GET["D21"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D21"]."'";
											}
										    else if(isset($_GET["D21"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D21"]."'";
											}
											if(isset($_GET["D22"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D22"]."'";
											}
										    else if(isset($_GET["D22"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D22"]."'";
											}
											if(isset($_GET["D23"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D23"]."'";
											}
										    else if(isset($_GET["D23"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D23"]."'";
											}
											if(isset($_GET["D24"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D24"]."'";
											}
										    else if(isset($_GET["D24"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D24"]."'";
											}
											if(isset($_GET["D25"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D25"]."'";
											}
										    else if(isset($_GET["D25"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D25"]."'";
											}
											if(isset($_GET["D26"] )&& empty($dept))
											{
											  $dept="author.department='".$_GET["D26"]."'";
											}
										    else if(isset($_GET["D26"] )&& !empty($dept))
											{$dept=$dept." or author.department='".$_GET["D26"]."'";
											}
											if(!empty($dept) &&!empty($where) )
											{ $where=$where." and (".$dept.")";
											}
											else if(!empty($dept) && empty($where))
											{
												$where=$where."  (".$dept.")";
												
											}
											
											
												///////////////////////////////////////////////////////////////
											//////////////////////////////////////////////////////////////
											
											$dept1="";
											if(isset($_GET["D"] )&& empty($dept1))
											{
											  $dept1="author.department='".$_GET["D"]."'";
											}
										    else if(isset($_GET["D"] )&& !empty($dept1))
											{$dept1=$dept1." or author.department='".$_GET["D"]."'";
											}
											
											if(!empty($dept1) &&!empty($where) )
											{ $where=$where." and (".$dept1.")";
											}
											else if(!empty($dept1) && empty($where))
											{
												$where=$where."  (".$dept1.")";
												
											}
											
												///////////////////////////////////////////////////////////////
											//////////////////////////////////////////////////////////////
											
											$auth="";
											if(isset($_GET["author"] )&& empty($auth))
											{
											  $auth="author.author='".$_GET["author"]."'";
											}
											
											if(!empty($auth) &&!empty($where) )
											{ $where=$where." and (".$auth.")";
											}
											else if(!empty($auth) && empty($where))
											{
												$where=$where."  (".$auth.")";
												
											}
?>