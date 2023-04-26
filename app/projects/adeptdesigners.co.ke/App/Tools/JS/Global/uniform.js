$(document).ready(function () {
  var pathname = window.location.pathname;
  $(".toast").toast("show");
  $(".spinner").hide();
  $(".spinner-get-pwd-link").hide();
  $(document).on("scroll", function () {
    var pageTop = $(document).scrollTop();
    var pageBottom = pageTop + $(window).height();
    var tags = $("section");

    for (var i = 0; i < tags.length; i++) {
      var tag = tags[i];
      if ($(tag).position().top < pageBottom) {
        $(tag).addClass("visible");
      } else {
        $(tag).removeClass("visible");
      }
    }
  });
  $(".form-body").fadeIn("slow");

  if (pathname == "/adeptdesigners.co.ke/products/") {
    $(".badge-item").removeClass("d-none");
    $(".mainnav").removeClass("d-none");
    $(".mainnav").removeClass("invisible");
  }

  var timer;
  $(window).scroll(function () {
    if (timer) {
      window.clearTimeout(timer);
      if (window.scrollY > 500) {
        $(".company-icon")
          .removeClass("icon")
          .css("transition", "0.3s")
          .addClass("icon-sm");
        $(".company-title")
          .removeClass("title")
          .css("transition", "0.3s")
          .addClass("title-sm");
      } else {
        if (window.scrollY < 500) {
          $(".company-icon")
            .removeClass("icon-sm")
            .css("transition", "0.3s")
            .addClass("icon");
          $(".company-title")
            .removeClass("title-sm")
            .css("transition", "0.3s")
            .addClass("title");
        }
      }
    }
    timer = setTimeout(function () {}, 1000);
  });
  var timer;
  $(window).scroll(function () {
    if (timer) {
      window.clearTimeout(timer);
      if (window.scrollY > 500) {
        $(".company-icon")
          .removeClass("icon")
          .css("transition", "0.3s")
          .addClass("icon-sm");
        $(".company-title")
          .removeClass("title")
          .css("transition", "0.3s")
          .addClass("title-sm");
      } else {
        if (window.scrollY < 500) {
          $(".company-icon")
            .removeClass("icon-sm")
            .css("transition", "0.3s")
            .addClass("icon");
          $(".company-title")
            .removeClass("title-sm")
            .css("transition", "0.3s")
            .addClass("title");
        }
      }
    }
    timer = setTimeout(function () {
      navbar.addClass("invisible");
    }, 1000);
  });

  $("#products-carousel")
    .find(".carousel-item")
    .each(function () {
      var imgContainer = $(this),
        bkImg = imgContainer.find("img").attr("src");
      imgContainer.css({
        "background-image": 'url("' + bkImg + '")',
      });
    });

  $("#productsDisplay")
    .find(".card-body")
    .each(function () {
      var imgContainer = $(this),
        bkImg = imgContainer.find("img").attr("src");
      imgContainer.css({
        "background-image": 'url("' + bkImg + '")',
      });
    });

  $("#fileToUpload").change(function () {
    $(".image-list").html("Image selected: " + $("#fileToUpload").val());
  });
  $(".payment-btn").click(function (e) {
    e.preventDefault();
  });
  $(".option-1").click(function () {
    $("input[name='payment-mode']").removeAttr("value").attr("value", "Paypal");
  });
  $(".option-2").click(function () {
    $("input[name='payment-mode']").removeAttr("value").attr("value", "Mpesa");
  });
});
