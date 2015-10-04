<?php echo $header; ?>
    <div class="container">
        <ul class="breadcrumb">
            <?php foreach ($breadcrumbs as $breadcrumb) { ?>
                <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
            <?php } ?>
        </ul>
        <div class="content-wrapper">
          <div class="row">
          <div class="form-group">
              <?php echo $column_left; ?>
              <?php if ($column_left && $column_right) { ?>
                  <?php $class = 'col-sm-6'; ?>
              <?php } elseif ($column_left || $column_right) { ?>
                  <?php $class = 'col-sm-9'; ?>
              <?php } else { ?>
                  <?php $class = 'col-sm-12'; ?>
              <?php } ?>

              <div id="content" class="<?php echo $class; ?>">
                  <?php echo $content_top; ?>
                  <h1><?php echo $heading_title; ?></h1>

                  <div class="row">
                  <div class="col-sm-12">
                      <?php if($articles) { ?>
                          <?php foreach($articles as $article) { ?>
                              <div class="form-group blog-item">
                                  <div class="row">
                                  <div class="col-sm-3">
                                  <div class="article-image-wrap">
                                  <?php if($article['image']) { ?>
                                    <?php if($article['featured_found']) { ?>
                                      <div class="article-image">
                                        <a href="<?php echo $article['href']; ?>">
                                          <img src="<?php echo $article['image']; ?>" alt="<?php echo $article['article_title']; ?>" />
                                        </a>
                                      </div>
                                    <?php } else { ?>
                                      <div class="article-thumbnail-image">
                                        <a href="<?php echo $article['href']; ?>">
                                          <img src="<?php echo $article['image']; ?>" alt="<?php echo $article['article_title']; ?>" />
                                        </a>
                                        <span class="article-description">
                                          <?php echo $article['description']; ?>
                                        </span>
                                      </div>
                                    <?php } ?>
                                  <?php } ?>
                                  <?php if(!$article['featured_found']) { ?>
          							            <div class="article-thumbnail-found">
                                        No Image
                                    </div>
          						            <?php } ?>
                                  </div>
                                  </div>
                                  <div class="col-sm-9">
                                    <div class="article-title">
                                        <h1><a href="<?php echo $article['href']; ?>"><?php echo ucwords($article['article_title']); ?></a><h1>
                                    </div>

                                    <div class="article-sub-title">
                        							<!-- <span class="article-author"><a href="<?php echo $article['author_href']; ?>"><?php echo $article['author_name']; ?></a></span> -->
                        							<!-- <span class="article-author"><?php echo $article['author_name']; ?></span> -->
                        							<span class="article-date"><?php echo $article['date_added']; ?></span>

                        							<?php if($article['allow_comment']) { ?>
                        								<span class="bullet">&bull;</span>
                        								<span class="article-comment"><a href="<?php echo $article['comment_href']; ?>#comment-section"><?php echo $article['total_comment']; ?></a></span>
                        							<?php } ?>

                        						</div>


                                    <?php if($article['featured_found']) { ?>
                        							<div class="article-description">
                        								<?php echo $article['description']; ?>
                        							</div>
                        						<?php } else { ?>
                      							<div class="article-description">
                      								<?php echo $article['description']; ?>
                      							</div>
          						              <?php } ?>

                                  <div class="hidden">
                                      <a class="btn btn-primary" href="<?php echo $article['href']; ?>"><b><?php echo $button_continue_reading; ?></b></a>
                                  </div>

                            </div>
                            </div>
                            </div>
                          <?php } ?>
                          <div class="pagination-wrap">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-left pagination-button-group"><?php echo $pagination; ?></div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right pagination-result"><?php echo $results; ?></div>
                            </div>
                          </div>
                      <?php } else { ?>
                          <h3 class="text-center"><?php echo $text_no_found; ?></h3>
                      <?php } ?>
                  </div>
                  </div>

                  <?php echo $content_bottom; ?>
              </div>

              <?php echo $column_right; ?>
          </div>
          </div>
        </div>
    </div>
<?php echo $footer; ?>
