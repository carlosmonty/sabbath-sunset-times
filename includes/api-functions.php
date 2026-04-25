<?php
// Fetch sunset times using an external API
function get_sunset_time($latitude, $longitude, $date) {
    $api_url = "https://api.sunrise-sunset.org/json?lat={$latitude}&lng={$longitude}&formatted=0&date={$date}&tzid=America/Denver";
    $response = wp_remote_get($api_url);

    if (is_wp_error($response)) {
        return false;
    }

    $data = json_decode(wp_remote_retrieve_body($response), true);
    return $data['results']['sunset'] ?? false;
}