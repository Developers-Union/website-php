<?php
header('Content-Type: application/json');
$lijin = "data/" //用户数据储存路径
if(!empty($_POST["type"])){
	$caozuo = $_POST["type"]
	switch($caozuo){
		case "signup":
			$uplujin = $lujin . $_POST["user"] . "/password.txt";
			$upfile = fopen($uplujin,"w");
			fwrite($upfile,$_POST["password"]);
			fclose($upfile);
			$datajson = array("code"=>"done");
			break;
		case "signin":
			$inlujin = $lujin . $_POST["user"] . "/password.txt"
			$pass = fopen($inlujin,"r");
			if($pass == $_POST["password"]){
				$inlujin = $lujin . $_POST["user"] . "/token.txt";
				$infile = fopen($inlujin,"w");
				$token =rand(1000000,999999999); //生成随机数作为登录凭证
				fwrite($infile,$token);
				fclose($infile);
				$datajson = array("code"=>"done","token"=>$token);
			}
			break;
		default:
			$datajson = array("code"=>"error");
	}
}else{
	$datajson = array("code"=>"done");
}
echo json_encode($datajson);
?>
