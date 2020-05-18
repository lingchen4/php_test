$(document).ready(function () {
  $("#submit").click(function () {
    let firstName = validateTextReg("first_name", "First Name", /^[a-zA-Z]+$/);
    let lastName = validateTextReg("last_name", "Last Name", /^[a-zA-Z]+$/);
    let email = validateTextReg("email", "Email Address", /\S+@\S+\.\S+/);
    let phone = validateTextReg(
      "phone",
      "Phone Number",
      /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im
    );
    let city = validateTextReg(
      "city",
      "City Name",
      /[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/
    );
    let postalCode = validateTextReg(
      "postal_code",
      "Post Code",
      /^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/
    );
    let unitSize = validateTextReg("unit_size", "Unit Size", /^(?!\s*$).+/);
    let hearAbout = validateTextReg("hear_about", "Hear About", /^(?!\s*$).+/);
    let price = validateTextReg("price", "Price Range", /^(?!\s*$).+/);
    let broker = validateRadio(
      "broker",
      "Please Select Broker Button Before Submit."
    );
    let casl = validateRadio("casl", "Please Confirm CASL Rule Before Submit.");
    if (
      firstName &&
      lastName &&
      email &&
      phone &&
      city &&
      postalCode &&
      unitSize &&
      hearAbout &&
      price &&
      broker &&
      casl
    ) {
      if (broker == 1) {
        broker = 1;
      } else {
        broker = 0;
      }
      $.post(
        "/duke_test/register",
        {
          first_name: firstName,
          last_name: lastName,
          email: email,
          phone: phone,
          city: city,
          postal_code: postalCode,
          unit_size: unitSize,
          hear_about: hearAbout,
          price: price,
          broker: broker,
          casl: casl,
        },
        function (data) {
          if (data.status === "success") {
            alertMessage("success", "You've registered successfully!");
          } else {
            alertMessage("warning", data.message);
          }
        },
        "json"
      );
    }
  });
});

function validateTextReg(field, message, regx) {
  $elem = $("input[name='" + field + "']");
  let value = $elem.val();
  if (!regx.test(value)) {
    $elem.focus();
    alertMessage("warning", "Please Enter " + message + " with Valid Format.");
    return false;
  }
  return value;
}

function validateRadio(field, message) {
  let value = $("input[name='" + field + "']:checked").val();
  if (!value) {
    alertMessage("warning", message);
    return false;
  }
  return value;
}

function alertMessage(status, message) {
  if (status !== "success") {
    status = "warning";
  }
  let content = `<div class="alert alert-${status} mb-0" role="alert">
        ${message}
    </div>`;
  $(".message").html(content);
  setTimeout(function () {
    $(".message").html("");
  }, 5000);
}
