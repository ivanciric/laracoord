<?php

namespace Laracoord;

use App\Http\Controllers\Controller;

/**
 * Geolocation calculations
 *
 * @author Ivan Ciric
 */
class Laracoord extends Controller
{
    /**
     *
     * @param array $from (lon and lat elements as floats)
     * @param array $to (lon and lat elements as floats)
     * @param string $units (m || km Default: km)
     * @return int
     */
    public static function getDistance($from = [], $to = [], $units = 'km')
    {
        if (!self::checkParams($from, $to, $units)) {
            return false;
        };

        $earth_radius = ($units == 'km') ? 6371 : (($units == 'm') ? 6371000 : 6371); // km 6371, m 6371000

        return self::calculate($from, $to, $earth_radius);

    }

    private static function checkParams($from, $to, $units)
    {
        if ($units != 'km' && $units != 'm') {
            return false;
        }

        if (is_array($from)
            && isset($from['lon'])
            && isset($from['lat'])
            && (is_int($from['lat']) || is_float($from['lat']))
            && (is_int($from['lon']) || is_float($from['lon']))
            && is_array($to)
            && isset($to['lon'])
            && isset($to['lat'])
            && (is_int($to['lat']) || is_float($to['lat']))
            && (is_int($to['lon']) || is_float($to['lon']))
        ) {

            return true;

        } else {

            return false;
        }


    }

    private static function calculate($from, $to, $earth_radius)
    {
        $dLat = deg2rad($to['lat'] - $from['lat']);
        $dLon = deg2rad($to['lon'] - $from['lon']);

        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($from['lat'])) * cos(deg2rad($to['lat'])) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * asin(sqrt($a));
        $d = $earth_radius * $c;


        return ceil($d);
    }

}
