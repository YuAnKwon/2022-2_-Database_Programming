<style>
  table {
    border-collapse: collapse;
  }
  th, td {
    padding: 10px;
  }
	a:link { color:black;text-decoration-line :none; }
	a:visited { color:black; } 
	a:hover { color:red; } 
</style>

<?

$con =   mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);
$result = mysql_query("select * from $board order by id desc", $con);
$total = @mysql_num_rows($result);

echo("
	<table  width=700 align=center >
	<tr><td colspan=2 align=center><h1>�Խ���</h1></td></tr>
	<tr><td align=left>
		<form method=post action=search.php?board=$board>
			<select name=field>
			<option value=writer>�۾���</option>
			<option value=topic>����</option>
			<option value=content>����</option>
		</select>
		<input type=text  name=key size=30>
		<input type=image src='search.png' width=20 height=20 >
	</td>
	</form>
		<td align=right><a href=input.php?board=$board><img src=pencil.png width=30 height=30></a></td></tr>
	</table>
	<table width=700 align=center style='border-bottom: 1px solid #E6E6FA;'>
		<tr  bgcolor ='#E6E6FA'><td align=center width=50><b>��ȣ</b></td>
			<td align=center width=100><b>�۾���</b></td>
			<td align=center width=400><b>����</b></td>
			<td align=center width=150><b>��¥</b></td>
			<td align=center width=50><b>��ȸ</b></td>
		</tr>
");

if (!$total){
	echo("
		<tr><td colspan=5 align=center>���� ��ϵ� ���� �����ϴ�.</td></tr>
	");
} else {

	if   ($cpage=='') $cpage=1;    // $cpage -  ���� ������ ��ȣ
	$pagesize = 5;                // $pagesize - �� �������� ����� ��� ����

	$totalpage = (int)($total/$pagesize);
	if (($total%$pagesize)!=0) $totalpage = $totalpage + 1;

	$counter=0;

	while($counter<$pagesize):
		
		$newcounter=($cpage-1)*$pagesize+$counter;
		if ($newcounter == $total) break;

		$id=mysql_result($result,$newcounter,"id");
		$writer=mysql_result($result,$newcounter,"writer");
		$topic=mysql_result($result,$newcounter,"topic");
		$hit=mysql_result($result,$newcounter,"hit");
		$wdate=mysql_result($result,$newcounter,"wdate");
		$date=substr($wdate,0,10);
		$space=mysql_result($result,$newcounter,"space");
		$file=mysql_result($result,$newcounter,"filename");
		$result1 = mysql_query("select * from memojang where id=$id", $con);
		$total1 = mysql_num_rows($result1);

		
		$t="";
		if   ($space>0) {
			for ($i=0 ; $i<=$space ; $i++)
				$t=$t . "&nbsp;";	// �亯 ���� ��� ���� �� �κп� ���� ä��
		}

		echo("
			<tr style='border-bottom: 1px solid #E6E6FA;' onMouseOver=\"this.style.backgroundColor='#E6E6FA'\" onMouseOut=\"this.style.backgroundColor='white'\"><td align=center>$id</td>
			<td align=center>$writer</td>");
			
			if(!$file){ //÷�������� ���� ��� 
				if($total1!=0){
					echo("
						<td align=left>$t<a href=content.php?board=$board&id=$id >$topic [$total1]</a></td>
					");
				}
				else {
					echo("
						<td align=left>$t<a href=content.php?board=$board&id=$id>$topic</a></td>
					");
				}
			}else{ //÷�������� ������� ǥ�� ����.
				if($total1!=0){
					echo("
						<td align=left>$t<img src=file.png width=15 height=15><a href=content.php?board=$board&id=$id>$topic [$total1]</a></td>
					");
				}
				else {
					echo("
						<td align=left>$t<img src=file.png width=15 height=15><a href=content.php?board=$board&id=$id>$topic</a></td>
					");
				}			
			}		
		echo("
			<td align=center>$date</td>
			<td align=center>$hit</td>
			</tr>
		");
		$counter = $counter + 1;

	endwhile;

	echo("</table>");
echo("<br>");
	echo ("<table border=1 width=700 align=center style='border-color:#E6E6FA;'>
		  <tr align=center ><td style='border-top:hidden; border-bottom:hidden; border-left:hidden;'>");
		   
	// ȭ�� �ϴܿ� ������ ��ȣ ���
	if ($cblock=='') $cblock=1;   // $cblock - ���� ������ ��ϰ�
	$blocksize = 5;             // $blocksize - ȭ��� ����� ������ ��ȣ ����

	$pblock = $cblock - 1;      // ���� ����� ���� ��� - 1
	$nblock = $cblock + 1;     // ���� ����� ���� ��� + 1
		
	// ���� ����� ù ������ ��ȣ
	$startpage = ($cblock - 1) * $blocksize + 1;	

	$pstartpage = $startpage - 1;  // ���� ����� ������ ������ ��ȣ
	$nstartpage = $startpage + $blocksize;  // ���� ����� ù ������ ��ȣ

	if ($pblock > 0)        // ���� ����� �����ϸ� [�������] ��ư�� Ȱ��ȭ
		echo ("<td width=30 onMouseOver=\"this.style.backgroundColor='#E6E6FA'\" onMouseOut=\"this.style.backgroundColor='white'\">
				<a href=show.php?board=$board&cblock=$pblock&cpage=$pstartpage><<</a></td> ");

	// ���� ��Ͽ� ���� ������ ��ȣ�� ���	
	$i =   $startpage;
	while($i < $nstartpage):
	   if ($i > $totalpage) break;	   // ������ �������� ��������� ������
	   if ($i == $cpage){
		   echo ("<td width=30 bgcolor='#E6E6FA'>
			<a href=show.php?board=$board&cblock=$cblock&cpage=$i>$i</a></td>");
	   }
		else{
			echo ("<td width=30 onMouseOver=\"this.style.backgroundColor='#E6E6FA'\" onMouseOut=\"this.style.backgroundColor='white'\">
		<a href=show.php?board=$board&cblock=$cblock&cpage=$i>$i</a></td>");}
	   $i = $i + 1;
	endwhile;
	 
	// ���� ����� ���� �������� ��ü ������ ������ ������ [�������] ��ư Ȱ��ȭ  
	if ($nstartpage <= $totalpage)   
		echo ("<td width=30 onMouseOver=\"this.style.backgroundColor='#E6E6FA'\" onMouseOut=\"this.style.backgroundColor='white'\">
			<a href=show.php?board=$board&cblock=$nblock&cpage=$nstartpage>>></a></td> ");

	echo ("</td><td style='border-top:hidden; border-bottom:hidden; border-right:hidden;'></td></tr></table>");
}


 mysql_close($con);

?>