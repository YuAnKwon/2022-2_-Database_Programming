<?
	$con = mysql_connect("localhost","root","apmsetup");
	mysql_select_db("class",$con);
	$result = mysql_query("select * from addressbook where name='$mname'",$con);
	$mphone = mysql_result($result, 0, "phone");
	$maddress = mysql_result($result, 0, "address");
	mysql_close($con);
	
	echo("<h1>Addressbook</h1>
	<form method=post action='process2.php?mname=$mname'>
	�̸� : <input type=text name=iname size=10 value=$mname ><br>
	��ȣ : <input type=text name=iphone value=$mphone size=10><br>
	�ּ� : <input type=text name=iaddress value=$maddress size=50><br>
	<input type=submit value='�����Ϸ�'>
	
	</form>");
?>