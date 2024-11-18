<?php
class ViajesModel {
    private $db;

    public function __construct() {
       $this->db = $db = new PDO('mysql:host=localhost;dbname=db_tp146;charset=utf8', 'root', '');
    }

    function obtenerTodosViajes($orderBy = false) {
        $sql = 'SELECT * FROM viaje';
        if ($orderBy){
            switch($orderBy){
                case 'id_colectivo':
                    $sql .= ' ORDER BY id_colectivo';
                    break;
                case 'fecha_viaje':
                    $sql .= ' ORDER BY fecha_viaje';
                    break;
                case 'origen':
                    $sql .= ' ORDER BY origen';
                    break;
                case 'destino':
                    $sql .= ' ORDER BY destino';
                    break;
                case 'fecha_viaje/descendente':
                    $sql .= ' ORDER BY fecha_viaje DESC';
                    break;
                case 'id_colectivo/descendente':
                    $sql .= ' ORDER BY id_colectivo DESC';
                    break;
                case 'origen/descendente':
                    $sql .= ' ORDER BY origen DESC';
                    break;
                case 'destino/descendente':
                    $sql .= ' ORDER BY destino DESC';
                    break;
            }
        }
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function obtenerViajeId($id) {
            $query = $this->db->prepare('SELECT * FROM viaje WHERE id_viaje = ?');
            $query->execute([$id]);
            return $query->fetch(PDO::FETCH_OBJ);
    }

    function agregarViaje($origen, $destino, $fecha_viaje, $id_colectivo) {
        $query = $this->db->prepare('INSERT INTO viaje (origen, destino, fecha_viaje, id_colectivo) VALUES (?, ?, ?, ?)');
        $query->execute([$origen, $destino, $fecha_viaje, $id_colectivo]);
        return $this->db->lastInsertId();
    }

    function eliminarViaje($id) {
        $query = $this->db->prepare('DELETE FROM viaje WHERE id_viaje = ?');
        $query->execute([$id]);
    }

    function actualizarViaje($origen, $destino, $fecha_viaje, $id_colectivo,$id) {
        $query = $this->db->prepare('UPDATE viaje SET origen = ?, destino = ?, fecha_viaje = ?, id_colectivo = ? WHERE id_viaje = ?');
        $query->execute([$origen, $destino, $fecha_viaje, $id_colectivo, $id]);
    }
}