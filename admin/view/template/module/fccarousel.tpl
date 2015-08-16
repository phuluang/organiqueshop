<?php echo $header; ?>
<?php echo $column_left; ?>
<div id="content">
	<div class="page-header">
		<div class="container-fluid">
			<div class="pull-right">
				<button type="submit" form="form-fpcarousel" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
				<a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a>
			</div>
			<h1><?php echo $heading_title; ?></h1>
			<ul class="breadcrumb">
				<?php foreach ($breadcrumbs as $breadcrumb) { ?>
				<li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<div class="container-fluid">
		<?php if ($error_warning) { ?>
		<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		</div>
		<?php } ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
			</div>
			<div class="panel-body">
				<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-fpcarousel" class="form-horizontal">
					<div class="row">
						<div class="col-sm-6">	
							<div class="row">
								<div class="col-sm-12">	
									<label class="control-label" for="input-name"><?php echo $entry_name; ?></label>
									<input type="text" name="name" value="<?php echo $name; ?>" placeholder="<?php echo $entry_name; ?>" id="input-name" class="form-control" />
									<?php if ($error_name) { ?>
									<div class="text-danger"><?php echo $error_name; ?></div>
									<?php } ?>
								</div>
								<div class="col-sm-12">
									<label class="control-label">
										<span data-toggle="tooltip" title="" data-original-title="<?php echo $help_name_as_title; ?>"><?php echo $entry_name_as_title; ?></span>
									</label>
									<select name="name_as_title" id="input-name_as_title" class="form-control">
										<?php if ($name_as_title) { ?>
										<option value="1" selected="selected"><?php echo $text_yes; ?></option>
										<option value="0"><?php echo $text_no; ?></option>
										<?php } else { ?>
										<option value="1"><?php echo $text_yes; ?></option>
										<option value="0" selected="selected"><?php echo $text_no; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>	
							<div class="row">
								<div class="col-sm-12">
								<label class="control-label" for="input-category">
									<span data-toggle="tooltip" title="" data-original-title="<?php echo $help_entry_category; ?>"><?php echo $entry_category; ?></span>
								</label>
								  <input id="input-category" class="form-control" type="text" name="category" value="" placeholder="<?php echo $entry_category; ?>" />
								  <div id="fccarousel-category" class="well well-sm" style="height: 150px; overflow: auto;">
									<?php foreach ($categories as $category) { ?>
									<div id="fccarousel-category<?php echo $category['category_id']; ?>">
										<i class="fa fa-minus-circle"></i> <?php echo $category['name']; ?>
										<input type="hidden" name="categories[]" value="<?php echo $category['category_id']; ?>" />
									</div>
									<?php } ?>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="row">
								<div class="col-sm-6">
								<div class="form-groupr">
								<label class="control-label" for="input-show_title">
									<span data-toggle="tooltip" title="" data-original-title="<?php echo $help_show_title; ?>"><?php echo $entry_show_title; ?></span>
								</label>
								<select id="input-show_title" class="form-control" name="show_title" >
									<?php if ($show_title) { ?>
									<option value="1" selected="selected"><?php echo $text_yes; ?></option>
									<option value="0"><?php echo $text_no; ?></option>
									<?php } else { ?>
									<option value="1"><?php echo $text_yes; ?></option>
									<option value="0" selected="selected"><?php echo $text_no; ?></option>
									<?php } ?>
								</select>
								</div>
								</div>
								<div class="col-sm-6">
									<label class="control-label" for="input-show_description">
										<span data-toggle="tooltip" title="" data-original-title="<?php echo $help_show_description; ?>"><?php echo $entry_show_description; ?></span>
									</label>
									<select id="input-show_description" class="form-control" name="show_description" >
										<?php if ($show_description) { ?>
										<option value="1" selected="selected"><?php echo $text_yes; ?></option>
										<option value="0"><?php echo $text_no; ?></option>
										<?php } else { ?>
										<option value="1"><?php echo $text_yes; ?></option>
										<option value="0" selected="selected"><?php echo $text_no; ?></option>
										<?php } ?>
									</select>		  
								</div>		  
							</div>
							<div class="row">		  
								<div class="col-sm-6">
									<label class="control-label" for="input-limit"><?php echo $entry_limit; ?></label>
									<input id="input-limit" class="form-control" type="text" name="limit" value="<?php echo $limit; ?>" placeholder="<?php echo $entry_limit; ?>" />			
								</div>
								<div class="col-sm-6">
									<label class="control-label" for="input-itemspage"><?php echo $entry_itemspage; ?></label>
									<input id="input-itemspage" class="form-control" type="text" name="itemspage" value="<?php echo $itemspage; ?>" size="3" />			
								</div>		  
							</div>
							<div class="row">	
								<div class="col-sm-6">
									<label class=" control-label">
										<span data-toggle="tooltip" title="" data-original-title="<?php echo $help_shuffle_items; ?>"><?php echo $entry_shuffle_items; ?></span>
									</label>
									<select id="input-shuffle_items" class="form-control" name="shuffle_items">
										<?php if ($shuffle_items) { ?>
										<option value="1" selected="selected"><?php echo $text_yes; ?></option>
										<option value="0"><?php echo $text_no; ?></option>
										<?php } else { ?>
										<option value="1"><?php echo $text_yes; ?></option>
										<option value="0" selected="selected"><?php echo $text_no; ?></option>
										<?php } ?>
									</select>			  
								</div>
								<div class="col-sm-6">
									<label class="control-label" for="input-auto_play">
										<span data-toggle="tooltip" title="" data-original-title="<?php echo $help_auto_play; ?>"><?php echo $entry_auto_play; ?></span>
									</label>
									<select id="input-auto_play" class="form-control" name="auto_play" >
										<?php if ($auto_play) { ?>
										<option value="1" selected="selected"><?php echo $text_yes; ?></option>
										<option value="0"><?php echo $text_no; ?></option>
										<?php } else { ?>
										<option value="1"><?php echo $text_yes; ?></option>
										<option value="0" selected="selected"><?php echo $text_no; ?></option>
										<?php } ?>
									</select>			  
								</div>		  
							</div>
							<div class="row">
								<div class="col-sm-6">
									<label class="control-label" for="input-pause_on_hover">
										<span data-toggle="tooltip" title="" data-original-title="<?php echo $help_pause_on_hover; ?>"><?php echo $entry_pause_on_hover; ?></span>
									</label>
									<select id="input-pause_on_hover" class="form-control" name="pause_on_hover">
										<?php if ($pause_on_hover) { ?>
										<option value="1" selected="selected"><?php echo $text_yes; ?></option>
										<option value="0"><?php echo $text_no; ?></option>
										<?php } else { ?>
										<option value="1"><?php echo $text_yes; ?></option>
										<option value="0" selected="selected"><?php echo $text_no; ?></option>
										<?php } ?>
									</select>			  
								</div>
								<div class="col-sm-6">
									<label class="control-label">
										<span data-toggle="tooltip" title="" data-original-title="<?php echo $help_show_pagination; ?>"><?php echo $entry_show_pagination; ?></span>
									</label>
									<select id="input-show_pagination" class="form-control" name="show_pagination" >
										<?php if ($show_pagination) { ?>
										<option value="1" selected="selected"><?php echo $text_yes; ?></option>
										<option value="0"><?php echo $text_no; ?></option>
										<?php } else { ?>
										<option value="1"><?php echo $text_yes; ?></option>
										<option value="0" selected="selected"><?php echo $text_no; ?></option>
										<?php } ?>
									</select>			  
								</div>		  
							</div>
							<div class="row">
								<div class="col-sm-6">
									<label class="control-label">
										<span data-toggle="tooltip" title="" data-original-title="<?php echo $help_show_navigation; ?>"><?php echo $entry_show_navigation; ?></span>
									</label>
									<select id="input-show_navigation" class="form-control" name="show_navigation">
										<?php if ($show_navigation) { ?>
										<option value="1" selected="selected"><?php echo $text_yes; ?></option>
										<option value="0"><?php echo $text_no; ?></option>
										<?php } else { ?>
										<option value="1"><?php echo $text_yes; ?></option>
										<option value="0" selected="selected"><?php echo $text_no; ?></option>
										<?php } ?>
									</select>		  
								</div>
								<div class="col-sm-6">
									<label class="control-label" for="input-thumb_width"><?php echo $entry_thumb_size; ?></label>
									<div class="row">
										<div class="col-sm-6">
										  <input type="text" name="thumb_width" value="<?php echo $thumb_width; ?>" placeholder="<?php echo $entry_thumb_width; ?>" id="input-thumb_width" class="form-control" />
										  <?php if ($error_thumb_width) { ?>
										  <div class="text-danger"><?php echo $error_thumb_width; ?></div>
										  <?php } ?>
										</div>
										<div class="col-sm-6">
										  <input type="text" name="thumb_height" value="<?php echo $thumb_height; ?>" placeholder="<?php echo $entry_thumb_height; ?>" id="input-thumb_height" class="form-control" />
										  <?php if ($error_thumb_height) { ?>
										  <div class="text-danger"><?php echo $error_thumb_height; ?></div>
										  <?php } ?>
										</div>
									</div>			  
								</div>		  
							</div>
							<div class="row">
								<div class="col-sm-12">	
									<label class="control-label" for="input-status"><?php echo $entry_status; ?></label>
									<select name="status" id="input-status" class="form-control">
										<?php if ($status) { ?>
										<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
										<option value="0"><?php echo $text_disabled; ?></option>
										<?php } else { ?>
										<option value="1"><?php echo $text_enabled; ?></option>
										<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript"><!--
$('input[name=\'category\']').autocomplete({
	source: function(request, response) {
		$.ajax({
			url: 'index.php?route=catalog/category/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request),
			dataType: 'json',
			success: function(json) {
				response($.map(json, function(item) {
					return {
						label: item['name'],
						value: item['category_id']
					}
				}));
			}
		});
	},
	select: function(item) {
		$('input[name=\'category\']').val('');
		
		$('#fccarousel-category' + item['value']).remove();
		
		$('#fccarousel-category').append('<div id="fccarousel-category' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="categories[]" value="' + item['value'] + '" /></div>');	
	}
});
	
$('#fccarousel-category').delegate('.fa-minus-circle', 'click', function() {
	$(this).parent().remove();
});
//--></script>
</div>
<?php echo $footer; ?>
