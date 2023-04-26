/**
 * @author Peter Mwambi
 * @content Ajax Handler
 */

"use strict";

$(document).ready(function () {
  /**
   * @const url
   * The ajax request handler url. All data
   * submitted to an ajax handler is sent to this
   * reference url
   */
  const url = window.location.pathname;

  /**
   * @const forms
   * Consist of submitted form names identified
   * by unique form ids. Form ids must be defined
   * by the id html attribute
   */
  const forms = [
    "tutor-registration-form-step-1",
    "tutor-registration-form-step-2",
    "tutor-login-form",
    "student-registration-form-step-1",
    "student-registration-form-step-2",
    "student-login-form",
    "admin-registration-form-step-1",
    "admin-registration-form-step-2",
    "admin-login-form",
    "course-category-form",
    "course-registration-form",
    "course-reception-form",
    "fee-payment-form",
  ];

  const fcInputs = ["firstname", "lastname"];
  const tlInputs = ["email"];
  const formHelpText = "tutorspoint__help-text";
  const formStepHeading = "tutorspoint__form-heading";
  const alertIdentifier = "alert";
  const buttonIdentifier = "button[type='submit']";
  const alertHeading = "alert-heading";
  const alertText = "alert-text";
  const alertFootNote = "alert-footnote";
  const spinnerButtonName = "btn-spinner";
  const submitButtonName = "btn-info";
  const progressBar = "progress";
  const progressBarName = "progress-bar";
  const completeSetUpInfoText = "complete-setup-info-text";
  const completeSetUpFootNoteText = "complete-setup-footnote-text";
  var formHandler = null;
  const spinner = "spinner-grow";

  /**
   *
   * @param {string} identifier
   */

  function setToLowerCase(identifier) {
    let item = $("input[name='" + identifier + "']");
    item.blur(function () {
      $(this).val(
        $(this).val().replace($(this).val(), $(this).val().toLowerCase())
      );
    });
  }

  function capitalizeFirstLetter(identifier) {
    let item = $("input[name='" + identifier + "']");
    item.blur(function () {
      $(this).val(
        $(this)
          .val()
          .replace(
            $(this).val().charAt(0),
            $(this).val().charAt(0).toUpperCase()
          )
      );
    });
  }

  fcInputs.forEach(setToLowerCase);
  fcInputs.forEach(capitalizeFirstLetter);
  tlInputs.forEach(setToLowerCase);
  function RunAjaxQuery(identifier) {
    let item = $("#" + identifier);
    $(item).submit(function (e) {
      e.preventDefault();
      toggleAlertVisibility("hide", "alert");
      modifyHelpText(false, "Please Wait");
      disableButton();
      toggleSpinnerVisibility("show");
      toggleButtonSpinner("show");
      writeButtonText(false, "Please Wait");
      setTimeout(() => {
        $.ajax({
          type: "post",
          url: url,
          data: new FormData(this),
          dataType: "json",
          contentType: false,
          cache: false,
          processData: false,
          error: function (response) {
            toggleSpinnerVisibility("hide");
            toggleButtonSpinner("hide");
            modifyHelpText(true);
            let feedback = response.responseJSON;
            getErrorMessage(feedback.message);
            writeButtonText(true);
            enableButton();
          },
          success: function (response) {
            toggleSpinnerVisibility("hide");
            toggleButtonSpinner("hide");
            modifyHelpText(true);
            setHandler(response.handler);
            getSuccessMessage(response.message);
            setTimeout(function () {
              modifyHelpText(false, "Please Wait");
              toggleSpinnerVisibility("show");
            }, 5000);
            setTimeout(function () {
              modifyHelpText(true);
              toggleSpinnerVisibility("hide");
              goToNextStep(response.next);
            }, 6000);
          },
        });
      }, 3000);
    });
  }

  forms.forEach(RunAjaxQuery);

  function tutorRegistrationStep2() {
    hidePreviousStepForm("tutor-registration-form-step-1");
    showNextStepForm("tutor-registration-form-step-2");
    writeProgressBar(false, "100", "Step 2 out of 2");
    writeFormStepHeading(false, "Step 2: Account Information");
    writeButtonText(false, "Complete Setup");
    enableButton();
    return;
  }

  function studentRegistrationStep2() {
    hidePreviousStepForm("student-registration-form-step-1");
    showNextStepForm("student-registration-form-step-2");
    writeProgressBar(false, "100", "Step 2 out of 2");
    writeFormStepHeading(false, "Step 2: Account Information");
    writeButtonText(false, "Complete Setup");
    enableButton();
    return;
  }

  function adminRegistrationStep2() {
    hidePreviousStepForm("admin-registration-form-step-1");
    showNextStepForm("admin-registration-form-step-2");
    writeProgressBar(false, "100", "Step 2 out of 2");
    writeFormStepHeading(false, "Step 2: Account Information");
    writeButtonText(false, "Complete Setup");
    enableButton();
    return;
  }

  function goToNextStep(step) {
    switch (step) {
      case "go-to-tutor-registration-step-2":
        tutorRegistrationStep2();
        break;
      case "go-to-student-registration-step-2":
        studentRegistrationStep2();
        break;
      case "go-to-admin-registration-step-2":
        adminRegistrationStep2();
        break;
      case "complete-setup":
        completeSetup();
        break;
    }
  }

  function redirectUser(page) {
    setTimeout(function () {
      window.location.href = page;
    }, 2000);
  }

  function setHandler(handler = "") {
    formHandler = handler;
  }

  function getHandler() {
    return formHandler;
  }

  function setCompleteSetUpParams() {
    showNextStepForm("complete-setup");
    hideMultipleItemsByClassName([
      formStepHeading,
      formHelpText,
      progressBar,
      spinner,
    ]);
  }
  function writeCompleteSetupInfoText(message = "") {
    $("." + completeSetUpInfoText).html(message);
  }

  function writeCompleteSetupFootNoteText(message = "") {
    $("." + completeSetUpFootNoteText).html(message);
  }

  /**
   * Tutor Registration form complete
   * @return void
   */
  function completeTutorRegistration() {
    setCompleteSetUpParams();
    hidePreviousStepForm("tutor-registration-form-step-2");
    writeCompleteSetupInfoText(
      "You have successfuly been registered as a tutor. You will be redirected to your account shortly"
    );
    writeCompleteSetupFootNoteText("Thank you for stopping by");
    redirectUser("tutor-home");
  }

  /**
   * Tutor login form complete
   * @return void
   */
  function completeTutorLogin() {
    setCompleteSetUpParams();
    hidePreviousStepForm("tutor-login-form");
    writeCompleteSetupInfoText("Redirecting you to your account...");
    writeCompleteSetupFootNoteText("Thank you for stopping by. Enjoy");
    redirectUser("tutor-home");
  }

  /**
   * Student registration form complete
   * @return void
   */
  function completeStudentRegistration() {
    setCompleteSetUpParams();
    hidePreviousStepForm("student-registration-form-step-2");
    writeCompleteSetupInfoText(
      "Your account has been created successfully. You will be redirected to your profile shortly..."
    );
    writeCompleteSetupFootNoteText("Thank you for stopping by");
    redirectUser("student-home");
  }

  /**
   * Student login form complete
   * @return void
   */
  function completeStudentLogin() {
    setCompleteSetUpParams();
    hidePreviousStepForm("student-login-form");
    writeCompleteSetupInfoText("Redirecting you to your account...");
    writeCompleteSetupFootNoteText("Thank you for stopping by. Enjoy");
    redirectUser("student-home");
  }

  /**
   * Admin registratio form complete
   * @return void
   */
  function completeAdminRegistration() {
    setCompleteSetUpParams();
    hidePreviousStepForm("admin-registration-form-step-2");
    writeCompleteSetupInfoText(
      "Admininstrators account has been created successfully. You will be redirected to your profile shortly..."
    );
    writeCompleteSetupFootNoteText("Thank you for stopping by");
    redirectUser("admin-home");
  }

  /**
   * Admin registration form complete
   * @return void
   */
  function completeAdminLogin() {
    setCompleteSetUpParams();
    hidePreviousStepForm("admin-login-form");
    writeCompleteSetupInfoText("Redirecting you to your account...");
    writeCompleteSetupFootNoteText("Thank you for stopping by. Enjoy");
    redirectUser("admin-home");
  }

  /**
   * Course category registration form complete
   * @return void
   */
  function completeCourseCategoryRegistration() {
    setCompleteSetUpParams();
    hidePreviousStepForm("course-category-form");
    writeCompleteSetupInfoText(
      "Course category has been added successfully. Redirecting you to course categories..."
    );
    writeCompleteSetupFootNoteText("Thank you for stopping by. Enjoy");
    redirectUser("admin-categories");
  }

  /**
   * Course category registration form complete
   * @return void
   */
  function completeCourseRegistration() {
    setCompleteSetUpParams();
    hidePreviousStepForm("course-registration-form");
    writeCompleteSetupInfoText(
      "Course has been added successfully. Redirecting you to courses..."
    );
    writeCompleteSetupFootNoteText("Thank you for stopping by. Enjoy");
    redirectUser("admin-courses");
  }

  function completeCourseReception() {
    setCompleteSetUpParams();
    hidePreviousStepForm("course-reception-form");
    writeCompleteSetupInfoText(
      "Course content has been registered successfully. Redirecting you to your courses..."
    );
    writeCompleteSetupFootNoteText("Thank you for stopping by. Enjoy");
    redirectUser("tutor-courses");
  }

  function completeFeePayment() {
    setCompleteSetUpParams();
    hidePreviousStepForm("fee-payment-form");
    writeCompleteSetupInfoText(
      "Course fees has been paid successfully. Redirecting you to classroom..."
    );
    writeCompleteSetupFootNoteText("Thank you for stopping by. Enjoy");
    redirectUser("student-classroom");
  }

  /**
   * Complete form setup
   * @return void
   */
  function completeSetup() {
    switch (getHandler()) {
      case "tutor-registration":
        completeTutorRegistration();
        break;
      case "tutor-login":
        completeTutorLogin();
        break;
      case "student-registration":
        completeStudentRegistration();
        break;
      case "student-login":
        completeStudentLogin();
        break;
      case "admin-registration":
        completeAdminRegistration();
        break;
      case "admin-login":
        completeAdminLogin();
        break;
      case "course-category":
        completeCourseCategoryRegistration();
        break;
      case "course-registration":
        completeCourseRegistration();
        break;
      case "course-reception":
        completeCourseReception();
        break;
      case "fee-payment":
        completeFeePayment();
        break;
    }
  }

  function writeButtonText(defaultText = true, message) {
    if (message === undefined) {
      var defaultButtonText = "Go to next step";
    } else {
      var defaultButtonText = message;
    }
    switch (defaultText) {
      case true:
        $("." + submitButtonName).html(defaultButtonText);
        break;
      case false:
        $("." + submitButtonName).html(message);
        break;
    }
  }

  function toggleButtonSpinner(flag) {
    switch (flag) {
      case "show":
        if ($("." + spinnerButtonName).hasClass("d-none")) {
          $("." + spinnerButtonName).removeClass("d-none");
        }
        break;
      case "hide":
        $("." + spinnerButtonName).addClass("d-none");
        break;
    }
  }

  function hideItemByClassName(classname) {
    $("." + classname).addClass("d-none");
  }

  function hideMultipleItemsByClassName(classname = []) {
    classname.forEach(hideItemByClassName);
  }

  function disableButton() {
    $(buttonIdentifier).attr("disabled", "disabled");
  }

  function enableButton() {
    $(buttonIdentifier).removeAttr("disabled");
  }

  function writeProgressBar(defaultText = true, width, message) {
    let defaultProgressBarText = "Step 1 out of 2";
    switch (defaultText) {
      case true:
        $("." + progressBarName).html(defaultProgressBarText);
        $("." + progressBarName).attr("style", "width:25%");
        break;
      case false:
        $("." + progressBarName).html(message);
        $("." + progressBarName).attr("style", "width:" + width + "%;");
        break;
    }
  }

  function hidePreviousStepForm(form) {
    $("#" + form).addClass("d-none");
  }

  function showNextStepForm(form) {
    $("#" + form)
      .removeClass("d-none")
      .hide();
    setTimeout(function () {
      $("#" + form).fadeIn("slow");
    }, 100);
  }

  function getErrorMessage(message) {
    toggleAlertVisibility("show");
    toggleAlertColor("danger");
    writeAlertMessage(message);
    writeAlertHeading(true);
    writeAlertFootNote(true);
    writeAlertIcon("show", "error");
    writeAlertIcon("hide", "success");
    fadeItem("." + alertIdentifier, 9000);
  }

  function getSuccessMessage(message) {
    toggleAlertVisibility("show");
    toggleAlertColor("success");
    writeAlertMessage(message);
    writeAlertIcon("show", "success");
    writeAlertIcon("hide", "error");
    writeAlertHeading(false, "Congratulations!");
    writeAlertFootNote(
      false,
      "You will be redirected to the next step shortly"
    );
    disableButton();
    fadeItem("." + alertIdentifier, 4000);
  }

  function writeFormStepHeading(defaultText = true, message) {
    let defaultFormStepHeadingText = "Step 1: Personal Information";
    switch (defaultText) {
      case true:
        $("." + formStepHeading).html(defaultFormStepHeadingText);
        break;
      case false:
        $("." + formStepHeading).html(message);
        break;
    }
  }

  function writeAlertMessage(message) {
    $("." + alertText).html(message);
  }

  function writeAlertFootNote(defaultText = true, message) {
    let defaultAlertFootNoteText = "Please correct the field then try again";
    switch (defaultText) {
      case true:
        $("." + alertFootNote).html(defaultAlertFootNoteText);
        break;
      case false:
        $("." + alertFootNote).html(message);
        break;
    }
  }

  function writeAlertHeading(defaultText = true, message) {
    let defaultAlertText = "Oops! We run into an error";
    switch (defaultText) {
      case true:
        $("." + alertHeading).html(defaultAlertText);
        break;
      case false:
        $("." + alertHeading).html(message);
        break;
    }
  }

  function writeAlertIcon(action, className) {
    switch (action) {
      case "show":
        $("." + className).removeClass("d-none");
        break;
      case "hide":
        $("." + className).addClass("d-none");
        break;
    }
  }

  function toggleSpinnerVisibility(action) {
    switch (action) {
      case "show":
        $(".spinner").removeClass("d-none");
        break;
      case "hide":
        $(".spinner").addClass("d-none");
        break;
    }
  }

  function toggleAlertColor(flag) {
    switch (flag) {
      case "success":
        if ($("." + alertIdentifier).hasClass("alert-danger")) {
          $("." + alertIdentifier)
            .removeClass("alert-danger")
            .addClass("alert-success");
        }
        break;
      case "danger":
        if ($("." + alertIdentifier).hasClass("alert-success")) {
          $("." + alertIdentifier)
            .removeClass("alert-success")
            .addClass("alert-danger");
        }
        break;
    }
  }

  function toggleAlertVisibility(action) {
    switch (action) {
      case "show":
        if ($("." + alertIdentifier).hasClass("d-none")) {
          $("." + alertIdentifier).removeClass("d-none");
        }
        break;
      case "hide":
        $("." + alertIdentifier).addClass("d-none");
        break;
    }
  }

  function modifyHelpText(defaultText = true, message) {
    let defaultHelpText = "Required fields are marked by *";
    switch (defaultText) {
      case true:
        $("." + formHelpText).html(defaultHelpText);
        break;
      case false:
        $("." + formHelpText).html(message);
        break;
    }
  }

  function fadeItem(item, timer) {
    setTimeout(function () {
      $(item).addClass("d-none");
    }, timer);
  }

  togglePasswordVisibility("password-switch", "password-visibility-toggle");

  function togglePasswordVisibility(parent, child) {
    $("." + parent).click(function () {
      if ($(this).prop("checked") === true) {
        $("." + child).attr("type", "text");
      } else {
        if ($(this).prop("checked") === false) {
          $("." + child).attr("type", "password");
        }
      }
    });
  }

  function logout() {
    $(".logout").click(function (e) {
      e.preventDefault();
      $(this).html("Please wait...");
      setTimeout(function () {
        redirectUser("logout");
      }, 2000);
    });
  }
  logout();

  function hideDiscountAlert() {
    setTimeout(function () {
      $(".discount-redeem").addClass("d-none");
    }, 3000);
  }

  hideDiscountAlert();
});

function changeCarouselImageToBkImage(imageClass, bkItemClass) {
  const image = document.getElementsByClassName(imageClass);
  const carouselItem = document.getElementsByClassName(bkItemClass);
  for (var x = 0; x <= image.length - 1; x++) {
    carouselItem[x].style.backgroundImage =
      "url('" + image[x].getAttribute("src") + "')";
  }
}

changeCarouselImageToBkImage("carousel-image", "carousel-item");
