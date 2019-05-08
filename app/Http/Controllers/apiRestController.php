<?php namespace leanStreamTest\Http\Controllers;
use Illuminate\Support\Facades\DB;
use leanStreamTest\Source;
use leanStreamTest\Article;
use leanStreamTest\Weather;
use App\Http\Controllers\torontoNewsController;


class apiRestController  extends Controller {

    private function CallAPiRest($url){
        //Atention!!
        //I used the curl because I am having problens to install the GuzzleHttp...

        $ch = curl_init();
        // define options
        $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
        );
        // apply those options
        curl_setopt_array($ch, $optArray);
        // execute request and get response
        $result = curl_exec($ch);
        // also get the error and response code
        $errors = curl_error($ch);
        $response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        curl_close($ch);
        return $result;
    }

    public function GetWeather(){
        Weather::truncate();
        $cities = array("Toronto", "Montreal", "Vancouver", "Edmonton");
        foreach($cities as $key=>$city) 
        { 
            $result = $this->CallAPiRest('https://samples.openweathermap.org/data/2.5/forecast/hourly?q='.$city.',ca&appid=b6907d289e10d714a6e88b30761fae22');
            $result = json_decode($result);
            foreach($result->list as $key=>$value){
                $weather = new Weather();
                $weather->dt = $value->dt;
                $weather->temp = $value->main->temp;
                $weather->temp_min = $value->main->temp_min;
                $weather->temp_max = $value->main->temp_max;
                
                $weather->pressure = $value->main->pressure;
                $weather->sea_level = $value->main->sea_level;
                $weather->grnd_level = $value->main->grnd_level;
                $weather->humidity = $value->main->humidity;
                $weather->temp_kf = $value->main->temp_kf;
                $weather->main = $value->weather[0]->main;
                $weather->description = $value->weather[0]->description;
                $weather->icon = $value->weather[0]->icon;
                $weather->all = $value->clouds->all;
                $weather->speed = $value->wind->speed;
                $weather->deg = $value->wind->deg;
                $weather->pod = $value->sys->pod;
                $weather->aldt_txtl = $value->dt_txt;
                $weather->city = $city;
                $weather->save();
            }
        } 

        return redirect()->action('weatherController@list');
    }

    public function GetUSADolar(){
        $json = $this->CallAPiRest('https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency=USD&to_currency=CAD&apikey=N8MJU6I1RZSM3H7D');
        $result_US_CA = json_decode($json,true);
        $result_US_CA['Realtime Currency Exchange Rate'];
        $result = array(0=>[
            "From_Currency_Code" => $result_US_CA['Realtime Currency Exchange Rate']['1. From_Currency Code'],
            "From_Currency_Name" => $result_US_CA['Realtime Currency Exchange Rate']['2. From_Currency Name'],
            "To_Currency_Code" => $result_US_CA['Realtime Currency Exchange Rate']['3. To_Currency Code'],
            "To_Currency_Name" => $result_US_CA['Realtime Currency Exchange Rate']['4. To_Currency Name'],
            "Exchange_Rate" => $result_US_CA['Realtime Currency Exchange Rate']['5. Exchange Rate'],
            "Last_Refreshed" => $result_US_CA['Realtime Currency Exchange Rate']['6. Last Refreshed'],
            "Time_Zone" => $result_US_CA['Realtime Currency Exchange Rate']['7. Time Zone'],
            "Bid_Price" => $result_US_CA['Realtime Currency Exchange Rate']['8. Bid Price'],
            "Ask_Price" => $result_US_CA['Realtime Currency Exchange Rate']['9. Ask Price']
        ]);
     
        $json = $this->CallAPiRest('https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency=CAD&to_currency=USD&apikey=N8MJU6I1RZSM3H7D');
        $result_CA_US = json_decode($json,true);
        $result += array( 1=>[
            "From_Currency_Code" => $result_CA_US['Realtime Currency Exchange Rate']['1. From_Currency Code'],
            "From_Currency_Name" => $result_CA_US['Realtime Currency Exchange Rate']['2. From_Currency Name'],
            "To_Currency_Code" => $result_CA_US['Realtime Currency Exchange Rate']['3. To_Currency Code'],
            "To_Currency_Name" => $result_CA_US['Realtime Currency Exchange Rate']['4. To_Currency Name'],
            "Exchange_Rate" => $result_CA_US['Realtime Currency Exchange Rate']['5. Exchange Rate'],
            "Last_Refreshed" => $result_CA_US['Realtime Currency Exchange Rate']['6. Last Refreshed'],
            "Time_Zone" => $result_CA_US['Realtime Currency Exchange Rate']['7. Time Zone'],
            "Bid_Price" => $result_CA_US['Realtime Currency Exchange Rate']['8. Bid Price'],
            "Ask_Price" => $result_CA_US['Realtime Currency Exchange Rate']['9. Ask Price']
        ]);
        return  view('exchange.list')->with('result', $result);
    }



   


    public function GetnewsToronto(){

        $result = $this->CallAPiRest('https://newsapi.org/v2/top-headlines?country=us&category=business&apiKey=2902402b7496401eaee91d191e403137');
        $result = json_decode($result);
        foreach($result->articles as $key=>$value){
            
            $source = Source::firstOrNew(array('name' => $value->source->name));
            $source->save();
            $source_id = $source->id;
            $source = Source::firstOrNew(array('name' => $value->source->name));

            $article = Article::firstOrNew(array(
                                        'source_id' => $source_id,
                                        'author'=> $value->author,
                                        'title'=> $value->title,
                                        'description'=> $value->description,
                                        'url'=> $value->url,
                                        'urlToImage'=> $value->urlToImage,
                                        'publishedAt'=>$value->publishedAt,
                                        'content'=> $value->content
                                         ));
            $article->save();

            return redirect()->action('torontoNewsController@list');

        }

    }

}