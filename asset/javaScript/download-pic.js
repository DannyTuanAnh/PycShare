$(document).on("click", ".action.download", function () {
  const imgSrc = $(".popup-img").attr("src");

  const link = document.getElementById("downloadLink");
  link.href = imgSrc;
  link.download = imgSrc.split("/").pop(); // Tên file lấy từ URL
  link.click(); // Kích hoạt tải về
});
