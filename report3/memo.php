<?


function check($message) {
	echo ("
		<script>
		window.alert(\"$message\");
		history.go(-1);
		</script>
	");
	exit;
}

if (!$wname) check("�̸��� �Է��ϼ���");
if (!$wmemo) check("������ �Է��ϼ���");
$con = mysql_connect("localhost", "root", "apmsetup");
mysql_select_db("comma", $con);
$wdate = date("Y-m-d-H:i:s");

mysql_query("insert into memojang values('$wname', '$wdate','$wmemo',$id,'$wpasswd')", $con);

mysql_close($con);

echo ("<meta http-equiv='Refresh' content='0; url=content.php?board=$board&id=$id'>");

?>