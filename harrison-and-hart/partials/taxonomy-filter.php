<?php
    $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
    $categories = get_categories('taxonomy='.$args['taxonomy'].'&type='.$args['post-type']); 
    if(count($categories)):
?>
<div class="mb-44 768:mb-96 w-full">
    <div class="flex flex-col 768:flex-row justify-center items-center">
        <div class="768:mr-12 my-12 text-22 font-bold">Filter By Category:</div>
        <div class="text-gray my-12">
            <select class="p-12" name="<?php echo $args['post-type']; ?>" id="<?php echo $args['post-type']; ?>" onchange="javascript:location.href = this.value;">
                <option value="/<?php echo $args['post-type'];?>/">No Filter</option>
                <?php
                foreach($categories as $category):
                    if( $category->count !== 0) :
                    $selcted = ($term->slug == $category->slug)?' selected':'';
                    echo '<option value="/'.$args['post-type'].'/'.$args['taxonomy'].'/'.$category->slug.'" '.$selcted.'>'.$category->name.'</option>';
                    endif;
                endforeach;?>
            </select>
        </div>
    </div>
</div>
<?php endif;?>