"use strict";

var baseGMT = _baseGMT;
var profileGMT = _baseGMT;

function _buysellBage(value) {
  var res = '';
  if (value=='Buy') {
    res = '<span class="badge light badge-success">Buy</span>';
    } else if (value=='Sell') {
      res = '<span class="badge light badge-info">Sell</span>';
    }
  return res;
}

function _wonlossBage(value, show=false) {
  var res = (Number(value) > 0) 
    ? '<span class="badge light badge-primary">WON</span>'
    : '<span class="badge light badge-info">LOSS</span>';
  if (show) {
    res = res + '&nbsp;' + ((Number(value) > 0 ) ? '+' : '') +  value;
    }
    return res;
}

function _dateTZ(date, baseGMT, profileGMT, show=true) {
  var o_date = new Date(date);
  const diff = profileGMT - baseGMT;
  if (diff!=0) { o_date.setTime(o_date.getTime() + diff * 60 * 60 * 1000); }
  return o_date.toLocaleString('en-US', { year:'numeric', month:'short', day:'2-digit', hour:'2-digit', minute:'2-digit', second:'2-digit'}) +
   (show ? 
      ((diff!=0) ? "&nbsp;<small class='colorGreen'>" + ( (diff>0) ? '+' : '') + diff + " hours</small>" : '')
      : '');
   }

function getAccountHistory() {
  $("#account_summary_history").DataTable({
    language: {
      paginate: {
        next: '&#62;', // or '→'
        previous: '&#60;' // or '←' 
      }
    },
    order: [[5, 'asc']],
    ajax: function (data, callback, settings) {
      $.ajax({
        url: BASE_URL + "summary/getAccountHistory",
        method: "POST",
        data: {
          account_id: _account_id,
          plan_id: _plan_id,
        },
        success: function (response) {
          response = JSON.parse(response);
          callback(response);
        }
      });
    },
    columns: [
      { data: "OpenTime",  render: function(d) {
        return _dateTZ(d, baseGMT, profileGMT);
      }},
      { data: "CloseTime",  render: function(d) {
        return _dateTZ(d, baseGMT, profileGMT);
      }},
      { data: "OrderNumber" },
      { data: "Symbol" },
      {
        data: "OrderType",
        render: function (d) {
          if (d == "Buy") {
            return '<span class="badge light badge-success">Buy</span>';
          } else {
            return '<span class="badge light badge-info">Sell</span>';
          }
        },
      },

      { data: "EntryPrice",
        render: function(d) {
          return Number(d).toFixed(4);
        } },
      { data: "SLPrice",
        render: function(d) {
          return Number(d).toFixed(4);
        } },
      { data: "TPPrice",
        render: function(d) {
          return Number(d).toFixed(4);
        } },
      { data: "Commission" },
      { data: "Swap",
        render: function(d) {
          return Number(d).toFixed(2);
        } },
      { data: "ExitPrice",
        render: function(d) {
          return Number(d).toFixed(4);
        } },
      { data: "Profit" },
    ],
  });
}

function getAccountSummaryJournal() {
  $("#account_summary_journal").DataTable({
    language: {
      paginate: {
        next: '&#62;', // or '→'
        previous: '&#60;' // or '←' 
      }
    },
    order: [[5, 'asc']],
   ajax: function (data, callback, settings) {
      $.ajax({
        url: BASE_URL + '/summary/getAccountSummaryJournal',
        method: "POST",
        data: {
          account_id: _account_id,
          start_date: $("#journal_start_date").val(),
          end_date: $("#journal_end_date").val(),
          symbols: ""
        },
        success: function (response) {
          response = JSON.parse(response);
          callback(response);
        }
      });
    },
    columns: [
      { data: "ticket" },
      { data: "opentime", render: function(d) {
        return _dateTZ(d, baseGMT, profileGMT,false);
        }},
      { data: "closetime", render: function(d) {
        return _dateTZ(d, baseGMT, profileGMT,false);
        }},

      { data: "symbol" },
      {
        data: "type",
        render: function (d) {
          return _buysellBage(d);
        },
      },

      { data: "lots" },
      {
        data: "outcome",
        render: function (d) {
          return _wonlossBage(d, true);
        },
      },
    ],
  });
}

function rasjt(){
  $("#account_summary_journal").DataTable().ajax.reload();
}

$('#accounts').change(function(){
  $('#reload').trigger("click");
});

$('#reload').click(
  function reload() {
    window.location = BASE_URL + '/summary/account?ac=' + $('#accounts').val();
  }
);

$(document).ready(function(){
  getAccountHistory();
  getAccountSummaryJournal();
});