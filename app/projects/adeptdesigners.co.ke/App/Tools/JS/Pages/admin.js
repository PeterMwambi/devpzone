$(document).ready(function () {
  /**
   * MANDATORY PAGE IDENTIFIER
   *
   * A link field which specifies the origin of a request
   * Passed in a link attribute, We get the href property of the
   * link with this classname. The property is then used to define
   * a few properties for the modal such as the tablename identifier
   * we intend to perform an action on (category, sub-category) and the
   * id to uniquely identify the action
   */
  $(".mandatory-page-link").click(function (e) {
    e.preventDefault();
  });

  const url = "../../../../app/controller/adminajax.php";

  const forms = [
    "adminLoginForm",
    "administratorsForm",
    "productDescriptionForm",
    "purchasesForm",
    "productForm",
    "categoryForm",
    "subCategoryForm",
    "suppliersForm",
    "ordersForm",
    "employeeBioInformationForm",
    "employeeIdentificationForm",
    "employeeAccountInformationForm",
  ];

  const formAlerts = {
    adminLoginForm: "adminLoginFormAlert",
    administratorsForm: "administratorsFormAlert",
    productDescriptionForm: "productDescriptionFormAlert",
    purchasesForm: "purchasesFormAlert",
    productForm: "productFormAlert",
    categoryForm: "categoryFormAlert",
    subCategoryForm: "subCategoryFormAlert",
    suppliersForm: "suppliersFormAlert",
    employeeBioInformationForm: "employeeBioInformationFormAlert",
    employeeIdentificationForm: "employeeIdentificationFormAlert",
    employeeAccountInformationForm: "employeeAccountInformationFormAlert",
    ordersForm: "ordersFormAlert",
  };

  //////////////////////////////////////////////////////
  //////////////////////////////////////////////////////
  /**
   * NAVBAR SCROLL BEHAVIOR
   */
  ///////////////////////////////////////////////////////
  //////////////////////////////////////////////////////
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

  $(".password-visibility").click(function () {
    if ($(".password-visibility").prop("checked") === true) {
      $(".password").attr("type", "text");
    } else {
      if ($(".password-visibility").prop("checked") === false) {
        $(".password").attr("type", "password");
      }
    }
  });

  for (x = 0; x <= 6; x++) {
    $(".dropdown-collection-" + String(x)).hide();
  }
  $(".dropdown-btn-1")
    .mouseover(function () {
      $(".dropdown-collection-1").show();
    })
    .mouseout(function () {
      $(".dropdown-collection-1").hide();
    });
  $(".dropdown-btn-2")
    .mouseover(function () {
      $(".dropdown-collection-2").show();
    })
    .mouseout(function () {
      $(".dropdown-collection-2").hide();
    });
  $(".dropdown-btn-3")
    .mouseover(function () {
      $(".dropdown-collection-3").show();
    })
    .mouseout(function () {
      $(".dropdown-collection-3").hide();
    });
  $(".dropdown-btn-4")
    .mouseover(function () {
      $(".dropdown-collection-4").show();
    })
    .mouseout(function () {
      $(".dropdown-collection-4").hide();
    });
  $(".dropdown-btn-5")
    .mouseover(function () {
      $(".dropdown-collection-5").show();
    })
    .mouseout(function () {
      $(".dropdown-collection-5").hide();
    });
  $(".dropdown-btn-6")
    .mouseover(function () {
      $(".dropdown-collection-6").show();
    })
    .mouseout(function () {
      $(".dropdown-collection-6").hide();
    });

  $("select[name='payment-method']").change(function () {
    if ($("select[name='payment-method'] option:selected").val() === "Mpesa") {
      $(".transactionID").removeClass("d-none");
    } else {
      $(".transactionID").addClass("d-none");
    }
  });
  /////////////////////////////////////////////////////
  /////////////////////////////////////////////////////
  /**
   * DELETE ACTION
   *
   * Responds to delete requests from delete buttons. Gets the
   * action Id and forwards it to the ajax handler for necessary
   * action which in our case will be to delete a specific entry
   * from the database.
   */
  ////////////////////////////////////////////////////
  ///////////////////////////////////////////////////
  $(".action-message").html(
    "Are you sure you want to proceed with the delete request"
  );

  $(".heading").css("color", "red");
  $(".date-icon").addClass("d-none");
  $(".delete").click(function (e) {
    e.preventDefault();
    var id = $(this).attr("href");
    var table = $(this).attr("name");
    $(".action-modal").modal("show");
    $(".heading").css("color", "red");
    $(".delete-action-bar").removeClass("d-none");
    $(".action-message").removeClass("d-none");
    $(".date-select-action-bar").addClass("d-none");
    $(".date-select-bar").addClass("d-none");
    $(".heading").css("color", "red").html("Delete");
    $(".warning-icon").removeClass("d-none");
    $(".date-icon").addClass("d-none");
    $(".confirm").click(function () {
      $.ajax({
        type: "post",
        url: url,
        data: {
          table: table,
          id: id,
          action: "delete",
        },
        dataType: "json",
        beforeSend: function () {},
        success: function (response) {
          if (response.flag === 1) {
            $(".action-modal").modal("hide");
            $(".progress-modal").modal("show");
            $(".confirm-text").html(response.message);
            setTimeout(function () {
              location.reload("true");
            }, 4000);
          }
        },
      });
    });
  });
  //////////////////////////////////////////////
  ///////////////////////////////////////////
  /**
   * NAVBAR LOGOUT SECTION
   */
  ///////////////////////////////////////////
  ///////////////////////////////////////////
  $(".logout").click(function (e) {
    e.preventDefault();
    $(".confirm-logout").modal("show");
    $(".confirm-logout-text").html("Are you sure you want to exit");
    $(".confirm-exit").click(function () {
      $(".confirm-logout-text").html("Please Wait...");
      $(".logout-spinner").removeClass("d-none");
      $(".logout-buttons").addClass("d-none");
      setTimeout(function () {
        window.location.href = $(".logout").attr("href");
      }, 4000);
    });
  });
  ///////////////////////////////////////////////////
  ////////////////////////////////////////////////
  /**
   * ACTION FOR VIEW COMMENTS & VIEW MESSAGES
   *
   * Responds to specific queries like date when
   * Comments or messages were posted, Day when comments or messages
   * were posted time when comments or messages were posted
   */
  ///////////////////////////////////////////////
  ///////////////////////////////////////////////
  $(".banner-link").click(function (e) {
    e.preventDefault();
    switch ($(this).attr("href")) {
      case "today":
        $(".progress-modal").modal("show");
        $(".confirm-text").html("Please Wait...");
        setTimeout(function () {
          window.location.href =
            "?request=" + request + "&table=" + table + "&day=today";
        }, 2000);
        break;
      case "poor_rating":
        $(".progress-modal").modal("show");
        $(".confirm-text").html("Please Wait...");
        setTimeout(function () {
          window.location.href =
            "?request=" +
            request +
            "&table=" +
            table +
            "&rating=3&query=bad_rating";
        }, 2000);
        break;
      case "good_rating":
        $(".progress-modal").modal("show");
        $(".confirm-text").html("Please Wait...");
        setTimeout(function () {
          window.location.href =
            "?request=" +
            request +
            "&table=" +
            table +
            "&rating=3&query=good_rating";
        }, 2000);
        break;
      case "specific_date":
        $(".action-modal").modal("show");
        $(".delete-action-bar").addClass("d-none");
        $(".action-message").addClass("d-none");
        $(".date-select-action-bar").removeClass("d-none");
        $(".date-select-bar").removeClass("d-none");
        $(".heading").css("color", "orange").html("Date");
        $(".warning-icon").addClass("d-none");
        $(".date-icon").removeClass("d-none");

        $(".get-comment").click(function () {
          $(".action-modal").modal("hide");
          var day = $(".day option:selected").html();
          var month = $(".month option:selected").html();
          var year = $(".year option:selected").html();
          $(".progress-modal").modal("show");
          $(".confirm-text").html("Please Wait...");
          setTimeout(function () {
            window.location.href =
              "?request=" +
              request +
              "&table=" +
              table +
              "&date=" +
              day +
              "/" +
              month +
              "/" +
              year;
          }, 2000);
        });

        break;
    }
  });
  ////////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////////
  /**
   *ACTION FOR REPLY MESSAGES
   */
  /////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////
  $(".reply-bar").click(function (e) {
    e.preventDefault();
    $(".progress-modal").modal("show");
    $(".confirm-text").html("Please Wait...");
    var cid = $(this).attr("href");
    var request = "reply-message";
    setTimeout(function () {
      window.location.href = "?request=" + request + "&sender_id=" + cid;
    }, 3000);
  });
  /////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////
  /**
   * ACTION FOR UPLOAD IMAGE
   */
  //////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////
  $(".profile-icon").mouseover(function () {
    $(this).addClass("d-none");
    $(".profile-icon-add").removeClass("d-none").css("cursor", "pointer");
    $(".profile-text").html("Click to set your profile picture");
  });
  $("#profile-image").change(function () {
    $(".profile-text").html($(this).val());
  });
  $(".profile-icon-add").mouseout(function () {
    $(this).addClass("d-none");
    $(".profile-icon").removeClass("d-none");
    $(".profile-text").html(null);
  });
  $(".password-visibility").click(function () {
    if ($(this).prop("checked") === true) {
      $(".password").attr("type", "text");
    }
    if ($(this).prop("checked") === false) {
      $(".password").attr("type", "password");
    }
  });

  ////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////
  /**\
   * FORMS
   */
  //////////////////////////////////////////////
  ///////////////////////////////////////////////
  $.fn.setIdentifiers = function (item) {
    if (item !== undefined) {
      var identifier = item;
      var item = $("#" + item);
      item.submit(function (e) {
        switch (identifier) {
          case "productForm":
            var alertName = formAlerts.productForm;
            var alertBody = "." + alertName;
            var alertText = "." + alertName + "-text";
            break;
          case "productDescriptionForm":
            var alertName = formAlerts.productDescriptionForm;
            var alertBody = "." + alertName;
            var alertText = "." + alertName + "-text";
            break;
          case "purchasesForm":
            var alertName = formAlerts.purchasesForm;
            var alertBody = "." + alertName;
            var alertText = "." + alertName + "-text";
            break;
          case "categoryForm":
            var alertName = formAlerts.categoryForm;
            var alertBody = "." + alertName;
            var alertText = "." + alertName + "-text";
            break;
          case "subCategoryForm":
            var alertName = formAlerts.subCategoryForm;
            var alertBody = "." + alertName;
            var alertText = "." + alertName + "-text";
            break;
          case "suppliersForm":
            var alertName = formAlerts.suppliersForm;
            var alertBody = "." + alertName;
            var alertText = "." + alertName + "-text";
            break;
          case "employeeBioInformationForm":
            var alertName = formAlerts.employeeBioInformationForm;
            var alertBody = "." + alertName;
            var alertText = "." + alertName + "-text";
            break;
          case "employeeIdentificationForm":
            var alertName = formAlerts.employeeIdentificationForm;
            var alertBody = "." + alertName;
            var alertText = "." + alertName + "-text";
            break;
          case "employeeAccountInformationForm":
            var alertName = formAlerts.employeeAccountInformationForm;
            var alertBody = "." + alertName;
            var alertText = "." + alertName + "-text";
            break;
          case "administratorsForm":
            var alertName = formAlerts.administratorsForm;
            var alertBody = "." + alertName;
            var alertText = "." + alertName + "-text";
            break;
          case "ordersForm":
            var alertName = formAlerts.ordersForm;
            var alertBody = "." + alertName;
            var alertText = "." + alertName + "-text";
            break;
        }
        e.preventDefault();
        if (identifier === "adminLoginForm") {
          $(".progress-modal").modal("hide");
        } else {
          $(".progress-modal").modal("show");
        }
        setTimeout(() => {
          $(".progress-modal").modal("hide");
          $.ajax({
            type: "post",
            url: url,
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
              if (identifier === "adminLoginForm") {
                $(".form-alert-text")
                  .html("Please wait...")
                  .css("color", "inherit");
                $(".spinner-grow").removeClass("d-none");
              }
            },
            success: function (response) {
              if (identifier === "adminLoginForm") {
                if (!$(".spinner-grow").hasClass("d-none")) {
                  $(".spinner-grow").addClass("d-none");
                }
              }
              if (response.flag === 0) {
                $(alertBody).show();
                if (identifier === "adminLoginForm") {
                  $(".form-alert-text").css("color", "red");
                  $(".form-alert-text").html(response.message);
                }
                if ($(alertBody).hasClass("d-none")) {
                  $(alertBody).removeClass("d-none");
                }
                if ($(alertBody).hasClass("alert-success")) {
                  $(alertBody)
                    .removeClass("alert-success")
                    .addClass("alert-danger");
                }
                $(alertText).html(response.message);
                setTimeout(() => {
                  $(alertBody).hide();
                }, 5000);
              } else {
                if (response.flag === 1) {
                  $(alertBody).show();
                  if (identifier === "adminLoginForm") {
                    $(".form-alert-heading").css("color", "green");
                    $(".form-alert-text").html(response.message);
                  }
                  if ($(alertBody).hasClass("d-none")) {
                    $(alertBody).removeClass("d-none");
                  }
                  if ($(alertBody).hasClass("alert-danger")) {
                    $(alertBody)
                      .removeClass("alert-danger")
                      .addClass("alert-success");
                  }
                  $(alertText).html(response.message);
                  $(".form-alert-heading").html("Access Granted");
                  $(".spinner-grow").removeClass("d-none");
                  setTimeout(() => {
                    $(alertBody).hide();
                  }, 5000);
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
        }, 2000);
      });
    }
  };
  forms.forEach($.fn.setIdentifiers);

  //////////////////////////////////////////////////////////
  /**
   *UPLOAD FORM
   */
  /////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////
  $(".upload-image").mouseover(function () {
    $(this).addClass("d-none");
    $(".upload-image-add").removeClass("d-none").css("cursor", "pointer");
    $(".upload-image-text").html("Click to upload picture");
  });
  $(".upload-image-add").mouseout(function () {
    $(this).addClass("d-none");
    $(".upload-image").removeClass("d-none");
    $(".upload-image-text").html(null);
  });
  $("#upload-image").change(function () {
    $(".upload-image-identifier").html("Image selected: " + $(this).val());
  });
  $("#upload-form").submit(function (e) {
    e.preventDefault();
    $(".progress-modal").modal("show");
    setTimeout(() => {
      $(".progress-modal").modal("hide");
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
            if ($(".upload-form-alert").hasClass("d-none")) {
              $(".upload-form-alert").removeClass("d-none");
            }
            if ($(".upload-form-alert").hasClass("alert-success")) {
              $(".upload-form-alert")
                .removeClass("alert-success")
                .addClass("alert-danger");
            }
            $(".upload-form-alert-text").html(response.message);
          } else {
            if (response.flag === 1) {
              if ($(".upload-form-alert").hasClass("d-none")) {
                $(".upload-form-alert").removeClass("d-none");
              }
              if ($(".upload-form-alert").hasClass("alert-danger")) {
                $(".upload-form-alert")
                  .removeClass("alert-danger")
                  .addClass("alert-success");
              }
              $(".upload-form-alert-text").html(response.message);
              setTimeout(function () {
                $(".form-alert").addClass("d-none");
                window.location.href = response.destination;
              }, 2000);
            }
          }
        },
      });
    }, 2000);
  });
});
