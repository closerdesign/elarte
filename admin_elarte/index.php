<?php
if (!isset($_SESSION)) //Si no ha iniciado session iniciarla
{
	ini_set("session.cookie_lifetime", 10800);
	session_start();
}
  
if($_GET['logout']==1)
{
		$_SESSION['user_bbm_s']= null;
}
	
	//require_once "Application/Model/FuncionesSQL.php";
	//$q = new ConecteMysql();


	
if($_POST['Submit']) //Si el usuario envio el formulario
{ 

	$Usuario = $_POST['user_BBM'];
	$Password = $_POST['pass_BBM']; //Convertimos a minusculas
	
		//$query = "select * from admin_usuarios where username = '$Usuario'";
		//$q->ejecutar($query, "");
	
		//if($q->Cargar())
		//{
				
			if($Usuario == "usuario" && $Password == "Qazplm123")
			{
				
				$_SESSION['user_bbm_s']=$Usuario;
				
				$MM_redirectLoginSuccess = "public/conciliacion.php";
				
				
	
				header("Location: " . $MM_redirectLoginSuccess );
			}
			else
				$correcto = 2;
		//}
		//else
			//$correcto = 2;
			
	

	//$correcto = 3;
	
	if($correcto==2) 
	{
		$MM_redirectLoginFailed = "index.php?fallo=1";
		header("Location: ". $MM_redirectLoginFailed );
	}
	
	if($correcto==3) 
	{
		$MM_redirectLoginFailed = "index.php?fallo=3";
		header("Location: ". $MM_redirectLoginFailed );
	}
	
}



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>BBM MARKETING REGISTRATION</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {color: #FF0000}
.mensaje {
	font-weight: bold;
	color: #00F;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
}
-->
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#F9F9F9"></td>
  </tr>
</table>
<p>&nbsp;</p>
<div align="center">
  <form name="form1" method="post" action="">
    <span class="mensaje"></span><br>
    <table width="300" border="1" bordercolor="#000000">
      <tr>
        <td><table width="300" bordercolor="#000000">
          <tr>
            <td rowspan="4"><div align="center"></div></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><div align="right">Username:</div></td>
            <td><input name="user_BBM" type="text" id="user_BBM2"></td>
          </tr>
          <tr>
            <td><div align="right">Password:</div></td>
            <td><input name="pass_BBM" type="password" id="pass_BBM2"></td>
          </tr>
          <tr>
            <td height="50" colspan="2"><div align="center">
                <input type="submit" name="Submit" value="Enter">
            </div></td>
          </tr>
        </table></td>
      </tr>
    </table>
    <br>
    <span class="style1">
    <?php if($_GET['Session']==1) echo "Your session has timed out. Please sign in again";?>
	<?php if($_GET['fallo']==1) echo "Unknown user or password incorrect";?>
    <?php if($_GET['fallo']==2) echo "La cuenta invitado no esta habilitada en este momento."; ?> 
    <?php if($_GET['fallo']==3) echo "REGISTRATION IS NOW CLOSED. <br> For further information please contact, Benito Besada at benito@bbmmarketing.com"; ?> 
    </span>
  </form>
</div>
</body>
</html>
