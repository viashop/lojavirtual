<?php

/*
 * Widget Customizer
*/

class Sdbrclrzr extends WP_Widget {

	function sdbrclrzr() {
		$widget_ops = array(
			'classname' => 'sdbrclrzr',
			'description' => __( 'Sidebar Customizer! Customize your sidebar.', 'wdgtclrzr' )
		);
		parent::__construct(
			'sdbrclrzr',
			'+ Sidebar Customizer',
			$widget_ops
		);
	}

	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );

		$curr_preset = $instance['preset'];

		if ( $curr_preset == 'Custom' ) {
			$curr_wc = array (
				'c_title' => $instance['c_title'],
				'c_text' => $instance['c_text'],
				'c_link' => $instance['c_link'],
				'c_hover' => $instance['c_hover'],
				'c_background' => $instance['c_background'],
				'bg_image' => $instance['bg_image'],
				'bg_orientation' => $instance['bg_orientation'],
				'f_title' => $instance['f_title'],
				'f_title_size' => intval($instance['f_title_size']),
				'f_title_height' => intval($instance['f_title_height']),
				'f_title_style' => $instance['f_title_style'],
				'f_title_weight' => $instance['f_title_weight'],
				'f_text' => $instance['f_text'],
				'f_text_size' => intval($instance['f_text_size']),
				'f_text_height' => intval($instance['f_text_height']),
				'f_text_style' => $instance['f_text_style'],
				'f_text_weight' => $instance['f_text_weight'],
				'c_border_top' => $instance['c_border_top'],
				'c_border_right' => $instance['c_border_right'],
				'c_border_bottom' => $instance['c_border_bottom'],
				'c_border_left' => $instance['c_border_left'],
				'b_top_width' => intval($instance['b_top_width']),
				'b_right_width' => intval($instance['b_right_width']),
				'b_bottom_width' => intval($instance['b_bottom_width']),
				'b_left_width' => intval($instance['b_left_width']),
				'p_top' => intval($instance['p_top']),
				'p_right' => intval($instance['p_right']),
				'p_bottom' => intval($instance['p_bottom']),
				'p_left' => intval($instance['p_left']),
				'e_radius' => intval($instance['e_radius']),
				'e_shadow' => $instance['e_shadow'],
				'custom_css' => $instance['custom_css']
			);
		}
		else {
			$loaded_presets = get_option('sdbrclrzr_presets');
			if ( isset($loaded_presets) && !empty($loaded_presets) && is_array($loaded_presets) ) {
				$curr_wc = $loaded_presets[$curr_preset];
			}
		}

		$wc_id = uniqid('sdbrclrzr-');

		$custom_css = '';
		if ( $curr_wc['custom_css'] !== '' ) {
			$curr_classes = array_filter(explode('@sidebar', $curr_wc['custom_css'] ));
			if ( is_array($curr_classes) ) {
				foreach ( $curr_classes as $class ) {
					$custom_css .= 'html body #' . $wc_id . $class;
				}
			}
		}

		$bg_orientation = '';
		if ( $curr_wc['bg_image'] !== '' ) {
			switch ( $curr_wc['bg_orientation'] ) {
				case 'left-landscape' :
					$bg_orientation = 'background-position:left center;background-size:100% auto;background-repeat:no-repeat;';
				break;
				case 'right-landscape' :
					$bg_orientation = 'background-position:right center;background-size:100% auto;background-repeat:no-repeat;';
				break;
				case 'left-portrait' :
					$bg_orientation = 'background-position:left center;background-size:auto 100%;background-repeat:no-repeat;';
				break;
				case 'right-portrait' :
					$bg_orientation = 'background-position:right center;background-size:auto 100%;background-repeat:no-repeat;';
				break;
				case 'pattern' :
					$bg_orientation = 'background-position:center center;background-repeat:repeat;';
				break;
				case 'pattern-top' :
					$bg_orientation = 'background-position:top center;background-repeat:repeat-x;';
				break;
				case 'pattern-bottom' :
					$bg_orientation = 'background-position:bottom center;background-repeat:repeat-x;';
				break;
				case 'frame' :
					$bg_orientation = 'background-position:center center;background-size:100% 100%;background-repeat:no-repeat;';
				break;
				default :
					$bg_orientation = '';
				break;
			}
		}

		?>
			<span id="<?php echo $wc_id ?>" style="display:none;"></span>
		<?php
			Wdgtclrzr_Engine::$settings['css'] .= sprintf('
				html body .%1$s {
					%3$s %6$s %7$s %8$s %19$s %20$s %21$s %22$s %23$s %24$s %25$s %26$s %27$s %28$s %29$s %30$s %31$s %32$s %34$s
				}
				html body .%1$s * {
					%14$s %15$s %16$s %17$s %18$s
				}
				html body .%1$s a {
					%4$s
				}
				html body .%1$s a:hover {
					%5$s
				}
				html body .%1$s h1, html body .%1$s  h2, html body .%1$s h3, html body .%1$s h4, html body .%1$s h5, html body .%1$s h6 {
					%2$s %9$s %10$s %11$s %12$s %13$s
				}
				%33$s
				',
				$wc_id,
				( $curr_wc['c_title'] == '' || $curr_wc['c_title'] == 'transparent' ? '' : 'color:'.$curr_wc['c_title'].';' ),
				( $curr_wc['c_text'] == '' || $curr_wc['c_text'] == 'transparent' ? '' : 'color:'.$curr_wc['c_text'].';' ),
				( $curr_wc['c_link'] == '' || $curr_wc['c_link'] == 'transparent' ? '' : 'color:'.$curr_wc['c_link'].';' ),
				( $curr_wc['c_hover'] == '' || $curr_wc['c_hover'] == 'transparent' ? '' : 'color:'.$curr_wc['c_hover'].';' ),
				( ( $curr_wc['c_background'] == '' || $curr_wc['c_background'] == 'transparent' ) ? '' : 'background-color:'.$curr_wc['c_background'].';' ),

				( ( $curr_wc['bg_image'] == '' || $curr_wc['bg_image'] == 'transparent' ) ? '' : 'background-image:url('.$curr_wc['bg_image'].');' ),
				$bg_orientation,

				( $curr_wc['f_title'] == '' || $curr_wc['f_title'] == 'Default' ? '' : 'font-family:"'.$curr_wc['f_title'].'";' ),
				( $curr_wc['f_title_size'] == '' || $curr_wc['f_title_size'] == 'normal' ? '' : 'font-size:'.$curr_wc['f_title_size'].'px;' ),
				( $curr_wc['f_title_height'] == '' || $curr_wc['f_title_height'] == 'normal' ? '' : 'line-height:'.$curr_wc['f_title_height'].'px' ),
				( $curr_wc['f_title_style'] == '' ? '' : 'font-style:'.$curr_wc['f_title_style'].';' ),
				( $curr_wc['f_title_weight'] == '' || $curr_wc['f_title_weight'] == 'normal' ? '' : 'font-weight:'.$curr_wc['f_title_weight'].';' ),

				( $curr_wc['f_text'] == '' || $curr_wc['f_text'] == 'Default' ? '' : 'font-family:"'.$curr_wc['f_text'].'";' ),
				( $curr_wc['f_text_size'] == '' || $curr_wc['f_text_size'] == 'normal' ? '' : 'font-size:'.$curr_wc['f_text_size'].'px;' ),
				( $curr_wc['f_text_height'] == '' || $curr_wc['f_text_height'] == 'normal' ? '' : 'line-height:'.$curr_wc['f_text_height'].'px;' ),
				( $curr_wc['f_text_style'] == '' ? '' : 'font-style:'.$curr_wc['f_text_style'].';' ),
				( $curr_wc['f_text_weight'] == '' || $curr_wc['f_text_weight'] == 'normal' ? '' : 'font-weight:'.$curr_wc['f_text_weight'].';' ),

				( $curr_wc['c_border_top'] == '' || $curr_wc['c_border_top'] == 'transparent' ? '' : 'border-top-color:'.$curr_wc['c_border_top'].';' ),
				( $curr_wc['c_border_right'] == '' || $curr_wc['c_border_right'] == 'transparent' ? '' : 'border-right-color:'.$curr_wc['c_border_right'].';' ),
				( $curr_wc['c_border_bottom'] == '' || $curr_wc['c_border_bottom'] == 'transparent' ? '' : 'border-bottom-color:'.$curr_wc['c_border_bottom'].';' ),
				( $curr_wc['c_border_left'] == '' || $curr_wc['c_border_left'] == 'transparent' ? '' : 'border-left-color:'.$curr_wc['c_border_left'].';' ),

				( $curr_wc['b_top_width'] == '' || $curr_wc['b_top_width'] == '0' ? '' : 'border-top-width:'.$curr_wc['b_top_width'].'px;' ),
				( $curr_wc['b_right_width'] == '' || $curr_wc['b_right_width'] == '0' ? '' : 'border-right-width:'.$curr_wc['b_right_width'].'px;' ),
				( $curr_wc['b_bottom_width'] == '' || $curr_wc['b_bottom_width'] == '0' ? '' : 'border-bottom-width:'.$curr_wc['b_bottom_width'].'px;' ),
				( $curr_wc['b_left_width'] == '' || $curr_wc['b_left_width'] == '0' ? '' : 'border-left-width:'.$curr_wc['b_left_width'].'px;' ),

				( $curr_wc['p_top'] == '' || $curr_wc['p_top'] == '0' ? '' : 'padding-top:'.$curr_wc['p_top'].'px;' ),
				( $curr_wc['p_right'] == '' || $curr_wc['p_right'] == '0' ? '' : 'padding-right:'.$curr_wc['p_right'].'px;' ),
				( $curr_wc['p_bottom'] == '' || $curr_wc['p_bottom'] == '0' ? '' : 'padding-bottom:'.$curr_wc['p_bottom'].'px;' ),
				( $curr_wc['p_left'] == '' || $curr_wc['p_left'] == '0' ? '' : 'padding-left:'.$curr_wc['p_left'].'px;' ),

				( $curr_wc['e_radius'] == '' ? '' : 'border-radius:'.$curr_wc['e_radius'].'px;-webkit-border-radius:'.$curr_wc['e_radius'].'px;-moz-border-radius:'.$curr_wc['e_radius'].'px;-ms-border-radius:'.$curr_wc['e_radius'].'px;-o-border-radius:'.$curr_wc['e_radius'].'px;' ),

				( $curr_wc['e_shadow'] == '' ? '' : 'box-shadow:'.$curr_wc['e_shadow'].';-webkit-box-shadow:'.$curr_wc['e_shadow'].';-moz-box-shadow:'.$curr_wc['e_shadow'].';-ms-box-shadow:'.$curr_wc['e_shadow'].';-o-box-shadow:'.$curr_wc['e_shadow'].';' ),

				$custom_css,

				( 'box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-ms-box-sizing:border-box;-o-box-sizing:border-box;border-style:solid;' )

			);
		?>
			<script type="text/javascript">
				var el = document.getElementById('<?php echo $wc_id; ?>');
				var par = el.parentNode;
				par.className = par.className + ' <?php echo $wc_id; ?>';
			</script>
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['c_title'] = $new_instance['c_title'];
		$instance['c_text'] = $new_instance['c_text'];
		$instance['c_link'] = $new_instance['c_link'];
		$instance['c_hover'] = $new_instance['c_hover'];
		$instance['c_background'] = $new_instance['c_background'];
		$instance['bg_image'] = $new_instance['bg_image'];
		$instance['bg_orientation'] = $new_instance['bg_orientation'];
		$instance['f_title'] = $new_instance['f_title'];
		$instance['f_title_size'] = $new_instance['f_title_size'];
		$instance['f_title_height'] = $new_instance['f_title_height'];
		$instance['f_title_style'] = $new_instance['f_title_style'];
		$instance['f_title_weight'] = $new_instance['f_title_weight'];
		$instance['f_text'] = $new_instance['f_text'];
		$instance['f_text_size'] = $new_instance['f_text_size'];
		$instance['f_text_height'] = $new_instance['f_text_height'];
		$instance['f_text_style'] = $new_instance['f_text_style'];
		$instance['f_text_weight'] = $new_instance['f_text_weight'];
		$instance['c_border_top'] = $new_instance['c_border_top'];
		$instance['c_border_right'] = $new_instance['c_border_right'];
		$instance['c_border_bottom'] = $new_instance['c_border_bottom'];
		$instance['c_border_left'] = $new_instance['c_border_left'];
		$instance['b_top_width'] = $new_instance['b_top_width'];
		$instance['b_right_width'] = $new_instance['b_right_width'];
		$instance['b_bottom_width'] = $new_instance['b_bottom_width'];
		$instance['b_left_width'] = $new_instance['b_left_width'];
		$instance['p_top'] = $new_instance['p_top'];
		$instance['p_right'] = $new_instance['p_right'];
		$instance['p_bottom'] = $new_instance['p_bottom'];
		$instance['p_left'] = $new_instance['p_left'];
		$instance['e_radius'] = $new_instance['e_radius'];
		$instance['e_shadow'] = $new_instance['e_shadow'];
		$instance['custom_css'] = $new_instance['custom_css'];

		$instance['preset'] = $new_instance['preset'];

		delete_transient( 'wdgtclrzr_fonts' );

		return $instance;
	}

	function form( $instance ) {
		$vars = array( 'c_title' => '', 'c_text' => '', 'c_link' => '', 'c_hover' => '', 'c_background' => '', 'bg_image' => '', 'bg_orientation' => '', 'f_title' => '', 'f_title_size' => '', 'f_title_height' => '', 'f_title_style' => '', 'f_title_weight' => '', 'f_text' => '', 'f_text_size' => '', 'f_text_height' => '', 'f_text_style' => '', 'f_text_weight' => '', 'c_border_top' => '', 'c_border_right' => '', 'c_border_bottom' => '', 'c_border_left' => '', 'b_top_width' => '', 'b_right_width' => '', 'b_bottom_width' => '', 'b_left_width' => '', 'p_top' => '', 'p_right' => '', 'p_bottom' => '', 'p_left' => '', 'e_radius' => '', 'e_shadow' => '', 'custom_css' => '', 'preset' => '' );
		$instance = wp_parse_args( (array) $instance, $vars );

		$c_title = strip_tags($instance['c_title']);
		$c_text = strip_tags($instance['c_text']);
		$c_link = strip_tags($instance['c_link']);
		$c_hover = strip_tags($instance['c_hover']);
		$c_background = strip_tags($instance['c_background']);
		$bg_image = strip_tags($instance['bg_image']);
		$bg_orientation = strip_tags($instance['bg_orientation']);
		$f_title = strip_tags($instance['f_title']);
		$f_title_size = strip_tags($instance['f_title_size']);
		$f_title_height = strip_tags($instance['f_title_height']);
		$f_title_style = strip_tags($instance['f_title_style']);
		$f_title_weight = strip_tags($instance['f_title_weight']);
		$f_text = strip_tags($instance['f_text']);
		$f_text_size = strip_tags($instance['f_text_size']);
		$f_text_height = strip_tags($instance['f_text_height']);
		$f_text_style = strip_tags($instance['f_text_style']);
		$f_text_weight = strip_tags($instance['f_text_weight']);
		$c_border_top = strip_tags($instance['c_border_top']);
		$c_border_right = strip_tags($instance['c_border_right']);
		$c_border_bottom = strip_tags($instance['c_border_bottom']);
		$c_border_left = strip_tags($instance['c_border_left']);
		$b_top_width = strip_tags($instance['b_top_width']);
		$b_right_width = strip_tags($instance['b_right_width']);
		$b_bottom_width = strip_tags($instance['b_bottom_width']);
		$b_left_width = strip_tags($instance['b_left_width']);
		$p_top = strip_tags($instance['p_top']);
		$p_right = strip_tags($instance['p_right']);
		$p_bottom = strip_tags($instance['p_bottom']);
		$p_left = strip_tags($instance['p_left']);
		$e_radius = strip_tags($instance['e_radius']);
		$e_shadow = strip_tags($instance['e_shadow']);
		$custom_css = strip_tags($instance['custom_css']);

		$preset = strip_tags($instance['preset']);

		$unique_id = uniqid('sdbrclrzr-');

$fonts = array( /* Google Fonts */ "Default" => "Default", "ABeeZee" => "ABeeZee", "Abel" => "Abel", "Abril Fatface" => "Abril Fatface", "Aclonica" => "Aclonica", "Acme" => "Acme", "Actor" => "Actor", "Adamina" => "Adamina", "Advent Pro" => "Advent Pro", "Aguafina Script" => "Aguafina Script", "Akronim" => "Akronim", "Aladin" => "Aladin", "Aldrich" => "Aldrich", "Alegreya" => "Alegreya", "Alegreya SC" => "Alegreya SC", "Alex Brush" => "Alex Brush", "Alfa Slab One" => "Alfa Slab One", "Alice" => "Alice", "Alike" => "Alike", "Alike Angular" => "Alike Angular", "Allan" => "Allan", "Allerta" => "Allerta", "Allerta Stencil" => "Allerta Stencil", "Allura" => "Allura", "Almendra" => "Almendra", "Almendra Display" => "Almendra Display", "Almendra SC" => "Almendra SC", "Amarante" => "Amarante", "Amaranth" => "Amaranth", "Amatic SC" => "Amatic SC", "Amethysta" => "Amethysta", "Anaheim" => "Anaheim", "Andada" => "Andada", "Andika" => "Andika", "Angkor" => "Angkor", "Annie Use Your Telescope" => "Annie Use Your Telescope", "Anonymous Pro" => "Anonymous Pro", "Antic" => "Antic", "Antic Didone" => "Antic Didone", "Antic Slab" => "Antic Slab", "Anton" => "Anton", "Arapey" => "Arapey", "Arbutus" => "Arbutus", "Arbutus Slab" => "Arbutus Slab", "Architects Daughter" => "Architects Daughter", "Archivo Black" => "Archivo Black", "Archivo Narrow" => "Archivo Narrow", "Arimo" => "Arimo", "Arizonia" => "Arizonia", "Armata" => "Armata", "Artifika" => "Artifika", "Arvo" => "Arvo", "Asap" => "Asap", "Asset" => "Asset", "Astloch" => "Astloch", "Asul" => "Asul", "Atomic Age" => "Atomic Age", "Aubrey" => "Aubrey", "Audiowide" => "Audiowide", "Autour One" => "Autour One", "Average" => "Average", "Average Sans" => "Average Sans", "Averia Gruesa Libre" => "Averia Gruesa Libre", "Averia Libre" => "Averia Libre", "Averia Sans Libre" => "Averia Sans Libre", "Averia Serif Libre" => "Averia Serif Libre", "Bad Script" => "Bad Script", "Balthazar" => "Balthazar", "Bangers" => "Bangers", "Basic" => "Basic", "Battambang" => "Battambang", "Baumans" => "Baumans", "Bayon" => "Bayon", "Belgrano" => "Belgrano", "Belleza" => "Belleza", "BenchNine" => "BenchNine", "Bentham" => "Bentham", "Berkshire Swash" => "Berkshire Swash", "Bevan" => "Bevan", "Bigelow Rules" => "Bigelow Rules", "Bigshot One" => "Bigshot One", "Bilbo" => "Bilbo", "Bilbo Swash Caps" => "Bilbo Swash Caps", "Bitter" => "Bitter", "Black Ops One" => "Black Ops One", "Bokor" => "Bokor", "Bonbon" => "Bonbon", "Boogaloo" => "Boogaloo", "Bowlby One" => "Bowlby One", "Bowlby One SC" => "Bowlby One SC", "Brawler" => "Brawler", "Bree Serif" => "Bree Serif", "Bubblegum Sans" => "Bubblegum Sans", "Bubbler One" => "Bubbler One", "Buda" => "Buda", "Buenard" => "Buenard", "Butcherman" => "Butcherman", "Butterfly Kids" => "Butterfly Kids", "Cabin" => "Cabin", "Cabin Condensed" => "Cabin Condensed", "Cabin Sketch" => "Cabin Sketch", "Caesar Dressing" => "Caesar Dressing", "Cagliostro" => "Cagliostro", "Calligraffitti" => "Calligraffitti", "Cambo" => "Cambo", "Candal" => "Candal", "Cantarell" => "Cantarell", "Cantata One" => "Cantata One", "Cantora One" => "Cantora One", "Capriola" => "Capriola", "Cardo" => "Cardo", "Carme" => "Carme", "Carrois Gothic" => "Carrois Gothic", "Carrois Gothic SC" => "Carrois Gothic SC", "Carter One" => "Carter One", "Caudex" => "Caudex", "Cedarville Cursive" => "Cedarville Cursive", "Ceviche One" => "Ceviche One", "Changa One" => "Changa One", "Chango" => "Chango", "Chau Philomene One" => "Chau Philomene One", "Chela One" => "Chela One", "Chelsea Market" => "Chelsea Market", "Chenla" => "Chenla", "Cherry Cream Soda" => "Cherry Cream Soda", "Cherry Swash" => "Cherry Swash", "Chewy" => "Chewy", "Chicle" => "Chicle", "Chivo" => "Chivo", "Cinzel" => "Cinzel", "Cinzel Decorative" => "Cinzel Decorative", "Clicker Script" => "Clicker Script", "Coda" => "Coda", "Coda Caption" => "Coda Caption", "Codystar" => "Codystar", "Combo" => "Combo", "Comfortaa" => "Comfortaa", "Coming Soon" => "Coming Soon", "Concert One" => "Concert One", "Condiment" => "Condiment", "Content" => "Content", "Contrail One" => "Contrail One", "Convergence" => "Convergence", "Cookie" => "Cookie", "Copse" => "Copse", "Corben" => "Corben", "Courgette" => "Courgette", "Cousine" => "Cousine", "Coustard" => "Coustard", "Covered By Your Grace" => "Covered By Your Grace", "Crafty Girls" => "Crafty Girls", "Creepster" => "Creepster", "Crete Round" => "Crete Round", "Crimson Text" => "Crimson Text", "Croissant One" => "Croissant One", "Crushed" => "Crushed", "Cuprum" => "Cuprum", "Cutive" => "Cutive", "Cutive Mono" => "Cutive Mono", "Damion" => "Damion", "Dancing Script" => "Dancing Script", "Dangrek" => "Dangrek", "Dawning of a New Day" => "Dawning of a New Day", "Days One" => "Days One", "Delius" => "Delius", "Delius Swash Caps" => "Delius Swash Caps", "Delius Unicase" => "Delius Unicase", "Della Respira" => "Della Respira", "Denk One" => "Denk One", "Devonshire" => "Devonshire", "Didact Gothic" => "Didact Gothic", "Diplomata" => "Diplomata", "Diplomata SC" => "Diplomata SC", "Domine" => "Domine", "Donegal One" => "Donegal One", "Doppio One" => "Doppio One", "Dorsa" => "Dorsa", "Dosis" => "Dosis", "Dr Sugiyama" => "Dr Sugiyama", "Droid Sans" => "Droid Sans", "Droid Sans Mono" => "Droid Sans Mono", "Droid Serif" => "Droid Serif", "Duru Sans" => "Duru Sans", "Dynalight" => "Dynalight", "EB Garamond" => "EB Garamond", "Eagle Lake" => "Eagle Lake", "Eater" => "Eater", "Economica" => "Economica", "Electrolize" => "Electrolize", "Elsie" => "Elsie", "Elsie Swash Caps" => "Elsie Swash Caps", "Emblema One" => "Emblema One", "Emilys Candy" => "Emilys Candy", "Engagement" => "Engagement", "Englebert" => "Englebert", "Enriqueta" => "Enriqueta", "Erica One" => "Erica One", "Esteban" => "Esteban", "Euphoria Script" => "Euphoria Script", "Ewert" => "Ewert", "Exo" => "Exo", "Expletus Sans" => "Expletus Sans", "Fanwood Text" => "Fanwood Text", "Fascinate" => "Fascinate", "Fascinate Inline" => "Fascinate Inline", "Faster One" => "Faster One", "Fasthand" => "Fasthand", "Federant" => "Federant", "Federo" => "Federo", "Felipa" => "Felipa", "Fenix" => "Fenix", "Finger Paint" => "Finger Paint", "Fjalla One" => "Fjalla One", "Fjord One" => "Fjord One", "Flamenco" => "Flamenco", "Flavors" => "Flavors", "Fondamento" => "Fondamento", "Fontdiner Swanky" => "Fontdiner Swanky", "Forum" => "Forum", "Francois One" => "Francois One", "Freckle Face" => "Freckle Face", "Fredericka the Great" => "Fredericka the Great", "Fredoka One" => "Fredoka One", "Freehand" => "Freehand", "Fresca" => "Fresca", "Frijole" => "Frijole", "Fruktur" => "Fruktur", "Fugaz One" => "Fugaz One", "GFS Didot" => "GFS Didot", "GFS Neohellenic" => "GFS Neohellenic", "Gabriela" => "Gabriela", "Gafata" => "Gafata", "Galdeano" => "Galdeano", "Galindo" => "Galindo", "Gentium Basic" => "Gentium Basic", "Gentium Book Basic" => "Gentium Book Basic", "Geo" => "Geo", "Geostar" => "Geostar", "Geostar Fill" => "Geostar Fill", "Germania One" => "Germania One", "Gilda Display" => "Gilda Display", "Give You Glory" => "Give You Glory", "Glass Antiqua" => "Glass Antiqua", "Glegoo" => "Glegoo", "Gloria Hallelujah" => "Gloria Hallelujah", "Goblin One" => "Goblin One", "Gochi Hand" => "Gochi Hand", "Gorditas" => "Gorditas", "Goudy Bookletter 1911" => "Goudy Bookletter 1911", "Graduate" => "Graduate", "Grand Hotel" => "Grand Hotel", "Gravitas One" => "Gravitas One", "Great Vibes" => "Great Vibes", "Griffy" => "Griffy", "Gruppo" => "Gruppo", "Gudea" => "Gudea", "Habibi" => "Habibi", "Hammersmith One" => "Hammersmith One", "Hanalei" => "Hanalei", "Hanalei Fill" => "Hanalei Fill", "Handlee" => "Handlee", "Hanuman" => "Hanuman", "Happy Monkey" => "Happy Monkey", "Headland One" => "Headland One", "Henny Penny" => "Henny Penny", "Herr Von Muellerhoff" => "Herr Von Muellerhoff", "Holtwood One SC" => "Holtwood One SC", "Homemade Apple" => "Homemade Apple", "Homenaje" => "Homenaje", "IM Fell DW Pica" => "IM Fell DW Pica", "IM Fell DW Pica SC" => "IM Fell DW Pica SC", "IM Fell Double Pica" => "IM Fell Double Pica", "IM Fell Double Pica SC" => "IM Fell Double Pica SC", "IM Fell English" => "IM Fell English", "IM Fell English SC" => "IM Fell English SC", "IM Fell French Canon" => "IM Fell French Canon", "IM Fell French Canon SC" => "IM Fell French Canon SC", "IM Fell Great Primer" => "IM Fell Great Primer", "IM Fell Great Primer SC" => "IM Fell Great Primer SC", "Iceberg" => "Iceberg", "Iceland" => "Iceland", "Imprima" => "Imprima", "Inconsolata" => "Inconsolata", "Inder" => "Inder", "Indie Flower" => "Indie Flower", "Inika" => "Inika", "Irish Grover" => "Irish Grover", "Istok Web" => "Istok Web", "Italiana" => "Italiana", "Italianno" => "Italianno", "Jacques Francois" => "Jacques Francois", "Jacques Francois Shadow" => "Jacques Francois Shadow", "Jim Nightshade" => "Jim Nightshade", "Jockey One" => "Jockey One", "Jolly Lodger" => "Jolly Lodger", "Josefin Sans" => "Josefin Sans", "Josefin Slab" => "Josefin Slab", "Joti One" => "Joti One", "Judson" => "Judson", "Julee" => "Julee", "Julius Sans One" => "Julius Sans One", "Junge" => "Junge", "Jura" => "Jura", "Just Another Hand" => "Just Another Hand", "Just Me Again Down Here" => "Just Me Again Down Here", "Kameron" => "Kameron", "Karla" => "Karla", "Kaushan Script" => "Kaushan Script", "Kavoon" => "Kavoon", "Keania One" => "Keania One", "Kelly Slab" => "Kelly Slab", "Kenia" => "Kenia", "Khmer" => "Khmer", "Kite One" => "Kite One", "Knewave" => "Knewave", "Kotta One" => "Kotta One", "Koulen" => "Koulen", "Kranky" => "Kranky", "Kreon" => "Kreon", "Kristi" => "Kristi", "Krona One" => "Krona One", "La Belle Aurore" => "La Belle Aurore", "Lancelot" => "Lancelot", "Lato" => "Lato", "League Script" => "League Script", "Leckerli One" => "Leckerli One", "Ledger" => "Ledger", "Lekton" => "Lekton", "Lemon" => "Lemon", "Libre Baskerville" => "Libre Baskerville", "Life Savers" => "Life Savers", "Lilita One" => "Lilita One", "Limelight" => "Limelight", "Linden Hill" => "Linden Hill", "Lobster" => "Lobster", "Lobster Two" => "Lobster Two", "Londrina Outline" => "Londrina Outline", "Londrina Shadow" => "Londrina Shadow", "Londrina Sketch" => "Londrina Sketch", "Londrina Solid" => "Londrina Solid", "Lora" => "Lora", "Love Ya Like A Sister" => "Love Ya Like A Sister", "Loved by the King" => "Loved by the King", "Lovers Quarrel" => "Lovers Quarrel", "Luckiest Guy" => "Luckiest Guy", "Lusitana" => "Lusitana", "Lustria" => "Lustria", "Macondo" => "Macondo", "Macondo Swash Caps" => "Macondo Swash Caps", "Magra" => "Magra", "Maiden Orange" => "Maiden Orange", "Mako" => "Mako", "Marcellus" => "Marcellus", "Marcellus SC" => "Marcellus SC", "Marck Script" => "Marck Script", "Margarine" => "Margarine", "Marko One" => "Marko One", "Marmelad" => "Marmelad", "Marvel" => "Marvel", "Mate" => "Mate", "Mate SC" => "Mate SC", "Maven Pro" => "Maven Pro", "McLaren" => "McLaren", "Meddon" => "Meddon", "MedievalSharp" => "MedievalSharp", "Medula One" => "Medula One", "Megrim" => "Megrim", "Meie Script" => "Meie Script", "Merienda" => "Merienda", "Merienda One" => "Merienda One", "Merriweather" => "Merriweather", "Merriweather Sans" => "Merriweather Sans", "Metal" => "Metal", "Metal Mania" => "Metal Mania", "Metamorphous" => "Metamorphous", "Metrophobic" => "Metrophobic", "Michroma" => "Michroma", "Milonga" => "Milonga", "Miltonian" => "Miltonian", "Miltonian Tattoo" => "Miltonian Tattoo", "Miniver" => "Miniver", "Miss Fajardose" => "Miss Fajardose", "Modern Antiqua" => "Modern Antiqua", "Molengo" => "Molengo", "Molle" => "Molle", "Monda" => "Monda", "Monofett" => "Monofett", "Monoton" => "Monoton", "Monsieur La Doulaise" => "Monsieur La Doulaise", "Montaga" => "Montaga", "Montez" => "Montez", "Montserrat" => "Montserrat", "Montserrat Alternates" => "Montserrat Alternates", "Montserrat Subrayada" => "Montserrat Subrayada", "Moul" => "Moul", "Moulpali" => "Moulpali", "Mountains of Christmas" => "Mountains of Christmas", "Mouse Memoirs" => "Mouse Memoirs", "Mr Bedfort" => "Mr Bedfort", "Mr Dafoe" => "Mr Dafoe", "Mr De Haviland" => "Mr De Haviland", "Mrs Saint Delafield" => "Mrs Saint Delafield", "Mrs Sheppards" => "Mrs Sheppards", "Muli" => "Muli", "Mystery Quest" => "Mystery Quest", "Neucha" => "Neucha", "Neuton" => "Neuton", "New Rocker" => "New Rocker", "News Cycle" => "News Cycle", "Niconne" => "Niconne", "Nixie One" => "Nixie One", "Nobile" => "Nobile", "Nokora" => "Nokora", "Norican" => "Norican", "Nosifer" => "Nosifer", "Noto Sans" => "Noto Sans", "Noto Serif" => "Noto Serif", "Nothing You Could Do" => "Nothing You Could Do", "Noticia Text" => "Noticia Text", "Nova Cut" => "Nova Cut", "Nova Flat" => "Nova Flat", "Nova Mono" => "Nova Mono", "Nova Oval" => "Nova Oval", "Nova Round" => "Nova Round", "Nova Script" => "Nova Script", "Nova Slim" => "Nova Slim", "Nova Square" => "Nova Square", "Numans" => "Numans", "Nunito" => "Nunito", "Odor Mean Chey" => "Odor Mean Chey", "Offside" => "Offside", "Old Standard TT" => "Old Standard TT", "Oldenburg" => "Oldenburg", "Oleo Script" => "Oleo Script", "Oleo Script Swash Caps" => "Oleo Script Swash Caps", "Open Sans" => "Open Sans", "Open Sans Condensed" => "Open Sans Condensed", "Oranienbaum" => "Oranienbaum", "Orbitron" => "Orbitron", "Oregano" => "Oregano", "Orienta" => "Orienta", "Original Surfer" => "Original Surfer", "Oswald" => "Oswald", "Over the Rainbow" => "Over the Rainbow", "Overlock" => "Overlock", "Overlock SC" => "Overlock SC", "Ovo" => "Ovo", "Oxygen" => "Oxygen", "Oxygen Mono" => "Oxygen Mono", "PT Mono" => "PT Mono", "PT Sans" => "PT Sans", "PT Sans Caption" => "PT Sans Caption", "PT Sans Narrow" => "PT Sans Narrow", "PT Serif" => "PT Serif", "PT Serif Caption" => "PT Serif Caption", "Pacifico" => "Pacifico", "Paprika" => "Paprika", "Parisienne" => "Parisienne", "Passero One" => "Passero One", "Passion One" => "Passion One", "Patrick Hand" => "Patrick Hand", "Patrick Hand SC" => "Patrick Hand SC", "Patua One" => "Patua One", "Paytone One" => "Paytone One", "Peralta" => "Peralta", "Permanent Marker" => "Permanent Marker", "Petit Formal Script" => "Petit Formal Script", "Petrona" => "Petrona", "Philosopher" => "Philosopher", "Piedra" => "Piedra", "Pinyon Script" => "Pinyon Script", "Pirata One" => "Pirata One", "Plaster" => "Plaster", "Play" => "Play", "Playball" => "Playball", "Playfair Display" => "Playfair Display", "Playfair Display SC" => "Playfair Display SC", "Podkova" => "Podkova", "Poiret One" => "Poiret One", "Poller One" => "Poller One", "Poly" => "Poly", "Pompiere" => "Pompiere", "Pontano Sans" => "Pontano Sans", "Port Lligat Sans" => "Port Lligat Sans", "Port Lligat Slab" => "Port Lligat Slab", "Prata" => "Prata", "Preahvihear" => "Preahvihear", "Press Start 2P" => "Press Start 2P", "Princess Sofia" => "Princess Sofia", "Prociono" => "Prociono", "Prosto One" => "Prosto One", "Puritan" => "Puritan", "Purple Purse" => "Purple Purse", "Quando" => "Quando", "Quantico" => "Quantico", "Quattrocento" => "Quattrocento", "Quattrocento Sans" => "Quattrocento Sans", "Questrial" => "Questrial", "Quicksand" => "Quicksand", "Quintessential" => "Quintessential", "Qwigley" => "Qwigley", "Racing Sans One" => "Racing Sans One", "Radley" => "Radley", "Raleway" => "Raleway", "Raleway Dots" => "Raleway Dots", "Rambla" => "Rambla", "Rammetto One" => "Rammetto One", "Ranchers" => "Ranchers", "Rancho" => "Rancho", "Rationale" => "Rationale", "Redressed" => "Redressed", "Reenie Beanie" => "Reenie Beanie", "Revalia" => "Revalia", "Ribeye" => "Ribeye", "Ribeye Marrow" => "Ribeye Marrow", "Righteous" => "Righteous", "Risque" => "Risque", "Roboto" => "Roboto", "Roboto Condensed" => "Roboto Condensed", "Rochester" => "Rochester", "Rock Salt" => "Rock Salt", "Rokkitt" => "Rokkitt", "Romanesco" => "Romanesco", "Ropa Sans" => "Ropa Sans", "Rosario" => "Rosario", "Rosarivo" => "Rosarivo", "Rouge Script" => "Rouge Script", "Ruda" => "Ruda", "Rufina" => "Rufina", "Ruge Boogie" => "Ruge Boogie", "Ruluko" => "Ruluko", "Rum Raisin" => "Rum Raisin", "Ruslan Display" => "Ruslan Display", "Russo One" => "Russo One", "Ruthie" => "Ruthie", "Rye" => "Rye", "Sacramento" => "Sacramento", "Sail" => "Sail", "Salsa" => "Salsa", "Sanchez" => "Sanchez", "Sancreek" => "Sancreek", "Sansita One" => "Sansita One", "Sarina" => "Sarina", "Satisfy" => "Satisfy", "Scada" => "Scada", "Schoolbell" => "Schoolbell", "Seaweed Script" => "Seaweed Script", "Sevillana" => "Sevillana", "Seymour One" => "Seymour One", "Shadows Into Light" => "Shadows Into Light", "Shadows Into Light Two" => "Shadows Into Light Two", "Shanti" => "Shanti", "Share" => "Share", "Share Tech" => "Share Tech", "Share Tech Mono" => "Share Tech Mono", "Shojumaru" => "Shojumaru", "Short Stack" => "Short Stack", "Siemreap" => "Siemreap", "Sigmar One" => "Sigmar One", "Signika" => "Signika", "Signika Negative" => "Signika Negative", "Simonetta" => "Simonetta", "Sintony" => "Sintony", "Sirin Stencil" => "Sirin Stencil", "Six Caps" => "Six Caps", "Skranji" => "Skranji", "Slackey" => "Slackey", "Smokum" => "Smokum", "Smythe" => "Smythe", "Sniglet" => "Sniglet", "Snippet" => "Snippet", "Snowburst One" => "Snowburst One", "Sofadi One" => "Sofadi One", "Sofia" => "Sofia", "Sonsie One" => "Sonsie One", "Sorts Mill Goudy" => "Sorts Mill Goudy", "Source Code Pro" => "Source Code Pro", "Source Sans Pro" => "Source Sans Pro", "Special Elite" => "Special Elite", "Spicy Rice" => "Spicy Rice", "Spinnaker" => "Spinnaker", "Spirax" => "Spirax", "Squada One" => "Squada One", "Stalemate" => "Stalemate", "Stalinist One" => "Stalinist One", "Stardos Stencil" => "Stardos Stencil", "Stint Ultra Condensed" => "Stint Ultra Condensed","Stint Ultra Expanded" => "Stint Ultra Expanded", "Stoke" => "Stoke", "Strait" => "Strait", "Sue Ellen Francisco" => "Sue Ellen Francisco", "Sunshiney" => "Sunshiney", "Supermercado One" => "Supermercado One", "Suwannaphum" => "Suwannaphum", "Swanky and Moo Moo" => "Swanky and Moo Moo", "Syncopate" => "Syncopate", "Tangerine" => "Tangerine", "Taprom" => "Taprom", "Tauri" => "Tauri", "Telex" => "Telex", "Tenor Sans" => "Tenor Sans", "Text Me One" => "Text Me One", "The Girl Next Door" => "The Girl Next Door", "Tienne" => "Tienne", "Tinos" => "Tinos", "Titan One" => "Titan One", "Titillium Web" => "Titillium Web", "Trade Winds" => "Trade Winds", "Trocchi" => "Trocchi", "Trochut" => "Trochut", "Trykker" => "Trykker", "Tulpen One" => "Tulpen One", "Ubuntu" => "Ubuntu", "Ubuntu Condensed" => "Ubuntu Condensed", "Ubuntu Mono" => "Ubuntu Mono", "Ultra" => "Ultra", "Uncial Antiqua" => "Uncial Antiqua", "Underdog" => "Underdog", "Unica One" => "Unica One", "UnifrakturCook" => "UnifrakturCook", "UnifrakturMaguntia" => "UnifrakturMaguntia", "Unkempt" => "Unkempt", "Unlock" => "Unlock", "Unna" => "Unna", "VT323" => "VT323", "Vampiro One" => "Vampiro One", "Varela" => "Varela", "Varela Round" => "Varela Round", "Vast Shadow" => "Vast Shadow", "Vibur" => "Vibur", "Vidaloka" => "Vidaloka", "Viga" => "Viga", "Voces" => "Voces", "Volkhov" => "Volkhov", "Vollkorn" => "Vollkorn", "Voltaire" => "Voltaire", "Waiting for the Sunrise" => "Waiting for the Sunrise", "Wallpoet" => "Wallpoet", "Walter Turncoat" => "Walter Turncoat", "Warnes" => "Warnes", "Wellfleet" => "Wellfleet", "Wendy One" => "Wendy One", "Wire One" => "Wire One", "Yanone Kaffeesatz" => "Yanone Kaffeesatz", "Yellowtail" => "Yellowtail", "Yeseva One" => "Yeseva One", "Yesteryear" => "Yesteryear", "Zeyada" => "Zeyada" );

	$sizes = array (
		'normal' => 'normal',
		'12px' => '12px',
		'13px' => '13px',
		'14px' => '14px',
		'15px' => '15px',
		'16px' => '16px',
		'17px' => '17px',
		'18px' => '18px',
		'19px' => '19px',
		'20px' => '20px',
		'21px' => '21px',
		'22px' => '22px',
		'23px' => '23px',
		'24px' => '24px',
		'25px' => '25px',
		'26px' => '26px',
		'27px' => '27px',
		'28px' => '28px',
		'29px' => '29px',
		'30px' => '30px',
		'31px' => '31px',
		'32px' => '32px'
	);

	$heights = array (
		'normal' => 'normal',
		'12px' => '12px',
		'13px' => '13px',
		'14px' => '14px',
		'15px' => '15px',
		'16px' => '16px',
		'17px' => '17px',
		'18px' => '18px',
		'19px' => '19px',
		'20px' => '20px',
		'21px' => '21px',
		'22px' => '22px',
		'23px' => '23px',
		'24px' => '24px',
		'25px' => '25px',
		'26px' => '26px',
		'27px' => '27px',
		'28px' => '28px',
		'29px' => '29px',
		'30px' => '30px',
		'31px' => '31px',
		'32px' => '32px'
	);

	$styles = array (
		'normal' => 'normal',
		'italic' => 'italic'
	);

	$weights = array (
		'normal' => 'normal',
		'100' => '100',
		'200' => '200',
		'300' => '300',
		'400' => '400',
		'500' => '500',
		'600' => '600',
		'700' => '700',
		'800' => '800'
	);

	$bg_orientation = array (
		'left-landscape' => __( 'Landscape Left' ),
		'right-landscape' => __( 'Landscape Right' ),
		'left-portrait' => __( 'Portrait Left' ),
		'right-portrait' => __( 'Portrait Right' ),
		'pattern' => __( 'Pattern' ),
		'pattern-top' => __( 'Top Pattern' ),
		'pattern-bottom' => __( 'Bottom Pattern' ),
		'frame' => __( 'Frame' )
	);
	
	$presets = array (
		'Custom' => 'Custom'
	);

	$loaded_presets = get_option('sdbrclrzr_presets');

	if ( isset($loaded_presets) && !empty($loaded_presets) && is_array($loaded_presets) ) {
		ksort($loaded_presets);
		$presets = $presets + $loaded_presets;
	}

?>
		<div id="<?php echo $unique_id; ?>" class="wdgtclrzr-widget" data-mode="sidebar">
			<h4><?php _e('Import/Export:', 'wdgtclrzr_strings'); ?></h4>
			<div class="wdgtclrzr-clear"></div>
			<div class="wdgtclrzr-ui">
				<a class="button wdgtclrzr-import" href="#"><?php _e('Import styles', 'wdgtclrzr_strings'); ?></a>
				<a class="button wdgtclrzr-export-selected" href="#"><?php _e('Export selected', 'wdgtclrzr_strings'); ?></a>
				<a class="button wdgtclrzr-export-all" href="#"><?php _e('Export all', 'wdgtclrzr_strings'); ?></a>
				<div class="wdgtclrzr-textarea wdgtclrzr-import-textarea">
					<textarea id="wdgtclrzr-import"></textarea>
					<small><?php _e('Paste in the code', 'wdgtclrzr_strings'); ?></small><br/>
					<a class="button wdgtclrzr-import-ajax" href="#"><?php _e('Import', 'wdgtclrzr_strings'); ?></a>
				</div>
			</div>
			<h4><?php _e('Preset settings:', 'wdgtclrzr_strings'); ?></h4>
			<div class="wdgtclrzr-clear"></div>
			<div class="wdgtclrzr-presets">
				<div class="wdgtclrzr-input wdgtclrzr-full wdgtclrzr-first">
					<label for="<?php echo $this->get_field_id('preset'); ?>" class="wdgtclrzr-label"><?php _e('Select preset:', 'wdgtclrzr_strings'); ?></label>
					<select id="<?php echo $this->get_field_id('preset'); ?>" name="<?php echo $this->get_field_name('preset'); ?>">
					<?php
						foreach ( $presets as $k => $v ) :
							printf( '<option value="%1$s" %2$s>%1$s</option>', $k, ( $selected = ( $instance['preset'] == $k) ? 'selected = "selected"' : '' ) );
						endforeach;
					?>
					</select>
					<small><?php _e('Select preset or "Custom" mode.', 'wdgtclrzr_strings'); ?></small>
				</div>
				<div class="wdgtclrzr-input wdgtclrzr-full">
					<a class="button wdgtclrzr-save" href="#"><?php _e('Save current'); ?></a>
					<a class="button wdgtclrzr-delete" href="#"><?php _e('Delete selected'); ?></a>
					<a class="button wdgtclrzr-load" href="#"><?php _e('Load selected'); ?></a>
				</div>
			</div>
			<div class="wdgtclrzr-clear"></div>
			<h4 class="wdgtclrzr-custom"><?php _e('Custom style:', 'wdgtclrzr_strings'); ?></h4>
			<div class="wdgtclrzr-clear"></div>
			<a class="button wdgtclrzr-reset" href="#"><?php _e('Reset custom fields', 'wdgtclrzr_strings'); ?></a>
			<h5><?php _e('Main colors:', 'wdgtclrzr_strings'); ?></h5>
			<div class="wdgtclrzr-box">
				<label for="<?php echo $this->get_field_id('c_title'); ?>" class="wdgtclrzr-label"><?php  _e('Title:', 'wdgtclrzr_strings'); ?></label>
				<input name="<?php echo $this->get_field_name('c_title'); ?>" id="<?php echo $this->get_field_id('c_title'); ?>" class="wdgtclrzr-color" type="text" value="<?php echo esc_attr($c_title); ?>" data-default-color="#ffffff"/>
			</div>
			<div class="wdgtclrzr-box">
				<label for="<?php echo $this->get_field_id('c_text'); ?>" class="wdgtclrzr-label"><?php _e('Text:', 'wdgtclrzr_strings'); ?></label>
				<input name="<?php echo $this->get_field_name('c_text'); ?>" id="<?php echo $this->get_field_id('c_text'); ?>" class="wdgtclrzr-color" type="text" value="<?php echo esc_attr($c_text); ?>" data-default-color="#ffffff"/>
			</div>
			<div class="wdgtclrzr-box">
				<label for="<?php echo $this->get_field_id('c_link'); ?>" class="wdgtclrzr-label"><?php _e('Link:', 'wdgtclrzr_strings'); ?></label>
				<input name="<?php echo $this->get_field_name('c_link'); ?>" id="<?php echo $this->get_field_id('c_link'); ?>" class="wdgtclrzr-color" type="text" value="<?php echo esc_attr($c_link); ?>" data-default-color="#ffffff"/>
			</div>
			<div class="wdgtclrzr-box">
				<label for="<?php echo $this->get_field_id('c_hover'); ?>" class="wdgtclrzr-label"><?php _e('Link Hover:', 'wdgtclrzr_strings'); ?></label>
				<input name="<?php echo $this->get_field_name('c_hover'); ?>" id="<?php echo $this->get_field_id('c_hover'); ?>" class="wdgtclrzr-color" type="text" value="<?php echo esc_attr($c_hover); ?>" data-default-color="#ffffff"/>
			</div>
			<div class="wdgtclrzr-box">
				<label for="<?php echo $this->get_field_id('c_background'); ?>" class="wdgtclrzr-label"><?php _e('Background:', 'wdgtclrzr_strings'); ?></label>
				<input name="<?php echo $this->get_field_name('c_background'); ?>" id="<?php echo $this->get_field_id('c_background'); ?>" class="wdgtclrzr-color" type="text" value="<?php echo esc_attr($c_background); ?>" data-default-color="#ffffff"/>
			</div>
			<div class="wdgtclrzr-clear"></div>
			<h5><?php _e('Background image:', 'wdgtclrzr_strings'); ?></h5>
			<div class="wdgtclrzr-background">
				<div class="wdgtclrzr-input wdgtclrzr-large wdgtclrzr-first wdgtclrzr-background-input">
					<label for="<?php echo $this->get_field_id('bg_image'); ?>" class="wdgtclrzr-label"><?php _e('Background image:', 'wdgtclrzr_strings'); ?></label>
					<input name="<?php echo $this->get_field_name('bg_image'); ?>" id="<?php echo $this->get_field_id('bg_image'); ?>" type="text" value="<?php echo $bg_image; ?>" class="wdgtclrzr-background-input" />
				</div>
				<div class="wdgtclrzr-input wdgtclrzr-large">
					<label for="<?php echo $this->get_field_id('bg_orientation'); ?>" class="wdgtclrzr-label"><?php _e('Background orientation:', 'wdgtclrzr_strings'); ?></label>
					<select id="<?php echo $this->get_field_id('bg_orientation'); ?>" name="<?php echo $this->get_field_name('bg_orientation'); ?>">
					<?php
						foreach ( $bg_orientation as $k => $v ) :
							printf( '<option value="%1$s" %3$s>%2$s</option>', $k, $v, ( $selected = ( $instance['bg_orientation'] == $k) ? 'selected = "selected"' : '' ) );
						endforeach;
					?>
					</select>
				</div>
				<a class="button wdgtclrzr-upload" href="#"><?php _e('Upload image', 'wdgtclrzr_strings'); ?></a>
			</div>
			<h5><?php _e('Title font:', 'wdgtclrzr_strings'); ?></h5>
			<div class="wdgtclrzr-font">
				<div class="wdgtclrzr-font-input">
					<label for="<?php echo $this->get_field_id('f_title'); ?>" class="wdgtclrzr-label"><?php _e('Title font:', 'wdgtclrzr_strings'); ?></label>
					<select id="<?php echo $this->get_field_id('f_title'); ?>" name="<?php echo $this->get_field_name('f_title'); ?>">
					<?php
						foreach ( $fonts as $k => $v ) :
							printf( '<option value="%1$s" %3$s>%2$s</option>', $k, $v, ( $selected = ( $instance['f_title'] == $k) ? 'selected = "selected"' : '' ) );
						endforeach;
					?>
					</select>
				</div>
				<div class="wdgtclrzr-font-size">
					<label for="<?php echo $this->get_field_id('f_title_size'); ?>" class="wdgtclrzr-label"><?php _e('Size:', 'wdgtclrzr_strings'); ?></label>
					<select id="<?php echo $this->get_field_id('f_title_size'); ?>" name="<?php echo $this->get_field_name('f_title_size'); ?>">
					<?php
						foreach ( $sizes as $k => $v ) :
							printf( '<option value="%1$s" %3$s>%2$s</option>', $k, $v, ( $selected = ( $instance['f_title_size'] == $k) ? 'selected = "selected"' : '' ) );
						endforeach;
					?>
					</select>
				</div>
				<div class="wdgtclrzr-font-height">
					<label for="<?php echo $this->get_field_id('f_title_height'); ?>" class="wdgtclrzr-label"><?php _e('Line height:', 'wdgtclrzr_strings'); ?></label>
					<select id="<?php echo $this->get_field_id('f_title_height'); ?>" name="<?php echo $this->get_field_name('f_title_height'); ?>">
					<?php
						foreach ( $heights as $k => $v ) :
							printf( '<option value="%1$s" %3$s>%2$s</option>', $k, $v, ( $selected = ( $instance['f_title_height'] == $k) ? 'selected = "selected"' : '' ) );
						endforeach;
					?>
					</select>
				</div>
				<div class="wdgtclrzr-font-style">
					<label for="<?php echo $this->get_field_id('f_title_style'); ?>" class="wdgtclrzr-label"><?php _e('Style:', 'wdgtclrzr_strings'); ?></label>
					<select id="<?php echo $this->get_field_id('f_title_style'); ?>" name="<?php echo $this->get_field_name('f_title_style'); ?>">
					<?php
						foreach ( $styles as $k => $v ) :
							printf( '<option value="%1$s" %3$s>%2$s</option>', $k, $v, ( $selected = ( $instance['f_title_style'] == $k) ? 'selected = "selected"' : '' ) );
						endforeach;
					?>
					</select>
				</div>
				<div class="wdgtclrzr-font-weight">
					<label for="<?php echo $this->get_field_id('f_title_weight'); ?>" class="wdgtclrzr-label"><?php _e('Weight:', 'wdgtclrzr_strings'); ?></label>
					<select id="<?php echo $this->get_field_id('f_title_weight'); ?>" name="<?php echo $this->get_field_name('f_title_weight'); ?>">
					<?php
						foreach ( $weights as $k => $v ) :
							printf( '<option value="%1$s" %3$s>%2$s</option>', $k, $v, ( $selected = ( $instance['f_title_weight'] == $k) ? 'selected = "selected"' : '' ) );
						endforeach;
					?>
					</select>
				</div>
				<div class="wdgtclrzr-clear"></div>
			</div>
			<h5><?php _e('Text font:', 'wdgtclrzr_strings'); ?></h5>
			<div class="wdgtclrzr-font">
				<div class="wdgtclrzr-font-input">
					<label for="<?php echo $this->get_field_id('f_text'); ?>" class="wdgtclrzr-label"><?php _e('Text font:', 'wdgtclrzr_strings'); ?></label>
					<select id="<?php echo $this->get_field_id('f_text'); ?>" name="<?php echo $this->get_field_name('f_text'); ?>">
					<?php
						foreach ( $fonts as $k => $v ) :
							printf( '<option value="%1$s" %3$s>%2$s</option>', $k, $v, ( $selected = ( $instance['f_text'] == $k) ? 'selected = "selected"' : '' ) );
						endforeach;
					?>
					</select>
				</div>
				<div class="wdgtclrzr-font-size">
					<label for="<?php echo $this->get_field_id('f_text_size'); ?>" class="wdgtclrzr-label"><?php _e('Size:', 'wdgtclrzr_strings'); ?></label>
					<select id="<?php echo $this->get_field_id('f_text_size'); ?>" name="<?php echo $this->get_field_name('f_text_size'); ?>">
					<?php
						foreach ( $sizes as $k => $v ) :
							printf( '<option value="%1$s" %3$s>%2$s</option>', $k, $v, ( $selected = ( $instance['f_text_size'] == $k) ? 'selected = "selected"' : '' ) );
						endforeach;
					?>
					</select>
				</div>
				<div class="wdgtclrzr-font-height">
					<label for="<?php echo $this->get_field_id('f_text_height'); ?>" class="wdgtclrzr-label"><?php _e('Line height:', 'wdgtclrzr_strings'); ?></label>
					<select id="<?php echo $this->get_field_id('f_text_height'); ?>" name="<?php echo $this->get_field_name('f_text_height'); ?>">
					<?php
						foreach ( $heights as $k => $v ) :
							printf( '<option value="%1$s" %3$s>%2$s</option>', $k, $v, ( $selected = ( $instance['f_text_height'] == $k) ? 'selected = "selected"' : '' ) );
						endforeach;
					?>
					</select>
				</div>
				<div class="wdgtclrzr-font-style">
					<label for="<?php echo $this->get_field_id('f_text_style'); ?>" class="wdgtclrzr-label"><?php _e('Style:', 'wdgtclrzr_strings'); ?></label>
					<select id="<?php echo $this->get_field_id('f_text_style'); ?>" name="<?php echo $this->get_field_name('f_text_style'); ?>">
					<?php
						foreach ( $styles as $k => $v ) :
							printf( '<option value="%1$s" %3$s>%2$s</option>', $k, $v, ( $selected = ( $instance['f_text_style'] == $k) ? 'selected = "selected"' : '' ) );
						endforeach;
					?>
					</select>
				</div>
				<div class="wdgtclrzr-font-weight">
					<label for="<?php echo $this->get_field_id('f_text_weight'); ?>" class="wdgtclrzr-label"><?php _e('Weight:', 'wdgtclrzr_strings'); ?></label>
					<select id="<?php echo $this->get_field_id('f_text_weight'); ?>" name="<?php echo $this->get_field_name('f_text_weight'); ?>">
					<?php
						foreach ( $weights as $k => $v ) :
							printf( '<option value="%1$s" %3$s>%2$s</option>', $k, $v, ( $selected = ( $instance['f_text_weight'] == $k) ? 'selected = "selected"' : '' ) );
						endforeach;
					?>
					</select>
				</div>
				<div class="wdgtclrzr-clear"></div>
			</div>
			<h5><?php _e('Border colors:', 'wdgtclrzr_strings'); ?></h5>
			<div class="wdgtclrzr-box">
				<label for="<?php echo $this->get_field_id('c_border_top'); ?>" class="wdgtclrzr-label"><?php _e('Border top:', 'wdgtclrzr_strings'); ?></label>
				<input name="<?php echo $this->get_field_name('c_border_top'); ?>" id="<?php echo $this->get_field_id('c_border_top'); ?>" class="wdgtclrzr-color" type="text" value="<?php echo esc_attr($c_border_top); ?>" data-default-color="#ffffff"/>
			</div>
			<div class="wdgtclrzr-box">
				<label for="<?php echo $this->get_field_id('c_border_right'); ?>" class="wdgtclrzr-label"><?php _e('Border right:', 'wdgtclrzr_strings'); ?></label>
				<input name="<?php echo $this->get_field_name('c_border_right'); ?>" id="<?php echo $this->get_field_id('c_border_right'); ?>" class="wdgtclrzr-color" type="text" value="<?php echo esc_attr($c_border_right); ?>" data-default-color="#ffffff"/>
			</div>
			<div class="wdgtclrzr-box">
				<label for="<?php echo $this->get_field_id('c_border_bottom'); ?>" class="wdgtclrzr-label"><?php _e('Border bottom:', 'wdgtclrzr_strings'); ?></label>
				<input name="<?php echo $this->get_field_name('c_border_bottom'); ?>" id="<?php echo $this->get_field_id('c_border_bottom'); ?>" class="wdgtclrzr-color" type="text" value="<?php echo esc_attr($c_border_bottom); ?>" data-default-color="#ffffff"/>
			</div>
			<div class="wdgtclrzr-box">
				<label for="<?php echo $this->get_field_id('c_border_left'); ?>" class="wdgtclrzr-label"><?php _e('Border left:', 'wdgtclrzr_strings'); ?></label>
				<input name="<?php echo $this->get_field_name('c_border_left'); ?>" id="<?php echo $this->get_field_id('c_border_left'); ?>" class="wdgtclrzr-color" type="text" value="<?php echo esc_attr($c_border_left); ?>" data-default-color="#ffffff"/>
			</div>
			<div class="wdgtclrzr-clear"></div>
			<h5><?php _e('Border width:', 'wdgtclrzr_strings'); ?></h5>
			<div class="wdgtclrzr-input wdgtclrzr-first">
				<label for="<?php echo $this->get_field_id('b_top_width'); ?>" class="wdgtclrzr-label"><?php _e('Top width:', 'wdgtclrzr_strings'); ?></label>
				<input name="<?php echo $this->get_field_name('b_top_width'); ?>" id="<?php echo $this->get_field_id('b_top_width'); ?>" type="text" value="<?php echo $b_top_width; ?>" />
			</div>
			<div class="wdgtclrzr-input">
				<label for="<?php echo $this->get_field_id('b_right_width'); ?>" class="wdgtclrzr-label"><?php _e('Right width:', 'wdgtclrzr_strings'); ?></label>
				<input name="<?php echo $this->get_field_name('b_right_width'); ?>" id="<?php echo $this->get_field_id('b_right_width'); ?>" type="text" value="<?php echo $b_right_width; ?>" />
			</div>
			<div class="wdgtclrzr-input">
				<label for="<?php echo $this->get_field_id('b_bottom_width'); ?>" class="wdgtclrzr-label"><?php _e('Bottom width:', 'wdgtclrzr_strings'); ?></label>
				<input name="<?php echo $this->get_field_name('b_bottom_width'); ?>" id="<?php echo $this->get_field_id('b_bottom_width'); ?>" type="text" value="<?php echo $b_bottom_width; ?>" />
			</div>
			<div class="wdgtclrzr-input">
				<label for="<?php echo $this->get_field_id('b_left_width'); ?>" class="wdgtclrzr-label"><?php _e('Left width:', 'wdgtclrzr_strings'); ?></label>
				<input name="<?php echo $this->get_field_name('b_left_width'); ?>" id="<?php echo $this->get_field_id('b_left_width'); ?>" type="text" value="<?php echo $b_left_width; ?>" />
			</div>
			<div class="wdgtclrzr-clear"></div>
			<h5><?php _e('Padding:', 'wdgtclrzr_strings'); ?></h5>
			<div class="wdgtclrzr-input wdgtclrzr-first">
				<label for="<?php echo $this->get_field_id('p_top'); ?>" class="wdgtclrzr-label"><?php _e('Padding top width:', 'wdgtclrzr_strings'); ?></label>
				<input name="<?php echo $this->get_field_name('p_top'); ?>" id="<?php echo $this->get_field_id('p_top'); ?>" type="text" value="<?php echo $p_top; ?>" />
			</div>
			<div class="wdgtclrzr-input">
				<label for="<?php echo $this->get_field_id('p_right'); ?>" class="wdgtclrzr-label"><?php _e('Padding right width:', 'wdgtclrzr_strings'); ?></label>
				<input name="<?php echo $this->get_field_name('p_right'); ?>" id="<?php echo $this->get_field_id('p_right'); ?>" type="text" value="<?php echo $p_right; ?>" />
			</div>
			<div class="wdgtclrzr-input">
				<label for="<?php echo $this->get_field_id('p_bottom'); ?>" class="wdgtclrzr-label"><?php _e('Padding bottom width:', 'wdgtclrzr_strings'); ?></label>
				<input name="<?php echo $this->get_field_name('p_bottom'); ?>" id="<?php echo $this->get_field_id('p_bottom'); ?>" type="text" value="<?php echo $p_bottom; ?>" />
			</div>
			<div class="wdgtclrzr-input">
				<label for="<?php echo $this->get_field_id('p_left'); ?>" class="wdgtclrzr-label"><?php _e('Padding left width:', 'wdgtclrzr_strings'); ?></label>
				<input name="<?php echo $this->get_field_name('p_left'); ?>" id="<?php echo $this->get_field_id('p_left'); ?>" type="text" value="<?php echo $p_left; ?>" />
			</div>
			<div class="wdgtclrzr-clear"></div>
			<h5><?php _e('Extras:', 'wdgtclrzr_strings'); ?></h5>
			<div class="wdgtclrzr-input wdgtclrzr-large wdgtclrzr-first">
				<label for="<?php echo $this->get_field_id('e_radius'); ?>" class="wdgtclrzr-label"><?php _e('Border radius:', 'wdgtclrzr_strings'); ?></label>
				<input name="<?php echo $this->get_field_name('e_radius'); ?>" id="<?php echo $this->get_field_id('e_radius'); ?>" type="text" value="<?php echo $e_radius; ?>" />
			</div>
			<div class="wdgtclrzr-input wdgtclrzr-large">
				<label for="<?php echo $this->get_field_id('e_shadow'); ?>" class="wdgtclrzr-label"><?php _e('Box shadow:', 'wdgtclrzr_strings'); ?></label>
				<input name="<?php echo $this->get_field_name('e_shadow'); ?>" id="<?php echo $this->get_field_id('e_shadow'); ?>" type="text" value="<?php echo $e_shadow; ?>" />
			</div>
			<div class="wdgtclrzr-clear"></div>
			<h5><?php _e('Custom CSS:', 'wdgtclrzr_strings'); ?></h5>
			<div class="wdgtclrzr-textarea">
				<label for="<?php echo $this->get_field_id('custom_css'); ?>" class="wdgtclrzr-label"><?php _e('Custom CSS:', 'wdgtclrzr_strings'); ?></label>
				<textarea name="<?php echo $this->get_field_name('custom_css'); ?>" id="<?php echo $this->get_field_id('custom_css'); ?>" type="text"><?php echo $custom_css; ?></textarea>
				<small><?php _e('Use @sidebar prefix for writing CSS.', 'wdgtclrzr_strings'); ?><br /><?php _e('e.g. @sidebar li {border-top:1px solid #ccc;}', 'wdgtclrzr_strings'); ?></small>
			</div>
		</div>
<?php
	}
}

/**
 * Register Widget
 */
function sdbrclrzr_register_widgets() {
	register_widget( 'Sdbrclrzr' );
}
add_action( 'widgets_init', 'sdbrclrzr_register_widgets' );

?>