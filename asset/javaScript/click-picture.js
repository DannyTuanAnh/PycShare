const baseURL = window.location.origin + "/PycShare/";
$(document).ready(function () {
  $(".gallery-img").click(function () {
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
        $(".popup-author").text("Tên tác giả: " + data.user);
        $(".popup-date").text("Ngày đăng tải: " + data.NgayCapNhat);
        $(".popup-desc").text("Mô tả của tác giả: " + data.MoTa);

        $(".fa-heart").siblings(".count").text(data.LuotTym);
      },
      error: function () {
        alert("Lỗi khi tải thông tin trang");
      },
    });
    $(".popup-img").attr("src", imgSrc);
  });
  $(".close-popup, .image-popup-overlay").click(function () {
    $(".image-popup, .image-popup-overlay").fadeOut();
  });
});

$(document).ready(function () {
  $(".fa-heart").click(function () {
    const icon = $(this);
    const imgID = $(".popup-img").data("id");

    if (icon.hasClass("liked")) {
      return;
    }

    const countSpan = icon.siblings(".count");
    let currentCount = parseInt(countSpan.text()) || 0;
    currentCount += 1;
    countSpan.text(currentCount);

    icon.removeClass("fa-regular").addClass("fa-solid liked");

    $.ajax({
      url: baseURL + "user/update_tym.php",
      type: "POST",
      data: { id: imgID },
      success: function (res) {
        console.log("Đã gửi lượt tym cho ảnh ID: " + imgID);
      },
      error: function () {
        alert("Lỗi khi gửi lượt tym.");
      },
    });
  });
});
