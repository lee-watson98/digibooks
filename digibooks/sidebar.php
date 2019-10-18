<div class="col-md-3">
    <div class="d-none d-md-block">
        <div class="filters">
            <div class="filter-item">
                <h3>Categories</h3>
                  <?php get_categories();?>
            </div>
        </div>
    </div>
    <div class="d-md-none"><a class="btn btn-link d-md-none filter-collapse" data-toggle="collapse" aria-expanded="false" aria-controls="filters" href="#filters" role="button">Filter<i class="icon-arrow-down filter-caret"></i></a>
        <div class="collapse"
            id="filters">
            <div class="filters">
                <div class="filter-item">
                    <h3>Categories</h3>
                    <?php get_categories();?>
                </div>

            </div>
        </div>
    </div>
</div>
