<?php
$config = include('../../config.php');
include('../snippet/header.php');
include('../snippet/side-header.php')

?>

<div class="content-wrapper">
    <div class="d-xl-flex justify-content-between align-items-start">
        <h2 class="text-dark font-weight-bold mb-2"> List Questions </h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="transaparent-tab-border"></div>
            <div class="tab-content tab-transparent-content">
                <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">

                                    <table class="table table-hover table-bordered">
                                        <thead class="sidebar text-light">
                                            <tr>
                                                <th style="width:2%;"><input class="" type="checkbox" name="q_ids" id="q_ids" value="1"> #Sr. no </th>

                                                <th style="width:90%;">Question</th>
                                                <th style="width:3%;">Status</th>
                                                <th colspan="2" class="text-center" style="width:5%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="4">
                                                    <div class="spinner-grow text-center" style="width: 3rem; height: 3rem;" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="q_ids" id="q_ids" value="1"> #1</td>
                                                <td class=""> test</td>
                                                <td>
                                                    <div class="form-switch">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                                    </div>
                                                </td>
                                                <td class="text-center"><i class="mdi mdi-lead-pencil"></i></td>
                                                <td class="text-center text-danger"><i class="mdi mdi-delete"></i></td>
                                            </tr>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../snippet/footer.php') ?>