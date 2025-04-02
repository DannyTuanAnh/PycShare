function togglePassword() {
  let passwordInput = document.getElementById("passwordlogin");
  let toggleIcon = document.querySelector(".toggle-password");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    toggleIcon.innerHTML = '<i class="fa-solid fa-eye"></i>';
  } else {
    passwordInput.type = "password";
    toggleIcon.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
  }
}

// Kiểm tra dữ liệu
document.addEventListener("DOMContentLoaded", function () {
  document
    .querySelector(".form__login")
    .addEventListener("submit", function (event) {
      event.preventDefault();
      let username = document.getElementById("login").value.trim();
      let password = document.getElementById("passwordlogin").value.trim();
      if (username === "" || password === "") {
        let toast = document.createElement("div");
        toast.id = "toast";
        toast.className = "toast show";
        toast.innerHTML = "⚠️ Vui lòng nhập đầy đủ thông tin!";
        document.body.appendChild(toast);
        setTimeout(() => {
          toast.remove();
        }, 3000);
        return;
      }

      // Gửi yêu cầu đến PHP
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "./process_login.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.send(
        "username=" +
          encodeURIComponent(username) +
          "&password=" +
          encodeURIComponent(password)
      );
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
          let response = JSON.parse(xhr.responseText);
          if (response.status === "success") {
            window.location.href = response.redirect;
          } else {
            showToast(response.message);
          }
        }
      };
    });
});

// Hàm hiện thông báo
function showToast(message) {
  let toast = document.createElement("div");
  toast.id = "toast";
  toast.className = "toast show";
  toast.innerHTML = message;
  document.body.appendChild(toast);
  setTimeout(() => {
    toast.remove();
  }, 3000);
}
