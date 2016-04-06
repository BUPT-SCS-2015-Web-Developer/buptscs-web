<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <?php $title="登录";include('head.php');?>
    <link rel="stylesheet" href="css/login.css">
    <script src="js/login.js"></script>
</head>

<body>
    <?php include('nav.php');include('header.php');?>
    <div class="container">
        <div id="login">
            <form class="login-form">
                <span id="login-info" class="login-error-message">0.0 登录失败，重试一发吧！</span>
                <p class="fieldset">
                    <label class="username" for="username"><i class="fa fa-user fa-fw"></i></label>
                    <input class="full-width has-padding has-border" id="username" type="username" placeholder="2015211457">
                    <span id="erroru" class="error-message">学号不能为空！</span>
                </p>
                <p class="fieldset">
                    <label class="password" for="password"><i class="fa fa-key fa-fw"></i></label>
                    <input class="full-width has-padding has-border" id="password" type="password" placeholder="密码">
                    <a href="#0" class="hide-password">显示</a>
                    <span id="errorp" class="error-message">密码不能为空！</span>
                </p>
                <p class="fieldset">
                    <div class="checkbox">
                        <input type="checkbox" id="remember-me" checked>
                        <label for="remember-me">记住我</label>
                        <p id="forget" href="">忘记密码</p>
                        <span id="forget-inf" class="inf">请联系导员</span>
                    </div>
                </p>
                <p class="fieldset">
                    <input class="full-width" type="button" id="submit" value="登录">
                </p>
            </form>
        </div>
    </div>
    <?php include('footer.php');?>
</body>

</html>
