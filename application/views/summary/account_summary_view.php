<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header" style="display: flex; justify-content: space-between;">
        <h2><i class="ion-ios-paper">&nbsp;Journal</i></h2>
        <h6 style="color: lightgreen;">Shown as GMT<?php echo $_SESSION['GMT']?></h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped" id="account_summary_journal">
            <thead>                       
              <th>Tickets</th>
              <th>Open Date</th>
              <th>Close Date</th>
              <th>Symbol</th>
              <th>Type</th>
              <th>Lots</th>
              <th>Outcome</th>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
      <hr />
      <div class="card-footer">
        <div class="col-sm-12 pl-0 display-flex">
          <div class="col-sm-3 pl-0">
            <div class="form-group">
              <label>Start date</label>
              <input type="text" class="form-control datepicker" id="journal_start_date">
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label>End date</label>
              <input type="text" class="form-control datepicker" id="journal_end_date">
            </div>
          </div>
          <div class="col-sm-3 item-align-center">
            <button class="btn btn-info" onclick="rasjt()">Search</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
​
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header" style="display: flex; justify-content: space-between;">
        <h2><i class="ion-calculator">&nbsp;Account History</i></h2>
        <h6 style="color: lightgreen;">Shown as GMT<?php echo $_SESSION['GMT']?></h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped" id="account_summary_history">
            <thead>                                 
              <th>Open D/T</th>
              <th>Close D/T</th>
              <th>Ticket</th>
              <th>Symbol</th>
              <th>Type</th>
              <th>Entry</th>
              <th>SL Price</th>
              <th>TP Price</th>
              <th>Commission</th>
              <th>Swap</th>
              <th>Exit Price</th>
              <th>Profit</th>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url('assets/js/page/account_summary.js')?>"></script>