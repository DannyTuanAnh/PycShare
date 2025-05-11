$(document).ready(function () {
  $(document).ready(function () {
    $("#my-article").click(function () {
      $("#content").load("../../user/Profile/your_article.php");
    });
    $("#article-saved").click(function () {
      $("#content").load("../../user/Profile/your_save.php");
    });
    $("#your-blog").click(function () {
      $("#content").load("../../user/Profile/your_blog.php");
    });
  });

  // Toggle hiển thị menu cài đặt
  $("#settingsBtn").click(function () {
    $("#settingsMenu").toggle();
  });

  // Load nội dung cho các chức năng sử dụng file riêng
  $("#settingsMenu li[data-section]").click(function () {
    const section = $(this).data("section");
    $("#personalPage").hide();
    $("#settingContent").load(`./Cai-dat/${section}.php`).show();
    $("#settingsMenu").hide();
  });

  // Nút quay lại từ nội dung cài đặt về giao diện cá nhân
  $("#settingContent").on("click", ".backBtn", function () {
    $("#settingContent").hide();
    $("#personalPage").show();
  });

  // Xử lý chuyển đổi ngôn ngữ ngay trên giao diện
  $("#languageSelect").change(function () {
    const lang = $(this).val();
    alert(
      "Bạn đã chọn ngôn ngữ: " + (lang === "vi" ? "Tiếng Việt" : "English")
    );
    // Có thể lưu vào localStorage nếu cần
    // localStorage.setItem('language', lang);
  });
  // Đóng menu nếu click ngoài vùng menu
  $(document).click(function (e) {
    if (!$(e.target).closest("#settingsMenu, #settingsBtn").length) {
      $("#settingsMenu").hide();
    }
  });
});
