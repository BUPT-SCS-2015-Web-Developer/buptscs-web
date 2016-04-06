<nav class="navbar navbar-vertical-left">
    <ul class="nav navbar-nav">
        <li>
            <a href="index.php">
                <i class="fa fa-fw fa-lg fa-home"></i>
                <span>首页</span>
            </a>
        </li>
        <li>
            <a href="info.php">
                <i class="fa fa-fw fa-lg fa-pencil-square-o"></i>
                <span>问卷</span>
            </a>
        </li>
        <li>
            <a href="askoff.php">
                <i class="fa fa-fw fa-lg fa-comments-o"></i>
                <span>请假</span>
            </a>
        </li>
        <li>
            <a href="tips.php">
                <i class="fa fa-fw fa-lg fa-heart"></i>
                <span>小贴士</span>
            </a>
        </li>
        <li>
            <a href="feedback.php">
                <i class="fa fa-fw fa-lg  fa-paper-plane"></i>
                <span>问题反馈</span>
            </a>
        </li>
        <li>
            <a href="logout.php">
                <i class="fa fa-fw fa-lg  fa-sign-out"></i>
                <span>注销</span>
            </a>
        </li>
    </ul>
</nav>
<div id="user-info">
<?php echo '学号：'.$_SESSION['username']; ?>
</div>
