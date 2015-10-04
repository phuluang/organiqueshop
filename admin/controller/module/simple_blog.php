<?php
	class ControllerModuleSimpleBlog extends Controller {
	   
       private $error = array();
       
       public function index() {
            $url = $this->request->get['route'];
            if($this->checkDatabase()) {
                
                $this->language->load('simple_blog/install');
                
                $this->document->setTitle($this->language->get('error_database'));
                
                $data['install_database'] = $this->url->link('simple_blog/install/installDatabase', 'token=' . $this->session->data['token'] . '&url=' . $url, 'SSL');
                
                $data['text_install_message'] = $this->language->get('text_install_message');
                
                $data['text_upgread'] = $this->language->get('text_upgread');
                
                $data['error_database'] = $this->language->get('error_database');
                
                $data['breadcrumbs'] = array();

    	   		$data['breadcrumbs'][] = array(
    	       		'text'      => $this->language->get('text_home'),
    				'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
    	      		'separator' => false
    	   		);
                
                $data['header'] = $this->load->controller('common/header');
      		    $data['column_left'] = $this->load->controller('common/column_left');
                $data['footer'] = $this->load->controller('common/footer');
        
                $this->response->setOutput($this->load->view('simple_blog/notification.tpl', $data));
                
            } else {
                $this->getData();
            }	
		}
		
        public function checkDatabase() {
            $database_not_found = $this->load->controller('simple_blog/install/validateTable');
            
            if(!$database_not_found) {
                return true;
            } 
            
            return false;
        }
       
		public function getData() {
			$this->language->load('module/simple_blog');

			$this->document->setTitle($this->language->get('heading_title'));
	
			$this->load->model('setting/setting');
			
			if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
				
                //print "<pre>"; print_r($this->request->post); die;
                
				$this->model_setting_setting->editSetting('simple_blog', $this->request->post);		
	
				$this->session->data['success'] = $this->language->get('text_success');
	
				$this->response->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
			}
			
			$data['heading_title'] = $this->language->get('heading_title');
			$data['entry_simple_blog_seo_keyword'] = $this->language->get('simple_blog_seo_keyword');
            $data['entry_simple_blog_heading'] = $this->language->get('simple_blog_heading');
			$data['entry_blog_module_heading'] = $this->language->get('blog_module_heading');
			$data['entry_product_related_heading'] = $this->language->get('product_related_heading');
			$data['entry_comment_related_heading'] = $this->language->get('comment_related_heading');
            
            $data['help_simple_blog_seo_keyword'] = $this->language->get('help_simple_blog_seo_keyword');
            $data['help_simple_blog_heading'] = $this->language->get('help_simple_blog_heading');
			$data['help_blog_module_heading'] = $this->language->get('help_blog_module_heading');
			$data['help_product_related_heading'] = $this->language->get('help_product_related_heading');
			$data['help_comment_related_heading'] = $this->language->get('help_comment_related_heading');
			$data['help_set_tagline'] = $this->language->get('help_set_tagline');            
            $data['help_image'] = $this->language->get('help_image');
			$data['help_display_category'] = $this->language->get('help_display_category');
			$data['help_comment_approval'] = $this->language->get('help_comment_approval');
			$data['help_author_information'] = $this->language->get('help_author_information');
			$data['help_related_article'] = $this->language->get('help_related_article');
            $data['help_show_social_site_option'] = $this->language->get('help_show_social_site_option');
			$data['help_show_author'] = $this->language->get('help_show_author');
            

			$data['text_enabled'] = $this->language->get('text_enabled');
			$data['text_disabled'] = $this->language->get('text_disabled');
			$data['text_yes'] = $this->language->get('text_yes');
			$data['text_no'] = $this->language->get('text_no');
			$data['text_set_header'] = $this->language->get('text_set_header');
			$data['text_set_footer'] = $this->language->get('text_set_footer');
			$data['text_browse'] = $this->language->get('text_browse');
			$data['text_clear'] = $this->language->get('text_clear');			
			$data['text_image_manager'] = $this->language->get('text_image_manager');
			$data['text_content_top'] = $this->language->get('text_content_top');
			$data['text_content_bottom'] = $this->language->get('text_content_bottom');		
			$data['text_column_left'] = $this->language->get('text_column_left');
			$data['text_column_right'] = $this->language->get('text_column_right');
			$data['text_category_label'] = $this->language->get('text_category_label');
			$data['text_latest_article'] = $this->language->get('text_latest_article');
			$data['text_popular_article'] = $this->language->get('text_popular_article');
			$data['text_article_related'] = $this->language->get('text_article_related');
            $data['text_edit'] = $this->language->get('text_edit');
			
			$data['entry_status'] = $this->language->get('entry_status');
			$data['entry_custom_theme'] = $this->language->get('entry_custom_theme');
			$data['entry_set_tagline'] = $this->language->get('entry_set_tagline');
			$data['entry_image'] = $this->language->get('entry_image');
			$data['entry_display_category'] = $this->language->get('entry_display_category');
			$data['entry_comment_approval'] = $this->language->get('entry_comment_approval');
			$data['entry_author_information'] = $this->language->get('entry_author_information');			
			$data['entry_article_limit'] = $this->language->get('entry_article_limit');
			$data['entry_category'] = $this->language->get('entry_category');
			$data['entry_layout'] = $this->language->get('entry_layout');
			$data['entry_position'] = $this->language->get('entry_position');
			$data['entry_sort_order'] = $this->language->get('entry_sort_order');
			$data['entry_show_social_site_option'] = $this->language->get('entry_show_social_site_option');
			$data['entry_related_article'] = $this->language->get('entry_related_article');
			$data['entry_show_author'] = $this->language->get('entry_show_author');
			
			$data['button_save'] = $this->language->get('button_save');
			$data['button_cancel'] = $this->language->get('button_cancel');
			$data['button_module_add'] = $this->language->get('button_module_add');
			$data['button_remove'] = $this->language->get('button_remove');
			
            $data['tab_module'] = $this->language->get('tab_module');
            
			$data['token'] = $this->session->data['token'];
			
			if (isset($this->error['warning'])) {
				$data['error_warning'] = $this->error['warning'];
			} else {
				$data['error_warning'] = '';
			}
			
			$data['breadcrumbs'] = array();

			$data['breadcrumbs'][] = array(
				'text'      => $this->language->get('text_home'),
				'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
				'separator' => false
			);
	
			$data['breadcrumbs'][] = array(
				'text'      => $this->language->get('text_module'),
				'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
				'separator' => ' :: '
			);
	
			$data['breadcrumbs'][] = array(
				'text'      => $this->language->get('heading_title'),
				'href'      => $this->url->link('module/simple_blog', 'token=' . $this->session->data['token'], 'SSL'),
				'separator' => ' :: '
			);
			
			$data['action'] = $this->url->link('module/simple_blog', 'token=' . $this->session->data['token'], 'SSL');

			$data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
			
			$this->load->model('tool/image');
			
            /*
                name change following variables
                     old name                 new name
                blog_footer_heading = simple_blog_footer_heading
                product_related_heading = simple_blog_product_related_heading
                comment_related_heading = simple_blog_comment_related_heading
                blog_display_category = simple_blog_display_category
                blog_comment_auto_approval = simple_blog_comment_auto_approval
                blog_author_information = simple_blog_author_information
                blog_related_articles = simple_blog_related_articles
                blog_share_social_site = simple_blog_share_social_site
            
            */
            
			$data['simple_blog_status'] = '';
            $data['simple_blog_seo_keyword'] = '';
			$data['simple_blog_custom_theme'] = '';
			$data['blog_tagline'] = '';
			$data['blog_image'] = '';
			$data['no_image'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
			$data['simple_blog_display_category'] = '';
			$data['simple_blog_footer_heading'] = '';
			$data['simple_blog_heading'] = '';
			$data['simple_blog_product_related_heading'] = '';
			$data['simple_blog_comment_related_heading'] = '';
			$data['simple_blog_comment_auto_approval'] = '';
			$data['simple_blog_author_information'] = '';
			$data['simple_blog_share_social_site'] = '';
			$data['simple_blog_related_articles'] = '';
			$data['blog_show_authors'] = '';
			
			if (isset($this->request->post['simple_blog_status'])) {
				$data['simple_blog_status'] = $this->request->post['simple_blog_status'];
			} else if ($this->config->get('simple_blog_status')) {
				$data['simple_blog_status'] = $this->config->get('simple_blog_status');
			}
            
            if (isset($this->request->post['simple_blog_seo_keyword'])) {
				$data['simple_blog_seo_keyword'] = $this->request->post['simple_blog_seo_keyword'];
			} else if ($this->config->get('simple_blog_seo_keyword')) {
				$data['simple_blog_seo_keyword'] = $this->config->get('simple_blog_seo_keyword');
			}
			
			if (isset($this->request->post['simple_blog_custom_theme'])) {
				$data['simple_blog_custom_theme'] = $this->request->post['simple_blog_custom_theme'];
			} else if ($this->config->get('simple_blog_custom_theme')) {
				$data['simple_blog_custom_theme'] = $this->config->get('simple_blog_custom_theme');
			}
			
			if (isset($this->request->post['blog_tagline'])) {
				$data['blog_tagline'] = $this->request->post['blog_tagline'];
			} else if ($this->config->get('blog_tagline')) {
				$data['blog_tagline'] = $this->config->get('blog_tagline');
			}
			
			if (isset($this->request->post['blog_image'])) {
				$data['blog_image'] = $this->request->post['blog_image'];
			} else {
				$data['blog_image'] = $this->config->get('blog_image');			
			}
	
			if ($this->config->get('blog_image') && file_exists(DIR_IMAGE . $this->config->get('blog_image')) && is_file(DIR_IMAGE . $this->config->get('blog_image'))) {
				$data['thumb'] = $this->model_tool_image->resize($this->config->get('blog_image'), 100, 100);		
			} else {
				$data['thumb'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
			}
			
			if (isset($this->request->post['simple_blog_display_category'])) {
				$data['simple_blog_display_category'] = $this->request->post['simple_blog_display_category'];
			} else if ($this->config->get('simple_blog_display_category')) {
				$data['simple_blog_display_category'] = $this->config->get('simple_blog_display_category');
			}
			
			if (isset($this->request->post['simple_blog_footer_heading'])) {
				$data['simple_blog_footer_heading'] = $this->request->post['simple_blog_footer_heading'];
			} else if ($this->config->get('simple_blog_footer_heading')) {
				$data['simple_blog_footer_heading'] = $this->config->get('simple_blog_footer_heading');
			}
			
			if (isset($this->request->post['simple_blog_heading'])) {
				$data['simple_blog_heading'] = $this->request->post['simple_blog_heading'];
			} else if ($this->config->get('simple_blog_heading')) {
				$data['simple_blog_heading'] = $this->config->get('simple_blog_heading');
			}
			
			if (isset($this->request->post['simple_blog_product_related_heading'])) {
				$data['simple_blog_product_related_heading'] = $this->request->post['simple_blog_product_related_heading'];
			} else if ($this->config->get('simple_blog_product_related_heading')) {
				$data['simple_blog_product_related_heading'] = $this->config->get('simple_blog_product_related_heading');
			}
			
			if (isset($this->request->post['simple_blog_comment_related_heading'])) {
				$data['simple_blog_comment_related_heading'] = $this->request->post['simple_blog_comment_related_heading'];
			} else if ($this->config->get('simple_blog_comment_related_heading')) {
				$data['simple_blog_comment_related_heading'] = $this->config->get('simple_blog_comment_related_heading');
			}
			
			if (isset($this->request->post['simple_blog_comment_auto_approval'])) {
				$data['simple_blog_comment_auto_approval'] = $this->request->post['simple_blog_comment_auto_approval'];
			} else if ($this->config->get('simple_blog_comment_auto_approval')) {
				$data['simple_blog_comment_auto_approval'] = $this->config->get('simple_blog_comment_auto_approval');
			}

			if (isset($this->request->post['simple_blog_author_information'])) {
				$data['simple_blog_author_information'] = $this->request->post['simple_blog_author_information'];
			} else if ($this->config->get('simple_blog_author_information')) {
				$data['simple_blog_author_information'] = $this->config->get('simple_blog_author_information');
			}

			if (isset($this->request->post['simple_blog_share_social_site'])) {
				$data['simple_blog_share_social_site'] = $this->request->post['simple_blog_share_social_site'];
			} else if ($this->config->get('simple_blog_share_social_site')) {
				$data['simple_blog_share_social_site'] = $this->config->get('simple_blog_share_social_site');
			}

			if (isset($this->request->post['simple_blog_related_articles'])) {
				$data['simple_blog_related_articles'] = $this->request->post['simple_blog_related_articles'];
			} else if ($this->config->get('simple_blog_related_articles')) {
				$data['simple_blog_related_articles'] = $this->config->get('simple_blog_related_articles');
			}
			
			if (isset($this->request->post['blog_show_authors'])) {
				$data['blog_show_authors'] = $this->request->post['blog_show_authors'];
			} else if ($this->config->get('blog_show_authors')) {
				$data['blog_show_authors'] = $this->config->get('blog_show_authors');
			}
			
			$this->load->model('simple_blog/category');
			
			$data['categories'] = $this->model_simple_blog_category->getCategories(0);
			
            if (isset($this->request->post['simple_blog_module'])) {
    			$modules = $this->request->post['simple_blog_module'];
    		} elseif ($this->config->has('simple_blog_module')) {
    			$modules = $this->config->get('simple_blog_module');
    		} else {
    			$modules = array();
    		}
    		
    		$data['modules'] = array();
    		
    		foreach ($modules as $key => $module) {
    			$data['modules'][] = array(
    				'key'           => $key,
    				'article_limit'        => $module['article_limit'],
                    'category_id'        => $module['category_id'],
                    'status'        => $module['status'],
    				'sort_order'   => $module['sort_order']
    			);
    		}
            
            //print "<pre>"; print_r($data['modules']); die;
            
			$this->load->model('design/layout');

			$data['layouts'] = $this->model_design_layout->getLayouts();			
			
            $data['header'] = $this->load->controller('common/header');
  		    $data['column_left'] = $this->load->controller('common/column_left');
            $data['footer'] = $this->load->controller('common/footer');
    
            $this->response->setOutput($this->load->view('module/simple_blog.tpl', $data));	
		}

		protected function validate() {
            if (!$this->user->hasPermission('modify', 'module/simple_blog')) {
    			$this->error['warning'] = $this->language->get('error_permission');
    		}
            
			if (!$this->error) {
				return true;
			} else {
				return false;
			}	
		}
	}
?>