$(document).ready(function () {
  const baseURL = window.location.origin + "/PycShare/";
  $(".gallery-img").click(function () {
    const imgSrc = $(this).attr("src");
    const imgID = $(this).data("id");

    $(".image-popup, .image-popup-overlay").fadeIn();
    $.ajax({
      url: baseURL + "/user/get_image_info.php",
      type: "GET",
      data: { id: imgID },
      dataType: "json",
      success: function (data) {
        $(".popup-title").text("Tiêu đề ảnh: " + data.TenPic);
        $(".popup-author").text("Tên tác giả: " + data.user);
        $(".popup-date").text("Ngày đăng tải: " + data.NgayCapNhat);
        $(".popup-desc").text("Mô tả của tác giả: " + data.MoTa);
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
