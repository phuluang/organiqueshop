<?php echo $header; ?>
<div class="container">
  <ul class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
    <?php } ?>
  </ul>
  <div class="content-wrapper about-us-page">
  <div class="row"><?php echo $column_left; ?>
    <?php if ($column_left && $column_right) { ?>
    <?php $class = 'col-sm-6'; ?>
    <?php } elseif ($column_left || $column_right) { ?>
    <?php $class = 'col-sm-9'; ?>
    <?php } else { ?>
    <?php $class = 'col-sm-12'; ?>
    <?php } ?>
    <div id="content" class="<?php echo $class; ?>"><?php echo $content_top; ?>
      <div class="row about-row">
        <div class="col-sm-6">
          <div class="about-content">
            <h1><?php echo $heading_title; ?></h1>
            <p>Original products are aromatic handmade spa soaps branded as “SCEN”.</p>
            <p>After the success of “SCEN” product lines were extended under a new brand named “Organique” to cover most of “Home Spa” category.</p>
          </div>
        </div>
        <div class="col-sm-6 about-img">
          <div class="">
            <img src="image/catalog/about/organiqueshop-about-2.jpg" title="" alt="" />
          </div>
        </div>
      </div>
      <div class="row about-row">
        <div class="col-sm-6 about-img">
          <div class="">
            <img src="image/catalog/about/organiqueshop-about-1.jpg" title="" alt="" />
          </div>
        </div>
        <div class="col-sm-6">
          <div class="about-content">
            <p><h1>Handmade products</h1> exploiting traditional Thai heritage knowhow and local ingredients with environmental friendly process.</p>
            <p>Business concept is based on sufficient economy.Use re-cycle products and method where possible.</p>
          </div>
        </div>
      </div>
      <?php echo $content_bottom; ?></div>
    <?php echo $column_right; ?></div>
    </div>
</div>
<?php echo $footer; ?>
