$(document).ready(function () {
  const baseURL = window.location.origin + "/PycShare/";
  // 1. Tải danh sách chủ đề từ PHP
  $.ajax({
    url: baseURL + "user/get_categories.php", // Điều chỉnh đường dẫn nếu cần
    method: "GET",
    dataType: "json",
    success: function (categories) {
      if (categories.length === 0) {
        $("#menuPanel").html("<p>Không có chủ đề nào.</p>");
        return;
      }

      // Tạo nút cho từng chủ đề
      categories.forEach(function (cat) {
        $("#menuPanel").append(
          `<button class="menu-item" data-tenpic="${cat}">${cat}</button>`
        );
      });
    },
    error: function (xhr, status, error) {
      console.error("Lỗi tải chủ đề:", error);
      $("#menuPanel").html("<p>Lỗi tải chủ đề.</p>").show();
    },
  });

  $(document).on("click", ".menu-item", function () {
    const tenpic = $(this).data("tenpic");

    // Gọi Ajax để lấy HTML mới
    $.ajax({
      url: baseURL + "user/get_images_by_tenpic.php",
      method: "GET",
      data: { TenPic: tenpic },
      success: function (html) {
        // Thay thế toàn bộ nội dung main-content
        $(".main-content").html(html);

        // Khởi tạo lại sự kiện click cho ảnh (nếu cần)
        initImageClickEvents();
      },
      error: function () {
        $(".main-content").html('<p class="error">Lỗi tải ảnh.</p>');
      },
    });
  });

  // Hàm khởi tạo sự kiện click ảnh (nếu có)
  function initImageClickEvents() {
    $(".gallery-img").click(function () {
      const imgSrc = $(this).attr("src");
      // Mở popup xem ảnh (giữ nguyên logic cũ)
      openImagePopup(imgSrc);
    });
  }
});
