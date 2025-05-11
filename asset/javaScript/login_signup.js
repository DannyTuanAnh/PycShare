//code chức năng đôi mắt ngay password
function togglePassword(inputId, iconSpan) {
  const passwordInput = document.getElementById(inputId);
  const icon = iconSpan.querySelector("i");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    icon.classList.remove("fa-eye-slash");
    icon.classList.add("fa-eye");
  } else {
    passwordInput.type = "password";
    icon.classList.remove("fa-eye");
    icon.classList.add("fa-eye-slash");
  }
}

function showToast(message) {
  const toast = document.createElement("div");
  toast.className = "toast";
  toast.innerHTML = message;
  document.body.appendChild(toast);
  toast.classList.add("show");

  setTimeout(() => {
    toast.classList.remove("show");
    document.body.removeChild(toast);
  }, 3000); // Xóa thông báo sau 3 giây
}

document.getElementById("signupForm").addEventListener("submit", function (e) {
  const agreeCheckbox = document.getElementById("agreeTerms");
  const user = document.getElementById("username").value.trim();
  const pass = document.getElementById("password").value.trim();
  const email = document.getElementById("email").value.trim();

  // Kiểm tra đã nhập username, password và email để đăng ký chưa
  if (user === "" || pass === "" || email === "") {
    e.preventDefault();
    showToast("Vui lòng nhập đầy đủ thông tin!");
    return;
  }

  //kiểm tra checkbox chấp nhận điều khoảng ở signup
  if (!agreeCheckbox.checked) {
    e.preventDefault(); // Ngăn form gửi đi
    showToast("Bạn chưa đồng ý với điều khoản!");
    return;
  }
});
