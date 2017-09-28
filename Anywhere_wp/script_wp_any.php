<?php
$request = wp_remote_get('http://my.adamapp.com/export/6490.json');
    if(is_wp_error($request)) {
            return false;
    }
    $body = wp_remote_retrieve_body($request);
    $export = json_decode($body);
    if(!empty($export)) {
        foreach($export->result->data->tab as $posts) {
            echo '<article>';                                            
                    echo '<h3>'. $posts->menu->item->name .'</h3>';                                      
                    echo '<a href="' . esc_url($posts->id) . '">' . $posts->id . '</a>';
            echo '</article>';
        }
}