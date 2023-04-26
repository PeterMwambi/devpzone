<?php


class Banner
{
    public static $banner;

    public static function setBanner($key)
    {
        self::$banner = Config::getBanner($key);
    }
    public static function getBanner()
    {
        return self::$banner;
    }
    public static function heading()
    {
        if (!empty(self::$banner)) {
            return self::$banner["heading"];
        }
        return "";
    }
    public static function description()
    {
        if (!empty(self::$banner)) {
            return self::$banner["description"];
        }
        return "";
    }
    public static function actions()
    {
        if (!empty(self::$banner)) {
            foreach (self::$banner["actions"] as $action) {
                return self::$banner["actions"];
            }
        }
        return "";
    }
    public static function links()
    {
        if (!empty(self::$banner)) {
            return self::$banner["links"];
        }
        return "";
    }
}



Banner::setBanner("intro");
?>






<div class="card mt-lg-3 bg-banner">
    <div class="card-body">
        <div class="d-flex justify-content-center">
            <h1 class="admin-heading"><?php echo Banner::heading() ?></h1>
        </div>
    </div>
    <div class="d-block">
        <div class="d-flex justify-content-center">
            <h6 class="text-dark">Quick actions</h6>
        </div>
        <div class="row mb-4 ml-3">
            <?php foreach (Banner::actions() as $action) { ?>
                <div class="col-6 mt-2 col-md-2 col-sm-4">
                    <div class="d-flex justify-content-left mt-md-3">
                        <a class="text-nowrap" href="<?php echo Banner::links()[$action]; ?>"> <?php echo $action ?> &#x2192; </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>