<?
	echo("<table align=center border=0>
	<form method=post action=s-process.php>
	<tr align=center>
	<td>�̸�</td><td>�й�</td><td>�⼮</td><td>����</td>
	<td>����</td><td>����</td><td></td></tr>
	
	<tr align=center>
	<td><input type=text name=iname size=20></td>
	<td><input type=text name=inumber size=20></td>
	<td><input type=text name=iattend size=10></td>
	<td><input type=text name=ikor size=10></td>
	<td><input type=text name=ieng size=10></td>
	<td><input type=text name=imath size=10></td>
	<td><input type=submit value='�Է�'></td></tr>
	</form></table>");
	
	//���̺�
	$con = mysql_connect("localhost","root","apmsetup");
	mysql_select_db("class",$con);
	$result = mysql_query("select * from scoreboard",$con);
	$total = mysql_num_rows($result);
	
	echo ("<table border=0 align=center width=850><tr><td align=left><a href=s-show.php>[��ް��]</a></td>
		<td align=right>�Է� �л� �� $total ��</td></table>");
	echo("<table border=1 style = 'border-collapse: collapse' width=850 align=center>
		<tr align=center><td>�̸�</td><td>�й�</td><td>�⼮</td>
		<td>����</td><td>����</td><td>����</td><td>����</td><td>����</td></tr>");
	$i=0;
	while($i <$total):
		$oname= mysql_result($result,$i,"name");
		$onumber= mysql_result($result,$i,"number");
		$oattend= mysql_result($result,$i,"attend");
		$okor= mysql_result($result,$i,"kor");
		$oeng= mysql_result($result,$i,"eng");
		$omath= mysql_result($result,$i,"math");
		$oscore = mysql_result($result,$i,"score");
		
		echo ("<tr align=center><td>$oname</td>
				<td>$onumber</td>
				<td>$oattend</td>
				<td>$okor</td>
				<td>$oeng</td>
				<td>$omath</td>
				<td>$oscore</td>
				<td>
				[<a href='s-modify.php?mname=$oname'>M</a>]
				/
				[<a href='s-delete.php?dname=$oname'>X</a>]
				</td></tr>");
		$i++;
	endwhile;
	echo("</table><br>");
	
	mysql_close($con);
	
?>
