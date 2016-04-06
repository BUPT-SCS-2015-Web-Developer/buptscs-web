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
    </div>
    <?php include('footer.php');?>
</body>

</html>
