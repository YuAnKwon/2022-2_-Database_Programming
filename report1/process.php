<?
	$con = mysql_connect("localhost","root","apmsetup");
	mysql_select_db("class",$con);
	
	$result = mysql_query("select * from product where pcode='$icode'",$con);
	// icode�� �����ϴ��� �ϴ� �˻�
	$total = mysql_num_rows($result);
	
	if ($total>0){ //�˻��ϴϱ� ����
		$oname = mysql_result($result,0,"pname");
		$oprice = mysql_result($result,0,"pprice"); //���� price�� �޾ƿ�
		$ounit = mysql_result($result,0,"punit");  // ���� unit �� �޾ƿ�
		
		$nunit = $ounit + $iunit;
		$nprice = ($oprice*$ounit + $iprice*$iunit)/$nunit;

		mysql_query("update product set pname='$iname', pprice='$nprice', punit='$nunit' where pcode='$icode'",$con);
	}
	else{ //�˻��ϴϱ� ���� -> �߰�
		mysql_query("insert into product values ('$icode','$iname','$iprice','$iunit')",$con);
	}
	
	mysql_close($con);
	echo ("<meta http-equiv='Refresh' content='0; url=input.php'>");
?>