<!doctype html>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1,width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />

    
<meta property="qc:admins" content="24556445777631611006375" />
    
<title>联系客服</title>


<style type="text/css">
body {
	background-color: #CAB08D;
	
}
td {
	
	height:30px;
}

.thename {
	width: 100%;
	height: 30px;
}
.thetext {
	width: 60%;
}
.thesubmit {
	width: 60%;
	height: 40px;
}
img {
	-webkit-border-radius: 5px; 
-moz-border-radius: 5px; 
border-radius: 5px; 




}
.theopt1 {
	height:30px;
}
.thesel {
	height:30px;
}
</style>
</head>

<body>
<img src="logo.jpg" width="180" height="53" alt="" stylez="filter:Alpha(opacity=80,style=2);-moz-opacity:0.8;opacity:0.8;"/>
<br>
您可以在这里留下您的联系方式，<br>
我们的专业客服会及时与您取得联系<br>
<form action="send.php" method="post">
  <table width="100%" border="0" cellspacing="3">
    <tbody>
      <tr>
        <td width="30%"><label for="name">姓&nbsp;&nbsp;&nbsp;&nbsp;名：</label></td>
        <td width="70%"><input name="name" type="text" class="thename" id="name"></td>
      </tr>
      <tr>
        <td>性&nbsp;&nbsp;&nbsp;&nbsp;别：</td>
        <td><label >先生</label>
          <input type="radio" name="sex" id="sex" value="男" checked="true">
          <label ></label>
          <label >女士 </label>
        <input type="radio" name="sex" id="sex" value="女"></td>
      </tr>
      <tr>
        <td>手机号码：</td>
        <td><input name="tel" type="text" class="thename" id="tel"></td>
      </tr>
      <tr>
        <td><label for="select">所在城市：</label></td>
        <td>
          <select name="city" class="thesel" id="city" >
            <option value="上海">上海</option>
            <option value="宁波">宁波</option>
            <option value="广州">广州</option>
            <option value="杭州">杭州</option>
            <option value="宁波">宁波</option>
            <option value="武汉">武汉</option>
            <option value="青岛">青岛</option>
            <option value="苏州">苏州</option>
            <option value="山西">山西</option>
            <option value="南京">南京</option>
            <option value="深圳">深圳</option>
            <option value="北京">北京</option>
            <option value="天津">天津</option>
            <option value="成都">成都</option>
            <option value="长沙">长沙</option>
            <option value="厦门">厦门</option>
            <option value="沈阳">沈阳</option>
            <option value="无锡">无锡</option>
            <option value="钱江">钱江</option>
            <option value="合肥">合肥</option>
            <option value="西安">西安</option>
            <option value="南通">南通</option>
            <option value="昆明">昆明</option>
            <option value="吴江">吴江</option>
            <option value="慈溪">慈溪</option>
            <option value="昆山">昆山</option>
            <option value="福州">福州</option>
            <option value="珠海">珠海</option>
            <option value="江阴">江阴</option>
            <option value="其他">其他</option>
            
        </select></td>
      </tr>
      <tr>
        <td>投资范围：</td>
        <td>
        
          <select name="money" class="thesel" id="money">
          <option value="1">100万以下</option>
          <option value="2">100-500万</option>
          <option value="3">500-1000万</option>
          <option value="4">1000万以上</option>
        </select></td>
      </tr>
      <tr>
        <td>是否有专属理财师：</td>
        <td>有<input name="hasper" type="radio" class="theopt" id="hasper" value="1">
          
          无<input name="hasper" type="radio" class="theopt" id="hasper" value="0"  checked="true">
        </td>

      </tr>
      <tr>
        <td>邮&nbsp;&nbsp;&nbsp;&nbsp;箱：</td>
        <td><input name="email" type="text" class="thename" id="email"></td>
      </tr>
      <tr>
        <td>通信地址：</td>
        <td><input name="addr" type="text" class="thename" id="add"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" class="thesubmit"   value="提交"></td>
      </tr>
    </tbody>
  </table>

</form>
  <p align="center">咨询产品详情，享受专属理财师服务 <br>
服务热线：<strong>400-8832-021</strong></p>

</body>  
    
</html>