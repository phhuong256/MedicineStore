// window.onload = init;
// function init() {
//   let user;
//   let logInBtn = $(".log-in-btn");
//   let btnHandler = function () {
//     // console.log("haha");
//     // e.preventDefault;
//     let email = $(".email");
//     let pass = $(".password");
//     // console.log(email.val());

//     if (email.val().length > 0 && pass.val().length > 0) {
//       $.ajax({
//         url: "http://localhost:6969/cosmetic/login.php",
//         method: "POST",
//         data: { email: email.val(), password: pass.val() },
//         cache: true,
//         success: function (data) {
//           if (data) {
//             user = data;
//             console.log(user);
//             setTimeout(() => {
//               window.location.reload();
//             }, 1000);
//             // let closeModalBtn = document.querySelector(".close");
//             // closeModalBtn.click();
//           }
//         },
//       });
//     }
//   };
//   logInBtn.on("click", btnHandler);
// }