<!-- INCLUDE HEADER -->
<?php include('./include/header.php') ?>


<!-- Add Student Modal -->
<?php include('./modal/student/modal_add.php') ?>

<!-- Edit Student Modal -->
<?php include('./modal/student/modal_edit.php') ?>

<!-- Include Student Modal View -->
<?php include('./modal/student/modal_view.php') ?>


<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col-8">
                            <h4>PHP Ajax CRUD without page reload using Bootstrap Modal</h4>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                data-bs-target="#studentAddModal">
                                Add Student
                            </button>
                        </div>

                    </div>



                </div>
                <div class="card-body">



                    <div class="table-responsive">
                        <table id="myTable" class="table table-sm table-hover table-bordered">
                            <thead class="table-success">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->

<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"
    integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="./assets/js/sample.js">

</script>

<script src="validate.js"></script>
<!-- link the student js crud using ajax -->
<script src="./assets/js/student.js"></script>


<!-- INCLUDE FOOTER -->
<?php include('./include/footer.php') ?>