<?PHP
header("Content-Type: text/html; charset=utf8");
if(!isset($_POST["submit"])){
	exit("错误执行");
}//检测是否有submit操作

include('connect.php');//链接数据库
$username = $_POST['name'];//post获得用户名表单值
$passowrd = $_POST['password'];//post获得用户密码单值

if ($username && $passowrd){//如果用户名和密码都不为空
	$sql = "select * from user where username = '$username' and password='$passowrd'";//检测数据库是否有对应的username和password的sql
	$result = mysqli_query($con, $sql);//执行sql

	if($result===true){//0 false 1 true
		header("refresh:0;url=welcome.html");//如果成功跳转至welcome.html页面
		exit;
	}else{
		echo "用户名或密码错误";

	}


}else{//如果用户名或密码有空
	echo "表单填写不完整";

}

mysqli_close($con);//关闭数据库
?>