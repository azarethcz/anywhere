<?php 
    $request = wp_remote_get('http://my.adamapp.com/export/6490.json');
        if(is_wp_error($request)) {
                return false;
        }
        $body = wp_remote_retrieve_body($request);
        $export = json_decode($body);
        if(!empty($export)) {
            foreach($export->result->data->tab as $article) {
                echo '<article>';
                        echo '<h3>'.$article->type->name.'</h3>';                                      
//                        echo '<p>'.$article->description.'</p>';
                        echo '<img src="http://my.adamapp.com/'.$article->menu->image->src.'">';
                echo '</article>';
            }
    }
?>