<!DOCTYPE html>

<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>login</title>
    <link rel="stylesheet" href="/public/style.css">
    <script src="js/index.js"></script>
</head>

<body>
<header>
    <div class="slider-explain-box">
        <div class="navigation" id="navigation">
            <div class="box">
                <div class="page-options-items">
                    <ul>
                        <li><a href="/">صفحه اصلی</a> </li>

                        <li><a href="/register">ثبت نام</a></li>
                    </ul>
                </div>
                <div class="timer" dir="ltr">
                    <p id="timer"></p>
                    <p id="date"></p>
                </div>
            </div>
        </div>
        <div class="login-page">
            <div class="login-form-box">
                <div style="margin-right: 200px;color: red ">
                    <?php


                    if (flashError()->hasErrors(flashError()::ERROR)){
                        flashError()->display();
                    }?>
                </div>
                <div class="form">

                    <div class="form-heading">
                        <br>
                        <h2>ورود</h2>
                        <p> نام کاربری و رمز عبور خود را وارد نمایید</p>
                    </div>
                    <div style="margin-right: 200px;color: red ">
                        <?php


                        if (flashError()->hasErrors(flashError()::ERROR)){
                            flashError()->display();
                        }?>
                    </div>
                    <form action="/auth-login" method="post">
                        <p></p><input type="text" placeholder=" نام کاربری" name="username"></p>
                        <p><input type="password" placeholder="رمز عبور" name="password"></p>
                        <p><button type="submit" value="ارسال" >ارسال</p>
                    </form>
                </div>
            </div>
        </div>
        <div id="problems-box">
            <div id="problems">
                <p id="passwordError"></p>
                <p id="usernameError"></p>
                <p id="success"></p>
                <br>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</header>
<div class="clearfix"></div>
<div class="clearfix"></div>

<script src="/public/js/login.js"></script>
</body>

</html>