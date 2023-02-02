​
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header" style="display: flex; justify-content: space-between;">
        <h2>Sessions</h2>
        <div>
          <h6 style="color: lightgreen;">Shown as GMT <?php echo $_SESSION['GMT']?></h6>
          <select id="timezone" class="custom-select">
            <option>GMT<?php echo $_SESSION['GMT']?></option>
            <option>GMT-14</option>
            <option>GMT-13</option>
            <option>GMT-12</option>
            <option>GMT-11</option>
            <option>GMT-10</option>
            <option>GMT-9</option>
            <option>GMT-8</option>
            <option>GMT-7</option>
            <option>GMT-6</option>
            <option>GMT-5</option>
            <option>GMT-4</option>
            <option>GMT-3</option>
            <option>GMT-2</option>
            <option>GMT-1</option>
            <option>GMT+0</option>
            <option>GMT+1</option>
            <option>GMT+2</option>
            <option>GMT+3</option>
            <option>GMT+4</option>
            <option>GMT+5</option>
            <option>GMT+6</option>
            <option>GMT+7</option>
            <option>GMT+8</option>
            <option>GMT+9</option>
            <option>GMT+10</option>
            <option>GMT+11</option>
            <option>GMT+12</option>
            <option>GMT+13</option>
            <option>GMT+14</option>
          </select>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped" id="tableBrokerTimeZone">
            <thead>                                 
              <th style="display: flex; flex-direction: column; width: 18rem; height:100px; padding: 10px">
                <div style="display: flex;">
                  <p> Best Hour   <span id='maxHourGMT'></span>
                  <span class="badge light badge-primary" id='maxProfit' style="cursor:pointer;" onclick="modalBestWorstHrSession('max')"></span> </p>
                </div>
                <div style="display: flex;">
                  <p> Worst Hour   <span id='minHourGMT'></span>
                  <span class="badge light badge-danger" id='minProfit' style="cursor:pointer;" onclick="modalBestWorstHrSession('min')"></span> </p>
                </div>
              </th>
              <th>Australia Sydney</th>
              <th>Sydney & Tokyo</th>
              <th>Asia Tokyo</th>
              <th>Tokyo & London</th>
              <th>Europe London</th>
              <th>London & New York</th>
              <th>America New York</th>
              <th>Total</th>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url('assets/js/page/timezone.js')?>"></script>