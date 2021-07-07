<?php
include_once "./Views/header.php";
include_once "./Views/slidebar.php";
?>
    <div class="page-wrapper">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="d-md-flex mb-3">
                    <h3 class="box-title mb-0">Class info</h3>
                    <!-- search button -->
                    <form role="search" class="col-md-3 col-sm-4 col-xs-6 ms-auto app-search d-none d-md-block me-3">
                        <input type="text" placeholder="Search..." class="form-control mt-0" name="keyword" >
                        <button type="submit" style="position:absolute; right:50px; top:35px; border:none; background-color:white"><i class="fa fa-search"></i></button>
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
                            <tr id="student-info">
                                <td class="txt-oflo"><?=$class->id?></td>
                                <td class="txt-oflo"><?=$class->name?></td>
                                <td class="txt-oflo"><?=$class->subject?></td>
                                <td><span class="text-success">
                                <a href="./edit_student?id=<?=$class->id?>"><button class="btn btn-info">Edit</button></a>
                                </span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h3 class="box-title mb-0">List student</h3>
                <div class="table-responsive">
                    <table class="table no-wrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">ID</th>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Age</th>
                                <th class="border-top-0">Major</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($list_registered as $student){?>
                            <tr id="major-info">
                            <td class="txt-oflo"><?=$student->id?></td>
                            <td class="txt-oflo"><?=$student->name?></td>
                            <td class="txt-oflo"><?=$student->age?></td>
                            <td class="txt-oflo"><?=$student->major?></td>
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