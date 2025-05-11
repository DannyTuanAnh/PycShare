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

function showSuccess(message) {
  const toast = document.createElement("div");
  toast.className = "success";
  toast.innerHTML = message;
  document.body.appendChild(toast);
  toast.classList.add("show");

  setTimeout(() => {
    toast.classList.remove("show");
    document.body.removeChild(toast);
  }, 3000); // Xóa thông báo sau 3 giây
}
