// Toggle hiện/ẩn mật khẩu
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

// Hiển thị thông báo nổi
function showToast(message) {
    const toast = $("<div class='toast'></div>").text(message);
    $("body").append(toast);
    toast.addClass("show");

    setTimeout(() => {
        toast.removeClass("show");
        toast.remove();
    }, 3000);
}

// Kiểm tra form đăng ký
$(document).ready(function () {
    $("#signupForm").on("submit", function (e) {
        const username = $("#username").val().trim();
        const password = $("#passwordsignup").val().trim();
        const email = $("#email").val().trim();
        const agree = $("#agreeTerms").is(":checked");

        if (username === "" || password === "" || email === "") {
            e.preventDefault();
            showToast("Vui lòng nhập đầy đủ thông tin!");
            return;
        }

        if (!agree) {
            e.preventDefault();
            showToast("Bạn chưa đồng ý với điều khoản!");
            return;
        }
    });
});
