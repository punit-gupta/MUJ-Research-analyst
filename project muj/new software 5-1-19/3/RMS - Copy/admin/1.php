<style>
   .feed {padding: 5px 0}
</style>
<form method="GET" action="" onsubmit="return validate(this)">
<table>
<tr>
	<td valign=top> Feed URL (s):</td>
	<td valign=top>
		<div id="newlink">
			<div class="feed">
			   <input type="text" name="feedurl[]" value="http://feeds.feedburner.com/satya-weblog/scripting" size="50">
			</div>
		</div>
	</td>
</tr>
</table>
	<p>
		<br>
		<input type="submit" name="submit1">
		<input type="reset" name="reset1">
	</p>
<p id="addnew">
	<a href="javascript:add_feed()">Add New </a>
</p>
</form>
<!-- Template. This whole data will be added directly to working form above -->
<div id="newlinktpl" style="display:none">
	<div class="feed">
	 <input type="text" name="feedur" value=""  size="50">
	</div>
</div><script type="text/javascript">
function validate(frm)
{
	var ele = frm.elements['feedurl[]'];
	if (! ele.length)
	{
		alert(ele.value);
	}
	for(var i=0; i<ele.length; i++)
	{
		alert(ele[i].value);
	}
	return true;
}
var b=1;
function add_feed()
{
	var div1 = document.createElement('div');
	// Get template data
	b=b+1;
	div1.innerHTML ="<input type=\"text\" name=\"feedur"+b+"\"  size=\"50\">	";
	// append to our form, so that template data
	//become part of form
	document.getElementById('newlink').appendChild(div1);
}
</script>