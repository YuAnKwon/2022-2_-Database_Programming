<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<? include ("top.html"); ?>


<table border=0 width=600 align=center>
	<tr height=500><td align=center valign=top>  
	<table width=600 border=0>
		<tr><td height=40 align=center><h3><b>���̵� ã��</b></h3></td></tr>
</table>


<table border=0 width=600>
<tr><td>
	<form method=post action=findid2.php onsubmit="if(!this.uname.value ||   !this.email.value) return false;">
	<table border=0 width=300 align=center>
        <tr align=left><td height=50 valign=bottom>�̸�</td></tr>
		<tr><td colspan=2><input type=text name=uname placeholder=' �̸��� �Է����ּ���' style='width:300px; height:40px; font-size:15px; '></td></tr>
		<tr align=left><td height=50 valign=bottom>�̸���</td></tr>
		<tr align=center><td colspan=2><input type=text size=60 name=email placeholder='�̸����� �Է����ּ���' style='width:300px; height:40px; font-size:15px; '></td></tr>	
		<tr><td height=20></td></tr>
		<tr><td colspan=2 align=center><input type=submit value='���̵� Ȯ��' style='height:45px; width:300px; border: 0; border-radius: 15px; outline: none; font-size:15px;'></td></tr>
	</form>
	</table>
</td></tr>
</table>


   </td></tr>
</table>
  
<? include ("bottom.html"); ?>