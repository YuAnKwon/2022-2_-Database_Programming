<?

$con=mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);

mysql_query("delete from $board where id=$id",$con);
echo("
	<script>
	window.alert('���� ���� �Ǿ����ϴ�.');
	</script>
");

// ������ �ۺ��� �� ��ȣ�� ū �Խù��� �� ��ȣ�� 1�� ����
$tmp = mysql_query("select id from $board order by id desc", $con);
$last = mysql_result($tmp, 0, "id");     // ���� ������ �� ��ȣ ����

$i = $id + 1;       // ������ ���� ��ȣ���� 1�� ū �� ��ȣ���� ����
while($i <= $last):
	mysql_query("update $board set id=id-1 where id=$i", $con);
	$i++;
endwhile;

// �� ���� ����� �����ֱ� ���� �� ��� ���� ���α׷� ȣ��
echo("<meta http-equiv='Refresh' content='0; url=show.php?board=$board'>");

mysql_close($con);

?>