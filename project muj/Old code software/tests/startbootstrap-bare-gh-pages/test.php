<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
		<title>Submit Form example from sarahk.pcpropertymanager.com/blog/submit-form-using-javascript/192/</title>
		<script>function submitMe()
{
alert('In submitMe()');
document.submitForm.submit();
return;
}
	</script>
	</head>
	<body bgcolor="#ffffff">
		<form name="submitForm" action="page9.php" method="POST">
			<input type="hidden" value="year" name="field">
			<input type="hidden" value="2017" name="name1">			
			 <a href="javascript:document.submitForm.submit()">submit direct</a><br>
			 <a href="javascript:submitMe()">submit via a function</a><br>
		     
		</form>
	</body>
</html>