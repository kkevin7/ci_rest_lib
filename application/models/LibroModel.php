<?php

//Clase modelo de Libro
class LibroModel extends CI_Model
{
    public function __construct()
    {
        //LLamndo a la clase padre
        parent::__construct();
    }

    //Metodo que devuele todos los registros de la tabla
    public function findAll(){
        return $this->db->get('libro')->result();
    }

    //Busqueda de los registro pr ID
    public function findById($id){
        $this->db->where('id_Libro',$id);
        return $this->db->get('libro')->row();
    }

    //Busqueda de registros estableciendo un rango espeficio
    public function findByRange($inicio, $maxResult){
        $this->db->limit($maxResult, $inicio);
        return $this->db->get('libro')->result();
    }

    //Cuenta los registros espeficos de una tabla en particular
    public function count(){
        return $this->db->count_all('libro');
    }
    //Metodo que inserta registors
    public function create($datos){
        if($this->db->insert('libro',$datos)){
            return true;
        }else{
            return false;
        }
    }

    //Metoodo actualiza los registros de la base datos
    public function update($datos){
        $this->db->where('id_Libro', $datos['id_Libro']);
        //array_pop($datos['id_Libro']);
        if($this->db->update('libro',$datos)){
            return true;
        }else{
            return false;
        }
    }

    //Metodo en cargado de eliminar los registros de la base de datos
    public function delete($id){
        $this->db->where('id_Libro', $id);
        if($this->db->delete('libro')){
            return true;
        }else{
            return false;
        }
    }


}