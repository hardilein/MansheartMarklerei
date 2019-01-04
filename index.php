<?php

define('AccessConstant', true);
require_once "./app/Controllers/SiteController.php";


require_once "./app/Views/Layout/header.php";

if(isset($content) && !empty($content)) require_once $content;

require_once "./app/Views/Layout/footer.php";

