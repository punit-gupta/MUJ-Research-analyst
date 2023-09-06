$(document).ready( function(){
$('#auto').load('load.php');
refresh();
});
 
function refresh()
{
	setTimeout( function() {
	  $('#auto').fadeOut('slow').load('load.php').fadeIn('slow');
	  refresh();
	}, 60000);
}

