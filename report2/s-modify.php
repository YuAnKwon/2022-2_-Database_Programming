<?
	$con = mysql_connect("localhost","root","apmsetup");
	mysql_select_db("class",$con);
	$result = mysql_query("select * from scoreboard where name='$mname'",$con);
	$oname= mysql_result($result,0,"name");
	$onumber= mysql_result($result,0,"number");
	
	mysql_close($con);
	
	echo("<table align=center border=0>
	<form method=post action='s-process2.php?mname=$mname'>
	<tr align=center>
	<td>�̸�</td><td>�й�</td><td>�⼮</td><td>����</td>
	<td>����</td><td>����</td><td></td></tr>
	
	<tr align=center>
	<td>$oname </td>
	<td>$onumber </td>
	<td><input type=text name=iattend size=10></td>
	<td><input type=text name=ikor size=10></td>
	<td><input type=text name=ieng size=10></td>
	<td><input type=text name=imath size=10></td>
	<td><input type=submit value='�����Ϸ�'></td></tr>
	</form></table>");
?>