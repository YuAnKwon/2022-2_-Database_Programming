<?
	$con = mysql_connect("localhost","root","apmsetup");
	mysql_select_db("class",$con);
	
	$result=mysql_query("select * from addressbook where $ifield like '%$ikey%'",$con);
	$total = mysql_num_rows($result);
		
	echo("<h1>Addressbook</h1>");
	echo("<form method=post action=search.php>
		<select name=ifield>
			<option value='name'>�̸�</opton>
			<option value='phone'>����</opton>
			<option value='address'>�ּ�</opton>
		</select>
		<input type=text size=10 name=ikey><input type=submit value='�˻�'>
		</form>");
	echo("<table border=1 width=500>
		<tr><td>�̸�</td><td>��ȣ</td><td>�ּ�</td><td></td></tr>");
	$i=0;
	while($i <$total):
		$oname= mysql_result($result,$i,"name");
		$ophone= mysql_result($result,$i,"phone");
		$oaddress= mysql_result($result,$i,"address");
		echo ("<tr><td>$oname</td>
				<td>$ophone</td>
				<td>$oaddress</td>
				<td>
				[<a href='modify.php?mname=$oname'>����</a>]
				[<a href='delete.php?dname=$oname'>����</a>]
				</td></tr>");
		$i++;
	endwhile;
	echo("</table>");
	
	mysql_close($con);
	
?>