<div class="content-wrapper fc_carousel" id="fc_carousel_<?php echo $module; ?>">
  <div class="row" id="featured_category_carousel_<?php echo $module; ?>">
      <div class="row row-3px">
        <?php foreach ($categories as $category) { ?>
        <div class="col-xs-6 col-md-3 col-3px">
          <div class="item">
      		  <div class="category-layout">
        			<div class="category-thumb transition">
        				<div class="image"><a href="<?php echo $category['href']; ?>"><img src="<?php echo $category['thumb']; ?>" alt="<?php echo $category['name']; ?>" title="<?php echo $category['name']; ?>" class="img-responsive" /></a></div>
        				<?php if($show_title || $show_description){ ?>
        				<div class="caption">
        					<?php if($show_title){ ?>
        					<h4><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a></h4>
        					<?php } ?>
        					<?php if($show_description){ ?>
        					<p class="description"><?php echo $category['description']; ?></p>
        					<?php } ?>
        				</div>
        				<?php } ?>
        			</div>
      		  </div>
          </div>
        </div>
        <?php } ?>
      </div>
  </div>
</div>
