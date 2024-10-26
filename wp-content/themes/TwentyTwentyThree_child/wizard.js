jQuery(document).ready(function ($) {
  function goToStep(step) {
    $(".step").hide();
    $(`#step-${step}`).show();

    $(".step-link").removeClass("active");

    switch (step) {
      case 1:
        $("#step-contact-info-link").addClass("active");
        break;

      case 2:
        $("#step-quantity-link").addClass("active");
        break;
      case 3:
        $("#step-price-link").addClass("active");
        break;
      case 4:
        $("#step-done-link").addClass("active");
        break;
      default:
        break;
    }
  }

  goToStep(1);

  $(".step-link").click(function () {
    const step = $(this).data("step");
    goToStep(step);
  });

  function validateStep1() {
    let valid = true;

    if ($("#name").val() === "") {
      $("#name-error").removeClass("d-none");
      valid = false;
    } else {
      $("#name-error").addClass("d-none");
    }

    if ($("#email").val() === "") {
      $("#email-error").removeClass("d-none");
      valid = false;
    } else {
      $("#email-error").addClass("d-none");
    }

    return valid;
  }

  function validateStep2() {
    let quantity = parseInt($("#quantity").val());
    let isValid = !isNaN(quantity) && quantity > 0 && quantity <= 1000;
    if (!isValid) {
      $("#quantity-error").removeClass("d-none");
    } else {
      $("#quantity-error").addClass("d-none");
    }
    return isValid;
  }

  $("#continue-1").click(function () {
    if (validateStep1()) {
      goToStep(2);
    }
  });

  $("#back-2").click(function () {
    goToStep(1);
  });

  $("#continue-2").click(function () {
    if (validateStep2()) {
      var quantity = parseInt($("#quantity").val());
      var price = 0;

      if (quantity >= 1 && quantity <= 10) {
        price = 10;
      } else if (quantity >= 11 && quantity <= 100) {
        price = 100;
      } else if (quantity >= 101 && quantity <= 1000) {
        price = 1000;
      }

      $("#price-display").text("$" + price);
      goToStep(3);
    }
  });

  $("#back-3").click(function () {
    goToStep(2);
  });

  $("#wizard-form").submit(function (e) {
    e.preventDefault();

    var price = parseInt($("#price-display").text().replace("$", ""));

    if (price <= 1000) {
      $.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        data: {
          action: "send_wizard_email",
          name: $("#name").val(),
          email: $("#email").val(),
          phone: $("#phone").val(),
          quantity: $("#quantity").val(),
          price: $("#price-display").text(),
        },
        success: function (response) {
          if (response === "success") {
            $("#final-message")
              .text("Email was successfully sent!")
              .removeClass("text-danger")
              .addClass("text-success");
          } else {
            $("#final-message")
              .text("There was a problem sending the email.")
              .removeClass("text-success")
              .addClass("text-danger");
          }
          goToStep(4);
        },
      });
    } else {
      $("#final-message")
        .text("Price exceeds $1000, operation cannot be completed.")
        .removeClass("text-success")
        .addClass("text-danger");
      goToStep(4);
    }
  });

  $("#start-again").click(function () {
    goToStep(1);
    $("#wizard-form")[0].reset();
    $("#price-display").text("");
  });
});
