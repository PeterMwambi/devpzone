<?php ?>
<div class="admin-header-image admin-overlay">
    <div class="container-fluid">
        <div class="d-flex justify-content-center mb-5">
            <div class="d-block mb-5 mt-wide bg-admin shadow-sm rounded p-5">
                <h1 class="admin-text  text-center">
                    Howdy <?php echo Session::getValue("username"); ?>
                </h1>
                <div class="d-flex justify-content-center">
                    <span class="admin-text text-center">Welcome to the administrators dashboard. Today is
                        <?php echo date("l d, F, Y");  ?></span>
                </div>
                <div class="search-form">
                    <form method="post" class="mt-2 mb-5">
                        <div class="d-flex">
                            <input type="search" placeholder="Type here to find something fast..." class="form-control" name="search-item">
                            <button type="submit" class="btn btn-warning ml-1 d-flex">
                                <div class="mr-2">
                                    <span>Search<span>
                                </div>
                                <div>
                                    <img class="img-fluid icon-sm" src="<?php echo Directories::getLocation("tools/assets/search.png"); ?>">
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>