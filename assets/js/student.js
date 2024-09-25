// todo ================== GET STUDENT AND DISPLAY TO TABLE  ==================  ///

function LoadingSpinner() {
  $("#table-body").html(
    '<tr> <td colspan="6"><div class="d-flex gap-2 justify-content-center align-items-center">' +
      '<div class="spinner-border" role="status"></div>' +
      "<span>Loading data...</span></div>" +
      "</td>" +
      "</tr>"
  );

  setTimeout(function () {
    // set delay
    getUser();
  }, 500);
}

function getUser() {
  $.ajax({
    type: "GET",
    url: "getUser.php",
    success: function (response) {
      // Append the response to the table-body
      $("#table-body").html(response);
    },
  });
}

LoadingSpinner();

// todo ================== ADD STUDENT ==================  ///

$(document).on("submit", "#saveStudent", function (e) {
  e.preventDefault();

  var formData = new FormData(this);
  formData.append("save_student", true);

  // START get the time and set to fiendly date
  const date = new Date();
  const dateOptions = { year: "numeric", month: "long", day: "numeric" };
  const timeOptions = { hour: "2-digit", minute: "2-digit", hour12: true };

  const friendlyDate = date.toLocaleDateString(undefined, dateOptions);
  const friendlyTime = date.toLocaleTimeString(undefined, timeOptions);

  const friendlyDateTime = `${friendlyDate} ${friendlyTime}`;

  // Display the friendly date and time in a paragraph
  $("#tutorial").text(friendlyDateTime);

  // Create a JavaScript object with the friendly date and time
  const datetimeObject = friendlyDateTime;
  // END get the time and set to fiendly date

  $.ajax({
    type: "POST",
    url: "code.php",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      var res = jQuery.parseJSON(response);
      if (res.status == 200) {
        $("#errorMessage").addClass("d-none");
        $("#studentAddModal").modal("hide");
        $("#saveStudent")[0].reset();

        Swal.fire({
          title: "Success",
          text: datetimeObject,
          // showCancelButton: true,
          // html: res.message + "<br>" + (res.name ? res.name : ""),
          icon: "success",
          confirmButtonText: "ok",
        }).then((result) => {
          if (result.isConfirmed) {
            // After clicking "ok," show the loading spinner
            LoadingSpinner();
          }
        });
      } else if (res.status == 500) {
        alert(res.message);
      }
    },
  });
});

// todo ================== EDIT STUDENT ==================  ///
$(document).on("click", ".editStudentBtn", function () {
  var student_id = $(this).val();

  $.ajax({
    type: "GET",
    url: "code.php?student_id=" + student_id,
    success: function (response) {
      var res = jQuery.parseJSON(response);
      if (res.status == 404) {
        alert(res.message);
      } else if (res.status == 200) {
        $("#student_id").val(res.data.id);
        $("#name").val(res.data.name);
        $("#email").val(res.data.email);
        $("#phone").val(res.data.phone);
        $("#course").val(res.data.course);

        $("#studentEditModal").modal("show");
      }
    },
  });
});

// todo ================== UPDATE STUDENT ==================  ///
$(document).on("submit", "#updateStudent", function (e) {
  e.preventDefault();

  var formData = new FormData(this);
  formData.append("update_student", true);

  $.ajax({
    type: "POST",
    url: "code.php",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      var res = jQuery.parseJSON(response);
      if (res.status == 200) {
        $("#errorMessageUpdate").addClass("d-none");

        // alertify.set("notifier", "position", "top-right");
        // alertify.success(res.message);
        Swal.fire({
          title: "Success",
          text: res.message,
          icon: "success",
          confirmButtonText: "ok",
        }).then((result) => {
          if (result.isConfirmed) {
            // After clicking "ok," show the loading spinner
            LoadingSpinner();
          }
        });

        $("#studentEditModal").modal("hide");
        $("#updateStudent")[0].reset();
        // $("#myTable").load(location.href + " #myTable");
      } else if (res.status == 500) {
        // alert(res.message);
        Swal.fire({
          title: "Error!",
          text: res.message,
          icon: "error",
          confirmButtonText: "ok",
        });
      }
    },
  });
});

// todo ================== VIEW STUDENT ==================  ///
$(document).on("click", ".viewStudentBtn", function () {
  var student_id = $(this).val();
  $.ajax({
    type: "GET",
    url: "code.php?student_id=" + student_id,
    success: function (response) {
      var res = jQuery.parseJSON(response);
      if (res.status == 404) {
        alert(res.message);
      } else if (res.status == 200) {
        $("#view_name").text(res.data.name);
        $("#view_email").text(res.data.email);
        $("#view_phone").text(res.data.phone);
        $("#view_course").text(res.data.course);

        $("#studentViewModal").modal("show");
      }
    },
  });
});

// todo ================== DELETE STUDENT ==================  ///
$(document).on("click", ".deleteStudentBtn", function (e) {
  e.preventDefault();
  var student_id = $(this).val();

  showDeleteConfirmation(student_id);
});

function showDeleteConfirmation(student_id) {
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      deleteStudent(student_id);
    }
  });
}

function deleteStudent(student_id) {
  $.ajax({
    type: "POST",
    url: "code.php",
    data: {
      delete_student: true,
      student_id: student_id,
    },
    success: function (response) {
      var res = jQuery.parseJSON(response);
      if (res.status == 500) {
        Swal.fire({
          title: "Error",
          text: res.message,
          icon: "error",
          confirmButtonText: "OK",
        });
      } else {
        Swal.fire({
          title: "Success",
          text: res.message,
          icon: "success",
          confirmButtonText: "OK",
        }).then((result) => {
          if (result.isConfirmed) {
            // After clicking "OK," you can perform further actions or show a loading spinner
            LoadingSpinner();
          }
        });
      }
    },
  });
}
