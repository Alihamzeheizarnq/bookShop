<!DOCTYPE html>

<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>login</title>
    <link rel="stylesheet" href="/public/style.css">
    <script src="js/index.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
<header>
    <div class="slider-explain-box">
        <div class="navigation" id="navigation">
            <div class="box">
                <div class="page-options-items">
                    <ul>
                        <li><a href="/">صفحه اصلی</a> </li>



                        <li>
                            <a ><?php echo $user['name'] . " " . $user['lastname']?>

                                به فروشگاه کتاب خوش امدید

                            </a></li>


                    </ul>
                </div>
                <div class="timer" dir="ltr">
                    <ul>
                        <li ><a  href="/register">
                                <?php
                                if (isset($_SESSION['user_id'])){
                                    echo "<li ><a href='/logout/user'>

خروج</a> </li>";
                                }
                                ?>
                            </a></li>
                    </ul>
                    <p id="timer"></p>
                    <p id="date"></p>
                </div>
            </div>
        </div>

        <div id="problems-box" style="margin-top: 50px; background-color: whitesmoke">
            <table class="table caption-top">
                <caption></caption>
                <thead>
                <tr>
                    <th scope="col">نام </th>
                    <th scope="col"> نام خانوادگی</th>
                    <th scope="col">نام کاربری</th>
                    <th scope="col">ایمیل</th>
                    <th scope="col">اعتبار</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row"><?php echo $user['name']?></th>
                    <td><?php echo $user['lastname']?></td>
                    <td><?php echo $user['username'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td><?php echo $user['etebar'] ?></td>

                </tr>

                </tbody>
            </table>
        </div>
        <nav class="navbar navbar-light bg-light" style="margin-top: 50px">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">خرید های من</a>
            </div>
        </nav>
        <div id="problems-box" style="margin-top: 5px; background-color: whitesmoke">



            <table class="table table-success">

                <thead>
                <tr>
                    <th scope="col">نام کتاب</th>
                    <th scope="col"> شماره پیگیری</th>
                    <th scope="col">عکس کتاب</th>
                    <th scope="col">فایل کتاب</th>
                    <th scope="col">مبلغ پرداخت شده</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($test as $item){

                    echo "
                    
                      <tr>
                    <th scope='row'>{$item['bookname']}</th>
                    <th scope='row'>{$item['code']}</th>
                    <th scope='row'><img height='60px' src='/public/Bookimg/{$item['img']}' alt=''></th>
                    <th scope='row'><a href='/public/Bookimg/{$item['bookfile']}'>دانلود </a></th>
                    <th scope='row'>{$item['total']}</th>
                    

                </tr>
                    ";
                }
                ?>


                </tbody>
            </table>
        </div>
    </div>
    <div class="clearfix">

    </div>
</header>
<div class="clearfix"></div>
<div class="clearfix"></div>

<script src="/public/js/login.js"></script>
</body>

</html>