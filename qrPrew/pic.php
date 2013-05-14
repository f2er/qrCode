<?php

	include('config.php');

    $file= getPic($_GET['id']);

    echo "<img src='{$file}'>";
