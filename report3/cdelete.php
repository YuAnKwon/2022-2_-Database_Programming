<?

$con=mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);

mysql_query("delete from memojang where wdate='$wdate' and id=$id",$con);
echo("
	<script>
	window.alert('����� ���� �Ǿ����ϴ�.');
	</script>
");

echo("<meta http-equiv='Refresh' content='0; url=content.php?board=$board&id=$id'>");

mysql_close($con);

?>
