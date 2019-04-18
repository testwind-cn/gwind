<?php


function _record_message($name,$sex,$tel,$city,$money,$hasper,$email,$addr,$date){
    //调用_query()函数
    _query("INSERT INTO wx_tel_list(name,sex,tel,city,money,hasper,email,addr,date) VALUES('$name','$sex','$tel','$city','$money','$hasper','$email','$addr','$date')");
}

?>