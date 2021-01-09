<?php

require __DIR__ . "/leyout/heder.php";

?>
    <div class="content-wrapper" style="min-height: 600px;">

        <section class="content-header">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">لیست کتاب ها</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">


                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <th>نام</th>
                                        <th>قیمت</th>
                                        <th>تصویر</th>
                                        <th>فایل</th>
                                        <th>توضیحات</th>
                                        <th>ویرایش</th>
                                        <th>حذف</th>

                                    </tr>
                                    <?php
                                    foreach ($books as $book) {


                                        echo "
                                         <tr>
                                        <td>{$book['bookname']}</td>
                                        <td>{$book['price']}</td>
                                        <td><img src='/public/Bookimg/{$book['img']}' height='40px'></td>
                                        
                                        <td><a href='/public/Bookimg/{$book['bookfile']}'>دانلود</a></td>
                                        <td><a href='/lists-book/text/{$book['id']}'>نمایش توضیحات</a></td>
                                       
                                        
                                   
                                     
                                         <td><a href='/editBook/{$book['id']}'><span class=\"badge badge-success\">ویرایش</span></a></td>
                                         <td><a href='/deleteBook/{$book['id']}'><span class=\"badge badge-danger\">حذف</span></a></td>
                                    </tr>
                                        ";
                                    }
                                    ?>


                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </section>
        </section>

    </div>
<?php

require __DIR__ . "/leyout/footer.php";
