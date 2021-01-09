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
                                <h3 class="card-title">توضیحات کتاب
                                    <?php
                                    echo $books['name']
                                    ?>
                                </h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">


                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>

                                    </tr>

                                        <td><?php echo $books['text']?></td>



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
