  <div class="modal fade progress-modal" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
      <div class="modal-dialog  modal-sm">
          <div class="modal-content bg-banner">
              <div class="modal-body">
                  <div class="d-flex justify-content-center mb-lg-3">
                      <div>
                          <img src="<?php echo Directories::getLocation("tools/assets/icon.png") ?>" class="img-fluid icon-sm">
                      </div>
                      <div>
                          <img src="<?php echo Directories::getLocation("tools/assets/title.png") ?>" class="img-fluid title-sm">
                      </div>
                  </div>
                  <p class="text-center confirm-text">Please Wait...
                  </p>
                  <div class="d-flex justify-content-center">
                      <?php for ($x = 0; $x <= 4; $x++) { ?>
                          <span class="spinner-grow text-dark response-request spinner-grow-sm mb-3 ml-2"></span>
                      <?php } ?>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="modal fade action-modal" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content bg-banner">
              <div class="modal-header">
                  <div class="d-flex justify-content-center">
                      <div class="mt-lg-1">
                          <img src="<?php echo Directories::getLocation("tools/assets/calendar.png") ?>" class="img-fluid icon mb-lg-1 date-icon">
                          <img src="<?php echo Directories::getLocation("tools/assets/warning.png") ?>" class="img-fluid icon mb-lg-1 warning-icon">
                      </div>
                      <h1 class="heading">Warning</h1>
                  </div>
              </div>
              <div class="modal-body">
                  <p class="text-justify action-message">
                  </p>
                  <div class="date-select-bar d-none">
                      <div class="d-flex">
                          <div class="col-md-4">
                              <small>Date</small>
                              <select name="date" class="form-control day">
                                  <?php
                                    $start_date = strtotime("01");
                                    $end_date = strtotime("+31 days", $start_date);

                                    while ($start_date < $end_date) {
                                        $start_date = strtotime("+1 day", $start_date);
                                        echo "<option value='" . date("d", $start_date) . "'" . ">" .
                                            date("d", $start_date) . "</option>";
                                    }
                                    ?>
                              </select>
                          </div>
                          <div class="col-md-4">
                              <small>Month</small>
                              <select name="month" class="form-control month">
                                  <?php
                                    $start_month = strtotime("January");
                                    $end_month = strtotime("+11 months", $start_month);

                                    while ($start_month <= $end_month) {
                                        $start_month = strtotime("+1 month", $start_month);
                                        echo "<option value='" . date("m", $start_month) . "'" . ">" .
                                            date("m", $start_month) . "</option>";
                                    }
                                    ?>
                              </select>
                          </div>
                          <div class="col-md-4">
                              <small>Year</small>
                              <select name="year" class="form-control year">
                                  <?php
                                    $start_year = 2019;
                                    $end_year = date("Y");
                                    while ($start_year <= $end_year) {
                                        echo "<option value='" . $start_year . "'" . ">"
                                            . $start_year . "</option>";
                                        $start_year++;
                                    }
                                    ?>
                              </select>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <div class="row delete-action-bar">
                      <div class="col-md-6">
                          <a class="btn btn-danger confirm text-nowrap d-flex" href="javascript:void(0)">
                              <div class="mr-2">
                                  <img class="img-fluid icon-sm" src="<?php echo Config::getIcon("delete") ?>">
                              </div>
                              <div>
                                  Delete
                              </div>
                          </a>
                      </div>
                      <div class="col-md-6">
                          <a class="btn btn-dark text-nowrap d-flex" data-dismiss="modal" href="javascript:void(0)">
                              <div class="mr-2">
                                  <img class="img-fluid icon-sm" src="<?php echo Config::getIcon("cancel") ?>">
                              </div>
                              <div>
                                  Cancel
                              </div>
                          </a>
                      </div>
                  </div>
                  <div class="row date-select-action-bar d-none">
                      <div class="col-md-6">
                          <a class="btn btn-warning get-comment text-nowrap" href="javascript:void(0)"><img class="img-fluid icon-sm" src="<?php echo Directories::getLocation("tools/assets/calendar.png"); ?>">Search By Date</a>
                      </div>
                      <div class="col-md-6">
                          <a class="btn btn-dark dismiss" data-dismiss="modal" href="javascript:void(0)"><img class="img-fluid icon-sm" src="<?php echo Directories::getLocation("tools/assets/recycle.png"); ?>"> Dismiss Action</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="modal fade confirm-action" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-body">
                  <div class="d-flex justify-content-center">
                      <div>
                          <img src="<?php echo Directories::getLocation("tools/assets/icon.png") ?>" class="img-fluid icon-sm">
                      </div>
                      <div>
                          <img src="<?php echo Directories::getLocation("tools/assets/title.png") ?>" class="img-fluid title-sm">
                      </div>
                  </div>
                  <div class="mt-3">
                      <p class="text-center confirm-action-text">
                      </p>
                  </div>
                  <div class="d-flex justify-content-center">
                      <span class="spinner-grow confirm-action-spinner text-dark spinner-grow-sm d-none mb-3 ml-2"></span>
                      <span class="spinner-grow confirm-action-spinner text-dark spinner-grow-sm d-none mb-3 ml-2"></span>
                      <span class="spinner-grow confirm-action-spinner text-dark spinner-grow-sm d-none mb-3 ml-2"></span>
                      <span class="spinner-grow confirm-action-spinner text-dark spinner-grow-sm d-none mb-3 ml-2"></span>
                      <span class="spinner-grow confirm-action-spinner text-dark spinner-grow-sm d-none mb-3 ml-2"></span>
                  </div>
                  <div class="d-flex justify-content-center">
                      <div class="confirm-action-buttons">
                          <a class="btn btn-warning confirm-action-proceed mr-2" href="javascript:void(0)">Proceed</a>
                          <a class="btn btn-dark" href="javascript:void(0)" data-dismiss="modal">Cancel</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>