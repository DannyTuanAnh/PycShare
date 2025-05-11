//code này dùng để thêm active đánh dấu 1 nút mới được bấm
document.addEventListener("DOMContentLoaded", function () {
  const currentPage = window.location.pathname.split("/").pop();
  const buttons = document.querySelectorAll(".navbar-button");

  buttons.forEach((btn) => {
    const href = btn.getAttribute("href");

    if (href && href.includes(currentPage)) {
      btn.classList.add("active");
      btn.setAttribute("href", "javascript:location.reload()");
    }

    btn.addEventListener("click", function () {
      buttons.forEach((b) => b.classList.remove("active"));
      this.classList.add("active");
    });
  });
});

$(document).ready(function () {
  //code thông báo
  $("#notificationButton").click(function (event) {
    event.stopPropagation(); // Không lan ra ngoài
    $(".notification-panel").slideToggle(300);
  });

  // Click bên ngoài sẽ đóng bảng thông báo
  $(document).click(function (event) {
    if (
      !$(event.target).closest(".notification-panel, #notificationButton")
        .length
    ) {
      $(".notification-panel").slideUp(300);
    }
  });

  // code menu
  $("#menuButton").click(function (event) {
    event.stopPropagation();
    $("#menuPanel").slideToggle(300); // Trượt ra / trượt vào trong 0.3 giây
  });

  // Click ra ngoài thì tự đóng lại
  $(document).click(function (event) {
    if (!$(event.target).closest("#menuPanel, #menuButton").length) {
      $("#menuPanel").slideUp(300);
    }
  });
});
// Sáng tối
// Kiểm tra localStorage
if (localStorage.getItem("darkMode") === "enabled") {
  $("body").addClass("dark-mode");
  $("#darkModeToggle").prop("checked", true);
}

// Xử lý khi gạt nút
$("#darkModeToggle").change(function () {
  if ($(this).is(":checked")) {
    $("body").addClass("dark-mode");
    localStorage.setItem("darkMode", "enabled");
  } else {
    $("body").removeClass("dark-mode");
    localStorage.setItem("darkMode", "disabled");
  }
});
