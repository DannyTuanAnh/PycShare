const uploadBtn = document.getElementById("uploadBtn");
const imageInput = document.getElementById("imageInput");
const previewImage = document.getElementById("previewImage");
const deleteBtn = document.querySelector(".btn-delete");
const uploadText = document.querySelector(".upload p");

// Khi click vào nút + thì mở file selector
uploadBtn.addEventListener("click", (e) => {
  e.preventDefault();
  imageInput.click();
});

// Khi chọn ảnh
imageInput.addEventListener("change", () => {
  const file = imageInput.files[0];
  if (file && file.type.startsWith("image/")) {
    const reader = new FileReader();
    reader.onload = (e) => {
      previewImage.src = e.target.result;
      previewImage.style.display = "block";
      uploadBtn.style.display = "none";
      uploadText.style.display = "none";
    };
    reader.readAsDataURL(file);
  }
});

// Khi click nút xóa
deleteBtn.addEventListener("click", (e) => {
  e.preventDefault();
  imageInput.value = "";
  previewImage.src = "";
  previewImage.style.display = "none";
  uploadBtn.style.display = "inline-block";
  uploadText.style.display = "block";
});
// bấm nút đăng tải thì reload lại trang đó
const currentPath = window.location.pathname;
const link = document.getElementById("uploadBtnNav");
const hrefPath = link.getAttribute("href");

// So sánh tên file
if (hrefPath.includes(currentPath.split("/").pop())) {
  link.classList.add("active");
  link.setAttribute("href", "javascript:location.reload()");
}
