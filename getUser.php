<?php
require 'dbcon.php';

$query = "SELECT * FROM students ORDER BY id DESC";
$query_run = mysqli_query($con, $query);

if (mysqli_num_rows($query_run) > 0) {
    foreach ($query_run as $student) {
        ?>
        <tr>
            <td>
                <?= $student['id'] ?>
            </td>
            <td>
                <?= $student['name'] ?>
            </td>
            <td>
                <?= $student['email'] ?>
            </td>
            <td>
                <?= $student['phone'] ?>
            </td>
            <td>
                <?= $student['course'] ?>
            </td>
            <td>
                <div class="dropdown">
                    <button class=" btn btn-sm btn-outline-success" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <!-- <i class="fa-solid fa-ellipsis-vertical"></i> -->
                        <!-- <i class="fa-solid fa-bars"></i> -->
                        <i class="fa-solid fa-square-caret-down"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <button type="button" value="<?= $student['id']; ?>" class="viewStudentBtn dropdown-item ">
                                View
                            </button>
                        </li>
                        <li>
                            <button type="button" value="<?= $student['id']; ?>" class="editStudentBtn  dropdown-item">
                                Edit
                            </button>
                        </li>
                        <li>
                            <button type="button" value="<?= $student['id']; ?>" class="deleteStudentBtn  dropdown-item">
                                Delete
                            </button>
                        </li>
                    </ul>
                </div>

            </td>
        </tr>
        <?php
    }
} else {
    ?>
    <tr>
        <td colspan="6" class="text-center">
            <p class="fs-4">No records found!</p>
        </td>
    </tr>

    <?php
}
?>