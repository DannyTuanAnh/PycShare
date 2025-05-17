$(document).ready(function () {
  // 1. Tải danh sách chủ đề từ PHP
  const baseURL = window.location.origin + "/PycShare/";
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
      $(".popup-heart")
        .removeClass("fa-solid liked") // xóa class đã tym
        .addClass("fa-regular");
      const imgSrc = $(this).attr("src");
      const imgID = $(this).data("id");

      $(".image-popup, .image-popup-overlay").fadeIn();
      $(".popup-img").attr("src", imgSrc);
      $(".popup-img").attr("data-id", imgID);
      $(".fa-heart").attr("data-id", imgID);

      $.ajax({
        url: baseURL + "user/get_image_info.php",
        type: "GET",
        data: { id: imgID },
        dataType: "json",
        success: function (data) {
          $(".popup-title").text("Tiêu đề ảnh: " + data.TenPic);
          $(".popup-author").html(
            "Tên tác giả: <a href = '#'>" + data.user + "</a>"
          );
          $(".popup-date").text("Ngày đăng tải: " + data.NgayCapNhat);
          $(".popup-desc").text("Mô tả của tác giả: " + data.MoTa);

          $(".fa-heart").siblings(".count").text(data.LuotTym);
        },
        error: function () {
          alert("Lỗi khi tải thông tin trang");
        },
      });
      // 🆕 Kiểm tra người dùng đã tym ảnh này chưa
      $.ajax({
        url: baseURL + "user/check_tym.php", // Tạo file mới check tym
        type: "POST",
        data: { id: imgID },
        success: function (res) {
          const result = JSON.parse(res);
          if (result.status === "liked") {
            $(".popup-heart")
              .removeClass("fa-regular")
              .addClass("fa-solid liked");
          }
        },
        error: function () {
          console.log("Không kiểm tra được trạng thái tym");
        },
      });

      $(".popup-img").attr("src", imgSrc);
    });
    $(".close-popup, .image-popup-overlay").click(function () {
      $(".image-popup, .image-popup-overlay").fadeOut();
    });
    // });

    // $(document).ready(function () {
    $(".popup-heart").click(function () {
      const icon = $(this);
      const imgID = $(".popup-img").data("id");

      if (icon.hasClass("liked")) return;

      $.ajax({
        url: baseURL + "user/update_tym.php",
        type: "POST",
        data: { id: imgID },
        success: function (res) {
          const result = JSON.parse(res);
          if (result.status === "success") {
            const countSpan = icon.siblings(".count");
            let currentCount = parseInt(countSpan.text()) || 0;
            countSpan.text(++currentCount);
            icon.removeClass("fa-regular").addClass("fa-solid liked");
          } else if (result.status === "already_liked") {
            alert("Bạn đã tym ảnh này rồi!");
          } else if (result.status === "not_logged_in") {
            alert("Bạn cần đăng nhập để tym ảnh.");
          } else {
            alert("Lỗi khi tym ảnh.");
          }
        },
        error: function () {
          alert("Lỗi gửi yêu cầu tym.");
        },
      });
    });
  }
});
