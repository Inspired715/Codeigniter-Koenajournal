<div class="row">
  <div class="col-12">
    <div class="card author-box card-primary">
      <div class="card-body">
        <div class="author-box-left">
          <img alt="image" src="<?php echo $_SESSION['avatar']?>" class="rounded-circle author-box-picture">
          <div class="clearfix"></div>
        </div>
        <div class="author-box-details">
          <div class="author-box-name">
            <a href="#"><?php echo $_SESSION['username']?></a>
          </div>
          <div class="author-box-job"><?php echo $_SESSION['email']?></div>
          <div class="mb-2 col-12 pl-0 mt-3">
            <div class="form-group">
              <select class="form-control form-control-sm" id="user_time_zone">
                <option value="-14">GMT -14</option>
                <option value="-13">GMT -13</option>
                <option value="-12">GMT -12</option>
                <option value="-11">GMT -11</option>
                <option value="-10">GMT -10</option>
                <option value="-9">GMT -9</option>
                <option value="-8">GMT -8</option>
                <option value="-7">GMT -7</option>
                <option value="-6">GMT -6</option>
                <option value="-5">GMT -5</option>
                <option value="-4">GMT -4</option>
                <option value="-3">GMT -3</option>
                <option value="-2">GMT -2</option>
                <option value="-1">GMT -1</option>
                <option value="0">GMT +0</option>
                <option value="1">GMT +1</option>
                <option value="2">GMT +2</option>
                <option value="3">GMT +3</option>
                <option value="4">GMT +4</option>
                <option value="5">GMT +5</option>
                <option value="6">GMT +6</option>
                <option value="7">GMT +7</option>
                <option value="8">GMT +8</option>
                <option value="9">GMT +9</option>
                <option value="10">GMT +10</option>
                <option value="11">GMT +11</option>
                <option value="12">GMT +12</option>
                <option value="13">GMT +13</option>
                <option value="14">GMT +14</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary">Edit your Avatar</button>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <form id="AccountListingGridGrouped" class="table">
      <div class="row">
        <div class="col-xl-4 col-lg-4">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Billing</h4>
            </div>
            <div class="card-body">
              <div class="basic-form">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="" aria-label="" readonly>
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">Change</button>
                  </div>
                </div>
                <div class="mb-3">
                  <p>First Name</p>
                  <input
                    type="text"
                    class="form-control input-default"
                    id="fname_setting"
                    name="fname_setting"
                    value="<?php echo !empty($_SESSION['fname']) ? $_SESSION['fname']:'';?>"
                  />
                  <p class="required error" id="fname_setting-info"></p>
                </div>
                <div class="mb-3">
                  <p>Street</p>
                  <input
                    type="text"
                    class="form-control input-default"
                    id="street_setting"
                    name="street_setting"
                    value="<?php echo !empty($_SESSION['street']) ? $_SESSION['street']:'';?>"
                  />
                  <p class="required error" id="street_setting-info"></p>
                </div>
                <div class="mb-3">
                  <p>Country</p>
                  <input
                    type="text"
                    class="form-control"
                    id="country_setting"
                    name="country_setting"
                    value="<?php echo !empty($_SESSION['country']) ? $_SESSION['country']:'';?>"
                  />
                  <p class="required error" id="country_setting-info"></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Email</h4>
            </div>
            <div class="card-body">
              <div class="basic-form">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="" aria-label="" readonly>
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">Change</button>
                  </div>
                </div>
                <div class="mb-3">
                  <p>Last Name</p>
                  <input
                    type="text"
                    class="form-control input-default"
                    id="lname_setting"
                    name="lname_setting"
                    value="<?php echo !empty($_SESSION['lname']) ? $_SESSION['lname']:'';?>"
                  />
                  <p class="required error" id="lname_setting-info"></p>
                </div>
                <div class="mb-3">
                  <p>City</p>
                  <input
                    type="text"
                    class="form-control input-default"
                    id="city_setting"
                    name="city_setting"
                    value="<?php echo !empty($_SESSION['city']) ? $_SESSION['city']:'';?>"
                  />
                  <p class="required error" id="city_setting-info"></p>
                </div>
                <div class="mb-3">
                  <p>Zip Code</p>
                  <input
                    type="text"
                    class="form-control"
                    id="zipcode_setting"
                    name="zipcode_setting"
                    value="<?php echo !empty($_SESSION['zipcode']) ? $_SESSION['zipcode']:'';?>"
                  />
                  <p class="required error" id="zipcode_setting-info"></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Password</h4>
            </div>
            <div class="card-body">
              <div class="basic-form">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="" aria-label="" readonly>
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">Change</button>
                  </div>
                </div>
                <div class="mb-3">
                  <p>Phone</p>
                  <input
                    type="text"
                    class="form-control"
                    id="phone_setting"
                    name="phone_setting"
                    value="<?php echo !empty($_SESSION['phone']) ? $_SESSION['phone']:'';?>"
                  />
                  <p class="required error" id="phone_setting-info"></p>
                </div>
                <div class="mb-3">
                  <p>State/Region</p>
                  <!-- <input type="text" class="form-control input-default " placeholder="State/Region">  -->
                  <input
                    type="text"
                    class="form-control"
                    id="state_setting"
                    name="state_setting"
                    value="<?php echo !empty($_SESSION['state']) ? $_SESSION['state']:'';?>"
                  />
                  <p class="required error" id="state_setting-info"></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
              <button type="submit" class="btn btn-success"  style="float:right">Save</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<script src="<?php echo base_url('assets/js/page/profile.js')?>"></script>