<?php 
    
    if ($url = file_get_contents("https://www.kefri.org/certification/App/config/apis/counties.json")) {
        $json_response = json_decode($url);
        $counties = array();
        for ($i = 0; $i < count($json_response); $i++) {
            array_push($counties, $json_response[$i]->name);
        }
        sort($counties);
       foreach($counties as $county) {
            echo "<option value=\"$county\" name='county'>$county</option>";
        }
    }

    //formResponse(true, $counties);
