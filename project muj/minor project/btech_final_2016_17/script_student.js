
 var data='';
  var action = '';
  var savebutton = "<input type='button' class='ajaxsave' value='Save'>";
  var updatebutton = "<input type='button' class='ajaxupdate' value='Update'>";
  var cancel = "<input type='button' class='ajaxcancel' value='Cancel'>";
  var emailfilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;	
   var pre_tds; 
var field_arr = new Array('text','text','text','text','text');
  var field_pre_text= new Array('Enter Enrollment number','Enter Firstname','Enter lastname','Enter Project Title','Enter Supervisor');
  var field_name = new Array('enrno','fname','lname','ptitle','superv'); 
 $(function(){
 $.ajax({
	     url:"StudentDbManipulate.php",
                  type:"POST",
                  data:"actionfunction=showData",
        cache: false,
        success: function(response){
		 
		  $('#demoajax').html(response);
		  createInput();
		  
		}
		
	   });
 
  
 $('#demoajax').on('click','.ajaxsave',function(){
     
	   var enrno =  $("input[name='"+field_name[0]+"']");
	   var fname = $("input[name='"+field_name[1]+"']");
	   var lname =$("input[name='"+field_name[2]+"']");
	   var ptitle = $("input[name='"+field_name[3]+"']");
	   var superv = $("input[name='"+field_name[4]+"']");

	   if(validate(enrno,fname,lname,ptitle,superv)){
	   data = "enrno="+enrno.val()+"&fname="+fname.val()+"&lname="+lname.val()+"&ptitle="+ptitle.val()+"&superv="+superv.val()+"&actionfunction=saveData";
       $.ajax({
	     url:"StudentDbManipulate.php",
                  type:"POST",
                  data:data,
        cache: false,
        success: function(response){
		   if(response!='error'){
		      $('#demoajax').html(response);
		  createInput();
		     }
		}
		
	   });
      }	
      else{
	   return;
	  }	  
	   });
 $('#demoajax').on('click','.ajaxedit',function(){
      var edittrid = $(this).parent().parent().attr('id');
    	var tds = $('#'+edittrid).children('td');
        var tdstr = '';
		var td = '';
		pre_tds = tds;
		for(var j=0;j<field_arr.length;j++){
		   
		     tdstr += "<td><input type='"+field_arr[j]+"' name='"+field_name[j]+"' value='"+$(tds[j]).html()+"' placeholder='"+field_pre_text[j]+"'></td>";
		  }
		  tdstr+="<td>"+updatebutton +" " + cancel+"</td>";
		  $('#createinput').remove();
		  $('#'+edittrid).html(tdstr);
	   });
	   
	   $('#demoajax').on('click','.ajaxupdate',function(){
       var edittrid = $(this).parent().parent().attr('id');
	   var enrno =  $("input[name='"+field_name[0]+"']");
	   var fname = $("input[name='"+field_name[1]+"']");
	   var lname =$("input[name='"+field_name[2]+"']");
	   var ptitle = $("input[name='"+field_name[3]+"']");
	   var superv = $("input[name='"+field_name[4]+"']");
	   if(validate(enrno,fname,lname,ptitle,superv)){
	   data = "enrno="+enrno.val()+"&fname="+fname.val()+"&lname="+lname.val()+"&ptitle="+ptitle.val()+"&superv="+superv.val()+"&editid="+edittrid+"&actionfunction=updateData";
       $.ajax({
	     url:"StudentDbManipulate.php",
                  type:"POST",
                  data:data,
        cache: false,
        success: function(response){
		   if(response!='error'){
		      $('#demoajax').html(response);
		  createInput();
		     }
		}
		
	   });
}
else{
return;
}	   
	   });
	   	   $('#demoajax').on('click','.ajaxdelete',function(){
       var edittrid = $(this).parent().parent().attr('id');
	   
	   data = "deleteid="+edittrid+"&actionfunction=deleteData";
       $.ajax({
	     url:"StudentDbManipulate.php",
                  type:"POST",
                  data:data,
        cache: false,
        success: function(response){
		   if(response!='error'){
		      $('#demoajax').html(response);
		  createInput();
		     }
		}
		
	   });	   
	   });
 $('#demoajax').on('click','.ajaxcancel',function(){
      var edittrid = $(this).parent().parent().attr('id');
	  
        $('#'+edittrid).html(pre_tds);
		createInput();
	   });	   
	   });
	   
 function createInput(){
  var blankrow = "<tr id='createinput'>";   
  for(var i=0;i<field_arr.length;i++){
	  blankrow+= "<td class='ajaxreq'><input type='"+field_arr[i]+"' name='"+field_name[i]+"' placeholder='"+field_pre_text[i]+"' /></td>";
	}
	blankrow+="<td class='ajaxreq'>"+savebutton+"</td></tr>";
  $('#demoajax').append(blankrow);	
  }
function validate(enrno,fname,lname,ptitle,superv){
var contact = jQuery('input[name=contact]');
		
		if (enrno.val()=='') {
			enrno.addClass('hightlight');
			return false;
		} else enrno.removeClass('hightlight');
		if (fname.val()=='') {
			fname.addClass('hightlight');
			return false;
		} else fname.removeClass('hightlight');
		if (lname.val()=='') {
			lname.addClass('hightlight');
			return false;
		} else lname.removeClass('hightlight');
		if (ptitle.val()=='') {
			ptitle.addClass('hightlight');
			return false;
		} else ptitle.removeClass('hightlight');
		
		if (superv.val()=='') {
			superv.addClass('hightlight');
			return false;
		}else superv.removeClass('hightlight');
		
		return true;
		
}
