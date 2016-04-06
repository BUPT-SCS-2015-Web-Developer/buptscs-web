<?php include('session.php');?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <?php $title="问卷";include('head.php');?>
    <link rel="stylesheet" href="css/info.css">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" media="screen">
    <script src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script src="js/info.js"></script>
</head>
<<<<<<< HEAD

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
        <td id ="2" align="center" onClick="changeColor(2)" href="#Info_调查问卷" data-toggle="tab"><a href="#Info_调查问卷" data-toggle="tab"><font size="4"><strong>调查问卷</strong></font></a></td>
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

<!-- 此为第二页的div-->
<div  id="Info_调查问卷" align="center" class="tab-pane fade bg1">
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

<!-- 此为第三页的div-->
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

<!-- 此为第四页的div-->
<div  id="Info_4" align="center" class="tab-pane fade bg1">
<div class="bg2">
    <img class="img img-responsive  img-rounded" alt="Responsive image" src="img/reason.png" width="415" height="116"/><br><br><br><br>

    <div align="left" class="div controls input-append date form_date" data-date="" data-date-format="yyyy-mm-dd hh:00" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd hh:00">
          <font size="3"><label>&nbsp回校时间：</label></font>
          <input  class="textname" type="text" value="" id ='time' name='time' readonly>
          <span class="add-on"><i class="icon-th"></i></span>
=======
<body>
    <?php include('nav.php');include('header.php');?>
    <div class="container wj">
        <h2><i class="fa fa-fw fa-lg fa-pencil-square-o"></i>调查问卷-20160331</h2>
        <hr>
        <form role="form">
            <div class="quesion">Q1.你的年级</div>
            <div class="form-group">
                <select id="choose1" class="form-control">
                    <option value="-1">请选择</option>
                    <option value="2012级本科">2012级本科</option>
                    <option value="2013级本科">2013级本科</option>
                    <option value="2014级本科">2014级本科</option>
                    <option value="2015级本科">2015级本科</option>
                    <option value="2013级硕士">2013级硕士</option>
                    <option value="2014级硕士">2014级硕士</option>
                    <option value="2015级硕士">2015级硕士</option>
                    <option value="博士">博士</option>
                </select>
            </div>
            <p class="fieldset"><span id="error1" class="error-info">这一栏没选哦</span></p>
        </form>
        <div class="quesion">Q2.父亲职业</div>
        <form role="form">
            <div class="form-group">
                <select id="choose2" class="form-control">
                    <option value="-1">请选择</option>
                    <option value="医生">医生</option>
                    <option value="国企或事业单位">国企或事业单位</option>
                    <option value="公务员">公务员</option>
                    <option value="私企">私企</option>
                    <option value="中小学教师">中小学教师</option>
                    <option value="大学教师">大学教师</option>
                    <option value="个体工商业">个体工商业</option>
                    <option value="农民">农民</option>
                    <option value="自由职业者">自由职业者</option>
                    <option value="其他">其他</option>
                </select>
            </div>
            <p class="fieldset"><span id="error2" class="error-info">这一栏没选哦</span></p>
        </form>
        <div class="quesion">Q3.母亲职业</div>
        <form role="form">
            <div class="form-group">
                <select id="choose3" class="form-control">
                    <option value="-1">请选择</option>
                    <option value="医生">医生</option>
                    <option value="国企或事业单位">国企或事业单位</option>
                    <option value="公务员">公务员</option>
                    <option value="私企">私企</option>
                    <option value="中小学教师">中小学教师</option>
                    <option value="大学教师">大学教师</option>
                    <option value="个体工商业">个体工商业</option>
                    <option value="农民">农民</option>
                    <option value="自由职业者">自由职业者</option>
                    <option value="其他">其他</option>
                </select>
            </div>
            <p class="fieldset"><span id="error3" class="error-info">这一栏没选哦</span></p>
        </form>
        <form role="form">
            <div id="question4" class="form-group">
                <div class="quesion">Q4.是否单亲</div>
                <div class="radio radio-info radio-inline">
                    <input type="radio" id="inlineRadio1" value="option1" name="choose4">
                    <label for="inlineRadio1"> 是 </label>
                </div>
                <div class="radio radio-inline">
                    <input type="radio" id="inlineRadio2" value="option2" name="choose4">
                    <label for="inlineRadio2"> 否 </label>
                </div>
            </div>
            <p class="fieldset"><span id="error4" class="error-info">这一栏没选哦</span></p>
        </form>
        <form role="form">
            <div id="question5" class="form-group">
                <div class="quesion">Q5.和家长沟通频率</div>
                <div class="radio radio-info radio-inline">
                    <input type="radio" id="inlineRadio3" value="option2" name="choose5">
                    <label for="inlineRadio3"> 每天 </label>
                </div>
                <div class="radio radio-inline">
                    <input type="radio" id="inlineRadio4" value="option2" name="choose5">
                    <label for="inlineRadio4"> 每星期 </label>
                </div>
                <div class="radio radio-inline">
                    <input type="radio" id="inlineRadio5" value="option2" name="choose5">
                    <label for="inlineRadio5"> 每个月 </label>
                </div>
            </div>
            <p class="fieldset"><span id="error5" class="error-info">这一栏没选哦</span></p>
        </form>
        <form role="form">
            <div id="question4" class="form-group">
                <div class="quesion">Q6.是否有兄弟姐妹</div>
                <div class="radio radio-info radio-inline">
                    <input type="radio" id="inlineRadio6" value="option1" name="choose6">
                    <label for="inlineRadio6"> 是 </label>
                </div>
                <div class="radio radio-inline">
                    <input type="radio" id="inlineRadio7" value="option2" name="choose6">
                    <label for="inlineRadio7"> 否 </label>
                </div>
            </div>
            <p class="fieldset"><span id="error6" class="error-info">这一栏没选哦</span></p>
        </form>
        <p class="fieldset">
            <input class="submit pull-right" type="button" id="submit" value="提交">
        </p>
>>>>>>> TEMP_F
    </div>
    <?php include('footer.php');?>
</body>

</html>
