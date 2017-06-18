<?php

  date_default_timezone_set('Europe/Prague');

  DEFINE("API_ID", '');
  DEFINE("API_URL",'http://api.openweathermap.org/data/2.5/forecast/daily' );
  DEFINE("API_LOCATION", 'Brno');
  DEFINE("API_FILE", 'data/weather-forecast.data');
  DEFINE("API_TIMEOUT", 60);

  $refresh = false;
  if(file_exists(API_FILE)){
    $dataRaw = file_get_contents(API_FILE);
    $data = json_decode($dataRaw, true);

    $seconds = time() - intval($data['lastSeen']);

    if($seconds > API_TIMEOUT)
      $refresh = true;
  }
  else
    $refresh = true;

  if($refresh){
    $API_QUERY = sprintf("%s?q=%s&appid=%s", API_URL, API_LOCATION, API_ID);
    $dataRaw = file_get_contents($API_QUERY);
    $data = json_decode($dataRaw, true);

    $resultRaw = Array(
      'lastSeen' => time(),
      'data' => $data
    );

    $result = json_encode($resultRaw);

    file_put_contents(API_FILE, $result);
  }
  else
    $result = file_get_contents(API_FILE);

  header('Content-Type: application/json');
  echo $result;

