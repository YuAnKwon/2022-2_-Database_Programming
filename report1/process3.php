<? //�ǸſϷ� ��ư������ ó���ϴ� ��
	$con = mysql_connect("localhost","root","apmsetup");
	mysql_select_db("class",$con);
	
	$wdate = date("m�� d�� H�� i��");
	
	$result = mysql_query("select * from product where pcode='$icode'",$con); //icode ���ڵ� �˻�
	$ounit = mysql_result($result,0,"punit"); 
	// iunit = �Ǹż���, ounit=�������, nunit=��������
	
	if ($iunit < $ounit){
		$nunit = $ounit - $iunit; //���� ��ǰ��
		mysql_query("insert into sales values ('$icode','$iunit','$wdate')",$con);
		mysql_query("update product set punit=$nunit where pcode='$icode'",$con);
	}
	mysql_close($con);
	echo("<meta http-equiv='Refresh' content='0; url=sales.php'>");
?>