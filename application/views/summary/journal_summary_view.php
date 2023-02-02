<div class="row">
  <div class="col-12 col-md-6 col-lg-8">
    <div class="card">
      <div class="card-header" style="display: flex; flex-direction: column; align-items: flex-start;">
        <h3><i class="ion-social-chrome-outline">&nbsp;Strategy Strength</i></h3>
      </div>
      <div class="card-body">
        <canvas id="general_strategy_strength_chart"></canvas>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6 col-lg-4">
    <div class="card">
      <div class="card-header">
        <div class="col-md-12" style="display: inline-flex; flex-direction: row; justify-content: space-between;" >
          <div><h4>Trades taken</h4>
            <br/><div id="taken" class="taken-text"></div>
          </div>
          <div>Vs</div>
          <div><h4>Trades Journaled</h4>
            <br /><div id="jounal" class="taken-text"></div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <canvas id="general_trades_chart"></canvas>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header" style="display: inline-flex; justify-content: space-between;">
        <h3><i class="ion-ios-paper">&nbsp;Journal</i></h3>
        <h6>Shown as GMT<?php echo $_SESSION['GMT']?></h6>
      </div>
      <div class="card-body">
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
            <button class="btn btn-info" onclick="getJournalTable()">Search</button>
          </div>
        </div>
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#grid_all" role="tab" aria-controls="all-tab" aria-selected="true">All</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#grid_group" role="tab" aria-controls="group-tab" aria-selected="false">Group</a>
          </li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane fade show active" id="grid_all" role="tabpanel" aria-labelledby="all-tab">
            <div class="table-responsive">
              <table class="table table-striped" id="journal_grid_all" style="width: 100%;">
                <thead>
                    <th>Time</th>
                    <th>Symbol</th>
                    <th>Outcome</th>
                    <th>Strategy Used</th>
                    <th>Reason for Entry</th>
                    <th>Reason for Outcome</th>
                    <th>How can I improve</th>
                    <th>Summary</th>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="grid_group" role="tabpanel" aria-labelledby="group-tab">
            <div class="table-responsive">
              <table class="table table-striped" id="journal_grid_group" style="width: 100%;">
                <thead>
                    <th></th>
                    <th>Time</th>
                    <th>Symbol</th>
                    <th>Outcome</th>
                    <th>Strategy Used</th>
                    <th>Reason for Entry</th>
                    <th>Reason for Outcome</th>
                    <th>How can I improve</th>
                    <th>Summary</th>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url('assets/js/page/journal_summary.js')?>"></script>