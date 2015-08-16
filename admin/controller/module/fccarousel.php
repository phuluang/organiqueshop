<?php
class ControllerModuleFccarousel extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('module/fccarousel');

		$this->document->setTitle($this->language->get('heading_title'));
		$data['entry_itemscolumn'] = $this->language->get('entry_itemscolumn');
		$data['entry_itemspage'] = $this->language->get('entry_itemspage');
		
		$this->load->model('extension/module');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if (!isset($this->request->get['module_id'])) {
				$this->model_extension_module->addModule('fccarousel', $this->request->post);
			} else {
				$this->model_extension_module->editModule($this->request->get['module_id'], $this->request->post);
			}
						
			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		
		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_name_as_title'] = $this->language->get('entry_name_as_title');
		$data['entry_category'] = $this->language->get('entry_category');
		$data['entry_limit'] = $this->language->get('entry_limit');
		$data['entry_thumb_size'] = $this->language->get('entry_thumb_size');
		$data['entry_thumb_width'] = $this->language->get('entry_thumb_width');
		$data['entry_thumb_height'] = $this->language->get('entry_thumb_height');
		$data['entry_show_title'] = $this->language->get('entry_show_title');
		$data['entry_show_description'] = $this->language->get('entry_show_description');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_shuffle_items'] = $this->language->get('entry_shuffle_items');
		$data['entry_auto_play'] = $this->language->get('entry_auto_play');
		$data['entry_pause_on_hover'] = $this->language->get('entry_pause_on_hover');
		$data['entry_show_pagination'] = $this->language->get('entry_show_pagination');
		$data['entry_show_navigation'] = $this->language->get('entry_show_navigation');

		$data['help_name_as_title'] = $this->language->get('help_name_as_title');
		$data['help_category'] = $this->language->get('help_category');
		$data['help_show_title'] = $this->language->get('help_show_title');
		$data['help_show_description'] = $this->language->get('help_show_description');
		$data['help_shuffle_items'] = $this->language->get('help_shuffle_items');
		$data['help_auto_play'] = $this->language->get('help_auto_play');
		$data['help_pause_on_hover'] = $this->language->get('help_pause_on_hover');
		$data['help_show_pagination'] = $this->language->get('help_show_pagination');
		$data['help_show_navigation'] = $this->language->get('help_show_pagination');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		
		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = '';
		}
		
		if (isset($this->error['thumb_width'])) {
			$data['error_thumb_width'] = $this->error['thumb_width'];
		} else {
			$data['error_thumb_width'] = '';
		}
		
		if (isset($this->error['thumb_height'])) {
			$data['error_thumb_height'] = $this->error['thumb_height'];
		} else {
			$data['error_thumb_height'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_module'),
			'href' => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL')
		);

		if (!isset($this->request->get['module_id'])) {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('module/fccarousel', 'token=' . $this->session->data['token'], 'SSL')
			);
		} else {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('module/fccarousel', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], 'SSL')
			);			
		}

		if (!isset($this->request->get['module_id'])) {
			$data['action'] = $this->url->link('module/fccarousel', 'token=' . $this->session->data['token'], 'SSL');
		} else {
			$data['action'] = $this->url->link('module/fccarousel', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], 'SSL');
		}
		
		$data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
		
		if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$module_info = $this->model_extension_module->getModule($this->request->get['module_id']);
		}
		
		$data['token'] = $this->session->data['token'];

		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (!empty($module_info)&&isset($module_info['name'])) {
			$data['name'] = $module_info['name'];
		} else {
			$data['name'] = '';
		}

		// name as title
		if (isset($this->request->post['name_as_title'])) {
			$data['name_as_title'] = $this->request->post['name_as_title'];
		} elseif (!empty($module_info)&&isset($module_info['name_as_title'])) {
			$data['name_as_title'] = $module_info['name_as_title'];
		} else {
			$data['name_as_title'] = 1;
		}
		
		// total items in carousel limit
		if (isset($this->request->post['limit'])) {
			$data['limit'] = $this->request->post['limit'];
		} elseif (!empty($module_info)&&isset($module_info['limit'])) {
			$data['limit'] = $module_info['limit'];
		} else {
			$data['limit'] = 8;
		}	

		// visible items per page
		if (isset($this->request->post['itemspage'])) {
			$data['itemspage'] = $this->request->post['itemspage'];
		} elseif (!empty($module_info)&&isset($module_info['itemspage'])) {
			$data['itemspage'] = $module_info['itemspage'];
		} else {
			$data['itemspage'] = 4;
		}
		
		// thumb width		
		if (isset($this->request->post['thumb_width'])) {
			$data['thumb_width'] = $this->request->post['thumb_width'];
		} elseif (!empty($module_info)&&isset($module_info['thumb_width'])) {
			$data['thumb_width'] = $module_info['thumb_width'];
		} else {
			$data['thumb_width'] = 180;
		}
		
		// thumb height	
		if (isset($this->request->post['thumb_height'])) {
			$data['thumb_height'] = $this->request->post['thumb_height'];
		} elseif (!empty($module_info)&&isset($module_info['thumb_height'])) {
			$data['thumb_height'] = $module_info['thumb_height'];
		} else {
			$data['thumb_height'] = 180;
		}		

		// show title
		if (isset($this->request->post['show_title'])) {
			$data['show_title'] = $this->request->post['show_title'];
		} elseif (!empty($module_info)&&isset($module_info['show_title'])) {
			$data['show_title'] = $module_info['show_title'];
		} else {
			$data['show_title'] = 1;
		}		

		// show description
		if (isset($this->request->post['show_description'])) {
			$data['show_description'] = $this->request->post['show_description'];
		} elseif (!empty($module_info)&&isset($module_info['show_description'])) {
			$data['show_description'] = $module_info['show_description'];
		} else {
			$data['show_description'] = 1;
		}
		
		// shuffle products
		if (isset($this->request->post['shuffle_items'])) {
			$data['shuffle_items'] = $this->request->post['shuffle_items'];
		} elseif (!empty($module_info)&&isset($module_info['shuffle_items'])) {
			$data['shuffle_items'] = $module_info['shuffle_items'];
		} else {
			$data['shuffle_items'] = 1;
		}		

		// auto play
		if (isset($this->request->post['auto_play'])) {
			$data['auto_play'] = $this->request->post['auto_play'];
		} elseif (!empty($module_info)&&isset($module_info['auto_play'])) {
			$data['auto_play'] = $module_info['auto_play'];
		} else {
			$data['auto_play'] = 1;
		}	

		// pause on hover
		if (isset($this->request->post['pause_on_hover'])) {
			$data['pause_on_hover'] = $this->request->post['pause_on_hover'];
		} elseif (!empty($module_info)&&isset($module_info['pause_on_hover'])) {
			$data['pause_on_hover'] = $module_info['pause_on_hover'];
		} else {
			$data['pause_on_hover'] = 1;
		}	

		// show pagination
		if (isset($this->request->post['show_pagination'])) {
			$data['show_pagination'] = $this->request->post['show_pagination'];
		} elseif (!empty($module_info)&&isset($module_info['show_pagination'])) {
			$data['show_pagination'] = $module_info['show_pagination'];
		} else {
			$data['show_pagination'] = 1;
		}	

		// show pagination
		if (isset($this->request->post['show_navigation'])) {
			$data['show_navigation'] = $this->request->post['show_pagination'];
		} elseif (!empty($module_info)&&isset($module_info['show_navigation'])) {
			$data['show_navigation'] = $module_info['show_navigation'];
		} else {
			$data['show_navigation'] = 1;
		}
		
		// module status
		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($module_info)&&isset($module_info['status'])) {
			$data['status'] = $module_info['status'];
		} else {
			$data['status'] = '';
		}
		
		// carousel products		
		$this->load->model('catalog/category');
		
		$data['categories'] = array();
		
		if (isset($this->request->post['categories'])) {
			$categories = $this->request->post['categories'];
		} elseif (!empty($module_info)&&isset($module_info['categories'])) {
			$categories = $module_info['categories'];
		} else {
			$categories = array();
		}	
		
		foreach ($categories as $category_id) {
			$category_info = $this->model_catalog_category->getCategory($category_id);

			if ($category_info) {
				$data['categories'][] = array(
					'category_id' => $category_info['category_id'],
					'name'       => $category_info['name']
				);
			}
		}
				
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('module/fccarousel.tpl', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'module/fccarousel')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 64)) {
			$this->error['name'] = $this->language->get('error_name');
		}
		
		if (!$this->request->post['thumb_width']) {
			$this->error['thumb_width'] = $this->language->get('error_thumb_width');
		}
		
		if (!$this->request->post['thumb_height']) {
			$this->error['thumb_height'] = $this->language->get('error_thumb_height');
		}
		
		return !$this->error;
	}
}