<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class NC_Setup {

	public static $newscodes;

	public static function install() {

	}

	public static function init() {

		self::$newscodes['types'] = apply_filters( 'nc_supported_types', array(
			'news-poster' => __( 'Featured Poster', 'nwscds' ),
			'news-grid' => __( 'Grid', 'nwscds' ),
			'news-columned-featured-list' => __( 'Columned Featured List', 'nwscds' ),
			'news-columned-featured-list-tiny' => __( 'Columned Featured List Tiny', 'nwscds' ),
			'news-columned-featured-list-compact' => __( 'Columned Featured List Compact', 'nwscds' ),
			'news-list' => __( 'List', 'nwscds' ),
			'news-list-featured' => __( 'List with Featured', 'nwscds' ),
			'news-list-compact' => __( 'List Compact', 'nwscds' ),
			'news-list-compact-featured' => __( 'List Compact with Featured', 'nwscds' ),
			'news-list-tiny' => __( 'List Tiny', 'nwscds' ),
			'news-list-tiny-featured' => __( 'List Tiny with Featured', 'nwscds' ),
			'news-marquee' => __( 'Marquee', 'nwscds' ),
			'news-ticker' => __( 'Ticker', 'nwscds' ),
			'news-ticker-compact' => __( 'Ticker Compact', 'nwscds' ),
			'news-ticker-tiny' => __( 'Ticker Tiny', 'nwscds' ),
			'news-one-tabbed-posts' => __( 'One Tabbed Posts', 'nwscds' ),
			'news-grid-author' => __( 'Grid Author', 'nwscds' ),
			'news-list-author-featured' => __( 'List with Featured Author', 'nwscds' ),
			'news-list-author-compact-featured' => __( 'List Compact with Featured Author', 'nwscds' ),
			'news-list-author-tiny-featured' => __( 'List Tiny with Featured Author', 'nwscds' ),
		) );

		self::$newscodes['atts'] = array(
			'type' => 'news-list-compact',
			'style' => '',
			'style_cs' => '',
			'ajax' => 'true',
			'columns' => 1,
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => 10,
			'posts_per_column' => 3,
			'offset' => '',
			'orderby' => 'date',
			'order' => 'DESC',
			'excerpt_length' => 20,
			'excerpt_more' => '',
			'image_ratio' => '4-3',
			'image_size' => '',
			'pagination' => 'true',
			'load_more' => 'false',
			'show_date' => 'true',
			'show_time' => 'true',
			'show_taxonomy' => 'true',
			'which_taxonomy' => '',
			'show_author' => 'true',
			'show_format' => 'true',
			'title_cut' => 'false',
			'title_tag' => 'h2',
			'filters' => '',
			'filter_terms' => '',
			'filter_relation' => 'OR',
			'meta_keys' => '',
			'meta_values' => '',
			'meta_compares' => '',
			'meta_types' => '',
			'meta_relation' => 'OR',
			'post_in' => '',
			'post_notin' => '',
			'marquee_direction' => 'left',
			'ticker_visible' => 3,
			'ticker_direction' => 'up',
			'section_title' => __( 'Title', 'nwscds' ),
			'http_query' => '',
			'poster_image' => '',
			'unique_id' => ''
		);

		self::$newscodes['atts_multi'] = array(
			'type' => 'news-list-compact',
			'style' => '',
			'style_cs' => ''
		);

	}

}

NC_Setup::init();

?>