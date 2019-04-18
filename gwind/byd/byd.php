
<?php


define("TOKEN", "weixin");

$thetime = time();

$wechatObj = new wechatCallbackapiTest();


//	$wechatObj->responseMsg();




function wj_get_token(){
    
    //更换成自己的APPID和APPSECRET
    
    
    $APPID="wx9dbed6286129d8e4";
    $APPSECRET="bf549a407efe0da9c8ea3b59376eef0d";
    
    $TOKEN_URL="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$APPID."&secret=".$APPSECRET;
    
    
    
    $json=file_get_contents($TOKEN_URL);
    
    //   return $json;
    
    $result=json_decode($json);
    
    $ACC_TOKEN=$result->access_token;
    
    return $ACC_TOKEN;
}



function wj_get_jsapi_ticket(){

    $ticket = "";

    //  do{

        //    $ticket = S('wx_ticket');

    //       if (!empty($ticket)) {

    //      break;

    //    }

    //      $token = S('access_token');

    //  if (empty($token)){

    //        wx_get_token();

    //     }

    //   $token = S('access_token');
    
    $token = wj_get_token();

    //     if (empty($token)) {

    //      logErr("get access token error.");

    //      break;

    //  }

        $url2 = sprintf("https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=%s&type=jsapi",

            $token);

        $res = file_get_contents($url2);

        $res = json_decode($res, true);

        $ticket = $res['ticket'];

        // 注意：这里需要将获取到的ticket缓存起来（或写到数据库中）

        // ticket和token一样，不能频繁的访问接口来获取，在每次获取后，我们把它保存起来。

        //        S('wx_ticket', $ticket, 3600);

    //  }while(0);

    return $ticket;

}

/*   
    $data = '{
        "touser":"'.$touser.'",
        "msgtype":"text",
        "text":
        {
             "content":"'.$content.'"
        }
    }';
    
    $url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=".$ACC_TOKEN;
    
    $result = https_post($url,$data);
    $final = json_decode($result);
    return $final;
}


*/


	function wj_get_signature() {
// 签名，将jsapi_ticket、noncestr、timestamp、分享的url按字母顺序连接起来，进行sha1签名。

// noncestr是你设置的任意字符串。

// timestamp为时间戳。

global $thetime;
        
            $timestamp = $thetime;

            $wxnonceStr = "anystring";

            $wxticket = wj_get_jsapi_ticket();

            $wxOri = sprintf("jsapi_ticket=%s&noncestr=%s&timestamp=%s&url=%s",

                $wxticket, $wxnonceStr, $timestamp,

                'http://togo.sinaapp.com/main.php'

                ); 

           $wxSha1 = sha1($wxOri);
        
        return $wxSha1;
    }



class wechatCallbackapiTest
{
    public function valid()
    {
        $echoStr = $_GET["echostr"];
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }
    
   

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }
    
    private function wj_get_token() {
        
        // $token = S('access_token');

	    if (!$token) {

    	    $res = file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='            .'你的AppID'.'&secret='            .'你的AppSecret');

        	$res = json_decode($res, true);

   		     $token = $res['access_token'];

        // 注意：这里需要将获取到的token缓存起来（或写到数据库中）

        // 不能频繁的访问https://api.weixin.qq.com/cgi-bin/token，每日有次数限制

        // 通过此接口返回的token的有效期目前为2小时。令牌失效后，JS-SDK也就不能用了。

        // 因此，这里将token值缓存1小时，比2小时小。缓存失效后，再从接口获取新的token，这样

        // 就可以避免token失效。

        // S()是ThinkPhp的缓存函数，如果使用的是不ThinkPhp框架，可以使用你的缓存函数，或使用数据库来保存。

        //      S('access_token', $token, 3600);

    	}

 	   return $token;

	}

}



?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1,width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<title>车主共赢-共同介绍分享</title>
<style type="text/css">
body,td,th {
	font-size: 12px;
}
.zzRed {
	color: #FD001F;
	font-size: large;
	font-weight: bold;
}
.myimg {
	border-style: solid;
	border-color: #001DFF;
	width: 90%;
}
.zzBlue {
	color: #0005FF;
	font-size: large;
}
</style>
</head>

<body>

<p><br>
  <br>
  <br>
  <br>
  <br>
  
  <?php // echo SAE_MYSQL_HOST_M."_:_".SAE_MYSQL_PORT."-".SAE_MYSQL_USER."  ".SAE_MYSQL_PASS ?>
      
<p>
本公众号尚未启用,您所看见的文字内容均为测试内容.
<br>
zunfeng平台对相关内容不作审核和确保.
<br>
请您与信息提供者联系,以便确保信息准确.
<p>

<p><span class="zzRed">比亚迪回访电话: 4001 666 016
  <br>
  请把 4001 666 016 号码保存到你手机，姓名写你上家名字和手机号码，这样可以熟悉上家的名字电话。</span>
  <br><br>
  
  
  <span class="zzBlue">公众号是  &nbsp;zunfeng_sh ，长按图片识别二维码
  <br>
  <img src="qrcode_for_gh_1ee9227f8214_430.jpg" width="50%" height="" alt=""/>
  <br>
    
  点击公众号菜单“车主共赢”，显示本页面。<br>
  <br>
  发送微信给acewind1六张屏幕截图的1、2、4三张。
  <br>
  下面有截屏示意图。
  <br>
  将会给付你一个上家姓名和电话,作为你的上家。<br>
  操作成功后，再发送后一张截图，确认串联成功。<br>
  </span>
  <br>
  <br>
  
  <span class="zzBlue">
  沟通交流请微信联系 acewind1，<br>
  <img src="mmqrcode1432920239646.jpg" alt="" width="50%"/><br>
    
  下面表中，是已经串联的车主，公开显示以便大家了解相关信息。
</span>
  
<table width="100%" border="1" cellpadding="0" cellspacing="0">
  <tbody>
    <tr bgcolor="#8EA6FF">
      <th width="5%" bgcolor="#8EA6FF" scope="col">ID</th>
      <th width="6%" scope="col">姓名</th>
      <th width="7%" scope="col">上家</th>
      <th width="18%" scope="col">电话</th>
      <th width="25%" scope="col">微信</th>
      <th width="10%" scope="col">城市</th>
      <th width="6%" scope="col">性别</th>
      <th width="12%" scope="col">日期</th>
      <th width="11%" scope="col">购车4S</th>
    </tr>
 
	
	<?php
	$mysql = new SaeMysql();
	$sql = "SELECT * FROM `app_togo`.`byd`";
//	echo $sql;
	$data = $mysql->getData($sql);
//	$name = $data[0]['NAME'];
//	echo $name;

    for($i=0;$i<count($data);$i++)  //循环便利显示查询结果
	{
		$tel = $data[$i]['TEL'];
		$wechat = $data[$i]['WECHAT'];
		$tel = substr($tel,0,strlen($tel)-7)."*****".substr($tel,strlen($tel)-2,2);
		$wechat = substr($wechat,0,strlen($wechat)-6)."****".substr($wechat,strlen($wechat)-2,2);
		
	?>   
    <tr>
      <th bgcolor="#8EA6FF" scope="row"><?php echo $data[$i]['ID'] ?></th>
      <td bgcolor="#9CFFBD"><?php echo $data[$i]['NAME'] ?></td>
      <td bgcolor="#9CFFBD"><?php echo $data[$i]['PRE_NAME'] ?></td>
      <td bgcolor="#9CFFBD"><?php echo $tel ?></td>
      <td bgcolor="#9CFFBD"><?php echo $wechat ?></td>
      <td bgcolor="#9CFFBD"><?php echo $data[$i]['CITY'] ?></td>
      <td bgcolor="#9CFFBD"><?php echo $data[$i]['GENDER'] ?></td>
      <td bgcolor="#9CFFBD"><?php echo $data[$i]['DATE'] ?></td>
      <td bgcolor="#9CFFBD"><?php echo $data[$i]['SHOP'] ?></td>
    </tr>
    <?php 
	}  
	$mysql->closeDb();
	?>
    
    <tr>
      <th bgcolor="#8EA6FF" scope="row">New</th>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
    </tr>
    <tr>
      <th bgcolor="#8EA6FF" scope="row">&nbsp;</th>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
    </tr>
    <tr>
      <th bgcolor="#8EA6FF" scope="row">&nbsp;</th>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
    </tr>
    <tr>
      <th bgcolor="#8EA6FF" scope="row">&nbsp;</th>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
    </tr>
    <tr>
      <th bgcolor="#8EA6FF" scope="row">&nbsp;</th>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
    </tr>
    <tr>
      <th bgcolor="#8EA6FF" scope="row">&nbsp;</th>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
    </tr>
    <tr>
      <th bgcolor="#8EA6FF" scope="row">&nbsp;</th>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
    </tr>
    <tr>
      <th bgcolor="#8EA6FF" scope="row">&nbsp;</th>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
    </tr>
    <tr>
      <th bgcolor="#8EA6FF" scope="row">&nbsp;</th>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
    </tr>
    <tr>
      <th bgcolor="#8EA6FF" scope="row">&nbsp;</th>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
    </tr>
    <tr>
      <th bgcolor="#8EA6FF" scope="row">&nbsp;</th>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
    </tr>
    <tr>
      <th bgcolor="#8EA6FF" scope="row">&nbsp;</th>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
      <td bgcolor="#9CFFBD">&nbsp;</td>
    </tr>
  </tbody>
</table>
  
  <br><br><br>
  <span class="zzBlue">
  六张截图的含义
  </span>
  
  <br><br>
  
  <span class="zzRed">1.你的账号，“车主认证”完成。</span>
  <img src="byd1.jpg" alt="" class="myimg"/>
  <br><br>
  
  <span class="zzRed">2.你的账号，“车主认证”完成。</span>
  <img src="byd2.jpg" alt="" class="myimg"/>
  <br><br>
  
  <span class="zzRed">3.点击图标，“车主共赢”</span>
  <img src="byd3.jpg" alt="" class="myimg"/>
  <br><br>
  
  <span class="zzRed">4.左边“推荐人”，用手机号码搜索推荐人。右边“设置”添加自己银行卡。</span>
  <img src="byd4.jpg" alt="" class="myimg"/>
  <br><br>
  
  <span class="zzRed">5.添加自己的银行卡</span>
  <img src="byd5.jpg" alt="" class="myimg"/>
  <br><br>
  
  <span class="zzRed">6.你的账号，“车主共赢”成功。</span>
  <img src="byd6.jpg" alt="" class="myimg"/>
  <br><br>
  
  
  

</body>
</html>