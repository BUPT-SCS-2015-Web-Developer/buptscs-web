<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <?php $title="答题系统|Dashboard";include('head.php');?>
    <link rel="stylesheet" href="css/Puestionnaire.css">
    <script src="js/PDashboard.js" charset="UTF-8"></script>
</head>

<body>
    <?php include('nav.php');include('header.php');?>
    <div class="container">
        <h1>答题系统</h1>
        <?php if($_SESSION['type'] == 'teacher'): ?>
        <h3>你可以创建试卷</h3>
        <a href = CreateProblem.html><button>创建试卷</button></a>
		<h3>你可以查看学生答题情况</h3>
		<a href = problems.php><button>查看答题情况</button></a>
        <?php endif; ?>
		
		 <?php if($_SESSION['type'] == 'student'): ?>
		 <?php include('list.php')?>
		 <?php endif; ?>
        
        <div id="unfilled"></div>
        <div id="filled"></div>
    </div>
    <?php include('footer.php');?>
</body>

</html>