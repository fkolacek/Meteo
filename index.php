<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title><?php echo $_SERVER['SERVER_NAME']; ?> - Dashboard</title>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <!--meta http-equiv="refresh" content="20;url=/meteo.php"-->
  <link rel="stylesheet" title="Default" href="/css/meteo.css" media="screen, projection, handheld" />
  <style type="text/css">

  </style>
</head>
<body>
  <div id="wrapper">
    <div id="clock" class="box">
      <div class="box-wrapper">
        <span id="time" class="value">Current time</span>
        <span id="date" class="title">Current date</span>
        <span id="weeknumber" class="description">Week number</span>
      </div>
    </div>
    <div id="inside" class="box temp">
      <div class="box-wrapper">
        <span class="value"></span>
        <span class="title">Inside</span>
        <span class="description"></span>
      </div>
    </div>
    <div id="outside" class="box temp">
      <div class="box-wrapper">
        <span class="value"></span>
        <span class="title">Outside</span>
        <span class="description"></span>
      </div>
    </div>
    <div id="forecast">
      <div id="current">
        <div class="box-wrapper">
          <table style="border: 0px solid red;" border="0">
            <tr>
              <td rowspan="2"><img id="current-icon" src="" width="120" height="120" alt="image" /></td>
              <td id="current-temp"></td>
            </tr>
            <tr>
              <td id="current-description"></td>
            </tr>
            <tr>
              <th>Min / max:</th>
              <td id="current-min-max"></td>
            </tr>
            <tr>
              <th>Wind:</th>
              <td id="current-wind"></td>
            </tr>
            <tr>
              <th>Humidity:</th>
              <td id="current-humidity"></td>
            </tr>
            <tr>
              <th>Pressure:</th>
              <td id="current-pressure"></td>
            </tr>
          </table>
        </div>
      </div>
      <div id="week">
        <div id="day1" class="day">
          <div class="day-wrapper">
            <span class="name"></span>
            <img class="icon" src="" width="95" height="95" alt="image" />
            <span class="temp"></span>
            <span class="day-night"></span>
            <span class="wind"></span>
            <span class="pressure"></span>
          </div>
        </div>
        <div id="day2" class="day">
          <div class="day-wrapper">
            <span class="name"></span>
            <img class="icon" src="" width="95" height="95" alt="image" />
            <span class="temp"></span>
            <span class="day-night"></span>
            <span class="wind"></span>
            <span class="pressure"></span>
          </div>
        </div>
        <div id="day3" class="day">
          <div class="day-wrapper">
            <span class="name"></span>
            <img class="icon" src="" width="95" height="95" alt="image" />
            <span class="temp"></span>
            <span class="day-night"></span>
            <span class="wind"></span>
            <span class="pressure"></span>
          </div>
        </div>
        <div id="day4" class="day">
          <div class="day-wrapper">
            <span class="name"></span>
            <img class="icon" src="" width="95" height="95" alt="image" />
            <span class="temp"></span>
            <span class="day-night"></span>
            <span class="wind"></span>
            <span class="pressure"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/meteo.js"></script>
</body>
</html>
