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
                                <h3 class="card-title">لیست کاربران</h3>

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
                                        <th>نام خانوادگی</th>
                                        <th>ایمیل</th>
                                        <th>نام کاربری</th>
                                        <th>شماره تماس</th>
                                        <th>رمز عبور</th>
                                        <th>اعتبار باقی مانده</th>
                                        <th>حذف</th>

                                    </tr>
                                    <?php
                                    foreach ($users as $user) {
                                        if ($user['status'] == 'admin') continue;

                                        echo "
                                         <tr>
                                        <td>{$user['name']}</td>
                                        <td>{$user['lastname']}</td>
                                        <td>{$user['email']}</td>
                                        <td>{$user['username']}</td>
                                        <td>{$user['tel']}</td>
                                        <td>{$user['password']}</td>
                                        <td>{$user['etebar']}</td>
                                         <td><a href='/deleteUser/{$user['id']}'><span class=\"badge badge-danger\">حذف</span></a></td>
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
