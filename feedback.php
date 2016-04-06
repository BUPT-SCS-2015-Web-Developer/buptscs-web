<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <?php $title="问题反馈";include('head.php');?>
    <link rel="stylesheet" href="css/feedback.css">
    <script src="js/jquery.swipebox.min.js"></script>
    <script src="js/feedback.js"></script>

</head>

<body>
    <?php include('nav.php');include('header.php');?>
    <div class="container">
    <h1><i class="fa fa-fw fa-lg fa-paper-plane"></i>问题反馈</h1>
        <hr>
        <form class="feedback-form">
           <p class="fieldset">
                <textarea class="form-control" name="content" id="problem" cols="65" rows="5" placeholder="这里写上问题概述"></textarea>
                <span id="problem-absent" class="error-message">逗我玩呢？</span>
            </p>
            <input class="submit pull-right" id="submit" type="button" value="发&nbsp&nbsp&nbsp射">
        </form>
    </div>
    <?php include('footer.php');?>
</body>

</html>
