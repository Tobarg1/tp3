<?php
class ViajesModel {
    private $db;

    public function __construct() {
        $this->db = $db = new PDO('mysql:host=localhost;dbname=db_tp146;charset=utf8', 'root', '');
    }

    function obtenerTodosViajes($orderBy = false, $limit = null, $offset = null) {
        $sql = 'SELECT * FROM viaje';
        if ($orderBy) {
            $sql .= ' ORDER BY ' . $orderBy;
        }
        if ($limit !== null && $offset !== null) {
            $sql .= ' LIMIT ? OFFSET ?';
        }

        $query = $this->db->prepare($sql);

        if ($limit !== null && $offset !== null) {
            $query->execute([$limit, $offset]);
        } else {
            $query->execute();
        }

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function obtenerViajeId($id) {
        $query = $this->db->prepare('SELECT * FROM viaje WHERE id_viaje = ?');
        $query->execute([$id]);
        $result = $query->fetch(PDO::FETCH_OBJ);

        return $result ?: null;
    }

    function agregarViaje($origen, $destino, $fecha_viaje, $id_colectivo) {
        $query = $this->db->prepare('INSERT INTO viaje (origen, destino, fecha_viaje, id_colectivo) VALUES (?, ?, ?, ?)');
        $query->execute([$origen, $destino, $fecha_viaje, $id_colectivo]);
        return $this->db->lastInsertId();
    }

    function actualizarViaje($origen, $destino, $fecha_viaje, $id_colectivo, $id) {
        $query = $this->db->prepare('UPDATE viaje SET origen = ?, destino = ?, fecha_viaje = ?, id_colectivo = ? WHERE id_viaje = ?');
        $query->execute([$origen, $destino, $fecha_viaje, $id_colectivo, $id]);
    }
}
