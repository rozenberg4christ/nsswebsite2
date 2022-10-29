<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
<head> 
<title>Untitled Document</title> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta http-equiv="Content-Style-Type" content="text/css"> 
<meta http-equiv="Content-Script-Type" content="text/javascript"> 
<script type="text/javascript"> 
var howmanytoadd=2; 
var rows; 
function calc(){ 
var tot=0; 
for(var i=0;i<rows.length;i++){ 
var linetot=0; 
for(var j=0;j<howmanytoadd;j++){ 
linetot+=Number(rows[i].getElementsByTagName('input')[j].value) 
} 
rows[i].getElementsByTagName('input')[howmanytoadd].value=linetot; 
tot+=linetot; 
} 
document.getElementById('total').value =tot 
} 
onload = function(){ 
rows=document.getElementById('tab').getElementsByTagName('tr'); 
for(var i=0;i<rows.length;i++){ 
for(var j=0;j<howmanytoadd;j++){ 
rows[i].getElementsByTagName('input')[j].onkeyup=calc; 
} 
} 
} 
</script> 
</head> 
<body> 
<form> 
<table id="tab" width="600" border="1" cellspacing="1" cellpadding="1"> 
<tr> 
<td><input type="text">+</td> 
<td><input type="text"></td> 
<td>line result  
<input type="text"></td> 
</tr> 
<tr> 
<td><input type="text">+</td> 
<td><input type="text"></td> 
<td>line result <input type="text"></td> 
</tr> 
<tr> 
<td><input type="text">+</td> 
<td><input type="text"></td> 
<td>line result <input type="text"></td> 
</tr> 
</table> 
Total <input type="text" id="total"> 
<input type="submit" name="submit" id="submit" value="submit" onClick="return check();" ></form> 
</body> 
</html>  