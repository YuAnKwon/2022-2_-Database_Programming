<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<style>
button {
  height: 2.5em;
  cursor: pointer;
}


</style>

<script language='Javascript'>
function a() {
   var id = document.idcheck.newid.value;
   if (id == '') {
        window.alert('���̵� �Է��� �ּ���!')
   } else {
	if (id.length < 5) 
        window.alert('���̵� 5���� �̻� �Է��� �ּ���!')
    else 
        document.idcheck.submit();
   }
}

function b() {
    opener.comma.uid.value = document.idcheck.id.value;
    this.close();
}

</script>

<form method=post action=id_check.php name=idcheck>
<table border=0 align=center width=400>
<tr><td height=130 align=center>

<?

if   (isset($newid)) $id = $newid;

$con = mysql_connect("localhost", "root", "apmsetup");
mysql_select_db("shopmall", $con);
	
$result = mysql_query("select * from member where uid='$id'",$con);
$total = mysql_num_rows($result);
	
if ($total == 0) {
echo ("<br><font size=4 color=red><b>$id</b></font><font size=4> ��(��) ��� ������ ���̵��Դϴ�.<a href='javascript:b()'><input type=hidden name=id value='$id'><br><br><font size=3>Ȯ��</font></a>");
} else {
echo "<font size=3 color=red><b>$id</b></font><font size=2> ��(��) �̹� ������� ���̵��Դϴ�.<br>�ٸ� ���̵� �Է��� �ּ���.<br><br><br>* <b>���̵� </b> <input type=text   name=newid size=20>&nbsp;&nbsp;<a href='javascript:a()'>ID�ߺ��˻�</a>";
}

mysql_close($con);

?>

</td></tr>
</table>
</form>
