$(document).ready(function () {
  // Hàm load lịch sử từ localStorage
  function loadRecentSearches() {
    const recent = JSON.parse(localStorage.getItem("recentSearches")) || [];
    const list = $("#recentList");
    list.empty();
    recent.slice(0, 6).forEach((item) => {
      list.append(`<li>${item}</li>`);
    });
  }

  // Hàm lưu từ khóa mới vào localStorage
  function saveSearchTerm(term) {
    let recent = JSON.parse(localStorage.getItem("recentSearches")) || [];
    // Xoá từ khoá trùng lặp
    recent = recent.filter((item) => item !== term);
    recent.unshift(term);
    // Giới hạn 6 từ khoá gần nhất
    recent = recent.slice(0, 6);
    localStorage.setItem("recentSearches", JSON.stringify(recent));
  }

  // Khi click vào ô input hoặc icon tìm kiếm
  $("#searchInput, #searchIcon").click(function (event) {
    event.stopPropagation();
    loadRecentSearches();
    $("#recentSearches").stop(true, true).slideDown(200).fadeIn(200);
  });

  // Khi nhấn enter trong ô tìm kiếm
  $("#searchInput").keypress(function (e) {
    if (e.which == 13) {
      const term = $(this).val().trim();
      if (term) {
        saveSearchTerm(term);
      }
      $("#recentSearches").slideUp(200).fadeOut(200);
    }
  });

  // Khi click vào một từ khoá gợi ý
  $("#recentList").on("click", "li", function () {
    $("#searchInput").val($(this).text());
    $("#recentSearches").slideUp(200).fadeOut(200);
  });

  // Khi bấm nút xoá lịch sử
  $("#clearHistory").click(function () {
    localStorage.removeItem("recentSearches");
    loadRecentSearches();
  });

  // Khi click ngoài thì đóng khung
  $(document).click(function (event) {
    if (
      !$(event.target).closest("#recentSearches, #searchInput, #searchIcon")
        .length
    ) {
      $("#recentSearches").slideUp(200).fadeOut(200);
    }
  });
});
