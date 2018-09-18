<?php
require_once("./API/qqConnectAPI.php");
$qc = new QC();

echo '<meta charset="UTF-8">';


echo $qc->qq_callback();

echo "<br>";
echo $qc->get_openid();

echo "<br>";

$arr = $qc->get_user_info();



echo "<p>";
echo "Gender:".$arr["gender"];
echo "</p>";
echo "<p>";
echo "NickName:".$arr["nickname"];
echo "</p>";
echo "<p>";
echo "<img src=\"".$arr['figureurl']."\">";
echo "<p>";
echo "<p>";
echo "<img src=\"".$arr['figureurl_1']."\">";
echo "<p>";
echo "<p>";
echo "<img src=\"".$arr['figureurl_2']."\">";
echo "<p>";
echo "<p>";
echo "<img src=\"".$arr['figureurl_qq_1']."\">";
echo "<p>";
echo "<p>";
echo "<img src=\"".$arr['figureurl_qq_2']."\">";
echo "<p>";
echo "vip:".$arr["vip"];
echo "</p>";
echo "level:".$arr["level"];
echo "</p>";
echo "is_yellow_year_vip:".$arr["is_yellow_year_vip"];
echo "</p>";

?>
