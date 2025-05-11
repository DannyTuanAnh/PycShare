$(document).ready(function () {
  $("#select-all").click(function () {
    let status = this.checked;
    $("input[type='checkbox']").each(function () {
      this.checked = status;
    });
  });
  $(".navbar li").click(function () {
    let url = $(this).data("url");
    window.location.href = url;
  });
});
