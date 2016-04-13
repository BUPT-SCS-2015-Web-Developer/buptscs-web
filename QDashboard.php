<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <?php $title="问卷系统|Dashboard";include('head.php');?>
    <link rel="stylesheet" href="css/Questionnaire.css">
    <script src="js/QDashboard.js" charset="UTF-8"></script>
</head>

<body>
    <?php include('nav.php');include('header.php');?>
    <div class="container">
        <h1>问卷系统</h1>
        <?php if($_SESSION['type'] == 'teacher'): ?>
        <h3>你可以创建问卷</h3>
        <a href = CreateQuestionnaire.html><button>创建问卷</button></a>
        <?php endif; ?>
        
        <div id="unfilled"></div>
        <div id="filled"></div>
    </div>
    <?php include('footer.php');?>
</body>

</html>
