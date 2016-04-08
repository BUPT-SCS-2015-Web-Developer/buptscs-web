
<?php

 function remove_quote(&$str) {
     $str = str_replace("'","",$str);
      return $str;
} 
//去除选项中的引号

/*  session_start();

  if(!isset($_SESSION['username'])){
	  exit('illegal access!');
  }
  $username = $_SESSION['username'];
  */
  $connect_query = mysql_connect("localhost","root","") or die ("数据库连接错误！".mysql_error());
  mysql_select_db("Questionnaire",$connect_query) or die("数据库访问错误!".mysql_error());
  mysql_query("set names utf8");
  $getinfo = "select * from test4";
  $result = mysql_query($getinfo);
  
 ?>

 
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<title>BUPT 2015 SCS Information System</title>
<meta charset="utf-8">

<script type="text/javascript">
 
      $(document).ready(function(){	
        $('#submit').click(function(){
         // alert($('#text1').val());
            var answer= new Array()
            for (var i=0;i<=$("label").length-1;i++)
            {
                answer[i]= $("[name="+i+"]:radio:checked").val() 
                    
            }
            
             
            //alert(answer)
            answer=answer.join('@')
            //alert(answer)
           
            $.ajax({
            type:'post',
            url:'competition.php',
            data:{
              answers:answer
            },
            dataType:'json',
            success:function(json){
              //alert(json.insert);
              if(json.insert == '提交成功！')
              {
                  window.location.href="./submit.php";
              }
            },
            error:function(XMLHttpRequest, textStatus, errorThrown){
                        alert('登陆失败，请重试');
            }
          });
        });
      });

        //回车时，默认是登陆
       function KeyDown(){
       if(window.event.keyCode == 13){
        if (document.getElementById("submit")!=null){
                           document.getElementById("submit").click();
         }
        }
       }
    
</script>




</head>
<body>
<br><br>
<form id="MyForm" >
<?php
      $n=0;
      
      while($questions=mysql_fetch_field($result)){
		  
		  $getquestion=mysql_query("show columns from `test4` where field ='$questions->name'",$connect_query);
		  $rowq=mysql_fetch_array($getquestion);
          $type=$rowq["Type"];
		  
		  
		  //取出字段类型
		  if(stristr($type,"varchar(255)")){				//若为文本框类型题
?>

          <div  id="f"  align="left"  >
          <label id="question<?php echo $i;?>"><?php echo $n;?>.&nbsp;<?php echo $questions->name."<BR>";?></label>
          <br>
          <input type="text" name="<?php echo $i;?>" id="ques<?php echo $i;?>" value="" />
          <br><br>
          </div>
<?php
         }//一道文本框类型输出结束。

		else if(stristr($type,"enum")){				//若为单选
            $type=substr($type,5,strlen($type)-6);
            $a=explode(",",$type);
?>
		<div  id="f"  align="left"  >	
		<br>
		<label id="question<?php echo $i;?>"><?php echo $n;?>.&nbsp;<?php echo $questions->name."<BR>";?></label>
	    <select name="<?php echo $i;?>" id="ques<?php echo $i;?>">
		<option value="-1"> &nbsp&nbsp</option>
<?php
		for($j=0;$j<count($a);$j++){
				remove_quote($a[$j]);				//将引号去除。
?>		
		
		<option value="<?php echo $a[$j];?>"><?php echo $a[$j];?></option>
		
<?php	
		}//for循环结束，下拉框数据显示完毕。	
			
?>
		</select>
		</div>
<?php
		}	//一道单选题输出完毕。
		else if(stristr($type,"set")){				//若为多选
			$type=substr($type,4,strlen($type)-5);
            $a=explode(",",$type);
?>
        <div  id="f"  align="left"  >	
		 <br>
		<label id="question<?php echo $i;?>"><?php echo $n;?>&nbsp;<?php echo $questions->name."<BR>";?></label>
<?php		
		for($j=0;$j<count($a);$j++){
				remove_quote($a[$j]);
?>
		<input name="<?php echo $i;?>" id="ques<?php echo $i;?>"  type="checkbox" value="<?php echo $a[$j];?>" /><?php echo $a[$j];?>
		
<?php		
		
		}//for循环结束，多选框显示完毕。
?>		
		</div>
<?php		
		
		}//一道多选题输出完毕。
		
		echo "<BR>";
			
		$n++;
	  }//while循环结束，全部题目输出完毕。
		
?>
    
 
        <input type="submit" value="submit">
</form>	




</body>

</html>




















		   

 