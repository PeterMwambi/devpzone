<form method="post">
    <div class="d-flex">
        <div>
            <input type="text" placeholder="<?php echo "Enter " . ucfirst($reference) . " name or id"; ?>" class="form-control" name="search-item">
        </div>
        <div class="ml-2">
            <button type="submit" class="btn btn-dark d-flex">
                <div class="">
                    <span>Search<span>
                </div>
                <div>
                    <img class="img-fluid icon-sm" src="<?php echo Directories::getLocation("tools/assets/search.png"); ?>">
                </div>
            </button>
        </div>
    </div>
</form>