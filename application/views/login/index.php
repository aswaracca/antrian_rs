<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman Login</title>
</head>
<body>
	<form action=" " method="post">
		<input type="text" name="username" /><br /><br />
		<input type="text" name="password" />
		<input type="submit" value="Login">
	</form>
</body>
</html> -->

<!DOCTYPE HTML>
<html>
<head>
<title>Login Sistem</title>
<style type="text/css">
body {
}
#body {
	position:absolute;
 	margin-left:auto;
 	margin-right:auto;
 	margin-top:auto;
 	margin-bottom:auto;
	left:0;
	right:0;
	top:0;
	bottom :0;	
	border:1px solid #000;;
}

#log_head{
	background-image: url(<?php echo base_url();?>assets/images/a.jpg);
	padding:20px;
	border:1px solid #000;;
	color:#FFF;
	text-align:center;
	margin-bottom:25px;
}
</style>

</head>
<body bgcolor="sky blue">
<div id="body" style="width:350px; height:200px;">
	
    <div id="log_head"><strong> &nbsp   </strong>
    </div>
    
    <form action=" " method="POST">
    <table width="100%" style="background:#FFF; ">
		
    	<tr>
        	<td width="20%">Username</td>
            <td>:</td>
            <td><input type="text" name="username" size="30%"></td>
        </tr>
        <tr>
        	<td>Password</td>
            <td>:</td>
            <td><input type="password" name="password" size="30%"></td>
        </tr>
        <tr>
        	<td></td>
            <td></td>
            <td><button type="submit" value="Login">LOGIN
			<button type="reset" name="log">RESET</td>
        </tr>
    </table>
    </form>   
</div>
</body>
</html>