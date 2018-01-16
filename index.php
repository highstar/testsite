<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="程序员|简历|php|后端|前端|html|javascript" charset="UTF-8">
    <meta name="description" content="程序员|简历|php|后端|前端|html|javascript" charset="UTF-8">
    <!--<meta http-equiv="refresh" content="3;url=http://www.baidu.com" />-->
    <meta name="author" content="高星"/>
    <title>高星的网站</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="css/mystyle.css"/>
    <link rel="stylesheet" type="text/css" href="css/media.css"/>
    <link rel="stylesheet" href="iconfont/iconfont.css"/>
    <link rel="stylesheet" href="css/animate.css"/>
    <script defer src="js/myjs.js"></script>
</head>

<body>
<div class="header">
    <img src="img/header.jpg" title="" alt="" height=100px;/>
    <span>
            <a href="#" class="animated bounce">黑夜凛冬，code就是龙晶</a>
        </span>
    <audio src="res/"></audio>
</div>
<div class="left_aside">
    <form action="" class="search_form">
        <input type="search" placeholder="PHP LAMP源码编译安装详解">
        <input type="submit">
        <a class="cam" href="#"></a>
    </form>
    文章列表
    <hr/>
    <h4>您从哪里获知本网站</h4>
    <input type="text" list="来源">
    <datalist id="来源">
        <option value="weibo">weibobo</option>
        <option value="twitter"></option>
    </datalist>
    <br/>
    <h4>您的性别</h4>
    <select name="" id="">
        <option value="0">男</option>
        <option value="0">女</option>
        <option value="0">其他</option>
    </select>
    <hr/>
    <embed src="res/flashhengzz%20-%20%20-%20%20(ZCOOL).mp4" type="application/x-shockwave-flash"></embed>
    <hr/>
    <canvas id="myCanvas"></canvas>
    <script type="text/javascript">
        var canvas = document.getElementById('myCanvas');
        var ctx = canvas.getContext('2d');
        ctx.fillStyle = '#FF0000';
        ctx.fillRect(0, 0, 80, 100);
    </script>
    <form action="">
        <fieldset>
            <lengend>点击你喜欢的语言</lengend>
            <ul>
                <li>
                    <label>
                        <input type="radio" name="PHP"/><span>PHP</span>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" name="Objective-C"/><span>Objective-C</span>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" name="HTML"/><span>HTML</span>
                    </label>
                </li>
            </ul>
        </fieldset>
    </form>

    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>

</div>

<?php
require_once ('appvars.php');
require_once ('connectvars.php');

// Connect to the database
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Retrieve the score data from MySQL
$query = "SELECT * FROM email_list";
$data = mysqli_query($dbc, $query);

// Loop through the array of score data, formatting it as HTML
echo '<table>';

while ($row = mysqli_fetch_array($data)) {
    // Display the reader data
    echo '<tr><td>';
    echo '<strong>Firstname:</strong>' . $row['first_name'] . '<br />';
    echo '<strong>Lastname:</strong>' . $row['last_name'] . '</td>';
    if (is_file(PH_UPLOADPATH . $row['photo']) && filesize(PH_UPLOADPATH . $row['photo']) > 0) {
        echo '<td><img src=" ' . PH_UPLOADPATH . $row['photo'] . '"  alt="Reader image" /></td></tr>';
    } else {
        echo '<td><img src="' . PH_UPLOADPATH . 'unverified.gif' . '" alt="Unverified photo" /></td></tr>';
    }
}
echo '</table>';

mysqli_close($dbc);

?>

<div class="right_aside">
    <form enctype="multipart/form-data" method="post" action="addemail.php">
        <input type="hidden" name="MAX_FILE_SIZE" value="32768"/>
        <label for="photo">选择头像：</label>
        <input type="file" id="photo" name="photo"/><br/>
        <label for="firstname">名：</label>
        <input type="text" id="first_name" name="first_name"/><br/>
        <label for="lastname">姓：</label>
        <input type="text" id="last_name" name="last_name"/><br/>
        <label for="email">你的邮箱地址？</label>
        <input type="text" id="email" name="email"/><br/>
        <input type="submit" value="登陆" name="submit"/>
        <input type="submit" value="注册" name="log"/>
    </form>
</div>
<div class="cont">
    <div class="nav-warp">
        <ul class="nav-list">
            <li class="home">
                <i></i>
                <a href="#">首页</a>
            </li>
            <li class="resume">
                <a href="#">简历</a>
            </li>
            <li class="project">
                <i></i>
                <a href="24000tomato.html">项目</a>
                <div class="project_items">
                    <a href="#">***买</a>
                </div>
            </li>
            <li class="plan">
                <a href="table.html">计划</a>
            </li>
        </ul>
    </div>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <div class="slider_list">
        <ul class="u_slider_list">
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
        </ul>
    </div>
    <div class="clear"></div>
    <div class="box">
        <div class="item1">1</div>
        <div class="item2">2</div>
        <div class="item3">3</div>
    </div>
    <div class="section">
        <article>
            <h3>php学习进度</h3>
            3月开始
            <progress value="1.5" max="2"></progress>
            7月结束
            wenzhzngfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff一段文本一段文本一段文本一段文本一段文本一段文本一段文本一段文本一段文fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff本一段文本一段文本一段文本一段文本一段文本一段文本一段文本一段文本一段文本一段文本一段文本一段文本一段文本一段文本一段文本一段文本一段文本一段文本一段文本一段文本一段文本ffffffffffffffffffffffffffffffffffffffffffffffff
            <video src="res/" controls>您的浏览器不支持</video>
        </article>
    </div>
    <textarea name="" id="" cols="30" rows="10">

        </textarea>
    <div class="text_area"></div>
    <div class="wetalk">
        <div>你好</div>
    </div>
    <span class="iconfont icon-shouhuodizhi"></span>
    <div class="text-cont">
        <h3>Coder的基本素质</h3>
        <p>不停的写</p>
        <a href="#" class="iconfont icon-moreunfold"></a>
        <p>边看边写</p>
    </div>
    <p>给我写信留言</p>
    <form method="post" action="report.php">
        <label for="first_name">名：</label>
        <input type="text" id="name" name="name"/><br/>
        <label for="last_name">姓：</label>
        <input type="text" id="name" name="name"/><br/>
        <label for="email">你的邮箱地址？</label>
        <input type="text" id="email" name="email"/><br/>
        <label for="description">你的留言？</label>
        <input type="text" id="description" name="description"/><br/>
        <label for="reader_like">Do you like my site?</label>
        Yes <input id="reader_like" name="reader_like" type="radio" value="yes"/>
        No <input id="reader_like" name="reader_like" type="radio" value="no"/><br/>
        <input type="submit" value="Email me" name="submit"/>
    </form>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <!--<div class="content">-->
    <!--<div class="left">-->
    <!--于<time datetime="2017-07-31">7月31</time>看完php_mysql、html视频。-->
    <!--<hr/>-->
    <!--<ruby>-->
    <!--干<rt>gan</rt>-->
    <!--<rp>该标签无法正常显示</rp>-->
    <!--</ruby>-->
    <!--<hr/>-->
    <!--<details>-->
    <!--<summary>Show More</summary>-->
    <!--<img src="img/img.jpg" alt="" title="" />-->
    <!--<h1>balabala</h1>-->
    <!--</details>-->
    <!--<hr/>-->
    <!--现在是web前端<mark>first step</mark>course-->
    <!--</div>-->
    <!--<div class="right"></div>-->
    <!--</div>-->
    <div class="top_button">
        <a href="#">回到顶部</a>
    </div>

</div>
<footer>
    <div class="wrap">
        <div class="logo">
            <p>物质奖励驱动的任务管理APP</p>
        </div>
        <div class="phone">
            <p>
                <span>客服QQ:</span>
                <i>1851152270</i>
            </p>
            <p>
                <span class="work-time">工作时间:</span>
                <i>周一至周五（9:00 - 18:00）</i>
            </p>
        </div>
        <div class="function">
            <a href="#" class="reg">IOS下载</a>
            <a href="#" class="register">快速注册</a>
            <a href="#" class="login">已有账号，登陆</a>
        </div>
        <div class="clear"></div>
        <div class="shut_down">

        </div>
    </div>

</footer>

</body>
</html>
