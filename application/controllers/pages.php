<?php
	class Pages extends CI_Controller {

		public function index($slug = 'index')
		{	
			$this->load->model('pages_model');
			$page = $this->pages_model->get_page_info($slug);
			$other = $this->pages_model->get_other_info();

			$this->mysmarty->assign('p',$page);
			$this->mysmarty->assign('i',$other);

			$this->mysmarty->display('header.tpl');
			$this->mysmarty->display('content.tpl');
			$this->mysmarty->display('sidebar.tpl');
			$this->mysmarty->display('footer.tpl');
		}

		public function validator()
		{	
			//Form validation library and security helper load
			$this->load->helper('security');

			//Getting information from form
			$pib = encode_php_tags(trim($this->input->post('pib')));
			$phone = encode_php_tags(trim($this->input->post('phone')));
			$addr = encode_php_tags(trim($this->input->post('addr')));
			$commodity = encode_php_tags($this->input->post('commodity'));
			$count = encode_php_tags(trim($this->input->post('count')));
			$captcha = encode_php_tags(trim($this->input->post('captcha')));

			/*$this->mysmarty->assign('commodity',$this->input->post('email'));
			$this->mysmarty->display('form.php');*/
			//Array hasn't errors
			$json_data['has_error'] = FALSE;
			//Name Lastname — required|alpha
			if($pib == '' or !preg_match('/^([a-zа-яА-ЯіІґҐїЇёЁєЄ\.\'\-\ ])+$/iu', $pib))
			{
				$json_data['pib'] = TRUE;
				$json_data['has_error'] = TRUE;
			}
			//Phone — required|digits and ()-
			if($phone == '' or !preg_match('/^([0-9\(\-\ \)])+$/iu', $phone))
			{
				$json_data['phone'] = TRUE;
				$json_data['has_error'] = TRUE;
			}
			//Email — valid_email
			if($addr != '' && !preg_match('/^([0-9a-zа-яА-ЯіІґҐїЇёЁєЄ\.\,\/\\\'\-\ ])+$/iu', $addr))
			{
				$json_data['addr'] = TRUE;
				$json_data['has_error'] = TRUE;
			}
			//Commodity — bean or oil
			if($commodity != 'bean' && $commodity != 'oil')
			{
				$json_data['commodity'] = TRUE;
				$json_data['has_error'] = TRUE;
			}
			//Count — required|digits
			if($count != '' && !preg_match('/^([0-9\.\,])+$/iu', $count))
			{
				$json_data['count'] = TRUE;
				$json_data['has_error'] = TRUE;
			}
			//Captcha
			if($captcha == '' or $captcha != $this->session->userdata('captcha'))
			{
				$json_data['captcha'] = TRUE;
				$json_data['has_error'] = TRUE;
			}
			//Send data
			if(!$json_data['has_error'])
			{
				$this->load->model('pages_model');

				$query = $this->pages_model->set_order(array(
					'pib' => $pib,
					'phone' => $phone,
					'address' => $addr,
					'commodity' => $commodity,
					'count' => $count,
					'date' => date('Y-m-d H:i:s'),
					'is_new' => 1,
					'is_archived' => 0 
					));

				if(!$query)
					$json_data['has_error'] = TRUE;
			}
			if($this->input->post('ajax') == TRUE)
				echo json_encode($json_data);
			else
			{
				if(!$json_data['has_error'])
					$this->mysmarty->display('success.tpl');
				else
					$this->mysmarty->display('error.tpl');
			}
		}

		public function captcha()
		{
			$this->load->helper('captcha');
			$this->load->helper('string');	

			$word = random_string('numeric',5);

			$prefs = array(				// настройки капчи, все элементы являются необязательными
			    'word'	 => $word,		// текст
			    'img_width' => 100,			// ширина изображения (int)
			    'img_height' => 30,			// высота изображения (int)
			    'random_str_length' => 5,		// длина случайной строки (int)
			    'border' => TRUE,			// добавлять рамку (bool)
			    'font_path' => asset_url().'fonts/texb.ttf'	// путь к файлу шрифта
			    );

      		$this->session->set_userdata('captcha', $word);

			create_captcha_stream($prefs);
		}
	}