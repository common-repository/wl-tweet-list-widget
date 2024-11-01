<?php
/**
 * Plugin Name: WL Tweet List
 * Version: 1.2.8
 * Description: A Widget to show your latest tweets on your website.
 * Author: Weblogiq
 * Author URI: https://weblogiq.nl
 * Plugin URI: https://weblogiq.nl/wordpress-plugins/
 * Text Domain: wl-tweet-list
 */

class WLTweetList extends WP_Widget {

    function __construct() {
        parent::__construct(
            'wl_tweet_list',
            'Tweet List',
            array( 'description' => __( 'Show your latest tweets on your website', 'wl-tweet-list' ), )
        );
        add_action('wp_footer', array(&$this, 'wl_tweet_list_footer'));  
    }

    function wl_tweet_list_footer() {
        echo '<script>!function(d,s,id) { var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}} (document,"script","twitter-wjs");</script>';
    }

    public function form( $instance ) {

        if ( isset( $instance[ 'UserName' ] ) ) {
            $UserName = $instance[ 'UserName' ];
        } else {
            $UserName = "WeblogiqNL";
        }

        if ( isset( $instance[ 'Theme' ] ) ) {
            $Theme = $instance[ 'Theme' ];
        } else {
            $Theme = "light";
        }

        $Height = "450";
        if ( isset( $instance[ 'Height' ] ) ) {
            $Height = $instance[ 'Height' ];
        }

        $Width = "";
        if ( isset( $instance[ 'Width' ] ) ) {
            $Width = $instance[ 'Width' ];
        }

        if ( isset( $instance[ 'Transparent' ] ) ) {
            $Transparent = $instance[ 'Transparent' ];
        } else {
            $Transparent = "on";
        }

        if ( isset( $instance[ 'ShowHeader' ] ) ) {
            $ShowHeader = $instance[ 'ShowHeader' ];
        } else {
            $ShowHeader = "on";
        }        

        if ( isset( $instance[ 'ShowFooter' ] ) ) {
            $ShowFooter = $instance[ 'ShowFooter' ];
        } else {
            $ShowFooter = "on";
        }

        if ( isset( $instance[ 'ShowBorder' ] ) ) {
            $ShowBorder = $instance[ 'ShowBorder' ];
        } else {
            $ShowBorder = "on";
        }

        if ( isset( $instance[ 'ShowScrollbar' ] ) ) {
            $ShowScrollbar = $instance[ 'ShowScrollbar' ];
        } else {
            $ShowScrollbar = "on";
        }

        if ( isset( $instance[ 'ExcludeReplies' ] ) ) {
            $ExcludeReplies = $instance[ 'ExcludeReplies' ];
        } else {
            $ExcludeReplies = "on";
        }

        if ( isset( $instance[ 'AutoExpandPhotos' ] ) ) {
            $AutoExpandPhotos = $instance[ 'AutoExpandPhotos' ];
        } else {
            $AutoExpandPhotos = "on";
        }

        if ( isset( $instance[ 'LinkColor' ] ) ) {
            $LinkColor = $instance[ 'LinkColor' ];
        } else {
            $LinkColor = "#cc0000";
        }

        if ( isset( $instance[ 'BorderColor' ] ) ) {
            $BorderColor = $instance[ 'BorderColor' ];
        } else {
            $BorderColor = "#e8e8e8";
        }

        if ( isset( $instance[ 'WidgetId' ] ) ) {
            $WidgetId = $instance[ 'WidgetId' ];
        } else {
            $WidgetId = "661137156472197120";
        }
       
        if ( isset( $instance[ 'NumberTweets' ] ) ) {
            $NumberTweets = $instance[ 'NumberTweets' ];
        } else {
            $NumberTweets = "4";
        } 

		if ( isset( $instance[ 'title' ] ) ) {
			 $title = $instance[ 'title' ];
		}
		else {
			 $title = __( 'Tweets', 'weblogiq' );
		}
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'wl-tweet-list' ); ?>:</label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
	
        <p>
            <label for="<?php echo $this->get_field_id( 'UserName' ); ?>"><?php _e( 'Twitter Username', 'wl-tweet-list' ); ?>:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'UserName' ); ?>" name="<?php echo $this->get_field_name( 'UserName' ); ?>" type="text" value="<?php echo esc_attr( $UserName ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'WidgetId' ); ?>"><?php _e( 'Twitter Widget Id (Required)', 'wl-tweet-list' ); ?>:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'WidgetId' ); ?>" name="<?php echo $this->get_field_name( 'WidgetId' ); ?>" type="text" value="<?php echo esc_attr( $WidgetId ); ?>">
            <small><?php _e( 'Get Your Twitter Widget Id <a href="https://twitter.com/settings/widgets" target="_blank">here</a>:', 'wl-tweet-list' ); ?></small>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'NumberTweets' ); ?>"><?php _e( 'Number of Tweets', 'wl-tweet-list' ); ?>:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'NumberTweets' ); ?>" name="<?php echo $this->get_field_name( 'NumberTweets' ); ?>" type="text" value="<?php echo esc_attr( $NumberTweets ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'Theme' ); ?>"><?php _e( 'Theme', 'wl-tweet-list' ); ?>:</label>
            <select id="<?php echo $this->get_field_id( 'Theme' ); ?>" name="<?php echo $this->get_field_name( 'Theme' ); ?>">
                <option value="light" <?php if($Theme == "light") echo "selected=selected" ?>>Light</option>
                <option value="dark" <?php if($Theme == "dark") echo "selected=selected" ?>>Dark</option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'Height' ); ?>"><?php _e( 'Height', 'wl-tweet-list' ); ?>:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'Height' ); ?>" name="<?php echo $this->get_field_name( 'Height' ); ?>" type="text" value="<?php echo esc_attr( $Height ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'Width' ); ?>"><?php _e( 'Width', 'wl-tweet-list' ); ?>:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'Width' ); ?>" name="<?php echo $this->get_field_name( 'Width' ); ?>" type="text" value="<?php echo esc_attr( $Width ); ?>">
        </p>

        <p>
            <input class="widefat" id="<?php echo $this->get_field_id( 'Transparent' ); ?>" 
            		name="<?php echo $this->get_field_name( 'Transparent' ); ?>" type="checkbox" 
            		value="on" <?php checked( $Transparent, 'on' ); ?>>  
            <label for="<?php echo $this->get_field_id( 'Transparent' ); ?>"><?php _e( 'Transparent background', 'wl-tweet-list' ); ?></label>
        </p>

        <p>
            <input class="widefat" id="<?php echo $this->get_field_id( 'ShowHeader' ); ?>"
                   name="<?php echo $this->get_field_name( 'ShowHeader' ); ?>" type="checkbox"
                   value="on" <?php checked( $ShowHeader, 'on' ); ?>>                  
            <label for="<?php echo $this->get_field_id( 'ShowHeader' ); ?>"><?php _e( 'Show header', 'wl-tweet-list' ); ?></label>
        </p>

        <p>
            <input class="widefat" id="<?php echo $this->get_field_id( 'ShowFooter' ); ?>"
                   name="<?php echo $this->get_field_name( 'ShowFooter' ); ?>" type="checkbox"
                   value="on" <?php checked( $ShowFooter, 'on' ); ?>>                  
            <label for="<?php echo $this->get_field_id( 'ShowFooter' ); ?>"><?php _e( 'Show footer', 'wl-tweet-list' ); ?></label>
        </p>

        <p>
            <input class="widefat" id="<?php echo $this->get_field_id( 'ShowBorder' ); ?>"
                   name="<?php echo $this->get_field_name( 'ShowBorder' ); ?>" type="checkbox"
                   value="on" <?php checked( $ShowBorder, 'on' ); ?>>                  
            <label for="<?php echo $this->get_field_id( 'ShowBorder' ); ?>"><?php _e( 'Show borders', 'wl-tweet-list' ); ?></label>
        </p>

        <p>
            <input class="widefat" id="<?php echo $this->get_field_id( 'ShowScrollbar' ); ?>"
                   name="<?php echo $this->get_field_name( 'ShowScrollbar' ); ?>" type="checkbox"
                   value="on" <?php checked( $ShowScrollbar, 'on' ); ?>>                  
            <label for="<?php echo $this->get_field_id( 'ShowScrollbar' ); ?>"><?php _e( 'Show scrollbar', 'wl-tweet-list' ); ?></label>
        </p>

        <p>
            <input class="widefat" id="<?php echo $this->get_field_id( 'ExcludeReplies' ); ?>"
                   name="<?php echo $this->get_field_name( 'ExcludeReplies' ); ?>" type="checkbox"
                   value="on" <?php checked( $ExcludeReplies, 'on' ); ?>> 
            <label for="<?php echo $this->get_field_id( 'ExcludeReplies' ); ?>"><?php _e( 'Exclude Replies on Tweets', 'wl-tweet-list' ); ?></label>
        </p>

        <p>
            <input class="widefat" id="<?php echo $this->get_field_id( 'AutoExpandPhotos' ); ?>"
                   name="<?php echo $this->get_field_name( 'AutoExpandPhotos' ); ?>" type="checkbox"
                   value="on" <?php checked( $AutoExpandPhotos, 'on' ); ?>>         
            <label for="<?php echo $this->get_field_id( 'AutoExpandPhotos' ); ?>"><?php _e( 'Auto Expand Photos in Tweets', 'wl-tweet-list' ); ?></label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'LinkColor' ); ?>"><?php _e( 'URL Link Color', 'wl-tweet-list' ); ?>:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'LinkColor' ); ?>" name="<?php echo $this->get_field_name( 'LinkColor' ); ?>" type="text" value="<?php echo esc_attr( $LinkColor ); ?>">
            <!--<small>Find More Color Codes <a href="http://html-color-codes.info/" target="_blank">HERE</a></small>-->
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'BorderColor' ); ?>"><?php _e( 'Border Color', 'wl-tweet-list' ); ?>:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'BorderColor' ); ?>" name="<?php echo $this->get_field_name( 'BorderColor' ); ?>" type="text" value="<?php echo esc_attr( $BorderColor ); ?>">
            <!--<small>Find More Color Codes <a href="http://html-color-codes.info/" target="_blank">HERE</a></small>-->
        </p>

        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title']              = ( ! empty( $new_instance['title'] ) )             ? strip_tags( $new_instance['title'] ) : 'Tweet List';
        $instance['UserName']           = ( ! empty( $new_instance['UserName'] ) )          ? strip_tags( $new_instance['UserName'] ) : 'weblogiqNL';
        $instance['Theme']              = ( ! empty( $new_instance['Theme'] ) )             ? strip_tags( $new_instance['Theme'] ) : 'light';
        $instance['Height']             = ( ! empty( $new_instance['Height'] ) )            ? strip_tags( $new_instance['Height'] ) : '450';
        $instance['Width']              = ( ! empty( $new_instance['Width'] ) )             ? strip_tags( $new_instance['Width'] ) : '';
        $instance['Transparent']        = ( ! empty( $new_instance['Transparent'] ) )       ? strip_tags( $new_instance['Transparent'] ) : '';
        $instance['ShowHeader']         = ( ! empty( $new_instance['ShowHeader'] ) )        ? strip_tags( $new_instance['ShowHeader'] ) : '';
        $instance['ShowFooter']         = ( ! empty( $new_instance['ShowFooter'] ) )        ? strip_tags( $new_instance['ShowFooter'] ) : '';
        $instance['ShowBorder']         = ( ! empty( $new_instance['ShowBorder'] ) )        ? strip_tags( $new_instance['ShowBorder'] ) : '';
        $instance['ShowScrollbar']      = ( ! empty( $new_instance['ShowScrollbar'] ) )     ? strip_tags( $new_instance['ShowScrollbar'] ) : '';
        $instance['LinkColor']          = ( ! empty( $new_instance['LinkColor'] ) )         ? strip_tags( $new_instance['LinkColor'] ) : '#cc0000';
        $instance['BorderColor']        = ( ! empty( $new_instance['BorderColor'] ) )       ? strip_tags( $new_instance['BorderColor'] ) : '#e8e8e8';
        $instance['ExcludeReplies']     = ( ! empty( $new_instance['ExcludeReplies'] ) )    ? strip_tags( $new_instance['ExcludeReplies'] ) : '';
        $instance['AutoExpandPhotos']   = ( ! empty( $new_instance['AutoExpandPhotos'] ) )  ? strip_tags( $new_instance['AutoExpandPhotos'] ) : '';
        $instance['WidgetId']           = ( ! empty( $new_instance['WidgetId'] ) )          ? strip_tags( $new_instance['WidgetId'] ) : '661137156472197120';
        $instance['NumberTweets']       = ( ! empty( $new_instance['NumberTweets'] ) )      ? strip_tags( $new_instance['NumberTweets'] ) : '4';

        return $instance;
    }

    public function widget( $args, $instance ) {

        extract($args);
        
        $title = apply_filters('title', $instance['title']);        
        
        echo $args['before_widget'];
        
        if ( ! empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        
        $UserName           =   apply_filters( 'wl_tweet_list_user_name', $instance['UserName'] );
        $Theme              =   apply_filters( 'wl_tweet_list_theme', $instance['Theme'] );
        $Height             =   apply_filters( 'wl_tweet_list_height', $instance['Height'] );
        $Width              =   apply_filters( 'wl_tweet_list_width', $instance['Width'] );
        $Transparent        =   apply_filters( 'wl_tweet_list_transparent', $instance['Transparent'] );
        $ShowHeader         =   apply_filters( 'wl_tweet_list_showheader', $instance['ShowHeader'] );
        $ShowFooter         =   apply_filters( 'wl_tweet_list_showfooter', $instance['ShowFooter'] );
        $ShowBorder         =   apply_filters( 'wl_tweet_list_showborder', $instance['ShowBorder'] );
        $ShowScrollbar      =   apply_filters( 'wl_tweet_list_showscrollbar', $instance['ShowScrollbar'] );
        $LinkColor          =   apply_filters( 'wl_tweet_list_link_color', $instance['LinkColor'] );
        $BorderColor        =   apply_filters( 'wl_tweet_list_border_color', $instance['BorderColor'] );
        $ExcludeReplies     =   apply_filters( 'wl_tweet_list_exclude_replies', $instance['ExcludeReplies'] );
        $AutoExpandPhotos   =   apply_filters( 'wl_tweet_list_auto_expand_photo', $instance['AutoExpandPhotos'] );
        $WidgetId           =   apply_filters( 'wl_tweet_list_widget_id', $instance['WidgetId'] );
        $NumberTweets       =   apply_filters( 'wl_tweet_list_number_tweets', $instance['NumberTweets'] );
        ?>
        
        <div>
            <a class="twitter-timeline" 
                data-dnt="true" 
                href="https://twitter.com/<?php echo $UserName; ?>" 
                width="<?php echo $Width; ?>"
                height="<?php echo $Height; ?>"
                data-chrome="<?php echo ( $Transparent == 'on' ) ? 'transparent' : ''; ?><?php echo ( $ShowHeader == 'on' ) ? '' : 'noheader'; ?><?php echo ( $ShowFooter == 'on' ) ? '' : 'nofooter'; ?><?php echo ( $ShowBorder == 'on' ) ? '' : 'noborders'; ?><?php echo ( $ShowScrollbar == 'on' ) ? '' : 'noscrollbar'; ?>"
                data-theme="<?php echo $Theme; ?>"
                data-link-color="<?php echo $LinkColor; ?>"
                data-border-color="<?php echo $BorderColor; ?>"
                data-widget-id="<?php echo $WidgetId; ?>"
                data-tweet-limit="<?php echo $NumberTweets; ?>">Tweets by <?php echo $UserName; ?></a>
            
        </div>
        <?php
        echo $args['after_widget'];
    }

}

add_action('plugins_loaded', 'wl_load_textdomain');
function wl_load_textdomain() {
	load_plugin_textdomain( 'wl-tweet-list', false, dirname( plugin_basename(__FILE__) ) . '/language/' );
}

// Register Widget
function wl_tweet_list_widget() {
    register_widget( 'WLTweetList' );
}
add_action( 'widgets_init', 'wl_tweet_list_widget' );


// Register Shortcode
//function wl_tweet_list_add_shortcode( $atts ) {
    
//    extract( shortcode_atts(
//        array(
//            'url'           => 'https://www.facebook.com/webshouter',
//            'width'         => '380',
//            'height'        => '500',
//            'show_faces'    => 'true',
//            'show_Header'   => 'true',
//            'show_border'   => 'false'
//        ), $atts )
//    );
    
//    $html='<div class="tweet_list">';
//        $html.='<a class="twitter-timeline"';
//            $html='data-dnt="true"';
//            $html='href="https://twitter.com/'.$user.'';
//            $html='min-width="'.$width.'"';
//            $html='height="'.$height.'"';
//            $html='data-theme="'.$theme.'"';
//            $html='data-link-color="'.$linkcolor.'"';
//            $html='data-border-color="'.$bordercolor.'"';
//            $html='data-widget-id="'.$widgetid.'"';
//            $html='data-tweet-limit="'.$notweets.'">';
//        $html='Tweets by '.$user.'</a>';
//    $html='</div>';

//    return $html;
//}
//add_shortcode( 'wl-tweet-list', 'wl_tweet_list_add_shortcode' );
?>