<?php

/**
 * 
 * Plugin Name: flux RSS
 * Plugin URI: https://www.numelion.com/
 * Description: un widget servant d'exemple
 * Author: Ad64
 * Version: 1.0.0
 * 
 */

add_action('widgets_init', 'exemple_init');

function exemple_init()
{
    register_widget("exemple_widget");
}

class exemple_widget extends WP_Widget
{
    function exemple_widget()
    {

        $options = array(
            "classname" => "exemple-widget",
            "description" => "un widget qui sert à récupérer un flux rss"
        );

        $this->WP_Widget("widget-exemple", "widget d'exemple", $options);
    }

    function widget($args, $d)
    {
        extract($args);
        echo $before_widget;

        echo $before_title . $d["titre"] . $after_title;
        include_once(ABSPATH . WPINC . '/rss.php');

        wp_rss($d["url"]);

        echo $after_widget;
        }

        function update($new, $old)
        {

        return $new;

        }

        function form($d)
        {
        $defaut = array(
        "titre"=>"widget d'exemple"
        //"age"=> 20
        );
        $d = wp_parse_args($d,$defaut);
        ?>

        <p>
            <label for="<?php $this->get_field_id("titre"); ?>">Titre : </label>
            <input value="<?php echo $d["titre"]; ?>" name="<?php $this->get_field_name("titre"); ?>" id="<?php $this->get_field_id("titre"); ?>" type="text" />
        </p>
        <?php
        /* <p>
             <label for="<?php $this->get_field_id("nom");?>">Nom : </label>
             <input value="<?php echo $d["nom"]; ?>" name="<?php $this->get_field_name("nom");?>" id="<?php $this->get_field_id("nom");?>" type="text" />
         </p>

         <p>
             <label for="<?php $this->get_field_id("age");?>">Age : </label>
             <input value="<?php echo $d["age"]; ?>" name="<?php $this->get_field_name("age");?>" id="<?php $this->get_field_id("age");?>" type="text" maxlength="2" />
         </p> */
        ?>
        <p>
            <label for="<?php $this->get_field_id("url"); ?>">URL DU FLUX : </label>
            <input value="<?php echo $d["url"]; ?>" name="<?php $this->get_field_name("url"); ?>" id="<?php $this->get_field_id("url"); ?>" type="text" />
        </p>

<?php
    }
}
