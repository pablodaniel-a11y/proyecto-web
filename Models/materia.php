<?php
class materia{
    private $conexion;

    public function __construct($conexion){
        $this->$conexion=$conexion;
    }

    public function getAll(){
        return $this->$conexion->query("SELECT * FROM materias ORDER BY id_materia DESC");
    }

    public function create($nombre_materia, $fecha, $estado){
        $s=$this->$conexion->prepare("INSERT INTO materias (nombre_materia, fecha, id_estado) VALUES (?, ?, ?)");
        $s->blind_param("ssi", $nombre_materia, $fecha, $estado);
        return $s->execute();
    }

    public function delete($id_materia) {
        $s=$this->conexion->prepare("DELETE FROM materias WHERE id_materia = ?");
        $s->bind_param("i", $id_materia);
        return $s->execute();
    }
}

