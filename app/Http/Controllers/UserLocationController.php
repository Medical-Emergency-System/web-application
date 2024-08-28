<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;

class UserLocationController extends Controller
{
    //

    public function index(Request $request)
    {
        $config = array();
        $config['center'] = 'auto';
        $config['onboundschanged'] = 'if (!centreGot) {
                var mapCentre = map.getCenter();
                marker_0.setOptions({
                    position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
                });
                console.log(mapCentre.lat());
                console.log(mapCentre.lng());

                $.ajax({
                    type: "GET",
                    url: "userLocation",
                    data: {
                        lat: mapCentre.lat(),
                        lng: mapCentre.lng(),
                    },
                    success: function (respones) {
                        alert(respones.message); 
                        alert(respones.data.lat + \' \' + respones.data.lng); 
                        console.log(respones.data);
                    },error: function (respones) {
                    }
                });
            }
            centreGot = true;';

        app('map')->initialize($config);
        

        // // set up the marker ready for positioning
        // // once we know the users location
        $marker = array();
        app('map')->add_marker($marker);
        
        
        $map = app('map')->create_map();
        echo "<html><head><meta name=\"csrf-token\" content=\"{{ csrf_token() }}\"></head><body style=\"display: none;\">".$map['html']." <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script><script type=\"text/javascript\">var centreGot = false;</script>".$map['js']."</body></html>";
   
    }

    public function userLocation(Request $request)
    {
        $data = $request->all();
        // echo distance(32.9697, -96.80322, 29.46786, -98.53506, "M") . " Miles<br>";
        // echo distance(32.9697, -96.80322, 29.46786, -98.53506, "K") . " Kilometers<br>";
        // echo distance(32.9697, -96.80322, 29.46786, -98.53506, "N") . " Nautical Miles<br>";
        return response()->json([
            'message' => 'تم تحديد موقعك وارساله لاقرب مركز طبي',
            'data' => $data, 
        ], 200);
    }
}
