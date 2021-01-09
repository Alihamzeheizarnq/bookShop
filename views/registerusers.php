<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>register</title>
    <link rel="stylesheet" href="/public/style.css">
    <script src="/public/js/index.js"></script>
</head>

<body>
<header>
    <div class="slider-explain-box">
        <div class="navigation" id="navigation">
            <div class="page-options-box">
                <div class="page-options-items">
                    <ul>
                        <li><a href="/">صفحه اصلی</a> </li>

                        <li><a href="/Login-user">ورود</a></li>
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
                        <h2>ثبت نام</h2>
                        <p>اطلاعات مورد نیاز را وارد نمایید</p>

                    </div>



                    <form class="register-form" method="post" action="/auth">
                        <p><input type="text" name="name" placeholder=" نام "  ></p>
                        <p><input type="text" name="lastname" placeholder=" نام خانوادگی " ></p>
                        <p><input type="tel" name="tel" placeholder=" تلفن همراه"  max="11"></p>
                        <p><input type="email" name="email" placeholder=" ایمیل (اختیاری) " ></p>
                        <p><input type="text" name="username" placeholder=" نام کاربری" ></p>
                        <p><input type="password" name="password" placeholder="رمز عبور" ></p>
                        <p><input type="password" name="confirm_password" placeholder="تکرار رمز عبور" ></p>
                        <p><button type="submit" value="ارسال" >ثبت نام</p>
                        <p><button type="reset" value="ارسال" >ریست</p>
                    </form>

                </div>

            </div>

        </div>

        <div id="problems-box">
            <div id="problems">
                <p id="nameError"></p>
                <p id="lastNameError"></p>
                <p id="phoneNumberError"></p>
                <p id="emailError"></p>
                <p id="passwordError"></p>
                <p id="passwordRepeatError"></p>
                <p id="totaly"></p>
                <p id="success"></p>
                <br>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</header>
<div class="clearfix"></div>

<div class="clearfix"></div>

<script src="/public/js/register.js"></script>
</body>

</html>