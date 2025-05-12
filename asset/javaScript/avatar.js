document.addEventListener("DOMContentLoaded", function () {
  const input = document.getElementById("avatar-input");
  // const preview = document.getElementById("avatar-preview");
  const button = document.getElementById("custom-button");
  const form = document.getElementById("uploadForm");

  button.addEventListener("click", function () {
    input.click(); // mở hộp chọn file khi bấm nút
  });
  input.addEventListener("change", function () {
    form.submit();
  });
});
