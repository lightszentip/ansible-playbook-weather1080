<?php
/**
 * User: lightszentip
 * Date: 30.04.16
 */
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require_once("db.php");

//assigning my default database information
define('DB_HOST','****');
define('DB_USER','****');
define('DB_PASS','****');
define('DB_NAME','****');

date_default_timezone_set('UTC');

//instantiate class; if no array is provided, the defaults are used
$database = new DB(array('name'=>DB_NAME,'user'=>DB_USER,'password'=>DB_PASS,'host'=>DB_HOST));

$data = file_get_contents("/home/pi/weather/weather-data/temp/uploads/liveCopy.json");
$json = json_decode($data,true);

foreach($json['data'] as $e){
    foreach ($e as $key => $data) {
        //var_dump($data);

        $date = DateTime::createFromFormat('m/d/Y H:i', $key);
        $date->setTimeZone(new DateTimeZone('UTC'));

        $options=array(
            'id'=> $date->format("U"),
            'timekey'=> $date->format("Y-m-d H:i:s"),
            'tempin'=> str_replace(",",".",$data['TempIn']),
            'tempout'=> str_replace(",",".",$data['TempOut']),
            'feelslike'=> str_replace(",",".",$data['FeelsLike']),
            'humidityin'=> str_replace(",",".",$data['HumidityIn']),
            'humidityout'=> str_replace(",",".",$data['HumidityOut']),
            'dewpoint'=> str_replace(",",".",$data['DewPoint']),
            'winddirection'=> $data['WindDirection'],
            'windavg'=> $data['WindAvg'],
            'windgust'=> $data['WindGust'],
            'windchill'=> str_replace(",",".",$data['WindChill']),
            'rain'=> str_replace(",",".",$data['Rain']),
            'abspressure'=> str_replace(",",".",$data['AbsPressure']),
            'rainwhole'=> str_replace(",",".",data['RainWhole'])

        );

        $database->insert_ignore('daten',$options);

    };

};
/*
 * (
                            [TempIn] => 24
                            [TempOut] => 13,0
                            [FeelsLike] => 11,3
                            [HumidityIn] => 42
                            [HumidityOut] => 61
                            [DewPoint] => 5,7
                            [WindDirection] =>  ONO
                            [WindAvg] => 2
                            [WindGust] => 3
                            [WindChill] => 13,0
                            [Rain] => 0,0
                            [AbsPressure] => 963,4
                        )

 */
?>
