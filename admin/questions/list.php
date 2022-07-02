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
                                                <th style="width:1%;"><input class="" type="checkbox" name="q_ids_parent" id="q_ids_parent"> # </th>
                                                <th style="width:90%;">Question</th>
                                                <th style="width:3%;">Type</th>
                                                <th style="width:2%;">Status</th>
                                                <th colspan="2" class="text-center" style="width:3%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="html-div-queation">
                                            <tr class="loader-div">
                                                <td colspan="5" class="text-center">
                                                    <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button class="dropdown-toggle btn btn-primary" id="action-with-selected" href="#" data-bs-toggle="dropdown" aria-expanded="true">
                                        Action with selected items
                                    </button>
                                    <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm " aria-labelledby="action-with-selected" data-x-placement="bottom-end" data-bs-popper="none">

                                        <div class="p-2">
                                            <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                                                <span>Delete</span>
                                                <span class="p-0">
                                                    <i class="mdi mdi-delete text-danger"></i>
                                                </span>
                                            </a>
                                            <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                                                <span>Set active</span>
                                                <span class="p-0">
                                                    <i class="mdi mdi-account-outline ms-1"></i>
                                                </span>
                                            </a>
                                            <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                                <span>Set deactive </span>
                                                <i class="mdi mdi-settings"></i>
                                            </a>
                                        </div>
                                    </div>
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