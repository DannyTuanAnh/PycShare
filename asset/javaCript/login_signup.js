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
const show = document.querySelector("#toast");
setTimeout(() => {
  show.classList.remove("show");
}, 3000);
