function mobileCheck() {
  var winWidth = $(window).width();
  if (winWidth <= 768) {
    $("#sidebar").after($("#body .pagination:first"));
  } else {
    $(".products-wrap").before($("#body .pagination:first"));
  }
}

function loginCheck() {
// Get the modal
var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
  }
}

function loginCheck() {
  // Get the modal
  var modal = document.getElementById("id02");
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };
}
