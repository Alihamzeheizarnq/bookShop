<?php

require __DIR__ . "/leyout/heder.php";

?>
    <div class="content-wrapper" style="min-height: 600px;">

    <section class="content-header">
    <section class="content">

<div >

    <div class="card card-warning">
        <div class="">
            <?php


            if (flashError()->hasErrors(flashError()::ERROR)){
                flashError()->display();
            }
            ?>
        </div>

        <div class="card-header">

            <h3 class="card-title">ویرایش کتاب
            <?= $book['name'] ?>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form role="form" action="/UpdateBook/<?= $book['id'] ?>" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label>نام کتاب</label>
                    <input type="text" class="form-control" name="name" value="<?= $book['name'] ?>" placeholder="نام را وارد کنید..">
                </div>
                <div class="form-group">
                    <label>قیمت کتاب</label>
                    <input type="text" class="form-control" name="price" value="<?= $book['price'] ?>" placeholder="قیمت را وارد کنید..">
                </div>
                <div class="form-group">
                    <label>عکس کتاب</label>
                    <input type="file" class="form-control" name="img" value="<?= $book['img'] ?>">

                </div>
                <div class="form-group">
                    <label>عکس فعلی :  </label>
                    <a href="/public/Bookimg/<?= $book['img'] ?>">

                        <img src="/public/Bookimg/<?= $book['img'] ?>" alt="" height="60px">
                    </a>
                </div>
                <div class="form-group">
                    <label>توضیحات درمورد کتاب</label>
                    <textarea name="text" class="form-control" rows="5"><?= $book['text'] ?></textarea>

                </div>
                <div class="form-group">
                    <label>فایل کتاب</label>
                    <input type="file" class="form-control" name="bookfile" value="<?= $book['bookfile'] ?>">
                </div>
               <div>
                   <a href="/public/Bookimg/<?= $book['bookfile'] ?>">
                       فایل pdf فعلی
                   </a>

               </div> <br>
                <div>
                    <button type="submit" class="btn btn-primary">ارسال</button>
                </div>

            </form>
        </div>
        <!-- /.card-body -->
    </div>
</div>

    </section>
    </section>

</div>
<?php

require __DIR__ . "/leyout/footer.php";
