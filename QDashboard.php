<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <?php $title="问卷系统|Dashboard";include('head.php');?>
</head>

<body>
    <?php include('nav.php');include('header.php');?>
    <div class="container">
            <?php if($_SESSION['type'] == 'teacher') {
                echo "<a href = CreateQuestionnaire.html><button>创建问卷</button></a>";
            } ?>
    </div>
    <?php include('footer.php');?>
</body>

</html>
