<?php
include_once "./Views/header.php";
include_once "./Views/slidebar.php";
?>
    <div class="page-wrapper">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="d-md-flex mb-3">
                    <h3 class="box-title mb-0">List subject</h3>
                    <form role="search" class="col-md-3 col-sm-4 col-xs-6 ms-auto app-search d-none d-md-block me-3">
                        <input type="text" placeholder="Search..." class="form-control mt-0">
                        <a href="" class="active" style="position:absolute; right:50px; top:35px">
                            <i class="fa fa-search"></i>
                        </a>
                    </form>
                </div>
                <div class="container-m5">
                <a href="./add_subject"><button class="btn btn-success">Add subject</button></a>
                </div>
                <div class="table-responsive">
                    <table class="table no-wrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">ID</th>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($list_Subject as $subject){?>
                            <tr>
                                <td class="txt-oflo"><?=$subject->id?></td>
                                <td class="txt-oflo"><?=$subject->name?></td>
                                <td><span class="text-success">
                                <a href="./detail_subject?id=<?=$subject->id?>"><button class="btn btn-secondary">Detail</button></a>
                                <a href="./edit_subject?id=<?=$subject->id?>"><button class="btn btn-info">Edit</button></a>
                                <a href="./delete_subject?id=<?=$subject->id?>"><button class="btn btn-danger">Del</button></a>
                                </span></td>
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