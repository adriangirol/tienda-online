
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        
        $this->load->helper('url');
        $cuerpo=$this->load->view('Identificar_view','',true);
        $this->load->view('Index', Array('cuerpo' => $cuerpo));
    }
    public function verificar(){
        
            $this->load->helper('url');
            $this->load->library('form_validation');      
            $this->load->model('Model_tienda', "tienda");
         
            //reglas
            $this->form_validation->set_rules('login','Nombre_usuario', 'required');
            $this->form_validation->set_rules('Passw', 'Password', 'required');
        
         if ($this->form_validation->run() == FALSE)
                {
                   
                    
                    $cuerpo=$this->load->view('Identificar_view','',true);
                    $this->load->view('Index', Array('cuerpo' => $cuerpo));
                }
                else
                {
                    

                    $login=$this->input->post('login');
                    $password=$this->input->post('Passw');
                   
                    
                    //comprobamos si en nuestra base de datos hay algun usuario con este nombre 
                    $Usuario=$this->tienda->Comprueba_usuario($login,$password);
                    // si el usuario es correcto , metemos los datos en la sesion.
                    if($Usuario==true){
                        
                        $datosUser=$this->tienda->traer_usuario($login);
                        $_SESSION['usuario']=$datosUser;
//                        echo "<pre>";
//                        print_r($_SESSION['usuario']);
//                        echo "</pre>";
                        //Este sera el interruptor con el cual controlaremos que los usuarios estan dentro.
                        $_SESSION['usuario_correcto']=true;
                        
                        if($_SESSION['comprando']==""){
                            $cuerpo=$this->load->view('Bienvenido_view','',true);
                            $this->load->view('Index', Array('cuerpo' => $cuerpo));
                        }else
                        {
                            redirect("Entrada/Comprar");
                            exit;
                        }
                        
                    }else
                    {
                        
                    $cuerpo=$this->load->view('Error_acceso_view','',true);
                    $this->load->view('Index', Array('cuerpo' => $cuerpo)); 
                    }
                       

                    
                
                }
     
  
    }

    public function RecogerDatosUser(){
        
         $this->load->helper('url');
         $this->load->library('form_validation');      
         $this->load->model('Model_tienda', "tienda");//modelo de la aplicacion.
         //
                //Reglas
                $this->form_validation->set_rules('user','user', 'required');
                $this->form_validation->set_rules('contrasena', 'contrasena', 'required');
                $this->form_validation->set_rules('email', 'email', 'required');
                $this->form_validation->set_rules('DNI', 'DNI', 'required');
                $this->form_validation->set_rules('nombre', 'nombre', 'required');
                $this->form_validation->set_rules('direccion', 'direccion', 'required');
                $this->form_validation->set_rules('CP', 'CP', 'required');
                $this->form_validation->set_rules('provincia','provincia','required');
               
                
                
                if ($this->form_validation->run() == FALSE)
                {
                    $cuerpo=$this->load->view('Registrese_view','',true);
                    $this->load->view('Index', Array('cuerpo' => $cuerpo));
                }
                else
                {
                    $cuerpo=$this->load->view('Registrese_success','',true);
                    
                    $this->load->view('Index', Array('cuerpo' => $cuerpo));
                    
                    
                    $login=$this->input->post('user');
                    $contrasena=$this->input->post('contrasena');
                    $email=$this->input->post('email');
                    $dni= $this->input->post('DNI');
                    $nombre=$this->input->post('nombre');
                    $direccion=$this->input->post('direccion');
                    $CP= $this->input->post('CP');
                    $provincia=$this->input->post('provincia');
                   
                    $this->tienda->InsertUser(array(
                        'DNI'=>$dni,
                        'Nombre'=>$nombre,
                        'Nombre_usuario'=>$login,
                        'Contraseña'=>$contrasena,
                        'Correo'=>$email,
                        'Direccion'=>$direccion,
                        'CP'=>$CP,
                        'Provincias'=>$provincia
                        
                    ));
                    
                 
                }
    }
    public function Salir(){
        $this->load->helper('url');
        
        $_SESSION['usuario']="";
        $_SESSION['usuario_correcto']=false;
        $this->load->library('carrito');
        $_SESSION['comprando']="";
        $_SESSION['ElementosSeleccionados']="";
        $this->carrito->destroy();
        redirect("","location",301);
         
    }
}
?>