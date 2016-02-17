<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class GenerarXml extends CI_Controller {

    public function exportar() {
        $this->load->model('Model_tienda', "tienda");

        $categorias = $this->tienda->Extraer('SELECT * FROM categorias');
        $categoriasN=get_object_vars($categorias);
        $xml = new SimpleXMLElement('<categorias/>');//Creamos la entrada <categorias>
        //AQUI
        foreach ($categoriasN as $categoria) {
            $xml_cat = $xml->addChild('categoria'); //Creamos etiqueta <categoria> posicionada dentro de <categorias>
            foreach ($categoria as $key => $value) {

                if ($key != 'Codigo') {
                    $xml_cat->addChild($key, utf8_encode($value)); //Añade los datos de cada categoria
                }
            }
            echo "<pre>";
            print_r($categoria);
            echo "</pre>";
            $this->XMLAddCategorias($xml_cat, $categoria['Codigo']);//Añade a <categoria> sus <producto>
        }

        Header('Content-type: text/xml; charset=utf-8');
        Header('Content-type: octec/stream');
        Header('Content-disposition: filename="CategoriasYProductos.xml"');
        print($xml->asXML());
    }

    protected function XMLAddCategorias($xml_cat, $idCat) {
        $lista_categorias = $this->tienda->Traer_productos('Categoria_Codigo',$idCat);
        
        
        $xml_categorias = $xml_cat->addChild('categoria'); //Crea etiqueta <camisetas> dentro de <categoria>
        
        foreach ($lista_categorias as $categoria) {
            $xml_categorias = $xml_categorias->addChild('categoria'); //Crea etiqueta <camiseta> dentro de <camisetas>

            foreach ($categoria as $idx => $valor) {
                $xml_categorias->addChild($idx, utf8_encode($valor)); //Añade a la etiqueta <camiseta>
            }           
        }
    }
}