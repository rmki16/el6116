<?php

/**
 * Configuration for database connection
 *
 */

$host       = "10.10.20.50";
$username   = "pesertakelasencrypteduser";
$password   = "pesertakelasencrypteduser";
$dbname     = "pesertakelasencrypted";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );
