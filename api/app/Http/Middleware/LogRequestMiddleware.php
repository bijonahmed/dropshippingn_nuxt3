<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use Torann\GeoIP\Facades\GeoIP;
use Illuminate\Support\Facades\Auth;
use App\Models\Log as logModel;

class LogRequestMiddleware
{

    public function handle($request, Closure $next)
    {


        $user = auth('api')->user();
        // Get the user login ID if available
        $userId = !empty($user) ? $user->id : null;

        // Get the IP address and country
        $ipAddress = $request->ip();
        $country = $this->getCountryFromIp($ipAddress);
        // Log the request details
        $logData = [
            'user_id' => $userId,
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'parameters' => json_encode($request->all()),
            'ip' => $ipAddress,
            'country' => $country,
        ];

        // Store the log in the database
        logModel::create($logData);

        return $next($request);
    }

    // Function to get country from IP address
    private function getCountryFromIp($ip)
    {
        //$ip = '5.193.226.195'; for testing dubai IP
        $ipdat = @json_decode(file_get_contents( 
            "http://www.geoplugin.net/json.gp?ip=" . $ip)); 
           
        $CountryName    = $ipdat->geoplugin_countryName; 
        //$CountryName    = $ipdat->geoplugin_countryName . "\n"; 
        $CityName       = $ipdat->geoplugin_city . "\n"; 
        $ContinentName  = $ipdat->geoplugin_continentName . "\n"; 
        $Latitude       = $ipdat->geoplugin_latitude . "\n"; 
        $Longitude      = $ipdat->geoplugin_longitude . "\n"; 
        $CurrencySymbol = $ipdat->geoplugin_currencySymbol . "\n"; 
        $CurrencyCode   = $ipdat->geoplugin_currencyCode . "\n"; 
        $Timezone       = $ipdat->geoplugin_timezone; 

        $location = "$CountryName";
        //$location = "Country: $CountryName, City: $CityName, Continent: $ContinentName, Latitude: $Latitude, Longitude: $Longitude, Currency Symbol: $CurrencySymbol, Currency Code: $CurrencyCode, Timezone: $Timezone";
        return $location;
    }
}
