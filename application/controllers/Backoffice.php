<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backoffice extends CI_Controller
{

    private array $user_establishments = [];
    private array $user_categories = [];
    private array $user_products = [];
    
    function __construct() {
        parent::__construct();
        $this->user_logged(); // SECURITY : check if user is logged
    }

    public function index()
    {
        // check nbr of establishments for current user
        $this->user_establishments = $this->establishments->get_by_userid($this->session->user_id);

        // put in session current_establishment ==> this only work in single establishment mode
        $this->session->set_userdata('current_establishment', $this->user_establishments[0]->id);

        // redirecttion dependic if user have an establishment or not
        $url = (count($this->user_establishments) < 1) ? '/backoffice/establishment_edit' : '/backoffice/establishments';
        redirect(base_url($url));

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('/home/login/loggedout'));
    }

    public function establishments(string $error = NULL)
    {
        // get establishments for current user and set it as data
        $this->user_establishments = $this->establishments->get_by_userid($this->session->user_id);

        if (count($this->user_establishments) >= 1) {
            $this->data['establishments'] = $this->user_establishments;
            $this->data['categories'] = count($this->categories->get_by_userid($this->session->user_id));
        } else {
            redirect(base_url('/backoffice/establishment_edit'));
        }
        
        // load views as content in template
        $contents = '';
        $contents .= $this->load->view('back/partials/navigation', $this->get_data(), true);
        $contents .= $this->load->view('back/establishments', $this->data, true);
        $contents .= $this->load->view('back/partials/footer', $this->get_data(), true);
        $this->template->load('layout/back', $contents, $this->get_data());


    }

    public function establishment_edit(string $error = NULL)
    {
        // check nbr of establishments for current user and set it as data[]
        $this->user_establishments = $this->establishments->get_by_userid($this->session->user_id);
        if ((count($this->user_establishments) >= 1)) {
            $this->data['establishments'] = $this->user_establishments;
        } else {
            $establishment = $this->establishments->get_fields();
            // computing an emty array object with DB fields if user dont have establishment
            $this->data['establishments'] = [(object) array_fill_keys(array_keys(array_flip($establishment)), '')];
        }
        
        // parsing datas[] to format url value // no longer up to date just kept as memo
        // foreach ($this->data['establishments'] as $key => $value) {
        //     $url_shortened = str_replace(base_url(),'',$this->data['establishments'][$key]->url);
        //     $this->data['establishments'][$key]->url = $url_shortened;
        // }

        // load views as content in template
        $contents = '';
        $contents .= $this->load->view('back/partials/navigation', $this->get_data(), TRUE);
            
        if ($this->form_validation->run('establishment_edit') === TRUE) {
   
            if ($this->save_establishment($this->input->post('establishment_id')) === TRUE) {
                redirect(base_url(__CLASS__ . '/'. __FUNCTION__ . '/success'));
            } else {
                redirect(base_url(__CLASS__ . '/'. __FUNCTION__ . '/failed'));
            }
        }

        $contents .= $this->load->view('back/establishment_edit', $this->data, true);
        
        // load footer view as content in template then display it
        $contents .= $this->load->view('back/partials/footer', $this->get_data(), TRUE);
        $this->template->load('layout/back', $contents, $this->get_data());
        // print_r($this->input->post);

    }

    // special function used as callback on form rules validation
    public function url_check($str = NULL)
    {
        // No direct function access allowed
        if (!isset($str) || $str !== $this->input->post('url')) {
            redirect(base_url(__CLASS__));
        }

        // search establishment by url match
        $url = $this->establishments->get_url($str);

        if ($url && $this->input->post('establishment_id') !== $url->id) {
            $this->form_validation->set_message("url_check", "Cette {field} est déjà prise.");
            return FALSE;
        } else {
            return TRUE;
        }

    }

    public function establishment_custom(string $error = NULL)
    {
        // get establishments for current user and set it as data
        $this->user_establishments = $this->establishments->get_by_userid($this->session->user_id);

        if (count($this->user_establishments) >= 1) {
            $this->data['establishments'] = $this->user_establishments;
        } else {
            redirect(base_url('/backoffice/establishment_edit'));
        }

        // load views as content in template
        $contents = '';
        $contents .= $this->load->view('back/partials/navigation', $this->get_data(), true);
        $contents .= $this->load->view('back/establishment_custom', $this->get_data(), true);
        $contents .= $this->load->view('back/partials/footer', $this->get_data(), true);
        $this->template->load('layout/back', $contents, $this->get_data());


    }

    public function categories()
    {
        // get caterories for current user and set it as data
        $this->user_categories = $this->categories->get_by_userid($this->session->user_id, 'categories.*');

        if (count($this->user_categories) >= 1) {
            $this->data['categories'] = $this->user_categories;
        } else {
            redirect(base_url('/backoffice/add_category'));
        }

        // load views as content in template
        $contents = '';
        $contents .= $this->load->view('back/partials/navigation', $this->get_data(), true);
        $contents .= $this->load->view('back/categories', $this->data, true);
        $contents .= $this->load->view('back/partials/footer', $this->get_data(), true);
        $this->template->load('layout/back', $contents, $this->get_data());


    }

    public function add_category(string $id = NULL, string $error = NULL)
    {
        // get categories DB fields
        $categories = $this->categories->get_fields();
        // computing an emty array object with DB fields if user dont have category
        $this->data['categories'] = [(object) array_fill_keys(array_keys(array_flip($categories)), '')];

        // load views as content in template
        $contents = '';
        $contents .= $this->load->view('back/partials/navigation', $this->get_data(), TRUE);
            
        if ($this->form_validation->run('add_category') === TRUE) {
   
            if ($this->save_category($this->input->post('category_id')) === TRUE) {
                redirect(base_url(__CLASS__ . '/'. __FUNCTION__ . '/success'));
            } else {
                redirect(base_url(__CLASS__ . '/'. __FUNCTION__ . '/failed'));
            }
        }

        $contents .= $this->load->view('back/add_category', $this->data, true);
        
        // load footer view as content in template then display it
        $contents .= $this->load->view('back/partials/footer', $this->get_data(), TRUE);
        $this->template->load('layout/back', $contents, $this->get_data());

    }

    public function products()
    {
        // SECURITY : check if user is logged
        // $this->user_logged();

        // load views as content in template
        $contents = '';
        $contents .= $this->load->view('back/partials/navigation', $this->get_data(), true);
        // $contents .= $this->load->view('front/intro', $this->get_data(), true);
        $contents .= $this->load->view('back/partials/footer', $this->get_data(), true);
        $this->template->load('layout/back', $contents, $this->get_data());


    }

    public function add_product()
    {
        // SECURITY : check if user is logged
        // $this->user_logged();

        // load views as content in template
        $contents = '';
        $contents .= $this->load->view('back/partials/navigation', $this->get_data(), true);
        // $contents .= $this->load->view('front/intro', $this->get_data(), true);
        $contents .= $this->load->view('back/partials/footer', $this->get_data(), true);
        $this->template->load('layout/back', $contents, $this->get_data());


    }

    private function get_data()
    {
        // set datas to load in views
        $this->data['title'] = "LinkedMenu CMS | Administration";
        $this->data['nav_items'] = array(
            'Etablissement' => '/backoffice/establishments',
            'Catégories de produits' => '/backoffice/categories',
            'Produits' => '/backoffice/products',
            'Déconnexion' => '/backoffice/logout',
        );
        $this->data['current_user'] = array(
            'username' => $this->session->email,
            'user_id' => $this->session->user_id,
        );

        return $this->data;
    }

    private function user_logged()
    {
        if ($this->session->user_authenticated !== true) {
            redirect(base_url('/home/login/authfailed'));
        }
    }

    private function save_establishment(string $id) 
	{
        // security check if establishment_id have the right owner
        $user_estab = [];
        foreach ($this->data['establishments'] as $establishment) {array_push($user_estab, $establishment->id);}
        if (array_search($id, $user_estab) === FALSE) {return FALSE;}

        // set form POSTs values in var
        $data = array(
        'name' => $this->input->post('name'),
        'url' => $this->input->post('url'),
        'address' => $this->input->post('address'),
        'zip_code' => $this->input->post('zip_code'),
        'city' => strtoupper($this->input->post('city')),
        'phone' => $this->input->post('phone'),
        'website' => $this->input->post('website'),
        // 'maintenance' => '0',
        );

        // compute query method to use
        if (count($this->user_establishments)) {
            $query = $this->establishments->update($id, $data);
        } else {
            $data['user_id'] = $this->session->user_id; // add user_id only on insert 
            $query = $this->establishments->insert($data);
        }

		// // verify establishment creation/update and return true or error
		if ($query === TRUE) {
			return TRUE;
		} else { // else return false
			echo '<pre>';
			print_r($query);
			echo '</pre>';
			return FALSE;
		}

    }
    
    private function save_category(string $id = NULL) 
	{
        // security check if establishment_id have the right owner
        $user_categories = [];
        foreach ($this->data['categories'] as $categories) {array_push($user_categories, $categories->id);}
        if (array_search($id, $user_categories) === FALSE) {return FALSE;}

        // set form POSTs values in var
        $data = array(
        'est_id' => $this->session->current_establishment,
        'name' => $this->input->post('name'),
        'description' => $this->input->post('description'),
        'image' => $this->input->post('image'),
        );

        // compute query method to use
        if (count($this->user_categories)) {
            $data['id'] = $id; // add category_id only on update 
            $query = $this->categories->update($id, $data);
        } else {
            $query = $this->categories->insert($data);
        }
        
		// // verify establishment creation/update and return true or error
		if ($query === TRUE) {
			return TRUE;
		} else { // else return false
			echo '<pre>';
			print_r($query);
			echo '</pre>';
			return FALSE;
		}

	}

}
