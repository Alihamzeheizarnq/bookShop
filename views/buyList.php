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
                                <h3 class="card-title">لیست خرید ها</h3>

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
                                        <th>نام مشتری </th>
                                        <th>کد پیگیری </th>
                                        <th>کتاب خریده شده</th>
                                        <th>مبلغ پرداخت شده</th>

                                    </tr>
                                    <?php
                                    foreach ($buys as $buy) {


                                        echo "
                                         <tr>
                                        <td>{$buy['name']} {$buy['lastname']}</td>
                                        <td>{$buy['code']}</td>
                                        <td>{$buy['bookname']}</td>
                                        <td>{$buy['total']}</td>
                                        
                                  
                                       
                                        
                                   
                                     
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
