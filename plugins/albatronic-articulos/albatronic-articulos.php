<?php
/*
Plugin Name: Albatronic Artículos
Plugin URI: http://www.albatronic.com/
Description: Recupera los datos de la ficha de un artículo de la tienda online a partir del CODIGO ó EAN.
Version: 0.0.1
Author: Informática ALBATRONIC
Author URI: http://www.albatronic.com/
*/

// hay que definir la URL del JSON del detalle

// inits json decoder/encoder object if not already available
global $wp_version;
if ( version_compare( $wp_version, '2.9', '<' ) && !class_exists( 'Services_JSON' ) )
{
	include_once( dirname( __FILE__ ) . '/class.json.php' );
}

add_shortcode('albatronicArticulo', 'albatronic_il_shortcode' );

function albatronic_il_shortcode($attr, $content) 
{
	extract( shortcode_atts( array(
		'ean' => ''
	), $attr ) );
	
	$contenido = "";
	
	$isbn = htmlspecialchars(stripcslashes($isbn));
	
	$contenido = albatronic_il_get_ficha($isbn);
	
	return $contenido;
}

function albatronic_il_get_ficha($isbn, $contador = 0, $tipo_template='')
{		
	// deberiamos que comprobar que sea un ISBN correcto
	// falta todo el tema de la cache
	// la url del weblib podria ser configurable ¿interesa?
	
	$devuelve = "";
	$contador++; // empieza desde cero
	
	// le quitamos cualquier espacio en blanco
	$isbn = trim($isbn);
	
	if($isbn != "")
	{
		// obtiene los datos
		$albatronic_url_masvendidos = esc_url_raw( 'http://www.dominio.com/detalleJson.php?isbn=' . $isbn, array('http', 'https') );
		//echo "<p>".$albatronic_url_masvendidos."</p>"; exit;
	
		/*
		IMPORTANTE
		En wirt65des no funicionan estas llamadas.
		Activar las lineas marcadas con // virt65des y anular los valores de prueba en las
		variables $response_code y $datos_mv.
		*/
		// virt65des $response = wp_remote_get( $albatronic_url_masvendidos, array( 'User-Agent' => 'WordPress Weblib' ) );
		//var_dump($response); exit;
		
		// virt65des $response_code = wp_remote_retrieve_response_code( $response );
		$response_code = 200;
		if ( 200 == $response_code )
		{
			// virt65des $datos_mv = wp_remote_retrieve_body( $response );
			$datos_mv = '{"codigo":"294675","tipo_articulo":"L0","descripcion":"SUICIDIO PERFECTO","subtitulo":"","autor":"MARKARIS, PETROS","traductor":"SAMARA SPILIOTOPULU, ERSI MARINA","nombre_editorial":"TUSQUETS EDITORES, S.A.","pais":"","nombre_coleccion":"Andanzas","es_novedad":"N","pvp":"3328","pvp_euros":"20.00","pvp_bruto":"19.23","isbn":"978-84-8383-418-3","ean":"9788483834183","estado_libro":"0","tmr":"2.00","stockfirme":"12","editorial":"4581","coleccion":"","num_coleccion":"650\/3","ancho":"150","alto":"225","ilustraciones":"0","numero_paginas":"408","formato":"Otros","tema_interes":"0P","origen_edicion":"BARCELONA","fecha_edicion":"2012-06-01","agno_ultima_edi":"    ","numero_edicion":"1","ilustrador":"","ebook_codigo":null,"ebook_ref_gt":null,"ebook_size":null,"ebook_derechos":"","ebook_permisos":null,"ebook_url":null,"ebook_num_descargas":null,"ebook_link_portada":null,"ebook_cod_distribuidora":null,"ebook_permiso_venta":null,"ebook_paises":null,"ebook_formato":null,"ebook_drm":null,"ean_portada":null,"idioma":"Espa\u00f1ol","precio_oferta":null,"cod_tema":"0P","tema":"POLICIACA","titulo_alt":null,"subtitulo_alt":null,"autor_alt":null,"editorial_alt":null,"numero_paginas_alt":null,"pvp_euros_alt":null,"url_alt":null,"idioma_alt":null,"sinopsis":"","nombre_portada":null,"familia":"< Gen\u00e9rica >","tope_oferta":null,"link_editorial":"http:\/\/beta.machadolibros.com\/editorial\/tusquets-editores-s-a-\/4581\/","pvp_euros_2decimales":"20,00","ano_edicion":"2012","titulo_completo":"SUICIDIO PERFECTO","autores":[{"codigo":"","link_autor":"http:\/\/beta.machadolibros.com\/autor\/markaris-petros\/","descripcion":"MARKARIS, PETROS"}],"disponibilidad":"Disponibilidad inmediata","link":"http:\/\/beta.machadolibros.com\/libro\/suicidio-perfecto_294675","link_portada":"http:\/\/beta.machadolibros.com\/foto\/muestraPortada.php?id=9788483834183","ruta_portada":"http:\/\/beta.machadolibros.com\/es\/images\/NOportada.jpg","comprable":true,"sinopsis_editor":"El comisario Kostas Jaritos se aburre. Est\u00e1 de baja, recuper\u00e1ndose de una delicada operaci\u00f3n despu\u00e9s de que, durante la investigaci\u00f3n de un caso, le dispararan en el pecho. Por toda distracci\u00f3n, recibe algunas visitas, lee los peri\u00f3dicos y mira la televisi\u00f3n. Precisamente, una noche ve c\u00f3mo, en un programa de entrevistas, el constructor I\u00e1sonas Favieros, que ha amasado una fortuna en los \u00faltimos veinte a\u00f1os y ahora est\u00e1 enriqueci\u00e9ndose como nunca con las obras de los Juegos Ol\u00edmpicos de Atenas 2004, se suicida ante las c\u00e1maras y conmociona a todo el pa\u00eds. Se desata un alud de noticias, hip\u00f3tesis e incluso de comunicados de extra\u00f1as organizaciones, y Kostas, convertido en un ciudadano m\u00e1s, primero reflexiona y luego, todav\u00eda convaleciente, decide investigar. En esa Grecia preol\u00edmpica que se debate entre un pasado dif\u00edcil de olvidar y la arrolladora modernidad, origen de muchos de sus futuros problemas, arranca este nuevo caso del comisario Jaritos. ","sinopsis_breve":"El comisario Kostas Jaritos se aburre. Est\u00e1 de baja, recuper\u00e1ndose de una delicada operaci\u00f3n despu\u00e9s de que, durante la investigaci\u00f3n de un caso, le dispararan en el pecho. Por toda distracci\u00f3n, recibe algunas visitas, lee los peri\u00f3dicos y mira la televisi\u00f3n. ","precio_descuento":"19.00","descuento":5,"tipo_descuento":"1","descripcion_descuento":"General","tema_web":{"codigo":"20","nivel":"17","descripcion":"Policiaca","tipo":"L","link":"\/libros-de\/policiaca-17\/"}}';
			
			$datos_mv = json_decode( $datos_mv, true );
	
			if ( !is_array( $datos_mv ) )
			{
				$datos_mv = 'error';
				$expire = 300;
			}
		} else {
			$datos_mv = 'error';
			$expire = 300;
		}
		
		// si obtinene unos datos correctos los muestra
		//var_dump($datos_mv); exit;
		if ( $datos_mv != 'error' )
		{		
			// prepara los datos
			$titulo = esc_html( $datos_mv['descripcion'] );
			
			//$autor = esc_html( $datos_mv['autor'] );
			$autor = "";
			$autores = $datos_mv['autores'];
			if ( is_array( $autores ) )
			{
				$totalAutores = count($autores);
				for ($i = 0; $i < $totalAutores; $i++)
				{
					if ($i > 0)
						$autor .= " / ";
							
					$autor .= $autores[$i]["descripcion"];			
				}
			}
			
			$isbn = esc_html( $datos_mv['isbn'] );
			$editorial = esc_html( $datos_mv['nombre_editorial'] );
			//$resumen = esc_html( $datos_mv['resumen'] );
			$ruta_portada = esc_url( $datos_mv['link_portada'] );
			$enlace_libro = esc_url( $datos_mv['link'] );
			$paginas = esc_html( $datos_mv['numero_paginas'] );
			$edicion = substr( esc_html( $datos_mv['fecha_edicion'] ) ,0 ,4 );
			
			$es_ebook = false;
			if ($datos_mv['ebook_codigo'] != "")
				$es_ebook = true;
			
			/*if ($tipo_template == 'home')
			{
				$devuelve .= '<li>'."\n";
		   		$devuelve .= '<div class="simg">'."\n";
		   		$devuelve .= '<a href="' . $enlace_libro . '" target="_blank"><img width="120" height="180" alt="' . $titulo . '" src="' . $ruta_portada . '"></a>'."\n";
		   		$devuelve .= '</div>'."\n";
		   		$devuelve .= '<span class="number">' . $contador . '</span>'."\n";
		   		$devuelve .= '<span class="sbook">'."\n";
		   		$devuelve .= '<p class="stitle">'. $titulo . "</p>\n";
		   		$devuelve .= '<p class="sautor">' . $autor . "</p>\n";
		   		$devuelve .= '</span>'."\n";
				$devuelve .= '</li>'."\n";
			}
			else
			{*/
				$devuelve .= '<div class="albatronic-il-short">'."\n";
				
				$devuelve .= '<div class="albatronic-enlimg"><a href="' . $enlace_libro . 
					'" target="_blank"><img src="' . $ruta_portada . 
					'" width="130" alt="' . $titulo . '" /></a>' . 
					($es_ebook?'<p class="albatronic-ebook">ebook</p>':'') . '</div>';
				
				$devuelve .= '<div class="albatronic-info">' . "\n";
				
				$devuelve .= '<p class="albatronic-titulo">'. $titulo . "</p>\n";
				
				if ($autor != "")	
					$devuelve .= '<p class="albatronic-autor">' . $autor . "</p>\n";
					
				$devuelve .= '<p class="albatronic-isbn"><span class="def">'. esc_html__('ISBN:') . ' </span>' . $isbn . "</p>\n";
				$devuelve .= '<p class="albatronic-editorial"><span class="def">'. esc_html__('Editorial:') . ' </span>'. $editorial . "</p>\n";
	
				$devuelve .= '<p class="albatronic-pages"><span class="def">'. esc_html__('N&ordm; p&aacute;ginas:') . ' </span>'. $paginas . "</p>\n";
				$devuelve .= '<p class="albatronic-date"><span class="def">'. esc_html__('A&ntilde;o de edici&oacute;n:') . ' </span>'. $edicion . "</p>\n";

				$devuelve .= '<p class="albatronic-btn"><a href="' . $enlace_libro . '" target="_blank">' . esc_html__('Donde comprarlo') . "</a></p>\n";
				
				$devuelve .= '</div>'."\n";
				$devuelve .= '</div>'."\n";
			/*}*/
		}
	}
	
	return $devuelve;
}

add_filter('the_content', 'albatronic_il_posts');
// filtro para modificar las clases del post segun el numero de ISBNs
add_filter('post_class', 'albatronic_class_post');

function albatronic_il_posts($content)
{
	// no queremos que se muestre en el feed
	if (is_feed())
	{
		return $content;
	}
	
	// solo trabajamos con post
	if (is_single())
	{
		$output = albatronic_il_get_libros();
		//var_dump($output); exit;
		
		// este if muestra antes o despues del contenido la mini ficha en
		// funci�n de si tiene m�s de un mini libro o no, de momento lo
		// desactivo.
		//if ($output[0] > 1)
			$content .= '<div class="conte-albatronic-isbn">' . $output[1] . '</div>';
		//else
		//	$content = '<div class="conte-albatronic-isbn">' . $output[1] . '</div>' . $content;
	}
	
	return $content;
}

// funcion que añade una clase al post cuando tiene más de un ISBN
function albatronic_class_post($classes)
{
	global $post;
	
	$post_id = $post;
	if (is_object($post_id)) $post_id = $post_id->ID;
	
	$meta_isbns = htmlspecialchars(stripcslashes(get_post_meta($post_id, '_albatronic_il_isbn', true)));
	if ($meta_isbns != "")
	{
		$lista_isbns = explode(',', $meta_isbns);
		
		$cuantosIsbn = count($lista_isbns);
	
		if ($cuantosIsbn > 1)
			$classes[] = 'albatronic_class_multi';
	}
	
	return $classes;
}

// devueleve un array
// 0 - el numero de libros
// 1 - los libros ya preparados para mostrar
function albatronic_il_get_libros($tipo_template='')
{
	global $post;
	
	$post_id = $post;
	if (is_object($post_id)) $post_id = $post_id->ID;
	
	$devuelve = array(0 => 0, 1 => "");
	
	$meta_isbns = htmlspecialchars(stripcslashes(get_post_meta($post_id, '_albatronic_il_isbn', true)));
	if ($meta_isbns != "")
	{	
		// como permite varios, separados por comas lo pasamos a un array
		$lista_isbns = explode(',', $meta_isbns);
		//var_dump($lista_isbns); exit;
		
		$devuelve[0] = count($lista_isbns);
		//$devuelve = "<p>" . $devuelve[0] . "</p>\n";
		
		for ( $i = 0; $i < $devuelve[0]; $i++ )
		{		
			$devuelve[1] .= albatronic_il_get_ficha($lista_isbns[$i], $i, $tipo_template);
		}
		return $devuelve;
	}
	
	return $devuelve;
}

// En all_in_one_seo_pack hay un sistema más potente que tiene en 
// cuenta la posibilidad de trabajar con distintos tipos de post 
// ver function aioseop_meta_box_add()
add_action( 'add_meta_boxes', 'albatronic_il_pideisbn' );

function albatronic_il_pideisbn()
{
	add_meta_box( 'albatronic-il-meta', __('Weblib'), 'albatronic_il_metaisbn', 'post' );
}

function albatronic_il_metaisbn( $post )
{
	// retrieve the meta data values if they exist
	$albatronic_il_isbn = get_post_meta( $post->ID, '_albatronic_il_isbn', true );

	echo '<p>' . esc_html__('Si quieres incluir los datos de un libro indica el ISBN. Puedes poner varios separados por comas') . "</p>\n";
	?>
	<p>ISBN: <input type="text" name="albatronic_il_isbn" value="<?php echo esc_attr( $albatronic_il_isbn ); ?>" style="width:90%" /></p>
	<?php
}

//hook to save the meta box data
add_action( 'save_post', 'albatronic_il_save_metaisbn' );

function albatronic_il_save_metaisbn( $post_id )
{
	//verify the meta data is set
	if ( isset( $_POST['albatronic_il_isbn'] ) )
	{
		//save the meta data
		update_post_meta( $post_id, '_albatronic_il_isbn', strip_tags( $_POST['albatronic_il_isbn'] ) );	
	}

}

// cosa curiosa, en wordpress no cierran el PHP