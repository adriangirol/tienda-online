<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Entrada extends CI_Controller {

    public function index() {
        $this->load->helper('url');
        $this->load->view('Index');
        //Prueba Gerion
        
    }

    public function Categorias() {
        
        $this->load->helper('url');
        $this->load->model('Model_tienda', "tienda");

        $categorias = $this->tienda->Traer_categorias();
        
        $cuerpo = $this->load->view('Categorias_view', Array('Categorias' => $categorias), true);
        
        $this->load->view('Index', Array('cuerpo' => $cuerpo));
        
    }
    public function Destacados(){
         
        $this->load->helper('url');
        $this->load->model('Model_tienda', "tienda");
        
        //Traemos los productos destacados 
        $destacados=$this->tienda->traer_destacados();
        
        $cuerpo = $this->load->view('Destacados_view', Array('destacados' => $destacados), true);
        
        $this->load->view('Index', Array('cuerpo' => $cuerpo));
        
    }
    public function ver_categoria($categoria){
        
        $this->load->helper('url');
        $this->load->model('Model_tienda', "tienda");

        $productos=$this->tienda->traer_productos('Categoria_Codigo',$categoria);
        
        $cuerpo = $this->load->view('Productos_view', Array('productos' => $productos), true);
        
        $this->load->view('Index', Array('cuerpo' => $cuerpo));
    }
    public function detalles_producto($id){
        $this->load->helper('url');
        $this->load->model('Model_tienda', "tienda");
        
        if(!$_POST){
            $detalles=$this->tienda->Traer_productos("Codigo",$id);
            $cuerpo = $this->load->view('Detallado_view', Array('detalles' => $detalles), true);
            $this->load->view('Index', Array('cuerpo' => $cuerpo));
        }
        else{
            
             $id_p=$this->input->post('id');
             $cant=$this->input->post('cantidad');
             $pre=$this->input->post('precio');
             
            
             if($cant<1){
                 
               $cuerpo = $this->load->view('Detallado_view', Array('detalles' => $detalles), true);
               $this->load->view('Index', Array('cuerpo' => $cuerpo));
               //Muestra Error cantidad superior a 1 y inferior a max_stock
                 
             }
             
             $producto=Array(
                 'id'=>$id_p,
                 'cantidad'=>$cant,
                 'precio'=>$pre
             );
             
             $this->AñadirCarrito($producto);
             $this->MostrarCarrito();
             
            
            
        }
        
    }
    public function AñadirCarrito($producto){
        
        $this->load->library('carrito');
        $this->carrito->add($producto);
        
    }
    public function MostrarCarrito(){
        $this->load->helper('url');
        $this->load->library('carrito');
        $this->load->model('Model_tienda', "tienda");
        $productoFinal=Array();
        //traemos todos los productos del carrito
        $productos=$this->carrito->get_content();
        
        foreach ($productos as $idx=>$producto){
            //Completamos todos los campos a sacar(Nombre,Categoria);
            
            $productos[$idx]['info']=$this->tienda->Un_producto($producto['id']);       
        }
        /*
        echo "<pre>";
        print_r($productos);
        echo "</pre>";
        */
        $_SESSION['ElementosSeleccionados']=$productos;
        $total=0;
        $cuerpo = $this->load->view('Mostrar_carrito', Array('productos' => $productos, 'total'=> $total), true);
        $this->load->view('Index', Array('cuerpo' => $cuerpo));
        
        
        
    }
    public function BorrarProductoCarrito($id){
         $this->load->helper('url');
         $this->load->library('carrito');
         
         $this->carrito->remove_producto($id);
         
        if($this->carrito->get_content()==NULL)
        {
            $this->carrito->destroy();
            redirect("","location",301);
        }else
        {
            redirect("/Entrada/MostrarCarrito","location",301);
        }
        
    }
    public function Vaciar_carrito(){
        $this->load->helper('url');
        $this->load->library('carrito');
        $this->carrito->destroy();
        redirect("","location",301);
  
    }
    public function Comprar(){
        $this->load->helper('url');
        $this->load->library('carrito');
        
         if(!isset($_SESSION['usuario_correcto']) || $_SESSION['usuario_correcto']==FALSE){
             
            $_SESSION['comprando']=true;
            redirect("/Login/verificar","location",301);
             
         }else
         {
             
             /*echo "<pre>";
             print_r($_SESSION['ElementosSeleccionados']);
             echo"</pre>";
             echo "<pre>";
             print_r($_SESSION['usuario']);
             echo"</pre>";
             */
              
            $cuerpo = $this->load->view('Resumen_pedido',Array('productos'=>$_SESSION['ElementosSeleccionados'],'usuario'=>$_SESSION['usuario']), true);
            $this->load->view('Index', Array('cuerpo' => $cuerpo)); 
         }
        
    }
    public function Finalizar_compra(){
        
        $this->load->helper('url');
        $this->load->model('Model_tienda', "tienda");
        $this->load->library('carrito');
         
        $datosPedido=Array('fecha'=>date('Y-m-d'),
                           'Estado'=>"NP",
                           'Compradores_Codigo'=>$_SESSION['usuario']->Codigo);
//         echo "<pre>";
//             print_r($datosPedido);
//         echo"</pre>";
         
        $this->tienda->NuevoPedido($datosPedido);
       
        $cod_pedido=$this->db->insert_id();
        
        foreach ($_SESSION['ElementosSeleccionados'] as $producto){
            
            $lineapedido=Array(
                    
                    'Productos_Codigo'=>$producto['id'],
                    'Cantidad'=>$producto['cantidad'],
                    'Importe'=>$producto['total'],
                    'Pedidos_codigo_pedido'=>$cod_pedido,
            );
            
           $stock=$this->tienda->TraerStock($producto['id']);
          
          
           $nuevoStock=($stock->Stock)-($producto['cantidad']);
           if($nuevoStock>=0){
           $data = "stock='". $nuevoStock."'";
           $where = " Codigo ='".$producto['id'];
           $this->tienda->RestarStock($data,$where);
            /*
             echo "<pre>";
             print_r($lineapedido);
            echo"</pre>";
             */
             
            $this->tienda->NuevaLineaPedido($lineapedido);
           }
           else
           {
               $SuperaSTOCK=true;
               
           }
            
            
            
        }
        if($SuperaSTOCK==false)
        {
        $this->carrito->destroy();
        $_SESSION['comprando']=false;
        $cuerpo= $this->load->view('Compra_Realizada','', true);
        $this->load->view('Index', Array('cuerpo' => $cuerpo)); 
        }else
        {
            $cuerpo= $this->load->view('Error_compra_Stock','', true);
            $this->load->view('Index', Array('cuerpo' => $cuerpo)); 
        }
        
    }
    public function Verpedidos(){
        $this->load->helper('url');
        $this->load->model('Model_tienda', "tienda");
        
        $mispedidos=$this->tienda->Mispedidos($_SESSION['usuario']->Codigo);
          
        foreach($mispedidos as $idx=>$pedido){
          
          $mispedidos[$idx]['lineas']=$this->tienda->TraerLineasPedido($mispedidos[$idx]['codigo_pedido']);
            
            
        }
//            echo "<pre>";
//             print_r($mispedidos);
//            echo"</pre>";
             
        $cuerpo= $this->load->view('Mostrar_mispedidos',Array('mispedidos'=>$mispedidos,'total'=> $total=""), true);
        $this->load->view('Index', Array('cuerpo' => $cuerpo)); 
    }
    public function CancelarPedido($idpedido){
        $this->load->helper('url');
        $this->load->model('Model_tienda', "tienda");
       
        $this->tienda->AnularPedido($idpedido);
        
        $this->Verpedidos();
        
    }

}
