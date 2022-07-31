<?php

$query = $_POST['busca'];

$page = "location: index.php?page=busca&query=".$query;

header($page);
