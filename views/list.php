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
                                <h3 class="card-title">لیست مخاطبین</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                               placeholder="جستجو">

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
                                        <th>شماره</th>
                                        <th>ایمیل</th>
                                        <th>آدرس</th>
                                        <th>حذف</th>
                                        <th>ویرایش</th>
                                    </tr>
                                    <?php

                                    foreach ($users as $user) {

                                        echo "
                                         <tr>
                                        <td>{$user['name']}</td>
                                        <td>{$user['tel']}</td>
                                        <td>{$user['email']}</td>
                                        <td>{$user['location']}</td>
                                         <td><a href='/deleteUser/{$user['id']}'><span class=\"badge badge-danger\">حذف</span></a></td>
                                        <td><a href='/editUer'><span class=\"badge badge-success\">ویرایش</span></a></td>
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
