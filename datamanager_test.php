<?php

require_once('Classes/DataManager.php');

$categories = DataManager::getInstance()->findCategoriesForUser(1);
var_dump($categories);

?>
