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

function hide_left_right_pane() {
  document.getElementById("create-entry-id").style.display = "none";
  document.getElementById("update-delete-entry").style.display = "none";
  document.getElementById("read-entry-id").style.width = "100vw";
  document.getElementById("read-entry-id").style.padding = "20px";
}

function hide_right_pane() {
  document.getElementById("create-entry-id").style.display = "flex";
  document.getElementById("update-delete-entry").style.display = "none";
  document.getElementById("read-entry-id").style.width = "75vw";
  document.getElementById("read-entry-id").style.padding = "0px 20px 0px 0px";
}

function hide_left_pane() {
  document.getElementById("update-delete-entry").style.display = "flex";
  document.getElementById("create-entry-id").style.display = "none";
  document.getElementById("read-entry-id").style.width = "75vw";
  document.getElementById("read-entry-id").style.padding = "0px 0px 0px 20px";
}

function reset_all_pane() {
  location.reload();
}

function confirmDelete(userId) {
  var confirmation = confirm("Are you sure to delete?");
  if (confirmation) {
    window.location.href =
      "../../controllers/delete.php?action=delete&delete_id=" + userId;
  }
}
