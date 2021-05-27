window.onload = init;
function init() {
  onePageScroll();
  SignInSignUpSwitch();
  logInHandler();
  signUpHandler();
  //  let signUpLink = document.getElementsByClassName("link-sign-up")[0];
  // let signInLink = document.getElementsByClassName("link-log-in")[0];
  // console.dir(signInLink);
  // console.dir(signUpLink);
}
function onePageScroll() {
  let content = document.getElementById("content-wrapper");
  window.onmousewheel = (e) => {
    // console.log(e, window.pageYOffset);
    if (e.pageY <= 1120 && e.deltaY > 99) {
      window.scrollTo({ top: content.offsetTop - 100 });
    }
    if (e.pageY <= content.offsetTop + 200 && e.deltaY < -99) {
      console.log(e.pageY);
      window.scrollTo({ top: 0 });
    }
  };
}
function SignInSignUpSwitch() {
  let signUpLink = document.getElementsByClassName("link-sign-up")[0];
  let signInLink = document.getElementsByClassName("link-log-in")[0];
  let formLogIn = document.getElementsByClassName("log-in-wrapper")[0];
  let formSignUp = document.getElementsByClassName("sign-up-wrapper")[0];
  let modalTitle = document.getElementsByClassName("modal-title")[0];
  signUpLink.onclick = function () {
    modalTitle.textContent = "Sign Up";
    formLogIn.style.display = "none";
    formSignUp.style.display = "block";
    formSignUp.style.animation = "fade-in 1s";
  };
  signInLink.onclick = function () {
    modalTitle.textContent = "Log In";
    formLogIn.style.display = "block";
    formSignUp.style.display = "none";
    formLogIn.style.animation = "fade-in 1s";
  };
}
function logInHandler() {
  let user;
  let logInBtn = $(".log-in-btn");
  let btnHandler = function () {
    // console.log("hhuhu");
    // e.preventDefault;
    let email = $(".log-in-mail");
    let pass = $(".log-in-pass");
    // console.log(email.val());

    if (email.val().length > 0 && pass.val().length > 0) {
      $.ajax({
        url: "http://localhost/login.php",
        method: "POST",
        data: { email: email.val(), password: pass.val() },
        cache: true,
        success: function (data) {
          if (data) {
            user = data;
            console.log(user);
            setTimeout(() => {
              window.location.reload();
            }, 1000);
            // let closeModalBtn = document.querySelector(".close");
            // closeModalBtn.click();
          } else {
            let error = $(".error")[0];
            error.style.display = "block";
            setTimeout(() => {
              error.style.display = "none";
            }, 2900);
          }
        },
      });
    }
  };
  logInBtn.on("click", btnHandler);
}
function signUpHandler() {
  let signUpBtn = $(".sign-up-btn");
  console.dir(signUpBtn);
  let btnHandler = function () {
    let email = $(".sign-up-mail");
    let pass = $(".sign-up-pass");
    // console.log(email.val(), pass.val());
    if (email.val().length > 0 && pass.val().length > 0) {
      $.ajax({
        url: "http://localhost/signup.php",
        method: "POST",
        data: { email: email.val(), password: pass.val() },
        cache: false,
        success: function (data) {
          if (data) {
            let successful = $(".success")[0];
            successful.style.display = "block";

            setTimeout(() => {
              successful.style.display = "none";
            }, 2900);
          }
        },
      });
    }
  };
  signUpBtn.on("click", btnHandler);
}
