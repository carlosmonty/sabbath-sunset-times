<?php

class Sabbath_Sunset_Widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'sabbath_sunset_widget',
            __('Sabbath Sunset Times', 'text_domain'),
            array('description' => __('A widget to display Sabbath sunset times based on user location.', 'text_domain'))
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        // Fetch and display sunset times
        echo $this->get_sabbath_times_html();

        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : __('Sabbath Sunset Times', 'text_domain');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e(esc_attr('Title:')); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }

    public function get_sabbath_times_html()
    {
        $longitude = -106.356092; // Longitude for El Paso, Texas
        $latitude = 31.766528;    // Latitude for El Paso, Texas

        // Start building the HTML output
        $output = '<div style="text-align:left; font-family:\'Noto Sans\', sans-serif; border-right:2px solid #2c3e50;">';
        $output .= '<h3 style="color:#2c3e50; font-weight:700; margin-bottom:20px;">SABBATH SUNSET TIMES</h3>';

        // Current Week Section
        $output .= '<div style="margin-bottom:20px;">';
        $output .= '<h4 style="color:#2c3e50;">This Week</h4>';
        foreach (['current_friday', 'current_saturday'] as $key) {
            $date = $this->get_weekly_dates()[$key];
            $sunset_time = get_sunset_time($latitude, $longitude, $date);

            if ($sunset_time) {
                $event = ($key === 'current_friday') ? 'Sabbath Start' : 'Sabbath End';
                $time = date("g:i A", strtotime($sunset_time)); // Convert to readable time format

                $output .= '<p style="margin:5px 0; color:#555;">';
                $output .= '<span style="font-weight: 550;">' . $event . ':</span> ' . date("l, F j, Y", strtotime($date)) . ' at ' . $time;
                $output .= '</p>';
            }
        }
        $output .= '</div>';

        // Next Week Section
        $output .= '<div>';
        $output .= '<h4 style="color:#2c3e50;">Next Week</h4>';
        foreach (['next_friday', 'next_saturday'] as $key) {
            $date = $this->get_weekly_dates()[$key];
            $sunset_time = get_sunset_time($latitude, $longitude, $date);

            if ($sunset_time) {
                $event = ($key === 'next_friday') ? 'Sabbath Start' : 'Sabbath End';
                $time = date("g:i A", strtotime($sunset_time)); // Convert to readable time format

                $output .= '<p style="margin:5px 0; color:#555;">';
                $output .= '<span style="font-weight: 520;">' . $event . ':</span> ' . date("l, F j, Y", strtotime($date)) . ' at ' . $time;
                $output .= '</p>';
            }
        }
        $output .= '</div>';

        $output .= '</div>';

        return $output;
    }

    private function get_weekly_dates()
    {
        // Set timezone to ensure consistent date calculations
        date_default_timezone_set('America/Denver'); // Change 'America/Denver' to your desired timezone

        // Get the current week's Friday and Saturday
        $currentFriday = strtotime('friday this week');
        $currentSaturday = strtotime('saturday this week');

        // Get next week's Friday and Saturday
        $nextFriday = strtotime('friday next week');
        $nextSaturday = strtotime('saturday next week');

        return [
            'current_friday' => date("Y-m-d", $currentFriday),
            'current_saturday' => date("Y-m-d", $currentSaturday),
            'next_friday' => date("Y-m-d", $nextFriday),
            'next_saturday' => date("Y-m-d", $nextSaturday)
        ];
    }
}