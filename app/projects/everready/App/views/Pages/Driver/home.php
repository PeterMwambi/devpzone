  <?php
    $links = Config::getLinks("DRIVER");
    ?>

  <div class="d-flex justify-content-center">
      <div class="alert col-md-5 col-12 alert-danger form-alert d-none">
          <div class="d-flex justify-content-center">
              <h4 class="text-center form-alert-heading"></h4>
          </div>
          <div class="d-flex justify-content-center">
              <span class="form-alert-text text-center"></span>
          </div>
          <div class="d-flex justify-content-center mt-2">
              <?php for ($x = 0; $x <= 4; $x++) { ?>
                  <span class="spinner-grow spinner-grow-sm mr-2 d-none"></span>
              <?php } ?>
          </div>
      </div>
  </div>
  <?php
    $linkGroupNames = $links["name"];
    $icons = $links["icons"];
    $linkItems = $links["nameGroup"];
    $addActionGroup = $links["actionGroups"]["add"];
    $viewActionGroup = $links["actionGroups"]["view"];
    $deleteActionGroup = $links["actionGroups"]["delete"];
    $headerReference = $links["href"];

    ?>
  <div class="row">
      <?php foreach ($linkGroupNames as $linkGroupName) { ?>
          <div class="col-12 mt-3 col-md-4">
              <div class="card border-top-blue shadow-lg">
                  <div class="card-header">
                      <div class="d-flex">
                          <div class="mr-1">
                              <img src="<?php echo $icons[$linkGroupName]  ?>" class="img-fluid icon-sm">
                          </div>
                          <div>
                              <h5 class="text-darkaliceblue"><?php echo ucfirst($linkGroupName); ?></h5>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                      <?php foreach ($linkItems[$linkGroupName] as $linkItem) { ?>
                          <div class="mt-3">
                              <a class="text-nowrap btn btn-outline-dark" href="<?php echo $headerReference[$linkItem] ?>">
                                  <div class="d-flex">
                                      <div>
                                          <img src="<?php ?>" class="img-fluid icon-sm">
                                      </div>
                                      <div class="mt-half">
                                          <?php echo ucfirst($linkItem); ?>&#x2192;
                                      </div>
                                  </div>
                              </a>
                          </div>
                      <?php } ?>
                  </div>
              </div>
          </div>
      <?php } ?>
  </div>