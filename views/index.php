<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Product</title>
    <link rel="stylesheet" href="/public/style.css">
</head>
<!DOCTYPE html>
<html lang="fa">


<body>
<header>
    <div class="slider-explain-box">
        <div class="slider-wrap">
            <div class="slider-title">
                <ul>
                    <li>خرید آنلاین کتاب</li>
                </ul>
                <div class="book-data">
                    <ul>
                        <li><a class="login" href="/Login-user">ورود</a></li>
                        <li><a class="sign-up" href="/register">ثبت نام</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="productslides">
            <li><img alt=""
                     src="/public/images/depositphotos_117576456-stock-illustration-light-blue-abstract-web-geometric.jpg">
            </li>
        </ul>
    </div>
    <div class="navigation" id="navigation">
        <div class="page-options-box">
            <div class="page-options-items">
                <ul>
                    <li><a href="/">صفحه اصلی</a></li>
                    <?php
                    if (isset($_SESSION['user_id'])){
                        echo "
                                            <li><a href='/panel/user'>ورود به پنل </a></li>

                        ";
                    }
                    ?>

                </ul>
            </div>
            <div class="timer" dir="ltr">
                <p id="timer"></p>
                <p id="date"></p>
            </div>
        </div>
    </div>
</header>
<div class="page-books" id="section-1">
    <div class="page-options-box">
        <div class="page-options-heading">
            <h3> کتاب ها</h3>
        </div>
        <hr>
        <div class="grid">
            <?php foreach ($books as $book){
                echo "
                <div class='book-parent'>
                <figure>
                    <div class='book-img'>
                        <img src='/public/Bookimg/{$book['img']}' alt='' height='200px' width='50px'>
                    </div>
                    <figcaption>
                        <h1>{$book['bookname']}</h1>
                        <h2>{$book['text']}</h2>

                        <div class='book-data'>
                        <h2> {$book['price']}  ریال</h2>
                            <ul>
                                <li><a href='/books/{$book['id']}'>خرید</a></li>
                            </ul>
                        </div>
                    </figcaption>
                </figure>
            </div>
                ";
            } ?>


        </div>
    </div>


    <div class="news-container" id="section-2">
        <div class="news-box">
            <div class="page-options-heading">
                <h3>پیشنهاد ما</h3>
            </div>
            <hr>
            <div class="content">
                <article>
                    <div class="info">
                        <div class="right">
                            <img src="images/info/darbare1.png" alt="">
                        </div>
                        <h2>شکسپیر در شوروی</h2>
                        <p>
                            کتاب شامل سه بخش است. بخش نخست تحت عنوان «شکسپیر درادبیات» شامل مقالاتی است از «الکساندر
                            بلوک»: لیرشاه شکسپیر، «آناتولی لونا چارسکی»:بیکن و نمایشنامه‌های شکسپیر، «ایوان آسیونف»:
                            مسئله چیست؟، «آلکساندر اسمیرف»:شکسپیر، رنسانس و دوره باروک و «میخائیل موروزوف»:پویایی
                            شخصیت‌های شکسپیر.
                            بخش دوم تحت عنوان «شکسپیر و تئاتر» مقالاتی دارد، از «کنسانتین استانیسلاوسکی»: از هملت
                            می‌گوید، «الکساندر استوژف»: از اتللو می‌گوید، «آلکسی پوپف»: شکسپیر و تئاتر و« گالینا
                            اولانوا»: ژولیت من.

                            در بخش آخر که «شکسپیر و سینما» نام دارد، مقالاتی از «اینو کنتی اسموکتونوسکی»: شکسپیر در
                            زندگی من و «گریگوری کوزینتسف» : لیرشاه، منتشر شده است.

                        </p>
                    </div>
                </article>
                <article>
                    <div class="info">
                        <div class="left">
                            <img src="images/info/darbare2.png" alt="">
                        </div>
                        <h2>جهان مکتوب </h2>
                        <p>
                            در این کتاب، مارتین پوکنر ما را با خود به سفری یگانه در دل‌ زمان و به گرداگرد عالم می‌برد و
                            طی آن از نقش شگرفی
                            پرده برمی‌دارد که داستان‌ها و ادبیات در خلق جهان امروز ما ایفا کرده‌اند.
                            پوکنر در این کتاب بدیع، ضمن کندوکاو در شانزده متن بنیادینی که آنها را از بیش از چهارهزار سال
                            تاریخ ادبیات جهان
                            انتخاب کرده، ما را با بسیاری از کسانی که اهل شهود و صاحب بینش بوده‌اند آشنا می‌سازد و به
                            روشنی نشان می‌دهد
                            که چگونه نوشتن و به تبع آن ادبیات الهام‌بخش ظهور و سقوط ملت‌ها و امپراتوری‌ها بوده، افکار
                            فلسفی و سیاسی را
                            در درخشان‌ترین اذهان و عقول شرر زده، باورها و عقاید مذهبی را در جان باورمندان پدیدآورده
                            و با تأثیرگذاری بر زندگی نسل‌های بسیار، سیر تاریخ را عوض کرده است.

                        </p>
                    </div>
                </article>
                <article>
                    <div class="info">
                        <div class="right">
                            <img src="images/info/darbare3.png" alt="">
                        </div>
                        <h2>داستان چگونه کار میکند؟</h2>
                        <p>
                            غرض از نوشتن این کتاب یاری رساندن به نقاش حرفه ای، مخاطب کنجکاو و هنر دوست عادی بود
                            و این مهم با معطوف کردن چشمان یک منتقد به مسئله ی آفرینش هنری انجام شد.
                            "جان راسکین" نخست مخاطب را ترغیب می کند تا به طبیعت چشم بدوزد.
                            مثلا به برگی نگاه کند و با قلم از آن کپی بردارد. طراحی خود از برگ را هم در این کتاب آورده
                            است.
                            از این برگ به سراغ یکی از نقاشی های تینتورتو می رود: راسکین می گوید به ضرب قلم توجه کنید
                            و ببینید چگونه یک دست را طراحی می کند، قدم به قدم راسکین خوانندگان را از بطن پروسه ی آفرینش
                            اثر می گذراند.
                            اگر این کتاب بحث فراتری ارائه بدهد، آن بحث این است که یک داستان می تواند هم اثری مصنوع باشد،
                            هم واقع نما.

                        </p>
                    </div>
                </article>
            </div>
        </div>
    </div>


</div>
</div>

<div class="footer" id="section-4">
    <div class="page-options-box">
        <div class="call-us">
            <p>
                کاربر گرامی، لطفاً در صورت وجود هرگونه سوال یا ابهامی، پیش از ارسال ایمیل یا تماس تلفنی با ایران کتاب ،
                بخش پرسش‏های متداول را ملاحظه فرمایید و در صورتی که پاسخ خود را نیافتید، با ما تماس بگیرید.
                <br>
                رسیدگی به انتقادها
                <br>
                مشتری گرامی، اگر انتقاد یا شکایتی از ایران کتاب دارید برای دریافت پاسخ سریع‌تر، لطفا به آدرس
                complaint@site.ir ایمیل ارسال کنید .


                در تعطیلات رسمی ، این سایت هیچ‌گونه پاسخگویی، سرویس‌دهی و خدماتی ندارد.


            </p>
        </div>
        <div class="contact-form">
            <form>
                <p><input type="text" placeholder="نام "></p>
                <p><input type="text" placeholder=" نام خانوادگی"></p>
                <p><input type="email" placeholder="پست الکترونیک"></p>
                <p><input type="email" placeholder="شماره تماس"></p>
                <p><input type="text" placeholder="موضوع"></p>
                <p><textarea placeholder="اعتراض نامه "></textarea></p>
                <p><input type="submit" value="ارسال"></p>
            </form>
        </div>
    </div>
</div>
<footer>
    <div class="footer-landing">
        <div class="page-options-box">
            <p>design by : M-A.CHAROUSAEE </p>
        </div>
    </div>
</footer>

<script src="/public/js/index.js"></script>
</body>

</html>