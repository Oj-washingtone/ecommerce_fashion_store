import { Ajax } from "../model/ajax.js";

let error = document.getElementById("auth-error");

// validate inputs
const loginBTN = document.getElementById("loginBTN");
loginBTN.onclick = (e) => {
  e.preventDefault();

  const loginForm = document.getElementById("loginForm");
  const username = loginForm.elements["username"];
  const password = loginForm.elements["password"];

  // check for empty values
  if (username.value === "" || password.value === "") {
    error.innerHTML = "Some parameters are missing";
    error.style.display = "block";
    setTimeout(() => {
      error.style.display = "none";
    }, 3000);
  } else {
    // ajax request
    const inputs = JSON.stringify({
      username: username.value,
      password: password.value,
    });

    Ajax.post("../model/queries/login.php", inputs, (err, data) => {
      if (err) {
        alert(err);
      } else {
        const out = Number(data);
        if (out === 0) {
          error.innerHTML = "Invalid credentials, please check and try again.";
          error.style.display = "block";
          setTimeout(() => {
            error.style.display = "none";
          }, 3000);
        } else {
          location.href = "../index.php";
        }
      }
    });
  }
};

const signupBTN = document.getElementById("signupBTN");
signupBTN.onclick = (e) => {
  e.preventDefault();

  let input_errors = 0;

  const signupForm = document.getElementById("signup-frm");
  let firstname = signupForm.elements["fname"];
  let lastname = signupForm.elements["lname"];
  let email = signupForm.elements["email"];
  let password = signupForm.elements["pwd"];
  let confirm_password = signupForm.elements["c-pwd"];

  // check for empty fields
  for (let input_field of signupForm) {
    if (input_field.value === "" && input_field.id !== "signup-google") {
      input_errors++;
      input_field.style.border = "1px solid red";
      error.innerHTML = "Missing parameters, please check and try again";
      error.style.display = "block";

      setTimeout(() => {
        error.style.display = "none";
      }, 3000);
    }
  }

  // valisate password

  //   if (confirm_password !== password) {
  //     confirm_password.style.border = "1px solid red";
  //     // error.innerHTML = "Passwords did not match!";
  //     error.style.display = "block";

  //     setTimeout(() => {
  //       error.style.display = "none";
  //     }, 3000);
  //   }

  // validate email
  //   const regEx = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/gi;

  if (input_errors === 0) {
    if (signupForm.elements["accept-terms"].checked === false) {
      error.innerHTML = "You have to accept terms and conditions to proceed";
      error.style.display = "block";
      setTimeout(() => {
        error.style.display = "none";
      }, 3000);
    } else {
      const registration_details = JSON.stringify({
        firstname: firstname.value,
        lastname: lastname.value,
        email: email.value,
        password: password.value,
      });

      Ajax.post(
        "../model/queries/signup.php",
        registration_details,
        (err, data) => {
          if (err) {
            console.log(err);
          } else {
            let results = Number(data);
            if (results === 1) {
              document.getElementById("auth-success").innerHTML =
                "Registration successful";
              document.getElementById("auth-success").style.display = "block";
              document.getElementById("login").click();
            } else {
              error.innerHTML =
                "An error occured while registering your details, please try again. Sorry for the inconveniences caused.";
              error.style.display = "block";
              setTimeout(() => {
                error.style.display = "none";
              }, 3000);
            }
          }
        }
      );
    }
  }
};
