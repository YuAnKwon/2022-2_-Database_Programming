 <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">  
 
<? include ("top.html"); ?>
<?echo("<br><br>");?>
<table border=1 width=1000 align=center>
<tr height=1000>
   <td width=230 valign=top><? include ("p-left.php"); ?></td>
   <td width=770 align=center valign=top>

<?
	
$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);
	
$result = mysql_query("select * from product order by code", $con);

$total = mysql_num_rows($result);

echo ("
	<table border=1 width=750 align=center >
	
	<tr><td colspan=6><h2 align=left>��ǰ����/����</h1></td></tr>
	<tr>
		<td align=center><font size=3>��ǰ�ڵ�</td>
		<td colspan=2 align=center><font size=3>��ǰ��</td>
		<td align=center><font size=3>����</td>
		<td align=center><font size=3>���ΰ�</td>
		<td align=center><font size=3>����/����</td></tr>");
							
if (!$total) {

  echo("<tr><td colspan=6 align=center>���� ��ϵ� ��ǰ�� �����ϴ�</td></tr>");

} else {

	$counter = 0;

	while ($counter < $total) :

		$code=mysql_result($result,$counter,"code");
		$name=mysql_result($result,$counter,"name");
		$userfile=mysql_result($result,$counter,"userfile");
		$cprice=mysql_result($result,$counter,"cprice");
		$sprice=mysql_result($result,$counter,"sprice");

		echo ("
		   <tr><td width=80 align=center ><font size=3>$code</td>
				<td align=center width=50><img src=./photo/$userfile width=50 height=70 border=0></td>
			   <td width=350 align=left><a href=p-show.php?code=$code><font size=3>$name</a></td>
			   <td align=right width=70><font size=3><strike>$cprice&nbsp;��</strike></td>
			   <td align=right width=70><font size=3>$sprice&nbsp;��</td>
			   <td width=80 align=center><font size=3><a href=p-modify.php?code=$code>����</a><a href=p-delete.php?code=$code>/����</a></td></tr>");

		$counter++;
	endwhile;
}

echo ("</table>");
	     
mysql_close($con);


	
?>

   </td></tr>
</table>
  
<? include ("bottom.html"); ?>




