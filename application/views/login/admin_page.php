<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Page</title>
</head>
<body>
	<p>Hi, <?php echo $this->session->userdata('isername') ?></p>
	<a href="<?php echo site_url('login/logout') ?>">Logout</a>
	
</body>
</html>