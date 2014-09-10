<form action="/" method="get">
    
        <label for="search"><?php _e("<!--:en-->Search<!--:--><!--:es-->Buscar<!--:-->"); ?></label>
        <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
    
</form>