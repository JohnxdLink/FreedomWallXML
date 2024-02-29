function open_login_content() {
  document.getElementById("main-content-login").style.display = "flex";
  document.getElementById("main-content-register").style.display = "none";
  document.getElementById("main-content-landing-content").style.display =
    "none";
}

function open_register_content() {
  document.getElementById("main-content-register").style.display = "flex";
  document.getElementById("main-content-login").style.display = "none";
  document.getElementById("main-content-landing-content").style.display =
    "none";
}

function confirmDelete(userId) {
  var confirmation = confirm("Are you sure to delete?");
  if (confirmation) {
    window.location.href =
      "../../controllers/delete.php?action=delete&delete_id=" + userId;
  }
}
