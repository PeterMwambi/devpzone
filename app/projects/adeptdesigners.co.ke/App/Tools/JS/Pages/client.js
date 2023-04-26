////////////////////////////////////////////////////////
///////////////////////////////////////////////////////
///////////////////////////////////////////////////////
///////////////////////////////////////////////////////
/**\
 * FORMS
 */
//////////////////////////////////////////////
///////////////////////////////////////////////

switch (window.location.pathname) {
  case "/adeptdesigners.co.ke/app/pages/client/account/":
    var url = "../../../../app/controller/clientajax.php";
    break;
  default:
    var url = "../../../app/controller/clientajax.php";
    break;
}
const forms = [
  "addToCart",
  "deleteItem",
  "updateQuantity",
  "emptyCart",
  "clientRegistrationForm",
  "clientLoginForm",
  "checkOutCart",
  "cancelOrder",
];
$.fn.setIdentifiers = function (item) {
  if (item !== undefined) {
    var identifier = item;
    var item = $("." + item);
    item.submit(function (e) {
      e.preventDefault();
      $(".progress-modal").modal("show");
      setTimeout(() => {
        $.ajax({
          type: "post",
          url: url,
          data: new FormData(this),
          dataType: "json",
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function () {},
          success: function (response) {
            if (response.flag === 0) {
              $(".spinner-grow").hide();
              $(".confirm-text").html(response.message);
              setTimeout(function () {
                $(".progress-modal").modal("hide");
                $(".form-alert-heading").html("Oops!");
                $(".confirm-text").html("Please Wait");
                $(".spinner-grow").show();
                $(".form-alert-text").html(response.message);
                $(".form-alert-text").css("color", "rgb(103, 69, 5)");
              }, 1000);
            } else {
              if (response.flag === 1) {
                $(".progress-modal").show();
                $(".confirm-text").html(response.message);
              }
              switch (response.action) {
                case "redirect":
                  setTimeout(() => {
                    if (
                      window.location.pathname ===
                      "/adeptdesigners.co.ke/app/pages/client/account/"
                    ) {
                      location.reload();
                    } else {
                      window.location.href = response.destination;
                    }
                  }, 3000);
                  break;
                case "stayOnPage":
                  $(".spinner-grow").addClass("d-none");
                  break;

                default:
                  break;
              }
            }
          },
        });
      }, 2000);
    });
  }
};
forms.forEach($.fn.setIdentifiers);

//////////////////////////////////////////////
///////////////////////////////////////////
/**
 * NAVBAR LOGOUT SECTION
 */
///////////////////////////////////////////
///////////////////////////////////////////

$(document).ready(function () {
  $(".logout").click(function (e) {
    e.preventDefault();
    $(".confirm-action").modal("show");
    $(".confirm-action-text").html("Are you sure you want to exit?");
    $(".confirm-action-proceed").click(function () {
      $(".confirm-action-text").html("Please Wait...");
      $(".confirm-action-spinner").removeClass("d-none");
      $(".confirm-action-buttons").addClass("d-none");
      setTimeout(function () {
        window.location.href = $(".logout").attr("href");
      }, 4000);
    });
  });

  $(".cancel-order").click(function (e) {
    e.preventDefault();
    var identifier = $(this).attr("href");
    var action = $(".mandatory-security-field").val();
    $(".confirm-action").modal("show");
    $(".confirm-action-text").html(
      "Are you sure you want to cancel this order?"
    );
    $(".confirm-action-proceed").click(function () {
      $(".confirm-action-text").html("Please Wait...");
      $(".confirm-action-spinner").removeClass("d-none");
      $(".confirm-action-buttons").addClass("d-none");
      setTimeout(function () {
        $.ajax({
          type: "post",
          url: url,
          data: {
            action: action,
            identifier: identifier,
          },
          dataType: "json",
          beforeSend: function () {},
          success: function (response) {
            if (response.flag === 0) {
              setTimeout(function () {
                $(".confirm-action-text").html(response.message);
                $(".confirm-action-spinner").addClass("d-none");
              }, 1500);
              $(".confirm-action").modal("hide");
            } else {
              if (response.flag === 1) {
                $(".confirm-action-text").html(response.message);
                $(".confirm-action-spinner").removeClass("d-none");
              }
              switch (response.action) {
                case "redirect":
                  setTimeout(() => {
                    if (
                      window.location.pathname ===
                      "/adeptdesigners.co.ke/app/pages/client/account/"
                    ) {
                      location.reload();
                    } else {
                      window.location.href = response.destination;
                    }
                  }, 3000);
                  break;
                case "stayOnPage":
                  $(".spinner-grow").addClass("d-none");
                  break;

                default:
                  break;
              }
            }
          },
        });
      }, 4000);
    });
  });
});
