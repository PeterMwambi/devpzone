<?php

use Models\Core\Config\Directories;

session_start();

session_destroy();

header("location:../../../../public/?page=forms&auth=guest&action=login");