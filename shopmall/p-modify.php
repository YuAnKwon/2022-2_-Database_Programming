<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
  <script>
    $(document).ready(function() {
        $('#summernote').summernote({
      
      height: 300,                 // set editor height
      minHeight: null,             // set minimum height of editor
      maxHeight: null,             // set maximum height of editor
      focus: true                  // set focus to editable area after initializing summernote 
  
      });
    });
  </script>




<? include ("top.html"); ?>

<?echo("<br><br>");?>
<table border=1 width=1000 align=center >
<tr height=900>
   <td width=230 valign=top><? include ("p-left.php"); ?></td>
    <td width=770 align=center  valign=top>
	 
<?		 
$con=mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);

$result = mysql_query("select * from product where code='$code'", $con);

$class=mysql_result($result,0,"class");
$name=mysql_result($result,0,"name");
$cprice=mysql_result($result,0,"cprice");
$sprice=mysql_result($result,0,"sprice");
$content=mysql_result($result,0,"content");
$userfile=mysql_result($result,0,"userfile");
$deliver=mysql_result($result,0,"deliver");
$point=mysql_result($result,0,"point");
echo("<br><br>");
echo ("    
   <table border=1 width=750 align=center>
   <tr><td colspan=6><h1 align=left>��ǰ����</h1></td></tr>
	<form method=post action=p-modify2.php?code=$code enctype='multipart/form-data'>
		<tr><td width=100 align=center>��ǰ�ڵ�</td>
			<td width=550><b>$code</b></td></tr>
		<tr><td align=center>��ǰ �з�</td>
			<td><select name=class>");

switch($class) {
    case 1:
		echo ("<option value=1 selected>��Ų�ɾ�</option>
			<option value=2>Ŭ��¡</option>
            <option value=3>����ũ��</option>
			<option value=4>�ٵ��ɾ�</option>
			<option value=5>���/��ǻ��</option>");
		break;
	case 2:
		echo ("<option value=1>��Ų�ɾ�</option>
			<option value=2 selected>Ŭ��¡</option>
            <option value=3>����ũ��</option>
			<option value=4>�ٵ��ɾ�</option>
			<option value=5>���/��ǻ��</option>");
		break;
	case 3:
       echo ("<option value=1>��Ų�ɾ�</option>
			<option value=2>Ŭ��¡</option>
            <option value=3 selected>����ũ��</option>
			<option value=4>�ٵ��ɾ�</option>
			<option value=5>���/��ǻ��</option>");
		break;
		
	case 4:
       echo ("<option value=1>��Ų�ɾ�</option>
			<option value=2>Ŭ��¡</option>
            <option value=3>����ũ��</option>
			<option value=4 selected>�ٵ��ɾ�</option>
			<option value=5>���/��ǻ��</option>");
		break;
		
	case 5:
       echo ("<option value=1>��Ų�ɾ�</option>
			<option value=2>Ŭ��¡</option>
            <option value=3>����ũ��</option>
			<option value=4>�ٵ��ɾ�</option>
			<option value=5 selected>���/��ǻ��	</option>");
		break;
}

echo ("</select></td></tr>
	<tr><td align=center>��ǰ �̸�</td><td><input type=text name=name size=70 value='$name'></td></tr>
	<tr><td align=center>��ǰ ����</td><td><textarea name=content rows=15 cols=75 id=summernote>$content</textarea></td></tr>
	<tr><td align=center>����</td><td><input type=text name=cprice size=10 value=$cprice>��</td></tr>
	<tr><td align=center>���ΰ�</td><td><input type=text name=sprice size=10 value=$sprice>��</td></tr>
	<tr><td align=center>��ۺ�</td><td><input type=text name=deliver size=10 value=$deliver>��</td></tr>
	<tr><td align=center>����Ʈ</td><td><input type=text name=point size=10 value=$point>��</td></tr>
	<tr><td align=center>��ǰ ��ǥ<br>����</td><td><input type=file size=30 name=userfile><-- $userfile</td></tr>
	<tr><td align=center colspan=2><input type=submit value=�����Ϸ�></tr>
	</form>
	</table>");

mysql_close($con);

?>
