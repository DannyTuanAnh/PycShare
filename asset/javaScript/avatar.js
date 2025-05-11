document.addEventListener("DOMContentLoaded", function () {
  const input = document.getElementById("avatar-input");
  const preview = document.getElementById("avatar-preview");
  const button = document.getElementById("custom-button");

  button.addEventListener("click", function () {
    input.click(); // mở hộp chọn file khi bấm nút
  });

  input.addEventListener("change", function () {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        preview.src = e.target.result; // hiển thị ảnh mới
      };
      reader.readAsDataURL(file);
    }
  });
});
