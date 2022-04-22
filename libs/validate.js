$(document).ready(function () {
  $.validator.addMethod(
    "regex",
    function (value, element, regexp) {
      return this.optional(element) || regexp.test(value);
    },
    "Please check your input."
  );

  $("#login_form").validate({
    rules: {
      username: {
        required: true,
        minlength: 5,
        maxlength: 16,
      },
    },
    messages: {
      username: {
        required: "Please enter username",
        minlength: "Username must have more than 5 character",
        maxlength: "Username must have less than 16 character",
      },
    },
  });
  $("#create_user").validate({
    rules: {
      username: {
        required: true,
        minlength: 5,
        maxlength: 16,
      },
      password: {
        required: true,
        minlength: 6,
        maxlength: 16,
      },
      fullname: {
        required: true,
        maxlength: 50,
      },
      phonenumber: {
        required: true,
        minlength: 10,
        maxlength: 10,
      },
      email: {
        required: true,
        mailCheck: /\S+@\S+\.\S+/,
      },
      address: {
        required: true,
      },
    },
    messages: {
      username: {
        required: "Please enter username",
        minlength: "Username must have more than 5 character",
        maxlength: "Username must have less than 16 character",
      },
      password: {
        required: "Please enter password",
        minlength: "Password must have more than 5 character",
        maxlength: "Password must have less than 16 character",
      },
      fullname: {
        required: "Please enter your name",
        maxlength: "Your name so long",
      },
      phonenumber: {
        required: "Please enter phone number",
        minlength: "Phone number must have 10 number (0123456789)",
        maxlength: "Phone number must have 10 number (0123456789)",
        type: "Incorrect phonenumber",
      },
      email: {
        required: "Please enter email",
      },
      address: {
        required: "Please input an address",
      },
    },
  });
});
