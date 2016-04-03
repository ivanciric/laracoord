Laracoord
=======

Calculate distance between two points on a globe.

getDistance() method:

No dependencies, just pass sets of coordinates to calculate distance between places.

Installation:

Add 

    "ivanciric/laracoord": "dev-master" 
    
to composer "require" array.

Run "composer update".

You can now use the class:

    $g = Laracoord::getDistance(
                [
                    'lon' => 25.3892,
                    'lat' => 35.3172
                ],
                [
                    'lon' => 28.3892,
                    'lat' => 37.3172
                ],
                'km'
            );
    
    dd($g);


Related links:

http://mathworld.wolfram.com/Haversine.html

http://www.codecodex.com/wiki/Calculate_distance_between_two_points_on_a_globe#PHP
