$(document).ready(function () {
  const forms = [
    "driverRegisterForm",
    "clientRegisterForm",
    "driverLoginForm",
    "clientLoginForm",
    "administratorsRegisterForm",
    "administratorLoginForm",
    "locationRegisterForm",
    "vehicleRegisterForm",
    "routeRegisterForm",
    "areaRegisterForm",
    "locationForm",
  ];

  var url = "../../App/views/ajax/global.php";

  const buttons = [
    "view",
    "delete",
    "accept-btn",
    "reject-btn",
    "cancelRequest",
    "acceptContract",
    "completePayment",
  ];

  $.fn.preventClickDefault = function (button) {
    var buttonObj = $("." + button);
    buttonObj.click(function (e) {
      e.preventDefault();
      switch (button) {
        case "reject-btn":
          var action = "rejectRequest";
          var data = { action: action };
          var callAjax = true;
          break;
        case "accept-btn":
          var driverId = $(this).attr("href");
          var action = "acceptRequest";
          var data = { driverId: driverId, action: action };
          var callAjax = true;
          break;
        case "acceptContract":
          var contractId = $(this).attr("href");
          var action = "acceptContract";
          var data = { contractId: contractId, action: action };
          var callAjax = true;
          break;
        case "cancelRequest":
          var action = "cancelRequest";
          var data = { action: action };
          var callAjax = true;
          break;
        case "completePayment":
          var paymentMethod = $(this).attr("href");
          var action = "completePayment";
          var data = { paymentMethod: paymentMethod, action: action };
          var callAjax = true;
          break;
      }
      if (callAjax) {
        $.ajax({
          type: "post",
          url: url,
          data: data,
          dataType: "json",
          success: function (response) {
            if ($(".form-alert").hasClass("d-none")) {
              $(".form-alert").removeClass("d-none");
            }
            if ($(".form-alert").hasClass("alert-danger")) {
              $(".form-alert")
                .removeClass("alert-danger")
                .addClass("alert-success");
            }
            $(".form-alert-text").html(response.message);
            $(".form-alert-heading").html("Access Granted");
            $(".spinner-grow").removeClass("d-none");
            switch (response.action) {
              case "redirect":
                setTimeout(() => {
                  window.location.href = response.destination;
                }, 3000);
                break;
              case "stayOnPage":
                break;

              default:
                break;
            }
          },
        });
      }
    });
  };
  $(".signout").click(function (e) {
    e.preventDefault();
    window.location.href = "../../accounts/logout.php";
  });

  $.fn.setIdentifiers = function (item) {
    if (item !== undefined) {
      var identifier = item;
      var item = $("#" + item);
      item.submit(function (e) {
        e.preventDefault();
        $.ajax({
          type: "post",
          url: url,
          data: new FormData(this),
          dataType: "json",
          contentType: false,
          cache: false,
          processData: false,
          success: function (response) {
            if (response.flag === 0) {
              if ($(".form-alert").hasClass("d-none")) {
                $(".form-alert").removeClass("d-none");
              }
              if ($(".form-alert").hasClass("alert-success")) {
                $(".form-alert")
                  .removeClass("alert-success")
                  .addClass("alert-danger");
              }
              $(".form-alert-text").html(response.message);
              $(".form-alert-heading").html("Access Denied");
            } else {
              if (response.flag === 1) {
                if ($(".form-alert").hasClass("d-none")) {
                  $(".form-alert").removeClass("d-none");
                }
                if ($(".form-alert").hasClass("alert-danger")) {
                  $(".form-alert")
                    .removeClass("alert-danger")
                    .addClass("alert-success");
                }
                $(".form-alert-text").html(response.message);
                $(".form-alert-heading").html("Access Granted");
                $(".spinner-grow").removeClass("d-none");
                switch (response.action) {
                  case "redirect":
                    setTimeout(() => {
                      window.location.href = response.destination;
                    }, 3000);
                    break;
                  case "stayOnPage":
                    $(".spinner-grow").addClass("d-none");
                    break;

                  default:
                    break;
                }
              }
            }
          },
        });
      });
    }
  };
  forms.forEach($.fn.setIdentifiers);

  buttons.forEach($.fn.preventClickDefault);
});
