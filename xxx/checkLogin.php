<?php
$loginUser = "aaa";
$loginPwd = "1234";
if ($_POST['username'] != $loginUser || $_POST['password'] != $loginPwd)
{
		echo "wrong password or username";
}
else
{
		$limitTime = time()+60*60;
		setcookie("memberlogin", $loginUser, $limitTime);
		echo "<meta http-equiv='refresh' content='0;url=makeStudent.php'>";
}
?>
