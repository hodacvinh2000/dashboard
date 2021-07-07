<?php
include_once "./Views/header.php";
include_once "./Views/slidebar.php";
?>
    <div class="page-wrapper">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="d-md-flex mb-3">
                    <h3 class="box-title mb-0">List Unregistered</h3>
                    <form role="search" class="col-md-3 col-sm-4 col-xs-6 ms-auto app-search d-none d-md-block me-3">
                        <input type="text" placeholder="Search..." class="form-control mt-0">
                        <a href="" class="active" style="position:absolute; right:50px; top:35px">
                            <i class="fa fa-search"></i>
                        </a>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table no-wrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">ID</th>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Subject</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($list_unregistered as $class){?>
                            <tr>
                                <td class="txt-oflo"><?=$class->id?></td>
                                <td class="txt-oflo"><?=$class->name?></td>
                                <td class="txt-oflo"><?=$class->subject?></td>
                                <td><span class="text-success">
                                    <form method="POST" action="">
                                        <input type="hidden" name="class_id" value="<?=$class->id?>"/>
                                        <button class="btn btn-primary">Join</button>
                                    </form>
                                </td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
                <h3 class="box-title mb-0">List registered</h3>
                <div class="table-responsive">
                    <table class="table no-wrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">ID</th>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Subject</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($list_registered as $class){?>
                            <tr>
                                <td class="txt-oflo"><?=$class->id?></td>
                                <td class="txt-oflo"><?=$class->name?></td>
                                <td class="txt-oflo"><?=$class->subject?></td>
                                <td><span class="text-success">
                                    <form method="POST" action="./unregister?id=<?=$student_id?>">
                                        <input type="hidden" class="form-control" name="class_id" value="<?=$class->id?>">
                                        <button class="btn btn-danger">Cancel</button>
                                    </form>
                                </td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

<?php
include_once "./Views/footer.php";
?>