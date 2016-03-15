<?php

  
 
if (isset($_FILES['upfile'])) 	
if(is_uploaded_file($_FILES['upfile']['tmp_name'])){
$upfile=$_FILES["upfile"]; 
//获取数组里面的值 

//$name=$upfile["name"];//上传文件的文件名 
//$name = $_POST['textfield'];
$name=iconv('utf-8' , 'gbk' ,$upfile["name"]);
$type=$upfile["type"];//上传文件的类型 
$size=$upfile["size"];//上传文件的大小 
$tmp_name=$upfile["tmp_name"];//上传文件的临时存放路径 

echo "上传文件名称是：".$name."<br/>"; 
echo "上传文件类型是：".$type."<br/>"; 
echo "上传文件大小是：".$size."<br/>"; 
echo "上传文件的临时存放路径是：".$tmp_name."<br/>"; 

echo "开始移动上传文件<br/>"; 
//把上传的临时文件移动到up目录下面 
move_uploaded_file($tmp_name,'E:/upload/'.$name); 
$destination='img/'.$name; 
$_SESSION['destination'] = $destination;
echo "文件上传成功啦！"; 
		

}

    if(isset($_POST['Submit'])){//判断用户是否提交登录表单，如果是则执行如下代码
	
		$competition = $_POST['textfield'];
		$option1 = $_POST['textfield2'];
		$option2 = $_POST['textfield3'];
		$option3  = $_POST['textfield4'];
		$option4  = $_POST['textfield5'];
		$answer  = $_POST['textfield6'];
		$destination = $_SESSION['destination'] ;
		$mold   = $_POST['textfield7'];
		
		
		
		
		$db_server= "localhost";  
		$db_user= "root";  
		$db_pwd= "lulu";
		$db_name= "scs";
		$conn=mysql_pconnect($db_server, $db_user, $db_pwd);
	


		$sql = "INSERT INTO `SCS`.`competition` (`competition`, `option1`, `option2`, `option3`, `option4`,`answer`, `img`,`mold`) VALUES ('$competition',  '$option1', '$option2', '$option3', '$option4', '$answer','$destination','$mold');";
            //用用户名和密码进行查询
           

            $result = mysql_query($sql,$conn);
		if ($result){
			echo "<script>alert('添加成功');</script>";
			
				}
		$_SESSION['destination']="";

	
}

?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>上传文件</title>
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	width:841px;
	height:617px;
	z-index:1;
	left: 154px;
	top: 71px;
	background-image: url(img/10.jpg);
	visibility: hidden;
}
#Layer2 {
	position:absolute;
	width:1061px;
	height:1005px;
	z-index:1;
	background-image: url(img/10.jpg);
	left: 152px;
	top: 106px;
}
#Layer3 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
	left: 561px;
	top: -43px;
}
#Layer4 {
	position:absolute;
	width:541px;
	height:218px;
	z-index:2;
	left: 5px;
	top: 59px;
}
.STYLE1 {font-size: 18px}
#Layer5 {
	position:absolute;
	width:181px;
	height:115px;
	z-index:2;
	left: 153px;
	top: 47px;
}
#Layer6 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:3;
	left: 336px;
	top: 47px;
}
#Layer7 {
	position:absolute;
	width:1058px;
	height:90px;
	z-index:3;
	left: 1px;
	top: 1040px;
	background-color: #CCFFCC;
}
.STYLE2 {font-size: 14px}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
</head>

<body>

<form action="" enctype="multipart/form-data" method="post" 
name="uploadfile">上传文件：<input type="file" name="upfile" /><br> 
<input type="text" name="textfield" value="" />
<input type="submit"  value="上传" /></form> 






</body>
</html>
