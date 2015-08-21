<html>
<head>
<title>PHP mail() test</title>
</head>

<body>
<h1>PHP mail() test</h1>
<form action="phpmail.php" method="post">
email to: <input type="text" name="mailto" /> <input type="submit" value="send email" />
</form>

<?php
if (isset($_POST["mailto"]) && $_POST["mailto"] != "") {
	mail ($_POST["mailto"], "test", "test message from PHP mail()");
	echo "<br>PHP should send an email to <b>". $_POST["mailto"] ."</b>.";
}
?>
</body>
</html>