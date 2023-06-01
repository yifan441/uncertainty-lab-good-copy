const commit_btn = document.getElementById("commit-btn");
const dashboard_btn = document.getElementById("dashboard-btn");

commit_btn.addEventListener("click", randomized_redirect);
dashboard_btn.addEventListener("click", handle_dashboard);

function randomized_redirect() {
  let x = Math.floor(Math.random() * 2);
  if (x) {
    window.location.href = "signuppagev1.php";
  } else {
    window.location.href = "signuppagev2.php";
  }
}

function handle_dashboard() {
  window.location.href = "dashboard.php";
}
