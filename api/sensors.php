<?php

  $dbHost = "localhost";
  $dbUser = "mysensors";
  $dbPass = "";
  $dbName = "mysensors";


  $dbHandler = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

  if($dbHandler->connect_error){
    die("Cannot connect to database: ".$dbHandler->connect_error);
  }

  $dbQuery = "SELECT s.id, s.type, s.name, s.lastSeen, sa.variableType, sa.metricType, sa.value, sa.previousValue FROM sensor as s INNER JOIN sensor_variable as sa ON s.id = sa.sensorDbId";
  $dbResult = $dbHandler->query($dbQuery);

  $result['sensors'] = Array();
  if($dbResult->num_rows > 0){
    while($line = $dbResult->fetch_assoc()){
      $result['sensors'][] = $line;
    }
  }

  $dbResult->free_result();
  $dbHandler->close();

  header('Content-Type: application/json');
  echo json_encode($result);
