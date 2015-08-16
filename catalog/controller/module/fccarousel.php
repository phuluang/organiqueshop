<?php
class ControllerModuleFccarousel extends Controller {
	public function index($setting) {
		
		static $module = 0;
		
		$this->load->language('module/fccarousel');

		$data['heading_title'] = $this->language->get('heading_title');

		$this->load->model('catalog/category');

		$this->load->model('tool/image');		
		
		$this->document->addStyle('catalog/view/javascript/jquery/owl-carousel/owl.carousel.css');
		$this->document->addStyle('catalog/view/javascript/jquery/owl-carousel/owl.transitions.css');
		$this->document->addScript('catalog/view/javascript/jquery/owl-carousel/owl.carousel.min.js');

		if (file_exists('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/fccarousel.css')) {
			$this->document->addStyle('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/fccarousel.css');
		} else {
			$this->document->addStyle('catalog/view/theme/default/stylesheet/fccarousel.css');
		}

		$data['name'] = isset($setting['name']) ? $setting['name'] : '';
		$data['name_as_title'] = isset($setting['name_as_title']) ? $setting['name_as_title'] : 0;
		$data['categories'] = array();
		$data['show_title'] = isset($setting['show_title']) ? (int)$setting['show_title'] : 1;
		$data['show_description'] = isset($setting['show_description']) ? (int)$setting['show_description'] : 1;
		$data['itemspage'] = isset($setting['itemspage']) ? (int)$setting['itemspage'] : 4;
		$data['auto_play'] = isset($setting['auto_play']) ? (int)$setting['auto_play'] : 0;
		$data['pause_on_hover'] = isset($setting['pause_on_hover']) ? (int)$setting['pause_on_hover'] : 0;
		$data['show_pagination'] = isset($setting['show_pagination']) ? (int)$setting['show_pagination'] : 0;
		$data['show_navigation'] = isset($setting['show_navigation']) ? (int)$setting['show_navigation'] : 1;

		if (!$setting['limit']) {
			$setting['limit'] = 8;
		}
		
		$thumb_width = isset($setting['thumb_width']) ? $setting['thumb_width'] : 180;
		$thumb_height = isset($setting['thumb_height']) ? $setting['thumb_height'] : 180;
		
		// shuffle carousel items
		if(isset($setting['shuffle_items']) && $setting['shuffle_items']) {
			shuffle($setting['categories']);
		}
		
		$categories = array_slice($setting['categories'], 0, (int)$setting['limit']);

		foreach ($categories as $category_id) {
			$category_info = $this->model_catalog_category->getCategory($category_id);

			if ($category_info) {
				if ($category_info['image']) {
					$image = $this->model_tool_image->resize($category_info['image'], $thumb_width, $thumb_height);
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $thumb_width, $thumb_height);
				}

				$data['categories'][] = array(
					'category_id'  => $category_info['category_id'],
					'thumb'       => $image,
					'name'        => $category_info['name'],
					'description' => utf8_substr(strip_tags(html_entity_decode($category_info['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('config_product_description_length')) . '..',
					'href'        => $this->url->link('product/category', 'path=' . $this->getCategoryPath($category_info['category_id']))
				);
			}
		}
		
		$data['module'] = $module++;

		// check if isset categories
		if ($data['categories']) {
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/fccarousel.tpl')) {
				return $this->load->view($this->config->get('config_template') . '/template/module/fccarousel.tpl', $data);
			} else {
				return $this->load->view('default/template/module/fccarousel.tpl', $data);
			}
		}
	}
	
	public function getCategoryPath($category_id){
		$query = $this->db->query("SELECT category_id, parent_id FROM " . DB_PREFIX . "category WHERE category_id = '" . $category_id ."' LIMIT 1");
		if($query->row['category_id']){			
			$path = $query->row['category_id'];	
			while($query->row['parent_id']!=0){
				$query = $this->db->query("SELECT category_id, parent_id FROM " . DB_PREFIX . "category WHERE category_id = '" . $query->row['parent_id'] ."' LIMIT 1");				
				$path = $query->row['category_id'] . "_" . $path;
			}
			return $path;
		}
		return false;
	}
	
	public function getProductCategoryPath($product_id) {
		$query = $this->db->query("SELECT category_id, parent_id FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . (int)$product_id . "' LIMIT 1");
		if($query->row['category_id']){
			$path = $query->row['category_id'];
			$query = $this->db->query("SELECT parent_id FROM " . DB_PREFIX . "category WHERE category_id = '" . $query->row['category_id'] . "' AND parent_id != 0");           
			while($query->num_rows){
				$path = $query->row['parent_id'] . "_" . $path;
				$query = $this->db->query("SELECT parent_id FROM " . DB_PREFIX . "category WHERE category_id = '" . $query->row['parent_id'] . "' AND parent_id != 0");    
			}
			return $path;
		}
		return false;
	}
}
