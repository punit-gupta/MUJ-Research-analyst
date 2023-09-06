<p>&nbsp;</p>
<div id="profile">
<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>

<?php
if ($login_session<>'guest')
{
?>
<b id="logout"><a href="logout.php">Log Out</a></b>
<?php
}
?>
</div>

<?php
if (($login_session=='admin')||($login_session=='adm'))
{
	?>
<div align="right"><b id="home"><a href="action.php">Home</a></b></div>
<?php
}
	?>