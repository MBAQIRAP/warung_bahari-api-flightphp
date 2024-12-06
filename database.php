<?php
Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=warung_berlian_bahari', 'root', ''),function($db) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
});