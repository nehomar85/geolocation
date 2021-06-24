<?php
  //$host_name = 'db5002213297.hosting-data.io';
  $host_name = 'localhost';
  //$database = 'dbs1787467';
  $database = 'geolocalizacion';
  //$user_name = 'dbu1524215';
  $user_name = 'root';
  //$password = 'CanAnalytics2021*';
  $password = '';

  $Portal = new mysqli($host_name, $user_name, $password, $database);

  if ($Portal->connect_error) {
    die('Failed to connect to MySQL: '. $Portal->connect_error);
  }
?>