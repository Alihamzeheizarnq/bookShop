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

            <h3 class="card-title">ایجاد مخاطب جدید</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form role="form" action="/addUser" method="POST">

                <div class="form-group">
                    <label>نام</label>
                    <input type="text" class="form-control" name="name" placeholder="نام را وارد کنید..">
                </div>
                <div class="form-group">
                    <label>ایمیل</label>
                    <input type="text" class="form-control" name="email" placeholder="ایمیل را وارد کنید..">
                </div>
                <div class="form-group">
                    <label>شماره تماس</label>
                    <input type="text" class="form-control" name="tel" placeholder="نام را وارد کنید..">
                </div>
                <div class="form-group">
                    <label>آدرس</label>
                    <input type="text" class="form-control" name="location" placeholder="آدرس را وارد کنید..">
                </div>
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
