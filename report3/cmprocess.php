<?
if (!$wname){
	echo("
		<script>
		window.alert('�̸��� �����ϴ�. �ٽ� �Է��ϼ���')
		history.go(-1)
		</script>
	");
	exit;
}
if (!$wmemo){
	echo("
		<script>
		window.alert('��۳����� �����ϴ�. �ٽ� �Է��ϼ���')
		history.go(-1)
		</script>
	");
	exit;
}

$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);
$result = mysql_query("select * from memojang where id=$id and wdate='$wdate'", $con);

// ���� �ʵ尪�� ������ �׸��� ������
//$space = mysql_result($result, 0, "space");
//$hit = mysql_result($result, 0, "hit");

$mwdate = date("Y-m-d-H:i:s");	//�� ������ ��¥ ����

// ���� ������ ���̺� ������
mysql_query("update memojang set name='$wname', message='$wmemo', wdate='$mwdate' where id=$id and wdate='$wdate'", $con);
echo("<meta http-equiv='Refresh' content='0; url=content.php?board=$board&id=$id'>");

mysql_close($con);

?>
