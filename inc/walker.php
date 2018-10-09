<?php
/*
    ==================================
        WALKER NAV CLASS
    ==================================
*/

class SDS_Walker_Nav_Primary extends Walker_Nav_menu {
	
	//&$output = & przekazuje do wordpressa, żeby nie zmieniał struktóru tablicy $output, jeżeli nie dodamy & na początku tablica $output będzie pusta
	//$depth = automatycznie sprawdza ile poziomów ma nasze menu
	function start_lvl( &$output, $depth = 0, $args = array() ){ //ul
		$indent = str_repeat("\t",$depth);
		//jeżeli mamy więcej niz 1 poziom dodajemy klase sub-menu do naszego menu
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
	}
	
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){ //li a span
		
		$indent = ( $depth ) ? str_repeat("\t",$depth) : '';
		
		$li_attributes = '';
		$class_names = $value = '';
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		//sprawdza czy mamy kolejny ul w jakims elemencie li, jeżeli tak dodajemy bootstrapowa klase dorpdown
		$classes[] = ($args->walker->has_children) ? 'dropdown' : '';
		//sprawdzamy czy elemenut menu w który klikneliśmy jest naszą stroną 
		$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
		$classes[] = 'nav-item header__navbar-item menu-item-' . $item->ID;
		if( $depth && $args->walker->has_children ){
			$classes[] = 'dropdown-submenu';
		}
		
		$class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr($class_names) . '"';
		
		$id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
		
		$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
		
		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';
		
		$attributes .= ( $args->walker->has_children ) ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';
		
		//otwieramy finalizacje outputu menu
		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= ( $depth == 0 && $args->walker->has_children ) ? ' <b class="caret"></b></a>' : '</a>';
		$item_output .= $args->after;
		//zamykamy finalizacje outputu menu
		
		$output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		
	}
	
}


class Walker_Nav_Primary extends Walker_Nav_menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) { //ul

		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\"dropdown-menu header__dropdown-menu depth-$depth\">";
	}

	//$item - reprezentuje wszystkie element znajdujące się w pojedyńczym elemencie w tym przypadku 'a' znajdujacy sie wewnatrz 'li', posiada wszystkie atrybuty tego elementu
	//$args - tablica, która zawiera wszystkie informacje o elemencie $item. To co jest przed i pod elemenice $item i czy ten $item posiada dzieci lub inne informacje 
	//$id - id elementu
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) { //li a span

		$indent = ($depth) ? str_repeat( "\t", $depth ) : '';

		//puste zmienne
		$li_attributes = '';
		$class_names = $value = '';

		/**
		 * Deklaracje dla klass elementu <li>
		 */

		//sprawdzamy element $item czy posiada klasy. W przypadku gdy element jest pusty przypisujemy zmiennej pustą tablicę.
		//podstawowe klasy elementu $item są przypisywane przez wordpress'a oraz można dodać własne w panelu admin w zakładce menu
		$classes = empty($item->classes) ? array() : (array) $item->classes;

		//sprawdzamy czy nasz element $item posiada potomstwo ( czy wewnątrz <li> jest kolejny <ul> ) i nadajemu mu odpowiednia klasę
		// $classes[] = ( $args->walker->has_children ) ? 'dropdown-menu header__dropdown-menu' : '';

		//sprawdzamy czy jesteśmy na aktywnej stronie lub czy element submenu jest aktywną stroną i dodajemy klasę 'active' do podświetlenia linku
		$classes[] = ( $item->current || $item->current_item_ancestor ) ? 'active' : '';

		//defaultowa klasa dodawana przez wordpress'a
		$classes[] = 'menu-item-' . $item->ID;

		//sprawdzamy poziom $depth, jeżeli jesteśmy na poziomie 0 dodajemy klasę 'dropdown'
		//jeżeli jesteśmy na poziomie 1, czyli w wewnętrznym menu dodajemy klasy 'dropdown dropdown-submenu'
		if ( $args->walker->has_children && $depth === 0 ) {
			$classes[] = 'dropdown';
		} elseif( $args->walker->has_children && $depth > 0 ) {
			$classes[] = 'dropdown dropdown-submenu';
		}
		
		//używamy filtru wordpress'a który odpowiada za dodawanie klass oraz łączymy wcześniej zdefiniowane klasy do zmiennej, bez użycia filtru wordpress się posypie 
		//filtr musi zostać dodany do każdej klasy, którą stworzyliśmy. Tutaj przychodzi array_filter() , funkcja przechodzi przez każdy element w tablicy $classes i dodaje filtr do tych elementów
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter($classes), $item, $args ) );

		//zmienna utworzona powyżej nie jest czytelna dla wordpress'a, kożystamy z esc_attr() żeby odpowiednio ją sformatować oraz dodajemy ogólne klasy do naszego <li>
		$class_names = $class_names ? ' class="navigation__item '. esc_attr( $class_names ) .' " ' : '';


		/**
		 * deklaracje dla id elementu <li>
		 */

		//kolejny filte wordpress'a tym razem obsługujący dodawanie id. Dodajemy defaulowe id dodawane przez wordpress'a
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );

		//sprawdzamy czy zmienna $id nie jest pusta, żeby przypadkiem nie wydrukować atrybutu id="", jeżeli jest pusta nie tworzymy atrybutu id
		$id = strlen($id) ? ' id=" '. esc_attr( $id ) .' " ' : '';

		//tworzymy output elementu <li>
		$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

		/**
		 * deklaracje atrybutów elementu <a>
		 */

		//tworzymy tablicę z atrybutami elementu <a>
		$atts = array();
		$atts['title']	= !empty($item->title) 	? $item->title 	: '';
		$atts['target']	= !empty($item->target) ? $item->target : '';
		$atts['rel']	= !empty($item->xfn) 	? $item->xfn 	: '';
		$atts['href']	= !empty($item->url) 	? $item->url 	: '';

		//sprawdzamy czy jesteśmy w wewnętrznym menu i dodajemy odpowiednie wartości atrybutów dla elementu <a>
		//pierwszy element <a> wewnątrz <li>, który posiada sub-menu == <li><a>
		if($args->walker->has_children){

			$atts['href']			= '#';
			$atts['data-toggle']	= 'dropdown';
			$atts['class']			= 'dropdown-toggle nav-link header__navbar-link';
			$atts['aria-haspopup']	= 'true';

		}else {
			$atts['href'] 			= !empty($item->url) ? $item->url : '';
			$atts['class']			= 'navigation__link';
		}
		//sprawdzamy kolejny poziom, poziom sum-menu == <li><a><ul><li><a>
		//sprawdzamy czy w tablicy $item->classes zostałą dodana wordpressow'a klasa 'menu_item_has_children' jeżeli tak przypisujemy atrybutom odpowiednie klasy bootstrap'a
		if( $depth > 0 && !in_array( 'menu-item-has-children', $classes ) ){
			$atts['class'] 			= 'dropdown-item header__dropdown-item';
		}
		//jeżeli jest dodana klasa 'menu_item_has_children' oznacza to że wewnątrz jest kolejne sub-menu
		elseif( $depth > 0 && in_array( 'menu-item-has-children', $classes ) ) {
			$atts['data-toggle']	= 'dropdown';
			$atts['class']			= 'dropdown-toggle dropdown-item header__dropdown-item';
		} else {

		}

		//filtr obsługujący atrybuty linku
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

		//w pętli przerabiamy tablicę $atts na zwykłą zmienną ze stringiem 
		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		/**
		 * finalizacja $outputu
		*/

		//przed otwarciem finalizującego outputu trzeba zawsze użyć $args->before. Są to klasy generowane przez wordpress'a. ->before i ->after tworza odpowiedni opakowanie dla neszego elementu
		$item_output = $args->before;
		
		$item_output .= '<a' . $attributes . '>';

		//po otwarciu elementu <a> teraz generujemy nazwe naszego linku
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

		//dodajemy strzałeczkę elementom <a> które mają sub-menu
		$item_output .= ( $depth == 0 && $args->walker->has_children ) ? ' <span class="caret"></span></a>' : '</a>';
		
		//przed zamknieciem finalizującego outputu trzeba zawsze użyć $args->after. 
		$item_output .= $args->after;
		
		//kolejny filtr odpowiedzialny za nav_menu
		$output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		
	}

}