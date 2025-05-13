const baseURL = window.location.origin + "/PycShare/";
$(document).ready(function () {
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
    location.reload();
  });
});

$(document).ready(function () {
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
});
