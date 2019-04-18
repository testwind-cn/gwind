<!doctype html>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1,width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />

    
<meta property="qc:admins" content="24556445777631611006375" />
    
<title>感谢关注</title>
    
<style type="text/css">
body {
	background-color: #CAB08D;
}
img {
	-webkit-border-radius: 5px; 
-moz-border-radius: 5px; 
border-radius: 5px; 




}
</style>
</head>

<body>
<img src="logo.jpg" width="180" height="53" alt=""/><br>
    

大舜财行
  <br>
    <br>
    <br>
    
    <?php

require_once 'sql.func.php';
//引入记录消息的函数文件
require_once 'record_message.func.inc.php';


    
    if ( isset($_POST["name"]) ) {
        echo "<strong>".$_POST["name"]."</strong> 先生/女士，感谢您的关注。";
    }

	if ( isset($_POST["tel"]) && strlen($_POST["tel"]) > 0  ) {
        
         $date = date("Y-m-d H:i:s",time());
        openDB();
        _record_message( $_POST["name"], $_POST["sex"],$_POST["tel"], $_POST["city"],$_POST["money"],$_POST["hasper"],$_POST["email"],$_POST["addr"],$date);
        closeDB();
	}


?>
    
    <br>请您保持电话畅通，我们专业客服会及时与您联系。<br><br><br>您可以关闭此窗口。
    
    
    
</body>  
    
</html>