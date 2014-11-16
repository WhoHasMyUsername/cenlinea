<?php

/**
 * @property Basic $basic
 *
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Front_Login extends CI_Controller {

    private $default_MetaData = array('sect_head_title_en' => '', 'sect_head_description_en' => '', 'sect_head_keywords_en' => '');

    /**
     * Se cargan los modelos, helpers, library que se utilizaran en la clase Front y se define el idioma y otros parametros a ser utilizados en los metodos de la clase
     */
    public function __construct() {
        parent::__construct();
        $this -> CI = &get_instance();
        $this -> load -> model(array('basic'));
        $this -> load -> library(array('session'));
        $this -> load -> language('common');
        $this -> load -> helper('util');
        $response = array('error' => 0, 'success' => 0, 'js' => '', 'html' => '');
        $this -> data['lang'] = $this -> CI -> config -> item('language_abbr');
        $this -> data['menu_header'] = $this -> basic -> get_where('sections', array('sect_header_visible' => 1, 'sect_enabled' => 1), 'sect_menu_order') -> result();
    }

    /**
     * Muestra la vista al formulario de login
     *
     * @param string mensaje de login
     */
    function login($msg = false) {
        if ($this -> session -> userdata('user_logged_in'))
            redirect('home');

        $this -> data['msg'] = $msg;

        load_similar_content('login');
        $this -> data['content'] = $this -> load -> view('front/sections/section_login', $this -> data, TRUE);

        $this -> load -> view('front/default', $this -> data);
    }

    /**
     * Recibe los datos del formulario de login y verifica si son correctos los datos de login, si son correctos guarda en sesion el login del usuario
     */
    function make_login() {
        
        $this -> load -> model(array('users_model'));

        $q = $this -> users_model -> get_user_login($this -> input -> post('login'));

        if($q->num_rows == 0){
            $this->data['msg'] = t('User does not exist.');
            $this->session->set_flashdata('msg', t('User does not exist.'));
            redirect('home#login_form');
        }else{

            $row = $q -> row_array();

            if ($this -> input -> post('password') != $row['user_password']) {
                $this->data['msg'] = t('Password error.');
                $this->session->set_flashdata('msg', t('Password error.'));
                redirect('home#login_form');
            }

            $this -> session -> set_userdata(array('user_logged_in' => true));
            $this -> session -> set_userdata(array('user_firstname' => $row['user_firstname']));
            $this -> session -> set_userdata(array('user_username' => $row['user_username']));
            $this -> session -> set_userdata(array('user_id' => $row['user_id']));
            $this -> session -> set_userdata(array('user_email' => $row['user_email']));
            redirect('courses');
         }
    }

    /**
     * Elimina los datos de sesion del usuario logueado
     */
    function logout() {
        $this -> session -> sess_destroy();
        redirect('home', 'location');
    }

    /**
     * Muestra la vista del formulario de registracion de usuario
     */
    function sign_in() {
        load_similar_content('sign_in');
        $this -> data['content'] = $this -> load -> view('front/sections/section_sign_in', $this -> data, TRUE);

        $this -> load -> view('front/default', $this -> data);
    }

    /**
     * Registra a un nuevo usuario en la aplicacion
     */
    function make_signin() {
        $this -> load -> library('form_validation');
        $this -> form_validation -> set_error_delimiters('<p>', '</p>');
        $this -> form_validation -> set_rules('user_username', 'Username', "required|trim");
        $this -> form_validation -> set_rules('user_email', 'Email', "required|trim|valid_email");
        $this -> form_validation -> set_rules('user_password', 'Contraseña', "required|trim");
        //$this -> form_validation -> set_rules('terms', 'terms of use', 'required');

        if ($this -> form_validation -> run()) {
            $users = $this -> input -> post();

            //echo "<pre>";print_r($users);die;
            if (isset($users['terms'])) {
                unset($users['terms']);
                $users['user_created'] = date('Y-m-d G:i:s');
                $id = $this -> basic -> save('users', 'user_id', $users);
                $this -> session -> sess_destroy();
                $this -> session -> sess_create();
                unset($users['user_password']);
                $this -> session -> set_userdata($users);
                $this -> session -> set_userdata(array('user_logged_in' => true));
                $this -> session -> set_userdata(array('user_id' => $id));
                $response['js'] = 'window.location.href="' . site_url('courses') . '"';
            }else{
                $response['error'] = 1;
                $response['html'] = 'terms of use is required';
            }
        } else {
            $response['error'] = 1;
            //$response['js'] = "$('body,html').animate({scrollTop: 200}, 500);";
            $response['html'] = validation_errors();
        }
        echo json_encode($response);
    }

    /**
     * Registra un usuario recibiendo los datos desde un formulario y enviando un mail de registracion al usuario
     */
    public function register_user() {
        $this -> load -> library('form_validation');
        $this -> load -> helper('send_email');

        $this -> form_validation -> set_error_delimiters('<p>', '</p>');
        $this -> form_validation -> set_rules('user_firstname', 'nombre', "required|trim");
        $this -> form_validation -> set_rules('user_lastname', 'apellido', "required|trim");
        $this -> form_validation -> set_rules('user_email', 'email', "required|trim|valid_email");
        $this -> form_validation -> set_rules('user_email2', 'confirmar email', "required|trim|valid_email|matches[user_email]");
        $this -> form_validation -> set_rules('user_password', 'contraseña', (!$this -> input -> post('user_id') ? 'required|' : '') . "trim|min_length[4]");

        $query = $this -> basic -> get_where('users', array('user_email' => $this -> input -> post('user_email')));

        if ($query -> num_rows() > 0) {
            $response['html'] = 'El email ya existe';
            $response['error'] = '1';
            echo json_encode($response);
            return false;
        }

        if ($this -> form_validation -> run() == TRUE) {
            if (trim($this -> input -> post('user_password')) == '')
                unset($_POST['user_password']);
            unset($_POST['user_password2']);
            unset($_POST['user_email2']);
            if (!$this -> input -> post('user_id'))
                $_POST['user_created'] = date('Y-m-d G:i:s');
            $data = $this -> basic -> save('users', 'user_id', $this -> input -> post());

            $msg = "<h2>Bienvendio xxx	" . $this -> input -> post('user_firstname') . "!</h2>";
            $msg .= "Gracias por registrarte en  <br/><br/>";
            $msg .= "Recuerda tu clave de acceso para que puedas siempre entrar y ver tu perfil, en el que podrás hacer seguimiento a tus compras y envios. <br/><br/>";
            $msg .= "Un saludo, <br/><br/>";
            $msg .= "El equipo de xxx <br/><br/>";

            $contact_send = array('to' => $this -> input -> post('user_email'), 'subject' => 'Bienvendio - Courrier Box', 'message' => $msg);

            $html = 'Se ha guardado el usuario exitosamente';

            send_email($contact_send, $html);

        } else {
            $response['html'] = validation_errors();
            $response['error'] = '1';
            echo json_encode($response);
        }
    }

    /**
     * Muestra la vista del formulario de recuperacion de password
     */
    function recovery_pass() {
        load_similar_content($uri);
        $this -> data['uri'] = 'recovery_pass';
        $this -> data['content'] = $this -> load -> view('front_login/recovery_form', $this -> data, TRUE);
        $this -> load -> view('front/default', $this -> data);
    }

    /**
     * Recibe el mail del usuario desde el formulario y si existe un usuario registrado con ese mail envia un correo con el password del usuario
     */
    function obtain_password() {
        $this -> load -> helper('send_email');
        $user = $this -> basic -> get_where('users', array('user_email' => $this -> input -> post('email'))) -> row();
        $this -> load -> library('form_validation');
        $this -> form_validation -> set_error_delimiters('<p>', '</p>');
        $this -> form_validation -> set_rules('email', t('email'), "required|trim|valid_email");
        if ($this -> form_validation -> run()) {
            if ($user != null) {
                $msg = "<h1>Recuperación de Contraseña</h1> Sent : " . date('m-d-Y') . "<br/><br/>";
                $msg .= "Remitente: Cenline" . "<br/><br/><br/>";
                $msg .= "<i>Usted ha solicitado el servicio de recuperación de contraseña de 
                    Cenline Site. Sus datos de acceso son: </i> <br/> 
                    Email: " . $user -> user_email . "<br/> Contraseña: " . $user -> user_password . " \</a>";

                $contact_send = array('to' => $user -> user_email, 'subject' => 'Recuperación de Contraseña', 'message' => $msg);

                send_email($contact_send);
            } else {
                $response['html'] = t('The email user does not exist');
                $response['error'] = 1;
                echo json_encode($response);
            }
        } else {
            $response['html'] = validation_errors();
            $response['error'] = 1;
            echo json_encode($response);
        }
    }

    /**
     * Almacena un usuario recibiendo los datos del usuario desde un formulario
     */
    function save_user() {
        $this -> load -> library(array('form_validation', 'session'));
        $this -> form_validation -> set_rules('user_firstname', 'nombre', "required|trim");
        $this -> form_validation -> set_rules('user_lastname', 'apellido', "required|trim");
        $this -> form_validation -> set_rules('user_email', 'email', "required|trim|valid_email");
        $this -> form_validation -> set_rules('user_email2', 'confirmar email', "required|trim|valid_email|matches[user_email]");
        $this -> form_validation -> set_rules('user_password', 'contraseña', (!$this -> input -> post('user_id') ? 'required|' : '') . "trim|min_length[4]");
        $this -> form_validation -> set_rules('user_password2', 'confirmar contraseña', (!$this -> input -> post('user_id') || trim($this -> input -> post('user_password')) != '' ? 'required|' : '') . "trim|matches[user_password]");

        if ($this -> form_validation -> run() == TRUE) {
            if (trim($this -> input -> post('user_password')) == '')
                unset($_POST['user_password']);
            unset($_POST['user_password2']);
            unset($_POST['user_email2']);
            if (!$this -> input -> post('user_id'))
                $_POST['user_created'] = date('Y-m-d G:i:s');
            $data = $this -> basic -> save('users', 'user_id', $this -> input -> post());
            $response['js'] = 'window.top.location.href="' . site_url('front_login/perfil') . '"';
        } else {
            $response['html'] = validation_errors();
            $response['error'] = '1';
        }

        echo json_encode($response);
    }


}
