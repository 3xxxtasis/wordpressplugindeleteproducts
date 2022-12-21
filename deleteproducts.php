<?php
/**
 * Plugin Name: Delete Old Products
 * Plugin URI: 
 * Description: This plugin removes all products that are older than 100 days.
 * Version: 1.0
 * Author: Iran Trinidad
 * Author URI: 
 * License: GPL2
 */

function delete_old_products() {
    $args = array(
        'post_type' => 'product',
        'date_query' => array(
            array(
                'before' => '100 days ago',
            ),
        ),
    );

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            wp_delete_post( get_the_ID(), true );
        }
    }

    wp_reset_postdata();
}

add_action( 'wp', 'delete_old_products' );
