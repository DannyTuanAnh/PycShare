$(document).ready(function () {
  const baseURL = window.location.origin + "/PycShare/";
  $(".gallery-img").click(function () {
    const imgSrc = $(this).attr("src");
    const imgID = $(this).data("id");

    $(".image-popup, .image-popup-overlay").fadeIn();
    $(".popup-img").attr("src", imgSrc).attr("data-id", pictureId);
    $(".action.download").attr("data-id", pictureId);

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
// $(document).ready(function () {
//   // Sử dụng event delegation cho ảnh tĩnh và động
//   $(document).on("click", ".gallery-img", function () {
//     const imgSrc = $(this).attr("src");
//     const imgID = $(this).data("id");

//     // Hiển thị ảnh ngay lập tức (không đợi Ajax)
//     $(".popup-img").attr("src", imgSrc);
//     $(".image-popup, .image-popup-overlay").fadeIn();

//     // Load thông tin ảnh từ server
//     $.ajax({
//       url: "/PycShare/user/get_image_info.php",
//       type: "GET",
//       data: { id: imgID },
//       dataType: "json",
//       success: function (data) {
//         if (data.error) {
//           alert(data.error);
//         } else {
//           $(".popup-title").text("Tiêu đề ảnh: " + data.TenPic);
//           $(".popup-author").text("Tên tác giả: " + data.user);
//           $(".popup-date").text("Ngày đăng tải: " + data.NgayCapNhat);
//           $(".popup-desc").text("Mô tả của tác giả: " + data.MoTa);
//         }
//       },
//     });
//   });

//   // Đóng popup
//   $(".close-popup, .image-popup-overlay").click(function () {
//     $(".image-popup, .image-popup-overlay").fadeOut();
//   });
// });
