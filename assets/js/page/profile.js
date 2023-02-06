$("#AccountListingGridGrouped").submit(function (event) {
  event.preventDefault();

  var fname = $("#fname_setting").val();
  var lname = $("#lname_setting").val();
  var phone = $("#phone_setting").val();
  var street = $("#street_setting").val();
  var city = $("#city_setting").val();
  var state = $("#state_setting").val();
  var country = $("#country_setting").val();
  var zipcode = $("#zipcode_setting").val();
  console.log(zipcode);
  $.ajax({
    url: BASE_URL + "profile/updateUserProfile",
    method: "POST",
    data: {
      fname: fname,
      lname: lname,
      phone: phone,
      street: street,
      city: city,
      state: state,
      country: country,
      zipcode: zipcode,
    },
    success: function (response) {
      response = JSON.parse(response);
      if (response["status"] == "success") {
        window.location = BASE_URL + "/profile/profile";
      } else {
      }
    },
  });
});

$("#modalUsernameForm").submit(function (event) {
  event.preventDefault();

  var username = $("#modalUsernameForm #username").val();
  $.ajax({
    url: BASE_URL + "/profile/changeUsername",
    method: "POST",
    data: {
      username: username,
    },
    success: function (response) {
      response = JSON.parse(response);
      if (response["status"] == "success") {
        setTimeout(function () {
          window.location.href = BASE_URL + "profile/profile";
        }, 1000);
      } else {
      }
    },
  });
});

$("#user_time_zone").change(function () {
  $.ajax({
    url: BASE_URL + "/profile/changeTimezone",
    method: "POST",
    data: {
      timezone: $("#user_time_zone").val(),
    },
    success: function (response) {
      window.location.href = BASE_URL + "profile/profile";
    },
  });
});

$(document).ready(function () {
  $("#user_time_zone").val(_baseGMT);
});

function getUserInvoices(current_account_id) {
  var cDate = new Date();
  alert("123");
  $("#InvoiceListingTable").DataTable({
    language: {
      paginate: {
        next: "&#62;", // or '→'
        previous: "&#60;", // or '←'
      },
    },
    destroy: true,
    order: [[3, "desc"]],
    ajax: function (data, callback, settings) {
      $.ajax({
        url: "./lib/actions.php",
        method: "POST",
        data: {
          action: "getUserInvoices",
        },
        success: function (response) {
          response = JSON.parse(response);
          callback(response);
        },
      });
    },
    columns: [
      { data: "payment_reference_id" },
      {
        //data: "invoice_date"

        render: function (data, type, full, meta) {
          if (
            typeof full.invoice_date != "undefined" &&
            full.invoice_date != null
          ) {
            var invoice_date =
              full.invoice_date == "" ? "-" : full.invoice_date.split(" ")[0];
            return invoice_date;
          } else {
            return "-";
          }
        },
      },
      {
        //data: "invoice_date"
        render: function (data, type, full, meta) {
          return full.start_date.split(" ")[0];
        },
      },
      {
        data: "end_date",
      },
      { data: "amount" },
      {
        render: function (data, type, full, meta) {
          var payment_status =
            full.payment_reference_id == "" ? "Unpaid" : "Paid";
          return payment_status;
        },
      },
    ],
  });
}

$("#changeAvatarForm").submit(ajaxSubmit); 


function AddAccount() {
  if ($("#txtAccountId").val() == "") {
    // notifyme.showNotification("error", "Please write account to add.");
    return false;
  }
  $.ajax({
    url: BASE_URL + "profile/addAccount",
    method: "POST",
    data: { account_id: $("#txtAccountId").val() },
    success: function (response) {
      response = JSON.parse(response);
      getUserAccounts();
      if (response["status"] == "success") {
        // notifyme.showNotification(response["status"], response["message"]);
      } else {
        // notifyme.showNotification(response["status"], response["message"]);
      }
    },
  });
}

/////choose plan
// function ChoosePlan(id, current_plan, amount) {
//   $("#paypal-button-container").html("");
//   if (amount == 0) {
//     UpdateStatus(id, "free", "COMPLETED", "Paypal");
//   } else {
//     paypal
//       .Buttons({
//         // Set up the transaction
//         createOrder: function (data, actions) {
//           return actions.order.create({
//             purchase_units: [
//               {
//                 amount: {
//                   value: amount,
//                 },
//               },
//             ],
//           });
//         },

//         // Finalize the transaction
//         onApprove: function (data, actions) {
//           return actions.order.capture().then(function (orderData) {
//             // // Successful capture! For demo purposes:
//             console.log(
//               "Capture result",
//               orderData,
//               JSON.stringify(orderData, null, 2)
//             );
//             // var transaction = orderData.purchase_units[0].payments.captures[0];
//             // alert('Transaction ' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

//             // // Replace the above to show a success message within this page, e.g.
//             // // const element = document.getElementById('paypal-button-container');
//             // // element.innerHTML = '';
//             // // element.innerHTML = '<h3>Thank you for your payment!</h3>';
//             // // Or go to another URL:  actions.redirect('thank_you.html');
//             var transaction = orderData.purchase_units[0].payments.captures[0];
//             if (transaction.status == "COMPLETED") {
//               UpdateStatus(
//                 id,
//                 transaction.id,
//                 transaction.status,
//                 "Paypal",
//                 amount
//               );
//             } else {
//               // notifyme.showNotification("error", "Payment not completed.");
//             }
//           });
//         },
//       })
//       .render("#paypal-button-container");

//     $("#modalPaymentMethod").modal();
//     if (current_plan == 1) {
//       $(".already-plan-message").html(
//         '<p style="color:#ffffff;">You have a ' +
//           current_plan +
//           " month currently active. <br/> Would you like to purchase another plan that will begin at the end of your current plan?<p>"
//       );
//     } else if (current_plan == 2 || current_plan == 3) {
//       $(".already-plan-message").html(
//         '<p style="color:#ffffff;">You already have an existing plan. Please wait for the plan to complete before purchasing a new one.<p>'
//       );
//       $("#paypal-button-container").hide();
//     }
//   }
// }

///////change email button
$(".changeuser-email").click(function (event) {
  event.preventDefault();
  if (confirm("Are you sure you want to change the email?")) {
    var email = $("#email_setting").val();

    $.ajax({
      url: BASE_URL + "profile/resetEmailReset",
      method: "POST",
      // async: false,
      data: {
        email: email,
      },
      success: function (response) {
        response = JSON.parse(response);
        if (response["status"] == "success") {
          // notifyme.showNotification(response["status"], response["message"]);
        } else {
          // notifyme.showNotification(response["status"], response["message"]);
        }
      },
    });
  }
});

/////change password button
$(".changeuser-pwd").click(function (event) {
  event.preventDefault();
  if (confirm("Are you sure you want to change the password?")) {
    var email = $("#email_setting").val();

    $.ajax({
      url: BASE_URL + "profile/resetPasswordReset",
      method: "POST",
      // async: false,
      data: {
        email: email,
      },
      success: function (response) {
        response = JSON.parse(response);
        if (response["status"] == "success") {
          // notifyme.showNotification(response["status"], response["message"]);
        } else {
          // notifyme.showNotification(response["status"], response["message"]);
        }
      },
    });
  }
});

//////////delete account
function delectAccount(account_id) {
  if (confirm("Are you sure you want to delete this account?")) {
    $.ajax({
      url: BASE_URL + "profile/deleteAccount",
      method: "POST",
      async: false,
      data: {
        account_id: account_id,
      },
      success: function (response) {
        response = JSON.parse(response);
        if (response["status"] == "success") {
          // notifyme.showNotification(response["status"], response["message"]);
        } else if (response["status"] == "error") {
          // notifyme.showNotification(response["status"], response["message"]);
        }
        getUserAccounts();
      },
    });
  }
}

$("body").on("click", ".deleteAccount", function () {
  var AccountId = $(this).attr("data-accountid");
  delectAccount(AccountId);
});

////////updateAccount
function UpdateAccount(Sender, AccountId) {
  var Status = $(Sender).is(":checked") ? "Activate" : "DeActivate";
  if (confirm("Are you sure you want to " + Status + " the account?")) {
    $.ajax({
      url: BASE_URL + "profile/updateAccountStatus",
      method: "POST",
      data: {
        status: $(Sender).is(":checked"),
      },
      success: function (response) {
        response = JSON.parse(response);
        if (response["status"] == "success") {
          // notifyme.showNotification(response["status"], response["message"]);
        } else {
          // notifyme.showNotification(response["status"], response["message"]);
        }

        getUserAccountList();
      },
    });
  } else {
    if ($(Sender).is(":checked")) {
      $(Sender).prop("checked", false);
    } else {
      $(Sender).prop("checked", true);
    }
  }
}

$("body").on("click", ".switchBox", function () {
  var AccountId = $(this).attr("data-accountid");
  UpdateAccount($(this), AccountId);
});
