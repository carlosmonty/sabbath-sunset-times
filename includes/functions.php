<?php

function get_sabbath_times($longitude, $latitude, $date)
{
    // This function will fetch sunset times for the given longitude and latitude.
    // Used https://www.latlong.net/ to get the longitude and latitude for the location of the user.
    $api_URL = "https://api.sunrise-sunset.org/json?lat=$latitude&lng=$longitude&tzid=America/Denver&date=$date";
    $response = wp_remote_get($api_URL);

    if (is_wp_error($response)) {
        return false;
    }

    $data = json_decode(wp_remote_retrieve_body($response), true);
    print_r($data);
}