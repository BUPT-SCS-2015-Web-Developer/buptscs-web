<?php

  session_start();

  if(!isset($_SESSION['username'])){
    exit('illegal access!');
  }


  $username = $_SESSION['username'];

  include_once "lib/shared/ez_sql_core.php";
  include_once "lib/mysql/ez_sql_mysql.php";
  include_once "db_config.php";

  $db = new ezSQL_mysql($db_user, $db_password, $db_database, $db_host);
  $db->query("set names 'utf8'");

  $get_user_query = "SELECT * FROM massage WHERE student_ID = '$username'";
  $user = $db->get_row("$get_user_query");


?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<title>BUPT 2015 SCS Information System</title>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--  确保适当的绘制和触屏缩放 -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="css/bootstrap.css">

<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="js/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="js/bootstrap.min.js"></script>

<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<style type="text/css">  
input.text{text-align:center;padding:2px 5px;width:40px;border:0px;border-bottom:#000000 1px solid;}  
input.textname{text-align:center;padding:2px 5px;width:180px;border:0px;border-bottom:#000000 1px solid;height:20px}
input.textname2{text-align:center;padding:2px 5px;width:360px;border:0px;border-bottom:#000000 1px solid;height:20px}
.thheight {height :40px; vertical-align:middle;}
.selector{ font-family:"Microsoft YaHei",微软雅黑,"MicrosoftJhengHei" } 
.banquan{color:#959595;text-align:center; padding-top:15px; font-size:12px; line-height:18px; }
.fgx{width:790px;background-image:url(img/index_fgx.jpg); background-repeat:no-repeat; background-position:50% 0%; text-align:center;z-index:-1;margin:0px auto; font-size:120px; line-height:20px;  }

</style> 

<style type="text/css">
a:link {color: #FFFFFF} /* 未访问的链接 */
a:visited {color: #FFFFFF} /* 已访问的链接 */
a:hover {color: #DAA520} /* 鼠标移动到链接上 */
a:active {color: #FF6347} /* 选定的链接 */

</style>
<style type="text/css">
.bg1{
  position:absolute;
  width:100%;
  height:900px;
  top:320px;
  z-index:-1;
}
.bg2{
  width:960px;
  height:823px;
  z-index:-1;
  margin:0px auto;
  background-image: url(img/10.jpg);
  background-repeat: no-repeat;
}
.div{
  width:450px;
  height:auto;
  z-index:-1;
  margin-left:420px;
  margin-right: 0px;
}
.img{
  width:415px;
  height:116px;
  margin-left:490px;
  margin-right:auto;
}


</style>

<script type="text/javascript">

      $(document).ready(function(){
        $('#submit1').click(function(){
         var finish = true;
         $("#Info_1 input").each(function(){
              //alert("22")
            if($(this).val() == ''){
              //alert('11')
              finish = false;
              return;
            }
          });

          if(!finish){
            alert('填写不完整,请检查!');
            return;
          }
          //alert("test");

          $.ajax({
            type:'post',
            url:'saveInfo1.php',
            data:{
              building:$('#building').val(),
              room:$('#room').val(),
              phone:$('#phone').val(),
              Email:$('#Email').val(),
              bank:$('#bank').val(),
              QQ:$('#QQ').val(),
              H_address:$('#H_address').val(),
              height:$('#height').val(),
              weight:$('#weight').val(),
              shoes:$('#shoes').val(),
              station:$('#station').val(),
              H_phone:$('#H_phone').val(),
              father:$('#father').val(),
              F_phone:$('#F_phone').val(),
              F_work:$('#F_work').val(),
              mother:$('#mother').val(),
              M_phone:$('#M_phone').val(),
              M_work:$('#M_work').val(),
              contact:$('#contact').val(),
              C_phone:$('#C_phone').val(),
              C_work:$('#C_work').val(),
              apply:$('#apply').val(),
            },
            dataType:'json',
            success:function(json){
              alert(json.insert);
            },
            error:function(XMLHttpRequest, textStatus, errorThrown){
                        alert('登陆失败，请重试');
            }
          });
        });
      });

 
      $(document).ready(function(){
        $('#submit2').click(function(){
          var finish = true;
         for(var j = 1; j < 9; j ++ )
          {
              var i = $("[name="+j+"]:radio:checked").length;
              if(i<1){
                  //alert($('#select'+j).val());
                  if($('#select'+j).val()){
                     continue;
                   }
                  else{
                     finish = false;
                     break;
                  }
              }
          }

          

          if(!finish){
            alert('填写不完整,请检查!');
            return;
          }
         // alert($('#text1').val());
         var data1,data2,data3,data4,data5,data6,data7,data8;

         if($('#select1').val() == '')
             data1=$('input:radio[name="1"]:checked').val();
         else
             data1=$('#select1').val();

         if($('#select2').val() == '')
       
             data2=$('input:radio[name="2"]:checked').val();
         else     
             data2=$('#select2').val(); 
         if($('#select3').val() == '')
       
             data3=$('input:radio[name="3"]:checked').val();
         else     
             data3=$('#select3').val(); 
         if($('#select4').val() == '')
       
             data4=$('input:radio[name="4"]:checked').val();
         else     
             data4=$('#select4').val(); 
		
		if($('#select5').val() == '')
       
             data5=$('input:radio[name="5"]:checked').val();
         else     
             data5=$('#select5').val(); 
		if($('#select6').val() == '')
       
             data6=$('input:radio[name="6"]:checked').val();
         else     
             data6=$('#select6').val(); 
         if($('#select7').val() == '')
       
             data7=$('input:radio[name="7"]:checked').val();
         else     
             data7=$('#select7').val(); 
         if($('#select8').val() == '')
       
             data8=$('input:radio[name="8"]:checked').val();
         else     
             data8=$('#select8').val(); 
        


          $.ajax({
            type:'post',
            url:'saveInfo2.php',
            data:{
              
              answer1:data1,
             
              answer2:data2,

              answer3:data3,
             
              answer4:data4,
             
              answer5:data5,

              answer6:data6,
             
              answer7:data7,

              answer8:data8,
             
             
            },
            dataType:'json',
            success:function(json){
              alert(json.insert);
            },
            error:function(XMLHttpRequest, textStatus, errorThrown){
                        alert('登陆失败，请重试');
            }
          });
        });
      });

function Uncheck(j){
             //alert(j)
             $("input:radio[name="+j+"]").each(function(){
              //alert($(this).checked);
              $(this).attr('checked',false);
         });
        }


      $(document).ready(function(){
        $('#submit3').click(function(){
          var finish = true;
          $("#Info_3 textarea").each(function(){
            if($(this).val() == ''){
              finish = false;
              return;
            }
          });

          if(!finish){
            alert('填写不完整,请检查!');
            return;
          }
          //alert($('#text2').val());
          $.ajax({
            type:'post',
            url:'saveInfo3.php',
            data:{
              introduce:$('#text2').val(),
            },
            dataType:'json',
            success:function(json){
              alert(json.insert);
            },
            error:function(XMLHttpRequest, textStatus, errorThrown){
                        alert('登陆失败，请重试');
            }
          });
        });
      });


      $(document).ready(function(){
        $('#submit4').click(function(){
          var finish = true;
          $("#Info_4 textarea").each(function(){
            if($(this).val() == ''){
              finish = false;
              return;
            }
          });

          if(!finish){
            alert('填写不完整,请检查!');
            return;
          }
           //alert($('#time').val());
          $.ajax({
            type:'post',
            url:'leave.php',
            data:{
              time:$('#time').val(),
              reason:$('#text3').val(),
            },
            dataType:'json',
            success:function(json){
              alert(json.insert);
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
    

      function changeColor(id){

        var obj=document.getElementById(id);
        var bgColor = "#0000FF";
        obj.style.backgroundColor = bgColor;
        for (var i=1;i<=5;i++)
        {
            if (i==id)
            {
              continue;
            }
            else
            {
              obj=document.getElementById(i);
              obj.style.backgroundColor = "transparent";
            }
        }
        if(id==5)
        {
           //alert('lalala');
           window.location.href="./logout.php";
        }
      }
</script>

</head>

<body class="selector">
<div align="center">
    <img class="img-responsive" alt="Responsive image" src="img/head.jpg"/></div>

<div width="960px" align="center">
<table  background="img/menu_01.gif" width="960px"  border="0" align="center" cellpadding="1" cellspacing="0">
  <tr>
    <td height="35">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td id ="1" height="35" align="center" onClick="changeColor(1)" href="#Info_1" data-toggle="tab">&nbsp;<a href="#Info_1" data-toggle="tab" ><font size="4"><strong>信息采集</strong></font></a>&nbsp;</td>
        <td align="center"><img src="img/menu_02.gif" width="2" height="35" /></td>
        <td id ="2" align="center" onClick="changeColor(2)" href="#Info_2" data-toggle="tab"><a href="#Info_2" data-toggle="tab"><font size="4"><strong>调查问卷</strong></font></a></td>
        <td align="center"><img src="img/menu_02.gif" width="2" height="35" /></td>
        <td id ="3" align="center" onClick="changeColor(3)" href="#Info_3" data-toggle="tab"><a href="#Info_3" data-toggle="tab"><font size="4"><strong>问题反馈</strong></font></a></td>
        <td align="center"><img src="img/menu_02.gif" width="2" height="35" /></td>
        <td id ="4" align="center" onClick="changeColor(4)" href="#Info_4" data-toggle="tab"><a href="#Info_4" data-toggle="tab"><font size="4"><strong>请假及事由</strong></font></a></td>
        <td align="center"><img src="img/menu_02.gif" width="2" height="35" /></td>
        <td id ="5" align="center" onClick="changeColor(5)"><a href="logout.php"><font size="4"><strong>注销</strong></font></a></td></tr>
    
    </table>
    </td>
    </tr>
    </table>
</div><br><br>

<div class="tab-content">
<!-- 此为第一页的div-->
<div  id="Info_1" width="960px" align="center" class="tab-pane fade in active">
<!-- 此为第一页的保存表格的div-->
<table   class= "table table-bordered table-rounded table-hover" cellpadding="0" cellspacing="0">


    <tr>
    <th colspan="4"class = "thheight" width="200px" >宿舍楼号</th>
    <td colspan="4" width="260px"><input class=" textname" type='text' value="<?php if($user){echo $user->buiding;} ?>" id='building' name='building' placeholder="男生C楼 女生E楼"/></td>
    <th  colspan="4" class = "thheight" width="200px">宿舍房间号</th>
    <td  colspan="4">
        <input  class="textname" type="text" id ='room' name='room' value="<?php if($user){echo $user->room;} ?>" />
    </td>
    </tr>
    <tr>
    <th  colspan="4" class = "thheight" >手机号</th>
    <td colspan="4" ><input class=" textname" type='text'  id='phone' name='phone' value="<?php if($user){echo $user->phone;} ?>"/></td>
    <th colspan="4" class = "thheight">Email</th>
    <td  colspan="4">
        <input  class="textname" type="text" id ='Email' name='Email' value="<?php if($user){echo $user->Email;} ?>" />
    </td>
    </tr>
    <tr>
    <th colspan="4" class = "thheight" >存折号</th>
    <td colspan="4"><input class=" textname" type='text' placeholder="用于今后发补助" id='bank' name='bank' value="<?php if($user){echo $user->bank;} ?>"/></td>
    <th  colspan="4"class = "thheight">QQ</th>
    <td  colspan="4">
        <input  class="textname" type="text" id ='QQ' name='QQ' value="<?php if($user){echo $user->QQ;} ?>" />
    </td>
    </tr>
    
    <tr>
    <th  colspan="4"class = "thheight" >家庭住址</th>
    <td colspan="12"><input class=" textname2" type='text' id='H_address' name='H_address' value="<?php if($user){echo $user->H_address;} ?>"/></td>
    </tr>
    
    <tr>
    <th colspan="4" class = "thheight" width="200px" >身高</th>
    <td colspan="4" width="260px"><input class=" textname" type='text'  id='height' name='height' placeholder="单位：厘米" value="<?php if($user){echo $user->high;} ?>" /></td>
    <th colspan="4" class = "thheight" width="200px">体重</th>
    <td colspan="4" >
        <input  class="textname" type="text" id='weight' name='weight' placeholder="单位：kg" value="<?php if($user){echo $user->weight;} ?> "/>
    </td>
    </tr>
    
    <tr>
    <th colspan="4"class = "thheight" width="200px" >鞋码</th>
    <td colspan="4" width="260px"><input class=" textname" type='text'  id='shoes' name='shoes' value="<?php if($user){echo $user->shoes;} ?>" /></td>
    <th  colspan="4" class = "thheight" width="200px">车站</th>
    <td colspan="4" >
        <input  class="textname" type="text" id ='station' name='station' value="<?php if($user){echo $user->station;} ?>" placeholder="请填写家乡火车站"/>
    </td>
    </tr>

    <tr>
     <th rowspan="5" colspan="2" class="text-center"><font size="4">家<br>庭<br>情<br>况</font></th>
     <th colspan="3" class = "thheight" width="200px" >父亲姓名</th>
     <td colspan="4" width="260px"><input class=" textname" type='text'  id='father' name='father' value="<?php if($user){echo $user->father;} ?>"/></td>
     <th  colspan="3" class = "thheight" width="200px">父亲手机</th>
     <td colspan="4" >
        <input  class="textname" type="F_phone" id ='F_phone' name='shengri' value="<?php if($user){echo $user->F_phone;} ?>"/>
    </td>
    </tr>
    <tr>
    <th  colspan="3" class = "thheight" >父亲工作</th>
    <td colspan="11"><input class=" textname2" type='text' id='F_work' name='F_work'placeholder="工作地点及职务" value="<?php if($user){echo $user->F_work;} ?>"/></td>
    </tr>

    <tr>
    <th colspan="3" class = "thheight" width="200px" >母亲姓名</th>
     <td colspan="4" width="260px"><input class=" textname" type='text'  id='mother' name='mother' value="<?php if($user){echo $user->mother;} ?>"/></td>
     <th  colspan="3" class = "thheight" width="200px">母亲手机</th>
     <td colspan="4">
        <input  class="textname" type="text" id ='M_phone' name='M_phone' value="<?php if($user){echo $user->M_phone;} ?>" />
    </td>
    </tr>
    <tr>
    <th  colspan="3" class = "thheight" >母亲工作</th>
    <td colspan="11"><input class=" textname2" type='text' id='M_work' name='M_work'placeholder="工作地点及职务" value="<?php if($user){echo $user->M_work;} ?>"/></td>
    </tr>

    <tr>
    <th  colspan="3"class = "thheight" >家庭电话</th>
    <td colspan="11"><input class=" textname2" type='text' id='H_phone' name='H_phone' value="<?php if($user){echo $user->H_phone;} ?>" /></td>
    </tr>

    <tr>
     <th rowspan="2" colspan="2" class="text-center"><font size="3">在京<br>联系人</font></th>
     <th colspan="3" class = "thheight" width="200px" >姓名</th>
     <td colspan="4" width="260px"><input class=" textname" type='text'  id='contact' name='contact' value="<?php if($user){echo $user->contact;} ?>"/></td>
     <th  colspan="3" class = "thheight" width="200px">手机</th>
     <td colspan="4" >
        <input  class="textname" type="text" id ='C_phone' name='C_phone' value="<?php if($user){echo $user->C_phone;} ?>"/>
    </td>
    </tr>
    <tr>
    <th  colspan="3" class = "thheight" >工作</th>
    <td colspan="11"><input class=" textname2" type='text' id='C_work' name='C_work' value="<?php if($user){echo $user->C_address;} ?>" placeholder="工作地点及职务" /></td>
    </tr>
    
    <tr>
    <th  colspan="4"class = "thheight" >班委意向</th>
    <td colspan="12"><input class=" textname2" type='text' id='apply' name='apply' value="<?php if($user){echo $user->apply;} ?>" placeholder="大班委、小班长和小班团支书 ，无意向填‘无’" /></td>
    </tr>
   </table>
   <p><strong>注：个别选项如果没有填'无'</strong></p>
   <br>
  <div align="center">
    <button class="btn btn-primary" style="font-family:Microsoft YaHei" type="submit" id='submit1'>保&nbsp&nbsp&nbsp存</button>
  </div>
  <br><br>

<div class="fgx " style="clear:both;" width="815px">
    <p class="banquan">
        北京邮电大学15级计算机学院
    </p>
</div>
</div>


<div  id="Info_2" align="center" class="tab-pane fade bg1">
<div  class="bg2">
    <img class="img img-responsive  img-rounded" alt="Responsive image" src="img/search.png" /><br><br><br>
     <div class="div" align="left"><br><br>
       <label id="question1">1、你有没有入党的打算?</label>
    <br>    <input type="radio" name="1" value="A" onclick='$("#select1").val("")' />A.有，且很坚定&nbsp&nbsp
      <br>  <input type="radio" name="1" value="B" onclick='$("#select1").val("")'/>B.想过，但不是非入不可&nbsp&nbsp
      
     <br>   <input type="radio" name="1" value="C" onclick='$("#select1").val("")'/>C.无所谓，没多大区别&nbsp&nbsp
     <br>   <input type="radio" name="1" value="D" onclick='$("#select1").val("")'/>D.没有想过&nbsp&nbsp
       
      
      <br>  其他：<input id="select1" class=" textname" type="text"  value="" onclick="Uncheck(1)" />
     </div>
       <br>
     <div class="div" align="left">
       <label id="question2">2、你认为我们加入共产党的动机主要是什么?</label>
      <br>  <input type="radio" name="2" value="A" onclick='$("#select2").val("")'/>A.想为国家做贡献，为社会奉献自己的力量&nbsp&nbsp
       <br> <input type="radio" name="2" value="B" onclick='$("#select2").val("")'/>B.随大流，别人都入，自己不入显得落伍&nbsp&nbsp
       
       <br> <input type="radio" name="2" value="C" onclick='$("#select2").val("")'/>C.注重现实利益，对自己找工作以及提升会有帮助&nbsp&nbsp
        <br><input type="radio" name="2" value="D" onclick='$("#select2").val("")'/>D.家庭环境影响及要求&nbsp&nbsp
      <br>  其他：<input id="select2" class=" textname" type="text"  value="" onclick="Uncheck(2)"/>
     </div>
       <br>
     <div class="div" align="left">
       <label id="question3">3、你觉得现在部分人不积极入党或对入党存在抵触情绪的原因有？</label>
       <br> <input type="radio" name="3" value="A" onclick='$("#select3").val("")'/>A.入党程序过为繁琐&nbsp&nbsp
       <br> <input type="radio" name="3" value="B" onclick='$("#select3").val("")'/>B.觉得自身能力不足，思想觉悟低&nbsp&nbsp
       <br>
       <input type="radio" name="3" value="C" onclick='$("#select3").val("")'/>C.看到部分党员的负面情况和党内腐败现象&nbsp&nbsp
        <br><input type="radio" name="3" value="D" onclick='$("#select3").val("")'/>D.觉得党员受约束&nbsp&nbsp
      <br>  其他：<input id="select3" class=" textname" type="text"  value="" onclick="Uncheck(3)"/>
     </div>
     <br>
     <div class="div" align="left">
       <label id="question4">4、你觉得现在的中国共产党的榜样作用与积极影响和以前相比有什么变化？</label>
        <br><input type="radio" name="4" value="A" onclick='$("#select4").val("")'/>A.比以前更好了，能带给人们更高的生活水平&nbsp&nbsp
       <br> <input type="radio" name="4" value="B" onclick='$("#select4").val("")'/>B.和以前没什么差别&nbsp&nbsp
       <br>
       <input type="radio" name="4" value="C" onclick='$("#select4").val("")'/>C.比以前差了，因为共产党内部更黑暗，更腐败了&nbsp&nbsp
        <br><input type="radio" name="4" value="D" onclick='$("#select4").val("")'/>D.不了解&nbsp&nbsp
      <br>  其他：<input id="select4" class=" textname" type="text"  value="" onclick="Uncheck(4)"/>
     </div>
    <br>
     <div class="div" align="left">
       <label id="question5">5、你主要通过哪些途径了解中国共产党的？</label>
        <br><input type="radio" name="5" value="A" onclick='$("#select5").val("")'/>A.党校、党课和《时事政治》等教育&nbsp&nbsp
       <br> <input type="radio" name="5" value="B" onclick='$("#select5").val("")'/>B.报刊杂志、电视、网络等媒体&nbsp&nbsp
       <br> <input type="radio" name="5" value="C" onclick='$("#select5").val("")'/>C.与老师、同学交流&nbsp&nbsp
        <br> <input type="radio" name="5" value="D" onclick='$("#select5").val("")'/>D.家人的耳濡目染&nbsp&nbsp
     <br>  其他：<input id="select5" class=" textname" type="text"  value="" onclick="Uncheck(5)"/>
     </div>
    <br>
     <div class="div" align="left">
       <label id="question6">6、你对党的性质、宗旨、奋斗目标、基本路线等相关政策与制度了解程度如何？</label>
        <br><input type="radio" name="6" value="A" onclick='$("#select6").val("")'/>A.很熟悉，很全面&nbsp&nbsp
        <br><input type="radio" name="6" value="B" onclick='$("#select6").val("")'/>B.有所了解 &nbsp&nbsp
        <br><input type="radio" name="6" value="C" onclick='$("#select6").val("")'/>C.不太全面，比较模糊&nbsp&nbsp
        <br><input type="radio" name="6" value="D" onclick='$("#select6").val("")'/>D.完全不了解&nbsp&nbsp
     <br>  其他：<input id="select6" class=" textname" type="text"  value="" onclick="Uncheck(6)"/>
     </div>
    <br>
     <div class="div" align="left">
       <label id="question7">7、你对身边的党员评价是？</label>
       <br> <input type="radio" name="7" value="A" onclick='$("#select7").val("")'/>A.与党员要求相差甚远 &nbsp&nbsp
       <br> <input type="radio" name="7" value="B" onclick='$("#select7").val("")'/>B.各方面都能发挥模范带头作用&nbsp&nbsp
       <br> <input type="radio" name="7" value="C" onclick='$("#select7").val("")'/>C.发挥了一定的表率作用&nbsp&nbsp
       <br> <input type="radio" name="7" value="D" onclick='$("#select7").val("")'/>D.与普通群众相差不多&nbsp&nbsp
     <br>  其他：<input id="select7" class=" textname" type="text"  value="" onclick="Uncheck(7)"/>
     </div>
    <br> 
    <div class="div" align="left">
       <label id="question8">8、你对共产党的发展</label>
        <br><input type="radio" name="8" value="A" onclick='$("#select8").val("")'/>A.充满信心 &nbsp&nbsp
        <br><input type="radio" name="8" value="B" onclick='$("#select8").val("")'/>B.没什么指望&nbsp&nbsp
        <br><input type="radio" name="8" value="C" onclick='$("#select8").val("")'/>C.无所谓&nbsp&nbsp
     <br>  其他：<input id="select8" class=" textname" type="text"  value="" onclick="Uncheck(8)"/>
     </div>
    <br>
   
    <br> 
    <br>

     <div class="div" align="center">
        <button class="btn btn-primary" style="font-family:Microsoft YaHei" type="submit" id='submit2'>提&nbsp&nbsp&nbsp交</button>
     </div>
     <br><br>
</div>
<br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
<div class="fgx " style="clear:both;" width="815px">
    <p class="banquan">
        北京邮电大学15级计算机学院
    </p>
</div>
</div>

<div  id="Info_3" align="center" class="tab-pane fade bg1">
<div class="bg2">
     <img class="img img-responsive  img-rounded" alt="Responsive image" src="img/question.png" width="415" height="116"/><br><br><br>
     <div class="div" align="left"><font size="3"><label>&nbsp&nbsp姓名、学号、问题概述</label></font></div><br>
     <div class="div"><textarea name="content" id="text2" cols="65" rows="15"></textarea></div>
       <br><br>
     <div class="div" align="center">
        <button class="btn btn-primary" style="font-family:Microsoft YaHei" type="submit" id='submit3'>提&nbsp&nbsp&nbsp交</button>
     </div>
     
</div>

<div class="fgx " style="clear:both;" width="815px">
    <p class="banquan">
        北京邮电大学15级计算机学院
    </p>
</div>
</div>


<div  id="Info_4" align="center" class="tab-pane fade bg1">
<div class="bg2">
    <img class="img img-responsive  img-rounded" alt="Responsive image" src="img/reason.png" width="415" height="116"/><br><br><br><br>

    <div align="left" class="div controls input-append date form_date" data-date="" data-date-format="yyyy-mm-dd hh:00" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd hh:00">
          <font size="3"><label>&nbsp回校时间：</label></font>
          <input  class="textname" type="text" value="" id ='time' name='time' readonly>
          <span class="add-on"><i class="icon-th"></i></span>
    </div>

     <div class="div" align="left"><font size="3"><label>&nbsp请假事由：</label></font></div>
     <div class="div"><textarea name="content" id="text3" cols="65" rows="13"></textarea></div><br>

     <div class="div" align="center">
        <p><strong>注：请假事由中写明离校时间</strong></p><br>
        <button class="btn btn-primary" style="font-family:Microsoft YaHei" type="submit" id='submit4'>请&nbsp&nbsp&nbsp假</button>
     </div>
     
</div>

<div class="fgx " style="clear:both;" width="815px">
    <p class="banquan">
        北京邮电大学15级计算机学院
    </p>
</div>
</div>

</div>

<script type="text/javascript" src="js/jquery-1.11.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
  $('.form_date').datetimepicker({
        language:  'zh',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 1,
    forceParse: 0
    });
</script>

</body>
</html>