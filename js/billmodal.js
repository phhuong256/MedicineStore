$(document).ready(function () {
  // Get the modal
  var billModal = document.getElementById("billModal");
  // Get the button that opens the modal
  var billBtn = document.getElementById("billModalToggle");

  // Get the <span> element that closes the modal
  var modalClose = document.getElementsByClassName("billModalClose")[0];

  // When the user clicks on the button, open the modal

  billBtn.onclick = function () {
    billModal.style.display = "block";
  };

  // When the user clicks on <span> (x), close the modal

  modalClose.onclick = function () {
    billModal.style.display = "none";
  };

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function (event) {
    // console.log(event.target);
    // if (event.target == billModal) {
    //   billModal.style.display = "none";
    // }
  };
});
