<?

$con=mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);

$result=mysql_query("select * from $board where id=$id",$con);

// �����ϰ��� �ϴ� ���� �Խù����� ���� ������ �׸��� ������
$writer=mysql_result($result,0,"writer");
$topic=mysql_result($result,0,"topic");
$content=mysql_result($result,0,"content");
$email=mysql_result($result,0,"email");

echo("<form method=post align=center action=cmprocess.php?board=$board&id=$id&wdate=$wdate>
			<table border=1>�̸�
			<input type=text size=10 name=wname value='$wname'>
			���
			<input type=text size=30 name=wmemo value='$wmemo'>&nbsp;&nbsp;
			<input type=image src='upload.png' width=30 height=20 title='�����ϱ�'>
			</table></form>");

mysql_close($con);

?>
