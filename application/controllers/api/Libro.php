<?php
use Restserver\Libraries\REST_Controller_Definitions;
use Restserver\Libraries\REST_Controller;
use SebastianBergmann\CodeCoverage\Exception;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller_Definitions.php';
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Libro extends REST_Controller
{

    function __construct()
    {
        //LLamada a los metodos de la clae padre
        parent::__construct();
        //Cargando el modelo  a la clase
        $this->load->model('LibroModel');
    }

    public function index_get()
    {
        if (!is_null($this->LibroModel->findAll())) {
            $this->response($this->LibroModel->findAll(), 200);
        } else {
            $this->response(array('error' => 'No existen registros'), 404);
        }
    }

    public function findById_get($id)
    {
        if (!$id) {
            $this->response(null, 400);
        }

        if (!is_null($this->LibroModel->findById($id))) {
            $this->response($this->LibroModel->findById($id), 200);
        } else {
            $this->response(array('error' => 'No se encontro el registro buscado'), 404);
        }
    }

    public function index_post()
    {
        if ($this->post('titulo')) {
            $datos = array(
                'titulo' => $this->post('titulo'),
                'autor' => $this->post('autor'),
                'categoria' => $this->post('categoria'),
                'genero' => $this->post('genero'),
                'estado' => $this->post('estado')
            );
            try {
                if ($this->LibroModel->create($datos) == true) {
                    $this->response(array('response' => 'Registro creado existosamente'), 201);
                } else {
                    $this->response(array('error' => 'No se pudo crear el registro'), 400);
                }
            } catch (Exception $e) {
                $this->response(array('error' => 'Lo sentimos hubo un problema'), 500);
            }
        } else {
            $this->response(array('error' => 'Algunos parametros estan vacios'), 400);
        }
    }

    public function index_put(){
    if($this->put('titulo') && $this->put('id_Libro')){
        $datos = array(
            'id_Libro' => $this->put('id_Libro'),
            'titulo' => $this->put('titulo'),
            'autor' => $this->put('autor'),
            'categoria' => $this->put('categoria'),
            'genero' => $this->put('genero'),
            'estado' => $this->put('estado')
        );
        try {
            if($this->LibroModel->update($datos) == true ){
                $this->response(array('response' => 'Registro actualizado existosamente' ), 201);
            }else{
                $this->response(array('error' => 'No se pudo Actualizar el registro' ), 400);
            }
        } catch (Exception $e) {
            $this->response(array('error' => 'Lo sentimos hubo un problema' ), 500);
        }
    }else{
        $this->response(array('error' => 'Algunos parametros estan vacios' ), 400);
    }
    }

    public function index_delete($id)
    {
        if (!$id) {
            $this->response(array('error' => 'El paremetro se encuentra vacio'), 400);
        }

        if ($this->LibroModel->delete($id) == TRUE) {
            $this->response(array('response' => 'Registro eliminado con exito', 200));
        } else {
            $this->response(array('error' => 'No se encontro el registro buscado'), 404);
        }
    }
}
