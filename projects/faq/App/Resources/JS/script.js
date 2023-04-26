$(document).ready(function () {
  const url = "../Controllers/Middleware/Ajax.php";

  const forms = [
    "admin-register-form",
    "admin-login-form",
    "post-question-form",
    "delete-question-form",
    "reply-question-form",
  ];

  $.fn.runAjaxQuery = (identifier) => {
    let identifer = identifier;
    let item = $("#" + identifier);
    $(item).submit(function (e) {
      e.preventDefault();
      $(".spinner-" + identifier).removeClass("d-none");
      setTimeout(() => {
        $.ajax({
          type: "post",
          url: url,
          data: new FormData(this),
          dataType: "json",
          contentType: false,
          cache: false,
          processData: false,
          success: function (response) {
            $(".spinner-" + identifer).addClass("d-none");

            function GetResponse(source) {
              if ($(".form-alert-" + source).hasClass("d-none")) {
                $(".form-alert-" + source).removeClass("d-none");
                $(".form-alert-text-" + source).html(response.message);
                setTimeout(function () {
                  $(".form-alert-" + source).addClass("d-none");
                }, 3000);
              }
            }

            function SetAlertColor(flag) {
              switch (flag) {
                case 1:
                  if ($(".alert").hasClass("alert-danger")) {
                    console.log("true");
                    $(".alert")
                      .removeClass("alert-danger")
                      .addClass("alert-success");
                  }
                  break;
                case 0:
                  if ($(".alert").hasClass("alert-success")) {
                    $(".alert")
                      .removeClass("alert-success")
                      .addClass("alert-danger");
                  }
              }
            }

            function SetAlertTitle(title) {
              $(".alert-title").html(title);
            }

            function GetResponseByFlag(source) {
              switch (response.flag) {
                case 0:
                  SetAlertTitle("Oops!");
                  SetAlertColor(response.flag);
                  GetResponse(source);
                  break;
                case 1:
                  SetAlertTitle("Successful!");
                  SetAlertColor(response.flag);
                  GetResponse(source);
              }
            }

            function RedirectUser() {
              if (response.flag === 1 && response.destination !== null) {
                window.location.href = response.destination;
              }
            }

            switch (identifier) {
              case "admin-register-form":
                GetResponseByFlag("admin-register");
                setTimeout(() => {
                  RedirectUser();
                }, 2000);
                break;
              case "admin-login-form":
                GetResponseByFlag("admin-login");
                setTimeout(() => {
                  RedirectUser();
                }, 2000);
                break;
              case "post-question-form":
                GetResponseByFlag("post-question");
                break;
              case "reply-question-form":
                GetResponseByFlag("reply-question");
                break;
            }
          },
        });
      }, 3000);
    });
  };

  forms.forEach($.fn.runAjaxQuery);

  $(".delete-question").click(function (e) {
    e.preventDefault();
    let questionId = $(this).attr("href");
    let formRequestFlag = $(this).attr("name");
    let deleteQuestionPassKey = $(this).attr("id");
    $(".spinner-delete-question").removeClass("d-none");
    setTimeout(() => {
      $(".spinner-delete-question").addClass("d-none");
      $(".form-alert-delete-question")
        .removeClass("alert-danger")
        .addClass("alert-info");
      $.ajax({
        type: "post",
        url: url,
        data: {
          questionId: questionId,
          FormRequestFlag: formRequestFlag,
          DeleteQuestionPassKey: deleteQuestionPassKey,
        },
        dataType: "json",
        success: function (response) {
          $(".alert-title").html("Access Granted");
          $(".form-alert-delete-question").removeClass("d-none");
          $(".form-alert-text-delete-question").html(response.message);
          setTimeout(() => {
            $(".spinner-delete-question").removeClass("d-none");
            $(".form-alert-delete-question").addClass("d-none");
          }, 4000);
          if ($(".delete-question").attr("data-redirect") === "home") {
            window.location.href = "?page=profile&auth=admin";
          } else {
            setTimeout(() => {
              location.reload();
            }, 6000);
          }
        },
      });
    }, 3000);
  });

  $(".check-password").click(function () {
    if ($(this).prop("checked") === true) {
      $(".show-password").attr("type", "text");
    } else {
      if ($(this).prop("checked") === false) {
        $(".show-password").attr("type", "password");
      }
    }
  });
});
