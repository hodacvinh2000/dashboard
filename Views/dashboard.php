<?php
include_once "./Views/header.php";
include_once "./Views/slidebar.php";
?>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-12" style="width: 270px;">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Students</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-success"><?=$count_student?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12" style="width: 270px;">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Classes</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash4"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-danger"><?=$count_class?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12" style="width: 270px;">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Majors</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash2"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-purple"><?=$count_major?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12" style="width: 270px;">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Subjects</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-info"><?=$count_subject?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- RECENT SALES -->
                <!-- ============================================================== -->
                
<?php
include_once "./Views/footer.php";
?>