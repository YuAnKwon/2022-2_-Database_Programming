<?

if (!$writer){
	echo("
		<script>
		window.alert('�̸��� �����ϴ�. �ٽ� �Է��ϼ���.')
		history.go(-1)
		</script>
	");
	exit;
}

if(!$topic){
	echo("
		<script>
		window.alert('������ �����ϴ�. �ٽ� �Է��ϼ���.')
		history.go(-1)
		</script>
	");
	exit;
}

if(!$content){
	echo("
		<script>
		window.alert('������ �����ϴ�. �ٽ� �Է��ϼ���.')
		history.go(-1)
		</script>
	");
	exit;
}

// �����ͺ��̽��� ����
$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);

$result=mysql_query("select id from $board",$con);
$total=mysql_num_rows($result);

// �ۿ� ���� id�ο�
if (!$total){
	$id = 1;
} else {
	$id = $total + 1;
}


$wdate = date("Y-m-d");	//   �� �� ��¥ ����
if ($userfile) {	
   $savedir = "./pds";	//÷�� ������ ����� ����
   $temp = $userfile_name;
   copy($userfile, "$savedir/$temp");
   unlink($userfile);
}

// ���̺� �Է� �� ������ ����
mysql_query("insert into $board(id, writer, email, passwd, topic, content, hit, wdate, space, filename, filesize) values($id, '$writer', '$email', '$passwd', '$topic', '$content', 0, '$wdate', 0,'$userfile_name','$userfile_size')", $con);

mysql_close($con);	// �����ͺ��̽� ��������

//show.php ���α׷��� ȣ���ϸ鼭 ���̺� �̸��� ����
echo("<meta http-equiv='Refresh' content='0; url=show.php?board=$board'>");

?>