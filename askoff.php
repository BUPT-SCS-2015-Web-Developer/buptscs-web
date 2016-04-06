<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <?php $title="请假";include('head.php');?>
    <link rel="stylesheet" href="css/askoff.css">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" media="screen">
    <script src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
</head>

<body>
    <?php include('nav.php');include('header.php');?>
    <div class="container">
        <h1><i class="fa fa-fw fa-lg fa-comments-o"></i>请假</h1>
        <hr>
        <form class="askoff-form">
            <div align="left" class="div controls input-append date form_date" data-date="" data-date-format="yyyy-mm-dd hh:00" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd hh:00">
                <p class="fieldset">
                    <label>回校时间：</label>
                    <input class="textname askoff form-control" type="text" value="" id='time' name='time' readonly>
                    <span class="add-on"><i class="fa fa-fw fa-lg fa-calendar"></i></span>
                    <span id="errort" class="error-message">不回来了？</span>
                </p>
            </div>
            <script src="js/askoff.js"></script>
            <p class="fieldset">
                <label>请假事由：</label>
                <textarea class="form-control" name="content" id="reason" cols="65" rows="3" placeholder="请假事由中写明离校时间"></textarea>
                <span id="reason-absent" class="error-message">请假没有理由？</span>
            </p>
            <input class="submit pull-right" id="submit" type="button" value="请&nbsp&nbsp&nbsp假">
        </form>
    </div>
    <?php include('footer.php');?>
</body>

</html>
