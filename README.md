# auto-interlink
Funcionalidad de la función automate_internal_links:

Esta función está diseñada para mejorar la navegación y el SEO de un sitio WordPress al generar automáticamente enlaces internos basados en palabras clave predefinidas, pero con características adicionales que optimizan y refinan la experiencia de navegación.

Características:

Definición de Palabras Clave y URLs: Permite definir palabras clave y sus URLs asociadas a través de un array dentro de la función. Cuando una palabra clave es detectada en el contenido, es reemplazada por un enlace que dirige a la URL asociada.

Atributo "Title" en Enlaces: Los enlaces generados automáticamente incluyen un atributo title, que ofrece información adicional al colocar el cursor sobre el enlace. Este atributo tiene como valor la propia palabra clave.

Prevención de Enlaces Redundantes: La función evita crear enlaces hacia la misma página en la que se encuentra el usuario. Es decir, si un usuario está leyendo una página cuya URL coincide con la URL destino de una palabra clave, esa palabra clave no será convertida en un enlace, evitando así enlaces redundantes y mejorando la experiencia del usuario.

Evita Sobreescribir Enlaces e Imágenes: Se ha implementado lógica para no reemplazar palabras clave que ya estén vinculadas o que estén dentro de etiquetas de imagen. De esta manera, la función no genera enlaces donde no debería y respeta el contenido original.

Reemplazo Limitado: Aunque una palabra clave aparezca varias veces en el contenido, la función reemplaza solo la primera aparición. Esto evita una saturación de enlaces y mantiene una lectura fluida.

Integración con WordPress: Está diseñada para trabajar en armonía con WordPress. Se aplica como un filtro al contenido (the_content), por lo que se ejecuta automáticamente cada vez que WordPress muestra el contenido de una publicación o página.

Actualización: Compatibilidad con Woocommerce para aplicar los enlaces a las descripciones cortas de productos y categorías
