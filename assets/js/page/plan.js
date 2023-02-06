$(".bootstrapSwitch .switchBox").click(function () {
  if ($(this).is(":checked")) {
    $(this).attr("checked", true);
    $(this).parent().removeClass("checkWrapNO");
    $(this).parent().addClass("checkWrap");
    $(".bootstrapSwitch .checkWrap .checkBoxValue").text("Active");
  } else {
    $(this).removeAttr("checked");
    $(this).parent().removeClass("checkWrap");
    $(this).parent().addClass("checkWrapNO");
    $(".bootstrapSwitch .checkWrapNO .checkBoxValue").append("Not Active");
  }
});

function getUserAccountList() {
  var cDate = new Date();
  $("#plan_users_list").DataTable({
    destroy: true,
    ajax: function (data, callback, settings) {
      $.ajax({
        url: BASE_URL + "/profile/getUserAccountList",
        method: "POST",
        success: function (response) {
          response = JSON.parse(response);
          callback(response);
        },
      });
    },
    columns: [
      { data: "email" },
      {
        //data: "account_id"
        render: function (data, type, full, meta) {
          return (
            '<a href="#" onclick="selectAccount(' +
            full.account_id +
            ')">' +
            full.account_id +
            "</a>"
          );
        },
      },
      {
        data: "broker",
      },
      { data: "created_date" },
      { data: "price" },
      { data: "end_date" },
      {
        //data: "ReasonForOutcome"
        render: function (data, type, full, meta) {
          var checkedacc = full.is_active == "1" ? "checked" : "";
          var calss_checked =
            full.is_active == "1" ? "checkWrap" : "checkWrapNO";
          var active_checked = full.is_active == "1" ? "Active" : "Not Active";
          return (
            '<div class="togglebutton"><label class="' +
            calss_checked +
            '"><input class="switchBox " type="checkbox" ' +
            checkedacc +
            ' data-accountid="' +
            full.account_id +
            '" /><span class="toggle"></span><span class="checkBoxValue">' +
            active_checked +
            "</span></label></div>"
          );
        },
      },
      {
        //data: "HowICanImprove"
        render: function (data, type, full, meta) {
          return (
            '<button type="button" class="btn btn-danger p-1 deleteAccount" data-accountid="' +
            full.account_id +
            '"><i class="material-icons">delete</i></a></button>'
          );
        },
      },
    ],
  });
}

function UpdateAccount(Sender, AccountId) {
  var Status = $(Sender).is(":checked") ? "Activate" : "DeActivate";
  if (confirm("Are you sure you want to " + Status + " the account?")) {
    $.ajax({
      url: BASE_URL + "profile/updateAccountStatus",
      method: "POST",
      data: {
        account_id: AccountId,
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

function delectAccount(account_id) {
  if (confirm("Are you sure you want to delete this account?")) {
    $.ajax({
      url: BASE_URL + "profile/delectAccount",
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
        getUserAccountList();
      },
    });
  }
}

function getUserInvoices(current_account_id) {
  var cDate = new Date();
  $("#plan_invoice_list").DataTable({
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
        url: BASE_URL + "profile/getUserInvoices",
        method: "POST",
        success: function (response) {
          response = JSON.parse(response);
          callback(response);
        },
      });
    },
    columns: [
      { data: "payment_reference_id" },
      {
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

$("#addaccount").click(function () {
  AddAccount();
});

$(document).ready(function () {
  getUserAccountList();
  getUserInvoices();
});
