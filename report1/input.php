<?
	$con = mysql_connect("localhost","root","apmsetup");
	mysql_select_db("class",$con);
	$result = mysql_query("select * from product",$con);
	$total = mysql_num_rows($result);
	
	echo ("<h1 align=center>������</h2>
		<form method=post action=process.php align=center>
		��ǰ�ڵ� : <input type=text name=icode size=20>
		��ǰ�̸� : <input type=text name=iname size=20>
		��ǰ�ܰ� : <input type=text name=iprice size=20>
		��ǰ���� : <input type=text name=iunit size=10>
		<input type=submit value='�űԱ���'>
		</form>");
		
	// ���̺�	
	echo("<table border=1 width=1000 align=center>
		<tr align=center><td>��ǰ�ڵ�</td><td>��ǰ�̸�</td><td>��ǰ�ܰ�</td><td>��ǰ����</td><td>����</td></tr>");
	$i=0;
	while($i <$total):
		$ocode= mysql_result($result,$i,"pcode");
		$oname= mysql_result($result,$i,"pname");
		$oprice= mysql_result($result,$i,"pprice");
		$ounit= mysql_result($result,$i,"punit");
		
		echo ("<tr align=center><td>$ocode</td>
				<td>$oname</td>
				<td>$oprice</td>
				<td>$ounit</td>
				<td>
				[<a href='modify.php?mcode=$ocode'>O</a>]
				/
				[<a href='delete.php?dcode=$ocode'>X</a>]
				</td></tr>");
		$i++;
	endwhile;
	echo("</table><br>");
	
	mysql_close($con);
	echo("<center><a href=sales.php>[�������]</a></center>");
		
?>