<form role="search" action="<?php echo home_url('/'); ?>" method="get">
    <div class="form-group">
        <div class="input-group mb-3">
            <input type="text" name="s" class="form-control" placeholder="Search Keyword" value="<?php the_search_query(); ?>">
            <input type="hidden" name="post_type" value="blogs" />
            <div class="input-group-append">
                <button class="btn" type="button"><i class="ti-search"></i></button>
            </div>
        </div>
    </div>
    <button class="button rounded-0 primary-bg text-white w-100" type="submit">Search</button>
</form>



