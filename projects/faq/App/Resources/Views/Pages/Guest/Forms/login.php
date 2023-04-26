<?php
use Models\Core\Config\Directories;

?>
<div class="d-flex justify-content-center">
    <div class="faq-admin__LoginForm col-md-3 col-11">
        <?php
        require_once(Directories::GetFilePath("Resources/views/includes/forms/admin/Login.php"));
        ?>
    </div>
</div>