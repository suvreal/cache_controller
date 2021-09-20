<!DOCTYPE html>
<html lang="cs-cz">
<head>
<meta charset="utf-8" />
<title>Product cache home project</title>
</head>
<body>
<?php
mb_internal_encoding("UTF-8");

/*Auto loader for each folder/directory*/
spl_autoload_register ( function ($class) {
    $sources = array("controller/$class.php","conf/$class.php", "view/$class.php");
        foreach ($sources as $source) {
            if (file_exists($source)) {
                require($source);
            }
        }
    }
);


ViewCacheData::cacheDataWriteout("Before processing", CacheController::cacheReturn());
$ParameterCheck = new ProductController; // init instance
ViewCacheData::cacheDataWriteout("After processing", CacheController::cacheReturn());


?>
</body>
</html>