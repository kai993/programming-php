<?php
require('YoutubeCategoryAPI.php');

function main()
{
    $api = new YoutubeCategoryAPI();
    $api->do();
    $res = $api->toJSON();
    echo $res;
}

main();
