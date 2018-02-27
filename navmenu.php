<?php
/**
 * Created by IntelliJ IDEA.
 * User: wuyufeng
 * Date: 24/02/2018
 * Time: 5:03 PM
 */
  // Generate the navigation menu
  echo '<hr />';
  ?>
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
            <li>
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<a href="logout.php">Log Out (' . $_SESSION['username'] . ')</a>';
        }else {
                    ?>
                    <div class="right_aside">
                        <form method="post" action="login.php">
                            <fieldset>
                                <label for="username">Username:</label>
                                <input type="text" id="username" name="username"
                                       value="<?php if (!empty($user_username)) echo $user_username; ?>"/><br/>
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password"/><br/>
                            </fieldset>
                            <input type="submit" value="Log In" name="submit"/>
                            <a href="signup.php">Sign Up</a>
                        </form>
                    </div>
                    <?php
                }
                ?>
            </li>
        </ul>
    </div>
