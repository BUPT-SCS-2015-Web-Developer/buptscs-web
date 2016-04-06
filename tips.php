<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <?php $title="小贴士";?>
    <?php include('head.php');?>
    <link rel="stylesheet" href="css/swipebox.min.css">
    <script src="js/jquery.swipebox.min.js"></script>
</head>
<script type="text/javascript">
;
(function($) {
    $('.swipebox').swipebox();
})(jQuery);
</script>

<body>
    <?php include('nav.php');?>
    <?php include('header.php');?>
    <div class="container">
        <div class="article">
            <h1><i class="fa fa-fw fa-calendar"></i>校历</h1>
            <div class="row">
                <div class="col-md-6">
                    <a rel="gallery-1" href="image/校历1.jpg" class="swipebox" title="校历1">
                        <img src="image/校历1.jpg" width="100%" alt="image">
                    </a>
                </div>
                <div class="col-md-6">
                    <a rel="gallery-1" href="image/校历2.jpg" class="swipebox" title="校历2">
                        <img src="image/校历2.jpg" width="100%" alt="image">
                    </a>
                </div>
            </div>
        </div>
        <div class="article">
            <div class="row">
                <h1><i class="fa fa-fw fa-chain"></i>常用网站</h1>
                <ul>
                    <li><a href="http://10.120.48.57/ceep/student/index.html">英语实验教程学生端</a></li>
                    <li><a href="https://iclass.bupt.edu.cn/">北邮“爱课堂”教学平台</a></li>
                    <li><a href="http://jwxt.bupt.edu.cn/">URP 综合教务系统</a></li>
                    <li><a href="http://10.103.242.92/discmath/index.php/en/">Discrete Mathematics(离散网站)</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php include('footer.php');?>
</body>

</html>
