<form class="search-form" action="/" method="get">
    <input class="search-input" type="text" name="s" value="<?php the_search_query(); ?>" placeholder="Search" />
    <span class="search-trigger">
        <input class="search-icon cursor-pointer" type="submit" id="searchsubmit" value="Search">
    </span>
</form>