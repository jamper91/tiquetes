<?php

App::uses('AppController', 'Controller');

/**
 * Entradas Controller
 *
 * @property Entrada $Entrada
 * @property PaginatorComponent $Paginator
 */
class EntradasController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'RequestHandler');
    public $helpers = array('PhpExcel');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Entrada->recursive = 0;
        $this->set('entradas', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Entrada->exists($id)) {
            throw new NotFoundException(__('Invalid entrada'));
        }
        $options = array('conditions' => array('Entrada.' . $this->Entrada->primaryKey => $id));
        $this->set('entrada', $this->Entrada->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $this->loadModel('Stage');
        if ($this->request->is('post')) {

            $sql = "SELECT id FROM `entradas` WHERE name ='" . strtoupper($this->request->data['Entrada']['name']) . "' AND stage_id =" . $this->request->data['Entrada']['stage_id']; //
            $id = $this->Entrada->query($sql);
            if ($id == array()) {
                $this->Entrada->create();
                if ($this->Entrada->save($this->request->data)) {
                    $this->Session->setFlash('La entrada se creo correctamente.', 'good');
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('La entrada no se guardo. Por favor, intente nuevamente.', 'error');
                }
            } else {
                $this->Session->setFlash('La entrada ya existe. Por favor, intente nuevamente.', 'error');
            }
        }
        $escenario = $this->Stage->find('list', array(
            "fields" => array(
                "Stage.esce_nombre"
            )
        ));
        $papers = $this->Entrada->Stage->find('list');
        $categories = $this->Entrada->Categoria->find('list');
        $this->set(compact('papers', 'categories', 'escenario'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Entrada->exists($id)) {
            throw new NotFoundException(__('Invalid entrada'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $x = '';
            $sql = "SELECT id FROM `entradas` WHERE name ='" . strtoupper($this->request->data['Entrada']['name']) . "' AND stage_id =" . $this->request->data['Entrada']['stage_id'] . ""; //
            $entr = $this->Entrada->query($sql);
//            debug($entr);die;
            if ($entr != array()) {
                if ($entr[0]['entradas']['id'] != $id) {
                    $x = $entr[0]['entradas']['id'];
                }
            }
            if ($x == '') {
                $this->request->data['Entrada']['name'] = strtoupper($this->request->data['Entrada']['name']);
                if ($this->Entrada->save($this->request->data)) {
                    $this->Session->setFlash('La entrada se actualizo.', 'good');
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('La entrada no se pudo Actualizar. Por favor, intente nuevamente.'));
                }
            } else {
                $this->Session->setFlash('La entrada ya fue asignada. Por favor, Ingrese otra.');
            }
        } else {
            $options = array('conditions' => array('Entrada.' . $this->Entrada->primaryKey => $id));
            $this->request->data = $this->Entrada->find('first', $options);
        }

        $escenario = $this->Entrada->Stage->find('list', array(
            "fields" => array(
                "Stage.esce_nombre"
            )
        ));
// $papers = $this->Entrada->Paper->find('list');
// $categories = $this->Entrada->Category->find('list');
        $this->set(compact('escenario', 'categories'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Entrada->id = $id;
        if (!$this->Entrada->exists()) {
            throw new NotFoundException(__('Invalid entrada'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Entrada->delete()) {
            $this->Session->setFlash(__('The entrada has been deleted.'));
        } else {
            $this->Session->setFlash(__('The entrada could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function getEntradasByEvent() {
        $this->layout = "webservices";
        $event_id = $this->request->data["event_id"];
        $options = "SELECT e.id,e.name FROM `entradas` e INNER JOIN `stages` s ON e.stage_id=s.id INNER JOIN `events` ev ON ev.stage_id=s.id WHERE ev.id = $event_id";
        $entradas = $this->Entrada->query($options);
        $log = $this->Entrada->getDataSource()->getLog(false, false);
//debug($log);
//        var_dump($cities);
        $this->set(
                array(
                    "datos" => $entradas,
                    "_serialize" => array("datos")
                )
        );
    }

    public function getEntradasByStage() {
        $this->layout = "webservices";
        $stage_id = $this->request->data["stage_id"];
        $options = array(
            "conditions" => array(
                "Entrada.stage_id" => $stage_id
            ),
            "fields" => array(
                "Entrada.id",
                "Entrada.name"
            ),
            "recursive" => 0
        );
        $eventos = $this->Entrada->find("all", $options);
        $log = $this->Entrada->getDataSource()->getLog(false, false);
//debug($log);
//        var_dump($cities);
        $this->set(
                array(
                    "datos" => $eventos,
                    "_serialize" => array("datos")
                )
        );
    }

    public function obtenerReporte() {
        $this->layout = "webservices";
//        $entrada_id = $this->request->data["Entrada"]["entrada_id"];
        $entrada_id = 1;
        $this->Entrada->virtualFields['Cantidad'] = 0;
        $this->Entrada->virtualFields['Tipo'] = 0;
        $sql = "select count(l_t.tipo) as Entrada__Cantidad , l_t.tipo as Entrada__Tipo from logs_torniquetes l_t, entradas_torniquetes e_t where l_t.torniquete_id=e_t.torniquete_id and e_t.entrada_id=" . $entrada_id . " group by l_t.tipo";
        $datos = $this->Entrada->query($sql);
//        debug($datos);
        $this->set(
                array(
                    "datos" => $datos,
                    "_serialize" => array("datos")
                )
        );
    }

    public function obtenerReporteByFecha() {
        $this->layout = "webservices";
//        $entrada_id = $this->request->data["Entrada"]["entrada_id"];
        $entrada_id = 1;
        $this->Entrada->virtualFields['Cantidad'] = 0;
        $this->Entrada->virtualFields['Tipo'] = 0;
        $sql = "select count(l_t.tipo) as Entrada__Cantidad , CONCAT(EXTRACT(MONTH from l_t.fecha),'-',EXTRACT(DAY from l_t.fecha),'-',l_t.tipo) as Entrada__Tipo from logs_torniquetes l_t, entradas_torniquetes e_t where l_t.torniquete_id=e_t.torniquete_id and e_t.entrada_id=" . $entrada_id . " group by (Entrada__Tipo) order by Entrada__tipo";
        $datos = $this->Entrada->query($sql);
//        debug($datos);
        $this->set(
                array(
                    "datos" => $datos,
                    "_serialize" => array("datos")
                )
        );
    }

    public function exportar() {
        $entrada_id = 1;
        $this->Entrada->virtualFields['Cantidad'] = 0;
        $this->Entrada->virtualFields['Tipo'] = 0;
        $sql = "select count(l_t.tipo) as Entrada__Cantidad , l_t.tipo as Entrada__Tipo from logs_torniquetes l_t, entradas_torniquetes e_t where l_t.torniquete_id=e_t.torniquete_id and e_t.entrada_id=" . $entrada_id . " group by l_t.tipo";
        $datos = $this->Entrada->query($sql);
//        debug($datos);
        $this->set("datos", $datos);

        $entrada_id = 1;
        $this->Entrada->virtualFields['Cantidad'] = 0;
        $this->Entrada->virtualFields['formato'] = 0;
        $this->Entrada->virtualFields['Tipo'] = 0;
        $this->Entrada->virtualFields['Fecha'] = 0;
        $sql = "select count(l_t.tipo) as Entrada__Cantidad , CONCAT(EXTRACT(MONTH from l_t.fecha),'-',EXTRACT(DAY from l_t.fecha),'-',l_t.tipo) as Entrada__formato, CONCAT(EXTRACT(MONTH from l_t.fecha),'-',EXTRACT(DAY from l_t.fecha)) as Entrada__Fecha, l_t.tipo as Entrada__Tipo from logs_torniquetes l_t, entradas_torniquetes e_t where l_t.torniquete_id=e_t.torniquete_id and e_t.entrada_id=" . $entrada_id . " group by (Entrada__formato) order by Entrada__formato";
        $datos1 = $this->Entrada->query($sql);
//            debug($datos);
        $pos = 0;
        $datos3 = array();
        for ($index = 0; $index < count($datos1); $index++) {
            $dato = $datos1[$index];
//Tomo la fecha y el tipo
            $fecha = $dato["Entrada"]["Fecha"];
            $tipo = $dato["Entrada"]["Tipo"];

            $cantidadI = 0;
            $cantidadR = 0;
            switch ($tipo) {
                case "RECHAZO":
                    $tipo = "INGRESO";
                    $cantidadR = $dato["Entrada"]["Cantidad"];
                    break;
                case "INGRESO":
                    $tipo = "RECHAZO";
                    $cantidadI = $dato["Entrada"]["Cantidad"];
                    break;
            }

//Ahora busco el opuesto de este
            $esta = false;
            for ($index1 = $index + 1; $index1 < count($datos1); $index1++) {
                $d = $datos1[$index1];
//                debug($d);
                $fecha1 = $d["Entrada"]["Fecha"];
                $tipo1 = $d["Entrada"]["Tipo"];
                if ($tipo1 == $tipo && $fecha1 == $fecha) {
                    $esta = true;
                    $index++;
                    switch ($tipo1) {
                        case "RECHAZO":
                            $cantidadR = $d["Entrada"]["Cantidad"];
                            break;
                        case "INGRESO":
                            $cantidadI = $d["Entrada"]["Cantidad"];
                            break;
                    }
                    break;
                }
            }
            if (!$esta) {
                switch ($tipo) {
                    case "RECHAZO":
                        $cantidadR = 0;
                        break;
                    case "INGRESO":
                        $cantidadI = 0;
                        break;
                }
            }
            $fecha2 = explode("-", $fecha);
            $mons = array(1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Aug", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec");
            $fecha = $mons[$fecha2[0]] . " - " . $fecha2[1];

            $aux = array(
                "Fecha" => $fecha,
                "Validos" => $cantidadI,
                "Invalidos" => $cantidadR
            );
            $datos3[$pos] = $aux;
            $pos++;
        }


        $this->set("datos1", $datos1);
        $this->set("datos3", $datos3);
    }

    public function exportar2() {
        $j = 0;
        $sql = "Select l_t.*, person.*, input.*
                from 
                        logs_torniquetes  l_t
                LEFT JOIN 
                        inputs input 
                on 
                        input.id=l_t.input_iD
                LEFT JOIN
                        people person 
                on 
                        person.id=input.person_id
                ORDER BY
                        person.id,
                        l_t.fecha
                        ";
        $this->loadModel("Person");
        $this->loadModel("LogsTorniquete");
        $this->loadModel("Input");


        $datos = $this->Person->query($sql);
        foreach ($datos as $dato) {
            $estado = "";
            switch ($dato["l_t"]["tipo"]) {
                case "RECHAZO":
                    $estado = "RECHAZADO";
                    break;
                case "INGRESO":
                    $estado = "VALIDO";
                    BREAK;
            }

            $datetimearray = explode(" ", $dato["l_t"]["fecha"]);
            $time = $datetimearray[1];
            $aux = array(
                "Cedula" => $dato["person"]["pers_documento"],
                "Nombre" => $dato["person"]["pers_primNombre"],
                "Apellido" => $dato["person"]["pers_primApellido"],
                "Empresa" => $dato["person"]["pers_empresa"],
                "Escarapela" => $dato["input"]["entr_identificador"],
                "Chip" => $dato["input"]["entr_codigo"],
                "Hora" => $time,
                "Estado" => $estado
            );

            $datos2[$j] = $aux;
            $j++;
            $this->set("datos2", $datos2);
//            debug($datos2);
        }
//         
    }

    public function exportar3() {
        $this->Entrada->virtualFields['Cantidad'] = 0;
        $this->Entrada->virtualFields['formato'] = 0;
        $this->Entrada->virtualFields['Fecha'] = 0;
        $sql = "SELECT 
                    Count(Log.id) AS Entrada__Cantidad,
                    Concat(Extract(month FROM Log.fecha_realizado), '-', Extract(day FROM Log.fecha_realizado), '-', Log.user_id) AS Entrada__formato,
                    Concat(Extract(month FROM Log.fecha_realizado), '-', Extract(day FROM Log.fecha_realizado)) AS  Entrada__Fecha,
                    User.username,
                    Person.pers_PrimNombre
                FROM   
                    logs Log
                LEFT JOIN
                            users User
                        on
                                User.id=Log.user_id
                LEFT JOIN
                                people Person
                        on
                                Person.id=User.person_id
                WHERE
                        Log.descripcion='VENTA'
                GROUP  BY 
                    ( Entrada__formato )
                ORDER  BY 
                    Entrada__formato
                ";
        $datos = $this->Entrada->query($sql);
//        debug($datos);
        $this->set("datos", $datos);
    }

    public function exportar4() {
        $this->Entrada->virtualFields['Cantidad'] = 0;
        $sql = "SELECT 
                    COUNT( DISTINCT person_id ) as Entrada__Cantidad
                FROM datas
                ";
        $datos = $this->Entrada->query($sql);
//        debug($datos);
        $this->set("datos", $datos);
    }

    public function exportar5($event_id = null) {
//        debug($event_id);
        $this->Entrada->virtualFields['Cantidad'] = 0;
        $this->Entrada->virtualFields['Aux'] = 0;
        $this->Entrada->virtualFields['Fecha'] = 0;

        $sql = "SELECT 
                    *
                FROM 
                    inputs input
                LEFT JOIN 
                    people person 
                ON 
                    person.id = input.person_id
                WHERE
                    person.id IS NOT null AND input.event_id = $event_id;
                ";

        $datos = $this->Entrada->query($sql);
//          debug($datos);
//        debug($datos); die;
        $pos = 0;
        $i = 0;
        $person_id_ant = "";

//DIAS DEL EVENTO
        $this->loadModel('Event');
        $sql = "SELECT datediff(`even_fechFinal`, `even_fechInicio`) AS cantidad FROM `events` e WHERE `id` = $event_id";
        $cantidad = $this->Event->query($sql);
        $total = $cantidad[0][0]['cantidad'] + 1;
        $sql2 = "SELECT even_fechInicio FROM events WHERE id = $event_id";
        $fecha = $this->Event->query($sql2);
        if ($fecha != array()) {
            $date = $fecha[0]['events']['even_fechInicio'];
            $f = date('Y-m-d', strtotime($date));
        }
//       debug($date ." asdasdasd   ".$f);die;
        $dias = array();

//        for ($i = 0; $i < $total; $i++) {
//            $datos[$i]['g']['id'] = [$f];
//            $datos[$i]['g']['name'] = [$f];
//            $f = date('Y-m-d', strtotime('+1 days', strtotime($f)));

        if ($total > 0) {
            for ($i = 0; $i < $total; $i++) {
                $dias[$i]['g']['id'] = $f;
                $dias[$i]['g']['name'] = $f;
                $f = date('Y-m-d', strtotime('+1 days', strtotime($f)));
            }
        }
//        debug($total);
//        debug($event_id);
//        debug($dias);
//        die;
        $datos2 = array();
        foreach ($datos as $dato) {
//            debug($dato);
//            die;
//            //Busco el nombre de la persona
//            $options = array(
//                "fields" => array(
//                    "descripcion"
//                ),
//                "conditions" => array(
//                    "Data.person_id" => $dato["person"]["id"],
//                    "Data.forms_personal_datum_id" => 16
//                ),
//                "recursive" => -1
//            );
//            $this->loadModel("Data");
//            $nombre = $this->Data->find("all", $options);
////            debug($nombre);
//            //El if es para saber si encontro algo en la tabla Data o se debe sacar de la tabla input
//            if (empty($nombre)) {
//                $nombre = $dato["person"]["pers_primNombre"];
//            } else {
//                $nombre = $nombre[0];
//                $nombre = $nombre["Data"]["descripcion"];
//            }
//
//            //Busco el apellido de la persona
//            $options = array(
//                "fields" => array(
//                    "descripcion"
//                ),
//                "conditions" => array(
//                    "Data.person_id" => $dato["person"]["id"],
//                    "Data.forms_personal_datum_id" => 15
//                ),
//                "recursive" => -1
//            );
//            $this->loadModel("Data");
//            $apellido = $this->Data->find("all", $options);
////            debug($apellido);
//            //El if es para saber si encontro algo en la tabla Data o se debe sacar de la tabla input
//            if (empty($apellido)) {
//                $apellido = $dato["person"]["pers_primApellido"];
//            } else {
//                $apellido = $apellido[0];
//                $apellido = $apellido["Data"]["descripcion"];
//            }
//
//            //Busco la empresa de la persona
//            $options = array(
//                "fields" => array(
//                    "descripcion"
//                ),
//                "conditions" => array(
//                    "Data.person_id" => $dato["person"]["id"],
//                    "Data.forms_personal_datum_id" => 14
//                ),
//                "recursive" => -1
//            );
//            $this->loadModel("Data");
//            $empresa = $this->Data->find("all", $options);
//
//            //El if es para saber si encontro algo en la tabla Data o se debe sacar de la tabla input
//            if (empty($empresa)) {
//                $empresa = $dato["person"]["pers_primApellido"];
//            } else {
//                $empresa = $empresa[0];
//                $empresa = $empresa["Data"]["descripcion"];
//            }
//
//
//            $datetimearray = explode(" ", $dato["EntradaInput"]["fecha"]);
//            $time = $datetimearray[1];
//Busco los ingresos del primer dia

            $fecha1 = "0";
//            debug($dias);die;
            if ($dias[0]['g']['name'] != NULL || $dias[0]['g']['name'] != '') {

                $options = array(
                    "fields" => array(
                        "EntradasInput.ingresos"
                    ),
                    "conditions" => array(
                        "EntradasInput.fecha" => '' . $dias[0]['g']['name'] . ' 00:00:00',
                        "EntradasInput.input_id" => $dato["input"]["id"]
                    ),
                    "recursive" => -1
                );
                $this->loadModel("EntradasInput");
                $fecha1 = $this->EntradasInput->find("all", $options);

//El if es para saber si encontro algo en la tabla Data o se debe sacar de la tabla input
                if (empty($fecha1)) {
                    $fecha1 = 0;
                } else {
                    $fecha1 = $fecha1[0];
                    $fecha1 = $fecha1["EntradasInput"]["ingresos"];
                }
            }
//
//
//Busco los ingresos del segundo dia
//            debug($fecha2)
            $fecha2 = '0';
            if ($total >= 2) {
                if ($dias[1]['g']['name'] != NULL || $dias[1]['g']['name'] != '') {

                    $options = array(
                        "fields" => array(
                            "EntradasInput.ingresos"
                        ),
                        "conditions" => array(
                            "EntradasInput.fecha" => '' . $dias[1]['g']['name'] . ' 00:00:00',
                            "EntradasInput.input_id" => $dato["input"]["id"]
                        ),
                        "recursive" => -1
                    );
                    $this->loadModel("EntradasInput");
                    $fecha2 = $this->EntradasInput->find("all", $options);

//El if es para saber si encontro algo en la tabla Data o se debe sacar de la tabla input
                    if (empty($fecha2)) {
                        $fecha2 = 0;
                    } else {
                        $fecha2 = $fecha2[0];
                        $fecha2 = $fecha2["EntradasInput"]["ingresos"];
                    }
                }
            }
//
//
//Busco los ingresos del tercer dia dia
            $fecha3 = "0";
            if ($total >= 3) {
                if ($dias[2]['g']['name'] != NULL || $dias[2]['g']['name'] != '') {

                    $options = array(
                        "fields" => array(
                            "EntradasInput.ingresos"
                        ),
                        "conditions" => array(
                            "EntradasInput.fecha" => '' . $dias[2]['g']['name'] . ' 00:00:00',
                            "EntradasInput.input_id" => $dato["input"]["id"]
                        ),
                        "recursive" => -1
                    );
                    $this->loadModel("EntradasInput");
                    $fecha3 = $this->EntradasInput->find("all", $options);

//El if es para saber si encontro algo en la tabla Data o se debe sacar de la tabla input
                    if (empty($fecha3)) {
                        $fecha3 = 0;
                    } else {
                        $fecha3 = $fecha3[0];
                        $fecha3 = $fecha3["EntradasInput"]["ingresos"];
                    }
                }
            }
//
//            //Busco los ingresos del cuarto dia dia

            $fecha4 = "0";
            if ($total >= 4) {
                if ($dias[3]['g']['name'] != NULL || $dias[3]['g']['name'] != '') {

                    $options = array(
                        "fields" => array(
                            "EntradasInput.ingresos"
                        ),
                        "conditions" => array(
                            "EntradasInput.fecha" => '' . $dias[3]['g']['name'] . ' 00:00:00',
                            "EntradasInput.input_id" => $dato["input"]["id"]
                        ),
                        "recursive" => -1
                    );
                    $this->loadModel("EntradasInput");
                    $fecha4 = $this->EntradasInput->find("all", $options);

//El if es para saber si encontro algo en la tabla Data o se debe sacar de la tabla input
                    if (empty($fecha4)) {
                        $fecha4 = 0;
                    } else {
                        $fecha4 = $fecha4[0];
                        $fecha4 = $fecha4["EntradasInput"]["ingresos"];
                    }
                }
            }
//                //Busco los ingresos del quinto dia dia
            $fecha5 = "0";
            if ($total >= 5) {
                if ($dias[4]['g']['name'] != NULL || $dias[4]['g']['name'] != '') {
                    $options = array(
                        "fields" => array(
                            "EntradasInput.ingresos"
                        ),
                        "conditions" => array(
                            "EntradasInput.fecha" => '' . $dias[4]['g']['name'] . ' 00:00:00',
                            "EntradasInput.input_id" => $dato["input"]["id"]
                        ),
                        "recursive" => -1
                    );
                    $this->loadModel("EntradasInput");
                    $fecha5 = $this->EntradasInput->find("all", $options);

//El if es para saber si encontro algo en la tabla Data o se debe sacar de la tabla input
                    if (empty($fecha5)) {
                        $fecha5 = 0;
                    } else {
                        $fecha5 = $fecha5[0];
                        $fecha5 = $fecha5["EntradasInput"]["ingresos"];
                    }
                }
            }
//Busco los ingresos del sexto dia dia
            $fecha6 = "0";
            if ($total >= 6) {
                if ($dias[5]['g']['name'] != NULL || $dias[5]['g']['name'] != '') {
                    $options = array(
                        "fields" => array(
                            "EntradasInput.ingresos"
                        ),
                        "conditions" => array(
                            "EntradasInput.fecha" => '' . $dias[5]['g']['name'] . ' 00:00:00',
                            "EntradasInput.input_id" => $dato["input"]["id"]
                        ),
                        "recursive" => -1
                    );
                    $this->loadModel("EntradasInput");
                    $fecha6 = $this->EntradasInput->find("all", $options);

//El if es para saber si encontro algo en la tabla Data o se debe sacar de la tabla input
                    if (empty($fecha6)) {
                        $fecha6 = 0;
                    } else {
                        $fecha6 = $fecha6[0];
                        $fecha6 = $fecha6["EntradasInput"]["ingresos"];
                    }
                }
            }

//Busco los ingresos del septimo dia dia
            $fecha7 = "0";
            if ($total >= 7) {
                if ($dias[6]['g']['name'] != NULL || $dias[6]['g']['name'] != '') {

                    $options = array(
                        "fields" => array(
                            "EntradasInput.ingresos"
                        ),
                        "conditions" => array(
                            "EntradasInput.fecha" => '' . $dias[6]['g']['name'] . ' 00:00:00',
                            "EntradasInput.input_id" => $dato["input"]["id"]
                        ),
                        "recursive" => -1
                    );
                    $this->loadModel("EntradasInput");
                    $fecha7 = $this->EntradasInput->find("all", $options);

//El if es para saber si encontro algo en la tabla Data o se debe sacar de la tabla input
                    if (empty($fecha7)) {
                        $fecha7 = 0;
                    } else {
                        $fecha7 = $fecha7[0];
                        $fecha7 = $fecha7["EntradasInput"]["ingresos"];
                    }
                }
            }
//            }
//Busco los ingresos del octavo dia dia
            $fecha8 = "0";
            if ($total >= 8) {
                if ($dias[7]['g']['name'] != NULL || $dias[7]['g']['name'] != '') {

                    $options = array(
                        "fields" => array(
                            "EntradasInput.ingresos"
                        ),
                        "conditions" => array(
                            "EntradasInput.fecha" => '' . $dias[7]['g']['name'] . ' 00:00:00',
                            "EntradasInput.input_id" => $dato["input"]["id"]
                        ),
                        "recursive" => -1
                    );
                    $this->loadModel("EntradasInput");
                    $fecha8 = $this->EntradasInput->find("all", $options);

//El if es para saber si encontro algo en la tabla Data o se debe sacar de la tabla input
                    if (empty($fecha8)) {
                        $fecha8 = 0;
                    } else {
                        $fecha8 = $fecha8[0];
                        $fecha8 = $fecha8["EntradasInput"]["ingresos"];
                    }
                }
            }
//            $aux = array(
//                "Cedula" => $dato["person"]["pers_documento"],
//                "Nombre" => $nombre,
//                "Apellido" => $apellido,
//                "Empresa" => $empresa,
//                "Manilla" => $dato["input"]["entr_identificador"],
//                "Chip" => $dato["input"]["entr_codigo"],
//                "Agosto-1" => $fecha1,
//                "Agosto-2" => $fecha2,
//                "Agosto-3" => $fecha3
//            );
//            $datos2[$i] = $aux;
//            $i++;
//            $pos++;
//        }
            $this->loadModel("Input");
            $this->loadModel("User");
            $id = $dato["input"]["categoria_id"];
            $id2 = $dato["input"]["usuarioescarapela"];
            $id3 = $dato["input"]["usuariocertificate"];
            $t = $dato['person']['document_type_id'];
            $tido = "";
            if ($t != null) {
                $this->loadModel("Person");
                $r = $this->Person->query("SELECT tido_descripcion FROM document_types WHERE id =$t");
                if ($r != array()) {
                    $tido = $r[0]['document_types']['tido_descripcion'];
                }
            }
            $usuario = "";
            if ($id2 != null) {
                $sql2 = "SELECT username FROM users WHERE id = $id2";
                $res2 = $this->User->query($sql2);
                if ($res2 != array()) {
                    $usuario = $res2[0]['users']['username'];
                }
            }
            $usuario2 = "";
            if ($id3 != null) {
                $sql2 = "SELECT username FROM users WHERE id = $id3";
                $res2 = $this->User->query($sql2);
                if ($res2 != array()) {
                    $usuario2 = $res2[0]['users']['username'];
                }
            }
            $sql = "SELECT descripcion FROM categorias WHERE id= $id ";
            $res = $this->Input->query($sql);


//            debug($dato["person"]["diligenciamiento"]);
//            die;

            $categoria = '';
            if ($res != array()) {
                $categoria = $res[0]['categorias']['descripcion'];
            }
            $aux = array(
                "Fecha" => $dato["person"]["diligenciamiento"],
                "Tipo2" => $tido,
                "Documento" => $dato["person"]["pers_documento"],
                "Nombre" => $dato["person"]["pers_primNombre"],
                "Apellido" => $dato["person"]["pers_primApellido"],
                "Empresa" => $dato["person"]["pers_empresa"],
                "Cargo" => $dato["person"]["cargo"],
                "Telefono" => $dato["person"]["pers_telefono"],
                "Celular" => $dato["person"]["pers_celular"],
                "Email" => $dato["person"]["pers_mail"],
                "Ciudad" => $dato["person"]["ciudad"],
                "Pais" => $dato["person"]["pais"],
                "Sector" => $dato["person"]["sector"],
                "Tipo" => $categoria,
                "Stand" => $dato["person"]["stan"],
                "Impreso" => $usuario,
                "Fecha2" => $dato["input"]["fechaescarapela"],
                "Impreso2" => $usuario2,
                "Fecha3" => $dato["input"]["fechacertificate"],
                "Codigo" => $dato['input']['entr_codigo'],
                "Observaciones" => $dato["person"]["observaciones"],
                "Agosto-1" => $fecha1,
                "Agosto-2" => $fecha2,
                "Agosto-3" => $fecha3,
                "Agosto-4" => $fecha4,
                "Agosto-5" => $fecha5,
                "Agosto-6" => $fecha6,
                "Agosto-7" => $fecha7,
                "Agosto-8" => $fecha8,
            );
            $datos2[$i] = $aux;
            $i++;
            $pos++;
        }
//        debug($datos2);


        $this->set("datos", $datos2);
    }

    public function reportes() {
        if ($this->request->is('post')) {
            
        }
        $entrada_id = 1;
        $this->Entrada->virtualFields['Cantidad'] = 0;
        $this->Entrada->virtualFields['formato'] = 0;
        $this->Entrada->virtualFields['Tipo'] = 0;
        $this->Entrada->virtualFields['Fecha'] = 0;
        $sql = "select count(l_t.tipo) as Entrada__Cantidad , CONCAT(EXTRACT(MONTH from l_t.fecha),'-',EXTRACT(DAY from l_t.fecha),'-',l_t.tipo) as Entrada__formato, CONCAT(EXTRACT(MONTH from l_t.fecha),'-',EXTRACT(DAY from l_t.fecha)) as Entrada__Fecha, l_t.tipo as Entrada__Tipo from logs_torniquetes l_t, entradas_torniquetes e_t where l_t.torniquete_id=e_t.torniquete_id and e_t.entrada_id=" . $entrada_id . " group by (Entrada__formato) order by Entrada__formato";
        $datos = $this->Entrada->query($sql);
//            debug($datos);
        $this->set("datos", $datos);
//            $this->set(
//                    array(
//                        "datos" => $datos,
//                        "_serialize" => array("datos")
//                    )
//            );
        $this->loadModel('Country');
        $countriesName = $this->Country->find('list', array(
            "fields" => array(
                "Country.name"
            ),
            "recursive" => -2
        ));
        $this->loadModel("Event");
        $events = $this->Event->find('list', array(
            "fields" => array(
                "Event.id",
                "Event.even_nombre"
            ),
            "order" => array(
                "even_nombre"
            )
        ));
        $this->set(compact('events'));
        $this->set(compact('countriesName'));

        $this->set(compact('state'));

//$cities = $this->Stage->City->find('list');
        $this->set(compact('cities'));

        $this->set(compact('stages'));
        $entradas = $this->Entrada->find('list');
        $this->set(compact('categorias', 'entradas'));
    }

    public function consumibles() {
//        debug($event_id);
        $this->Entrada->virtualFields['Cantidad'] = 0;
        $this->Entrada->virtualFields['Aux'] = 0;
        $this->Entrada->virtualFields['Fecha'] = 0;
        $sql = "SELECT 
                    *
                FROM 
                    inputs input
                LEFT JOIN 
                    people person 
                ON 
                    person.id = input.person_id
                WHERE
                    person.id IS NOT null AND input.event_id = 7;
                ";

        $datos = $this->Entrada->query($sql);
//TRAER LOS GIFT
        $sql = "SELECT 
                    *
                FROM 
                    gifts
                LEFT JOIN 
                    gifts_events giftEvents
                ON 
                    giftEvents.gift_id = gifts.id
                WHERE
                    gifts.id IS NOT null AND giftEvents.event_id = 7
                ORDER BY
                	giftEvents.dia asc;
                ";

        $gifts = $this->Entrada->query($sql);
//          debug($datos);
//        debug($datos); die;
        $pos = 0;
        $i = 0;
        $person_id_ant = "";
        foreach ($datos as $dato) {

            $this->loadModel("Input");
            $this->loadModel("User");
            $id = $dato["input"]["categoria_id"];
            $id2 = $dato["input"]["usuariocertificate"];
            $t = $dato['person']['document_type_id'];
            $tido = "";
            if ($t != null) {
                $this->loadModel("Person");
                $r = $this->Person->query("SELECT tido_descripcion FROM document_types WHERE id =$t");
                if ($r != array()) {
                    $tido = $r[0]['document_types']['tido_descripcion'];
                }
            }
            $usuario = "";
            if ($id2 != null) {
                $sql2 = "SELECT username FROM users WHERE id = $id2";
                $res2 = $this->User->query($sql2);
                if ($res2 != array()) {
                    $usuario = $res2[0]['users']['username'];
                }
            }
            $sql = "SELECT descripcion FROM categorias WHERE id= $id ";
            $res = $this->Input->query($sql);


//            debug($dato["person"]["diligenciamiento"]); die;

            if ($res != array()) {
                $categoria = $res[0]['categorias']['descripcion'];
            }

            foreach ($gifts as $key => $value) {
                $g . $key = $value[$key]['gifts']['descripcion'];
            }

            $aux = array(
//"Fecha" => $dato["person"]["diligenciamiento"],
//"Tipo2" => $tido,
                "Documento" => $dato["person"]["pers_documento"],
                "Nombre" => $dato["person"]["pers_primNombre"],
                "Apellido" => $dato["person"]["pers_primApellido"],
                "Empresa" => $dato["person"]["pers_empresa"],
                "Cargo" => $dato["person"]["cargo"],
                "Telefono" => $dato["person"]["pers_telefono"],
                "Celular" => $dato["person"]["pers_celular"],
                "Email" => $dato["person"]["pers_mail"],
                "Ciudad" => $dato["person"]["ciudad"],
                "Pais" => $dato["person"]["pais"],
                "Sector" => $dato["person"]["sector"],
                "Tipo" => $categoria,
                    //"Impreso" => $usuario,
//"Fecha2" => $dato["input"]["fechacertificate"],
                    ) . array();
            $datos2[$i] = $aux;
            $i++;
            $pos++;
        }
//        debug($datos2);


        $this->set("datos", $datos2);
    }

    public function exportar6($event_id = null) {
        $this->loadModel("Log");
        $datos = $this->Log->query("SELECT p.pers_primNombre, p.pers_primApellido, p.categoria_id, p.pers_documento, p.pers_empresa, l.`fecha`, l.`descripcion` FROM `people` p INNER JOIN `inputs` i ON p.`id` = i.`person_id` INNER JOIN `logs_consumibles` l ON l.`input_id` = i.`id` WHERE i.`event_id` = $event_id");
        $i = 0;
        $datos2 = array();
        $categoria = "";
        foreach ($datos as $dato) {
//lleno el array
            $id = $dato['p']['categoria_id'];
            $res = $this->Log->query("SELECT descripcion FROM categorias WHERE id= $id ");
            if ($res != array()) {
                $categoria = $res[0]['categorias']['descripcion'];
            }
            $aux = array(
                "Categoria" => $categoria,
                "Documento" => $dato['p']['pers_documento'],
                "Nombres" => $dato['p']['pers_primNombre'],
                "Apellidos" => $dato['p']['pers_primApellido'],
                "Empresa" => $dato['p']['pers_empresa'],
                "Fecha" => $dato['l']['fecha'],
                "Descripcion" => $dato['l']['descripcion'],
            );
            $datos2[$i] = $aux;
            $i++;
        }

        $this->set("datos", $datos2);
    }

    // este reporte es para controla r el ingreso y la salida de las persoans a las iferentes actividades dentro de un evento
    public function exportar7($event_id = null) {
        $this->loadModel("Log");
        $this->loadModel("Activity");
        $dat = $this->Log->query(
                "SELECT ap.`person_id` FROM `activities_people` ap INNER JOIN `activities` a ON a.`id` = ap.`activity_id` WHERE a.`event_id` = $event_id GROUP BY ap.`person_id` ORDER BY a.`id`  ASC"
        );
        $i = 0;
        $aux2 = array();
        foreach ($dat as $key => $value) {
            $person_id = $value ['ap']['person_id'];
            $d = $this->Log->query("SELECT p.`categoria_id`, p.`pers_documento`, p.`pers_primNombre`, p.`pers_primApellido`, ap.`fecha_entrada`, ap.`fecha_salida`, a.`permanencia`, a.`id` FROM `people` p INNER JOIN `activities_people` ap ON ap.`person_id` = p.`id` INNER JOIN `activities` a ON a.`id` = ap.`activity_id` WHERE p.`id` = $person_id ORDER BY a.`id` ASC ");
//          
            $datos = array();
            for ($i = 0; $i < count($d); $i++) {
                if ($i == 0) {
                    $datos['categoria'] = $d[$i]['p']['categoria_id'];
                    $datos['documento'] = $d[$i]['p']['pers_documento'];
                    $datos['nombre'] = $d[$i]['p']['pers_primNombre'];
                    $datos['apellido'] = $d[$i]['p']['pers_primApellido'];
                    $datos['entrada'] = $d[$i]['ap']['fecha_entrada'];
                    $datos['permanencia'] = $d[$i]['a']['permanencia'];
                    if ($d[$i]['a']['permanencia'] == true) {
                        $datos['salida'] = $d[$i]['ap']['fecha_salida'];
                    }

                    $datos['actividad'] = $d[$i]['a']['id'];
                } else {
                    $datos['entrada' . $i] = $d[$i]['ap']['fecha_entrada'];
                    if ($d[$i]['a']['permanencia'] == true) {
                        $datos['salida' . $i] = $d[$i]['ap']['fecha_salida'];
                    }
                    $datos['permanencia' . $i] = $d[$i]['a']['permanencia'];
                    $datos['actividad' . $i] = $d[$i]['a']['id'];
                }
            }
            $aux2[$key] = $datos;
        }
        $datos2 = array();
        $categoria = "";
        foreach ($aux2 as $dato) {
            $id = $dato['categoria'];
            $res = $this->Log->query("SELECT descripcion FROM categorias WHERE id= $id ");
            if ($res != array()) {
                $categoria = $res[0]['categorias']['descripcion'];
            }
            $aux = array(
                'categoria' => $categoria,
                'documento' => $dato['documento'],
                'nombres' => $dato['nombre'],
                'apellidos' => $dato['apellido'],
                'entrada' => $dato['entrada'],
                'salida' => $dato['salida'],
                'permanencia' => $dato['permanencia'],
                'actividad' => $dato['actividad'],
            );

            if (count($dato) > 8) {
                for ($j = 1; $j < ((count($dato) - 8) / 4); $j++) {
                    array_push($aux, $dato['entrada' . $j]);
                    array_push($aux, $dato['permanencia' . $j]);
                    if ($dato['permanencia' . $j] == true) {
                        array_push($aux, $dato['salida' . $j]);
                    } else {
                        array_push($aux, '');
                    }
                    array_push($aux, $dato['actividad' . $j]);
                }
            }
            $datos2[$i] = $aux;
            $i++;
        }
        $actividades = $this->Activity->find('all', array('conditions' => array("Activity.event_id=$event_id"), 'fields' => array('Activity.nombre', 'Activity.permanencia', 'Activity.id')));
//        debug($actividades);die;
        $this->set(compact('datos2', 'actividades')); //$this->set("datos", $datos2, 'actividades', $actividades);
    }

    public function getTotalByCategory() {
        $this->layout = "webservices";
        $this->loadModel("EventsCategoria");
        $this->loadModel("Categoria");
        $this->loadModel("Event");
        $event_id = $this->request->data['even_id'];
        $total = $this->Categoria->query("select c.`descripcion`, count(*) as total FROM `people` p INNER JOIN `inputs` i ON i.person_id = p.id INNER JOIN categorias c ON c.id = i.categoria_id WHERE i.event_id= $event_id group by c.descripcion");
        $datos = array();
        $full = 0;
        $cantidad = $this->Event->query("SELECT datediff(`even_fechFinal`, `even_fechInicio`) AS cantidad FROM `events` e WHERE `id` = $event_id");
        $dif = $cantidad[0][0]['cantidad'];
        $fecha = $this->Event->query("SELECT even_fechInicio FROM events WHERE id = $event_id");
        if ($fecha != array()) {
            $date = $fecha[0]['events']['even_fechInicio'];
            $f = date('Y-m-d', strtotime($date));
            for ($i = 0; $i < count($total); $i++) {
                $datos[$i]['cat']['cuenta'] = count($total);
                $datos[$i]['cat']['categoria'] = $total[$i]['c']['descripcion'];
                $datos[$i]['cat']['total'] = $total[$i][0]['total'];
                $full = $full + $total[$i][0]['total'];
            }
            for ($j = 1; $j <= count($total); $j++) {
                $datos[$i - $j]['cat']['full'] = $full;
            }
            $datos2 = array();
            $dia = 0;
            for ($k = 0; $k < $dif; $k++) {
                $total2 = $this->Categoria->query("select c.`descripcion`, count(*) as total FROM `people` p INNER JOIN `inputs` i ON i.person_id = p.id INNER JOIN categorias c ON c.id = i.categoria_id WHERE i.event_id= $event_id AND i.fechaescarapela like '$f %' group by c.descripcion ASC ");
                $x = count($total2);
                $y = 0;
                if ($total == array()) {
                    $datos2[$k] = $dia;
                } else {
                    if ($y < $x) {
                        $dia = $total2[$y][0]['total'];
                        $datos2[$k] = $dia;
                        $y++;
                    }
                }
                $f = date('Y-m-d', strtotime('+1 days', strtotime($f)));
            }
        }
//        for($a=0; $a<count($datos);$a++){
//            $datos[$a]['cat']['dia']=$datos2[$a];
//        }
        $this->set(
                array(
                    "datos" => $datos,
                    "_serialize" => array("datos")
                )
        );
    }

    public function getPersonWhitInput() {
        $this->layout = "webservices";
        $event_id = $this->request->data['even_id'];
        $this->loadModel("Input");
        $registradas = $this->Input->query("select count(*) as total FROM inputs WHERE event_id = $event_id and fechaescarapela IS NOT NULL ");
        $certreg = $this->Input->query("select count(*) as total FROM inputs WHERE event_id = $event_id and fechaescarapela IS NOT NULL AND fechacertificate IS NOT NULL ");
        $noregistradas = $this->Input->query("select count(*) as total FROM inputs WHERE event_id = $event_id and fechaescarapela IS NULL ");
        $certnoreg = $this->Input->query("select count(*) as total FROM inputs WHERE event_id = $event_id and fechaescarapela IS NOT NULL AND fechacertificate IS NULL");
        $reg = 0;
        $noreg = 0;
        $creg= 0;
        $cnoreg= 0;
        if($registradas!= array()){
            $reg = $registradas[0][0]['total'];
        }
        if($noregistradas!=array()){
            $noreg = $noregistradas[0][0]['total'];
        }
        if($certreg!=array()){
            $creg=$certreg[0][0]['total'];
        }
        if($certnoreg!=array()){
            $cnoreg=$certnoreg[0][0]['total'];
        }
        $total = $reg+$noreg;
        $total2 = $creg+$cnoreg;
        $datos['person']['reg']=$reg;
        $datos['person']['noreg']=$noreg;
        $datos['person']['total']=$total;
        $datos['person']['creg']=$creg;
        $datos['person']['cnoreg']=$cnoreg;
        $datos['person']['total2']=$total2;
        
        $this->set(
                array(
                    "datos" => $datos,
                    "_serialize" => array("datos")
                )
        );
    }

    public function getActivitiesByEvent() {
        $this->layout = "webservices";
        $this->loadModel("Activity");
        $event_id = $this->request->data['even_id'];
//        $total = $this->Event->query("SELECT `nombre`, `locacion`, `fecha`, `hora_inicio`, `hora_fin`,`aforo`,`control_aforo` FROM `activities` WHERE `event_id` = $event_id ORDER BY `nombre` ");
        $options = array(
            "conditions" => array(
                "Activity.event_id" => $event_id
            ),
            "fields" => array(
                "Activity.nombre",
                "Activity.locacion",
                "Activity.fecha",
                "Activity.hora_inicio",
                "Activity.hora_fin",
                "Activity.aforo",
                "Activity.control_aforo",
//                "(Activity.aforo - Activity.control_aforo) AS disponibles",
            ),
            "order" => array(
                "Activity.nombre"
            ),
            "recursive" => 0
        );

        $datos = $this->Activity->find("all", $options);
//        debug($datos);
        $this->set(
                array(
                    "datos" => $datos,
                    "_serialize" => array("datos")
                )
        );
    }

}
