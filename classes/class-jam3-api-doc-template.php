<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class Jam3ApiDocTemplate {
	private $templates;
	
	public function __construct() {
		//Add metabox attributes data
		add_filter( 'theme_page_templates', array( $this, 'add_template' ) );
		//Inject our template part into cache when the post is save
		add_filter( 'wp_insert_post_data', array( $this, 'insert_post_data' ) );
		add_filter( 'template_include', array( $this, 'template_include' ) );
		$this->templates = array(
			'body.php' => 'Jam3 Api Doc',
		);
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_script' ) );
	}
	
	public function enqueue_script( $hook ) {
		wp_enqueue_script( 'jam3-api-doc', Jam3ApiDoc::$assets_url . 'js/jam3-api-doc.js', array(), false, true );
		wp_localize_script( 'jam3-api-doc', 'jam3_api_doc', array(
			'project_path' => Jam3ApiDoc::$project_path,
		) );
	}
	
	public function add_template( $template ) {
		return array_merge( $template, $this->templates );
	}
	
	public function insert_post_data( $attr ) {
		$cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );
		$templates = wp_get_theme()->get_page_templates();
		if ( empty( $templates ) ) {
			$templates = array();
		}
		wp_cache_delete( $cache_key, 'themes' );
		$templates = array_merge( $templates, $this->templates );
		wp_cache_add( $cache_key, $templates, 'themes', 1800 );
		
		return $attr;
	}
	
	public function template_include( $template ) {
		if ( is_search() ) {
			return $template;
		}
		global $post;
		if ( empty( $post ) ) {
			return $post;
		}
		$template_selected = get_post_meta( $post->ID, '_wp_page_template', true );
		if ( empty( $template_selected ) ) {
			return $template;
		}
		if ( ! isset( $this->templates[ $template_selected ] ) ) {
			return $template;
		}
		$template_file = Jam3ApiDoc::$view_path . $template_selected;
		if ( file_exists( $template_file ) ) {
			return $template_file;
		}
		
		return $template;
	}
}