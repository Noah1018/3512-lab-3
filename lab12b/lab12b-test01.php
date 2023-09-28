<?php

include('includes/lab12b-test01.inc.php');

$weatherIcons = [
    "fog" => "wi-day-fog",
    "sunny" => "wi-day-sunny",
    "sleet" => "wi-day-sleet",
    "rain" => "wi-day-rain",
    "cloudy" => "wi-day-cloudy",
    "snow" => "wi-day-snow"
];

function outputDayForecast($day, $forecast, $weatherIcons) {
    return "<div>
                <h3>{$day}</h3>
                <p><i class='wi {$weatherIcons[$forecast[1]]}'></i></p>
                <p>{$forecast[0]}</p>
            </div>";
}

function outputCityBox($cityName, $cityData, $weatherIcons) {
    $cityBox = "<article class='box'>
                    <h1>{$cityName}</h1>
                    <div class='weather'>
                        <img src='images/{$cityName}.jpg' />
                        <div>
                            <h2>{$cityData[0]}</h2>
                            <p>{$cityData[1]}</p>
                        </div>
                    </div>
                    <section>";

    foreach ($cityData[2] as $day => $forecast) {
        $cityBox .= outputDayForecast($day, $forecast, $weatherIcons);
    }

    $cityBox .= "</section>
                </article>";

    return $cityBox;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>  
    <title>Lab 12b</title>   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">   
    <link rel="stylesheet" href="css/weather-icons.min.css">
    <link rel="stylesheet" href="css/lab12b-test01.css">
</head>
<body>
<main class="grid-container">
    <?php
    foreach ($weatherData as $cityName => $cityData) {
        echo outputCityBox($cityName, $cityData, $weatherIcons);
    }
    ?>
</main>
</body>
</html>
