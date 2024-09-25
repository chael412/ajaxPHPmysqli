$(document).ready(function () {
  $("#saveStudent").validate({
    rules: {
      name: "required",
      email: {
        required: true,
        email: true,
        remote: {
          url: "check-email.php",
          type: "post",
          data: {
            email: function () {
              return $("#email").val();
            },
          },
        },
      },
      phone: {
        required: true,
        digits: true,
        minlength: 11,
      },
      course: "required",
    },
    messages: {
      name: "Please enter your full name.",
      email: {
        remote: "Email is already taken.",
      },
      phone: {
        minlength: "Please enter a valid 11-digit phone number.",
      },
    },
    errorClass: "error-text",
  });

  $("#updateStudent").validate({
    rules: {
      name: "required",
      email: {
        required: true,
        email: true,
      },
      phone: {
        required: true,
        digits: true,
        minlength: 11,
      },
      course: "required",
    },
    messages: {
      name: "Please enter your full name.",
      phone: {
        minlength: "Please enter a valid 11-digit phone number.",
      },
    },

    errorClass: "error-text",
  });
});
