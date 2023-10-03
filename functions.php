<?php
/**
 * Función para automatizar la creación de enlaces internos en el contenido de WordPress.
 * La función busca palabras clave específicas en el contenido y las reemplaza con un enlace interno.
 * También incluye algunas características adicionales para optimizar la creación de enlaces.
 */

function automate_internal_links($content) {
    // Define un array asociativo de palabras clave y sus respectivas URLs.
    $keywords = array(
        'palabra1' => 'http://tusitio.com/pagina1',
        'palabra2' => 'http://tusitio.com/pagina2',
        // ... y así sucesivamente.
    );

    // Obtiene la URL de la página o publicación actual.
    $current_url = get_permalink();

    foreach ($keywords as $keyword => $url) {
        // Si la URL actual es la misma que la URL del enlace, entonces continuamos con la siguiente iteración.
        if ($url == $current_url) {
            continue;
        }

        // Esta expresión regular busca palabras clave que no estén dentro de un enlace o una etiqueta de imagen.
        $pattern = '/\b' . preg_quote($keyword, '/') . '\b(?!([^<]+)?>|[^<]*<\/a>)/';

        // Crea el enlace HTML con el atributo title que tiene la propia palabra clave como contenido.
        $link = '<a href="' . $url . '" title="' . $keyword . '">' . $keyword . '</a>';

        // Reemplaza la primera aparición de la palabra clave que cumpla con la condición anterior.
        $content = preg_replace($pattern, $link, $content, 1);
    }

    return $content;
}

// Aplica la función al contenido de las entradas y páginas de WordPress.
add_filter('the_content', 'automate_internal_links');

// Si WooCommerce está activo, aplica la función a las descripciones cortas de los productos.
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    add_filter('woocommerce_short_description', 'automate_internal_links');
}
