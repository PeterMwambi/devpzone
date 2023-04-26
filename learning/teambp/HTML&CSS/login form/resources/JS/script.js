var form = document.getElementById("login-form");

form.addEventListener("submit", function (e) {
  e.preventDefault();

  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  var usernameError = document.getElementById("username-error");
  var passwordError = document.getElementById("password-error");

  if (username == "") {
    usernameError.innerHTML = "Username is required";
  } else {
    if (username.length < 3) {
      usernameError.innerHTML = "Username cannot be less than 3 characters";
    }
    if (username.length > 15) {
      usernameError.innerHTML = "Username cannot be greater than 15 characters";
    }
    if (!/[a-z0-9]/.test(username)) {
      usernameError.innerHTML = "Username is invalid";
    }
  }
  if (password == "") {
    passwordError.innerHTML = "Password is required";
  } else {
    if (password.length < 6) {
      passwordError.innerHTML =
        "Password should not be shorter than 6 characters";
    }
    if (password.length > 15) {
      passwordError.innerHTML = "Password should not be longer 15 characters";
    }
    if (!/[A-Z]/.test(password)) {
      passwordError.innerHTML = "Please use atleast one uppercase character";
    }
  }
});
