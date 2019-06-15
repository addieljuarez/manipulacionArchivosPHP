<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('Vista');
	}
	public function Guardar(){
		$this->load->helper('file');
       $archivo=$this->input->post("Enviar");
		if (!write_file('./texto.txt', $archivo )){

		 echo "no se creo ";
		}else{
			echo "si se creo";
		}

	
	}
	public function mostrar_texto(){
		$this->load->helper("file");
		$mostrar=read_file("./texto.txt");

		echo $mostrar;
		
	}
	public function Crear_imagen(){
		$this->load->helper('file');

		$path=$this->input->post("imagen");
		$type = pathinfo ($path,PATHINFO_EXTENSION);
		$data = file_get_contents ($path);
		$base64 = base64_encode($data);
		echo $base64;
		write_file('./imagen.txt',$base64);
	

	}
	public function mostrarImagen(){
		$this->load->helper("file");
		$mostrarI=read_file("./imagen.txt");
		echo $mostrarI;
		echo '<img src="data:image/png;base64,'.$mostrarI.'">';
	}

}
