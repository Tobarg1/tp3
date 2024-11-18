<?php
require_once './app/models/ViajesModel.php';
require_once './app/view/json.view.php';

    class ViajeController{
        private $view;
        private $model;

        public function __construct(){
            $this->model = new ViajesModel();
            $this->view = new JSONView();
        }

        public function getAll($req) {

            $orderBy = false;

            if (isset($req->query->orderBy))
                $orderBy = $req->query->orderBy;
            $viajes = $this->model->obtenerTodosViajes($orderBy);
        
            return $this->view->response($viajes);
        }

        public function get($req, $res){
            $id = $req->params->id;

            $viaje = $this->model->obtenerViajeId($id);

            if (!$viaje){
                return $this->view->response("el viaje con el id=$id no existe", 404);
            }

            return $this->view->response($viaje);
        }

        public function add($req, $res) {
            if (empty($req->body->origen) || empty($req->body->destino) || empty($req->body->fecha_viaje) || empty($req->body->id_colectivo)) {
                return $this->view->response('Faltan completar datos', 400);
            }
    
            $origen = $req->body->origen;
            $destino = $req->body->destino;
            $fecha_viaje = $req->body->fecha_viaje;
            $id_colectivo = $req->body->id_colectivo;
    
            $idViaje = $this->model->agregarViaje($origen, $destino, $fecha_viaje, $id_colectivo);
    
            if ($idViaje) {
                $viaje = $this->model->obtenerViajeId($idViaje);
                return $this->view->response($viaje, 201);
            } else {
                return $this->view->response("Error al crear el viaje", 500);
            }
        }

        public function update($req, $res){
            $id = $req->params->id;

            $viaje = $this->model->obtenerViajeId($id);
        
            if (!$viaje) {
                return $this->view->response("el viaje con el id=$id no existe", 404);
            }
        
            if (empty($req->body->origen) || empty($req->body->destino)|| empty($req->body->fecha_viaje)|| empty($req->body->id_colectivo)) {
                return $this->view->response('Faltan completar datos', 400);
            }
        
            $origen = $req->body->origen;
            $destino = $req->body->destino;
            $fecha_viaje = $req->body->fecha_viaje;
            $id_colectivo = $req->body->id_colectivo;

            $this->model->actualizarViaje($origen,$destino,$fecha_viaje,$id_colectivo,$id);
        
            $viaje = $this->model->obtenerViajeId($id);
            $this->view->response($viaje, 200);
        }
    }