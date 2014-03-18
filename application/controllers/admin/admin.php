<?php
	class Admin extends CI_Controller {
        function  __construct()
        {
            parent::__construct();
            $this->load->library('tank_auth');
            if(!$this->tank_auth->is_logged_in())
                redirect('admin/auth/login/');
        }
		// Перегляд сторінок адмінки
		public function index($slug = 'admin',$cat = 'all')
		{	
			//Завантаження моделі
			$this->load->model('admin/admin_model');
			//Отримання інформаці\\ про сторінку
			$page = $this->admin_model->get_page_info($slug);
			//Отримання кількості нових замовлень
			$page['new_orders'] = $this->admin_model->get_new_orders();
			//Якщо сторінка замовлень, то отримуємо замовлення і передаємо змінні шаблонізатору
			if($slug == 'orders')
			{
				$orders = $this->admin_model->get_orders($cat);
				$this->mysmarty->assign('o',$orders);
			}
			//Передаємо змінні шаблонізатору
			$this->mysmarty->assign('p',$page);
			//Відлбраження хедеру
			$this->mysmarty->display('admin/header.tpl');
			//Якщо сторінка замовлень, то відображаємо замовлення, якщо ні, то по дефолту
			if($slug != 'orders')
				$this->mysmarty->display('admin/content.tpl'); //Дефолт
			else
				$this->mysmarty->display('admin/orders.tpl'); //Замовлення
		}
		//Перегляд замовлення
		public function view_order($order_id = 1)
		{
			//Завантаження моделі
			$this->load->model('admin/admin_model');
			//Отримання інформації про замовлення
			$page = $this->admin_model->get_order($order_id);
			//Якщо замовлення не переглянуте, то міняємо значення на переглянуте
			if($page['is_new'] == 1)
				$this->admin_model->set_old_order(array('order_id'=>$order_id));
			//Встановлюємо назву сторінки
			$page['title'] = 'Перегляд замовлення';
			//Отримуємо кількість непереглянутих замовлень
			$page['new_orders'] = $this->admin_model->get_new_orders();
			//Передаємо змінні шаблонізатору
			$this->mysmarty->assign('p',$page);
			//Показуємо хедер і сторінку з замовленнями
			$this->mysmarty->display('admin/header.tpl');
			$this->mysmarty->display('admin/view_order.tpl');
		}

		public function price_validator()
		{	
			//Form validation library and security helper load
			$this->load->helper('security');

			//Getting information from form
			$bean_price = encode_php_tags(trim($this->input->post('bean_price')));
			$oil_price = encode_php_tags(trim($this->input->post('oil_price')));

			//Array hasn't errors
			$json_data['has_error'] = FALSE;
			//Name Lastname — required|alpha
			if($bean_price != '' && !preg_match('/^([0-9\.\,])+$/iu', $bean_price))
			{
				$json_data['bean_price'] = TRUE;
				$json_data['has_error'] = TRUE;
			}
			//Phone — required|digits and ()-
			if($oil_price != '' && !preg_match('/^([0-9\.\,])+$/iu', $oil_price))
			{
				$json_data['oil_price'] = TRUE;
				$json_data['has_error'] = TRUE;
			}
			//Send data
			if(!$json_data['has_error'])
			{
				$this->load->model('admin/admin_model');
                if($bean_price == '' or $oil_price == '')
                {
                    $data = $this->admin_model->get_info('prices');

                    if($bean_price == '')
                        $bean_price = $data['bean_price'];

                    if($oil_price == '')
                        $oil_price = $data['oil_price'];
                }

				$query = $this->admin_model->update_prices(array(
					'bean_price' => $bean_price,
					'oil_price' => $oil_price
					));

				if(!$query)
					$json_data['has_error'] = TRUE;
			}
			echo json_encode($json_data);
		}

        public function info_validator()
        {
            //Form validation library and security helper load
            $this->load->helper('security');

            //Getting information from form
            $email = encode_php_tags(trim($this->input->post('email')));
            $phone = encode_php_tags(trim($this->input->post('phone')));
            $name = encode_php_tags(trim($this->input->post('name')));

            //Array hasn't errors
            $json_data['has_error'] = FALSE;
            //Name Lastname — required|alpha
            if($email != '' && !preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix', $email))
            {
                $json_data['email'] = TRUE;
                $json_data['has_error'] = TRUE;
            }
            //Phone — required|digits and ()-
            if($phone != '' && !preg_match('/^([0-9\(\-\ \)])+$/iu', $phone))
            {
                $json_data['phone'] = TRUE;
                $json_data['has_error'] = TRUE;
            }
            //Phone — required|digits and ()-
            if($name != '' && !preg_match('/^([a-zа-яА-ЯіІґҐїЇёЁєЄ\.\'\-\ ])+$/iu', $name))
            {
                $json_data['name'] = TRUE;
                $json_data['has_error'] = TRUE;
            }
            //Send data
            if(!$json_data['has_error'])
            {
                $this->load->model('admin/admin_model');
                if($phone == '' or $email == '' or $name == '')
                {
                    $data = $this->admin_model->get_info('info');

                    if($email == '')
                        $email = $data['email'];

                    if($phone == '')
                        $phone = $data['phone'];

                    if($name == '')
                        $name = $data['name'];
                }

                $query = $this->admin_model->update_info(array(
                    'email' => $email,
                    'phone' => $phone,
                    'name' => $name
                ));

                if(!$query)
                    $json_data['has_error'] = TRUE;
            }
            echo json_encode($json_data);
        }
        //Відмітити виділені замовлення як прочитані
        public function orders_manipulating()
        {
            $this->load->model('admin/admin_model');

            $id_array = json_decode($this->input->post('id_array'));
            $type = $this->input->post('type');

            if($type == 'set_viewed')
            {
                if($this->admin_model->set_old_order($id_array))
                    echo 1;
                else
                    echo 0;
            }
            else if($type == 'set_archived')
            {
                if($this->admin_model->set_archive_order($id_array))
                    echo 1;
                else
                    echo 0;
            }
            else if($type == 'delete')
            {
                if($this->admin_model->delete_order($id_array))
                    echo 1;
                else
                    echo 0;
            }
        }
	}