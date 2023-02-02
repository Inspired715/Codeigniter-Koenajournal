<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header" style="display: flex; justify-content: space-between;">
        <h6 style="color: lightgreen;">Shown as GMT <?php echo $_SESSION['GMT']?></h6>
        <div>
          <input type="number" id="txtAccountId">
          <button class="btn btn-primary" id="addaccount">+</button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <table class="table table-striped" id="plan_users_list">
          <thead>                
            <th>Email</th>
            <th>Account ID</th>
            <th>Broker</th>
            <th>Added Date</th>
            <th>Pricing</th>
            <th>Due Date</th>
            <th>Status</th>
            <!-- <th>Delete</th> -->
          </thead>
          <tbody>
          </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12 col-md-4 col-lg-4">
  <?php if ($params['data']['planlist'][0]->plan_id == 1) { ?>
    <div class="pricing" id="1month" style="border: 2px solid rgba(0, 70, 191, 1);">
      <div class="pricing-padding">
        <div class="pricing-price">
          <div>1 Month</div>
        </div>
        
        <div class="pricing-details" style="font-size: 1.4rem ;">
          <div class="pricing-item">
            <div class="pricing-item-label">$14.99</div>
          </div>
          <div class="pricing-item">
            <div class="pricing-item-label">Full Access</div>
          </div>
          <div class="pricing-item">
            <div class="pricing-item-label">Support</div>
          </div>
        </div>
      </div>
      <div class="pricing-cta">
        <a href="#" id="stripe1">CURRENT PLAN <i class="fas fa-arrow-right"></i></a>
      </div>
  <?php } else { ?>
    <div class="pricing" id="1month">
      <div class="pricing-padding">
        <div class="pricing-price">
          <div>1 Month</div>
        </div>
        
        <div class="pricing-details" style="font-size: 1.4rem ;">
          <div class="pricing-item">
            <div class="pricing-item-label">$14.99</div>
          </div>
          <div class="pricing-item">
            <div class="pricing-item-label">Full Access</div>
          </div>
          <div class="pricing-item">
            <div class="pricing-item-label">Support</div>
          </div>
        </div>
      </div>
      <div class="pricing-cta">
        <a href="#" id="stripe1">GET <i class="fas fa-arrow-right"></i></a>
      </div>
  <?php } ?>
    </div>
  </div>
  <div class="col-12 col-md-4 col-lg-4">
  <?php if ($params['data']['planlist'][0]->plan_id == 2) { ?>
    <div class="pricing" id="6months" style="border: 2px solid rgba(0, 70, 191, 1);">
      <div class="pricing-padding">
        <div class="pricing-price">
          <div>6 Month</div>
        </div>
        <div class="pricing-details" style="font-size: 1.4rem;">
          <div class="pricing-item">
            <div class="pricing-item-label">$89.94 / $80.94</div>
          </div>
          <div class="pricing-item">
            <div class="pricing-item-label">Full Access</div>
          </div>
          <div class="pricing-item">
            <div class="pricing-item-label">Support</div>
          </div>
        </div>
      </div>
      <div class="pricing-cta" id="stripe" name="stripe2">
        <a href="#">Current Plan <i class="fas fa-arrow-right"></i></a>
      </div>
  <?php } else { ?>
    <div class="pricing" id="6months">
      <div class="pricing-padding">
        <div class="pricing-price">
          <div>6 Month</div>
        </div>
        <div class="pricing-details" style="font-size: 1.4rem;">
          <div class="pricing-item">
            <div class="pricing-item-label">$89.94 / $80.94</div>
          </div>
          <div class="pricing-item">
            <div class="pricing-item-label">Full Access</div>
          </div>
          <div class="pricing-item">
            <div class="pricing-item-label">Support</div>
          </div>
        </div>
      </div>
      <div class="pricing-cta" id="stripe" name="stripe2">
        <a href="#">GET <i class="fas fa-arrow-right"></i></a>
      </div>
  <?php } ?>
    </div>
  </div>
  <div class="col-12 col-md-4 col-lg-4">
  <?php if ($params['data']['planlist'][0]->plan_id == 3) { ?>
    <div class="pricing" id="12months" style="border: 2px solid rgba(0, 70, 191, 1);">
      <div class="pricing-padding">
        <div class="pricing-price">
          <div>12 Month</div>
        </div>
        <div class="pricing-details" style="font-size: 1.4rem;">
          <div class="pricing-item">
            <div class="pricing-item-label">$179.88 / $147.88</div>
          </div>
          <div class="pricing-item">
            <div class="pricing-item-label">Full Access</div>
          </div>
          <div class="pricing-item">
            <div class="pricing-item-label">Support</div>
          </div>
        </div>
      </div>
      <div class="pricing-cta" id="stripe" name="stripe3">
        <a href="#">CURRENT PLAN <i class="fas fa-arrow-right"></i></a>
      </div>
    <?php } else { ?>
    <div class="pricing" id="12months">
      <div class="pricing-padding">
        <div class="pricing-price">
          <div>12 Month</div>
        </div>
        <div class="pricing-details" style="font-size: 1.4rem;">
          <div class="pricing-item">
            <div class="pricing-item-label">$179.88 / $147.88</div>
          </div>
          <div class="pricing-item">
            <div class="pricing-item-label">Full Access</div>
          </div>
          <div class="pricing-item">
            <div class="pricing-item-label">Support</div>
          </div>
        </div>
      </div>
      <div class="pricing-cta" id="stripe" name="stripe3">
        <a href="#">GET <i class="fas fa-arrow-right"></i></a>
      </div>
    <?php } ?>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header" style="display: flex; justify-content: space-between;">
        <h2><i class="ion-calculator">&nbsp;Invoice</i></h2>
        <h6 style="color: lightgreen;">Shown as GMT<?php echo $_SESSION['GMT']?></h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped" id="plan_invoice_list">
            <thead>                                 
              <th>Invoice</th>
              <th>Invoice Date</th>
              <th>Start Date</th>
              <th>Due Date</th>
              <th>Total</th>
              <th>Status</th>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url('assets/js/page/plan.js')?>"></script>
