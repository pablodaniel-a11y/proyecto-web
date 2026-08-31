<?php
class materia{
    private $conexion;

    public function __construct($conexion){
        $this->conexion=$conexion;
    }

    public function getAll(){
        return $this->conexion->query("SELECT * FROM materias WHERE visible=true ORDER BY id_materia DESC");
        // return $this->conexion->query("SELECT * FROM materias ORDER BY id_materia DESC");
    }

    public function getById($id_materia){
        $s=$this->conexion->prepare("SELECT * FROM materias WHERE id_materia = ?");
        $s->bind_param("i", $id_materia);
        $s->execute(); 
        return $s->get_result()->fetch_assoc();
    }

    public function update($id_materia,$nombre_materia,$fecha,$estado){
        $s=$this->conexion->prepare("UPDATE materias SET nombre_materia =?, fecha =?, id_estado =? WHERE id_materia =?");
        $s->bind_param("ssii", $nombre_materia, $fecha, $estado, $id_materia);
        return $s->execute();
    }

    public function create($nombre_materia, $fecha, $estado){
        $s=$this->conexion->prepare("INSERT INTO materias (nombre_materia, fecha, id_estado) VALUES (?, ?, ?)");
        $s->bind_param("ssi", $nombre_materia, $fecha, $estado);
        return $s->execute();
    }

    public function delete($id_materia) {
        $s=$this->conexion->prepare("UPDATE materias set visible = false WHERE id_materia = ?");
        // $s=$this->conexion->prepare("DELETE FROM materias WHERE id_materia = ?");
        $s->bind_param("i", $id_materia);
        return $s->execute();
    }
}

