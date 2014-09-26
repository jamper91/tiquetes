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

    public function exportar5($event_id=NULL) {
//        debug($event_id);
        if ($event_id == NULL) {
            $this->Session->setFlash("por favor seleccione un evento para obtener el reporte", 'error');
        } else {


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
            foreach ($datos as $dato) {
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
                $fecha1 = "";
                $options = array(
                    "fields" => array(
                        "EntradasInput.ingresos"
                    ),
                    "conditions" => array(
                        "EntradasInput.fecha" => '2014-09-11 00:00:00',
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
//
//
                //Busco los ingresos del segundo dia
                $fecha2 = "";
                $options = array(
                    "fields" => array(
                        "EntradasInput.ingresos"
                    ),
                    "conditions" => array(
                        "EntradasInput.fecha" => '2014-09-12 00:00:00',
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
//
//
                //Busco los ingresos del tercer dia dia
                $fecha3 = "";
                $options = array(
                    "fields" => array(
                        "EntradasInput.ingresos"
                    ),
                    "conditions" => array(
                        "EntradasInput.fecha" => '2014-09-13 00:00:00',
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

                //Busco los ingresos del cuarto dia dia
                $fecha4 = "";
                $options = array(
                    "fields" => array(
                        "EntradasInput.ingresos"
                    ),
                    "conditions" => array(
                        "EntradasInput.fecha" => '2014-08-14 00:00:00',
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

                //Busco los ingresos del quinto dia dia
                $fecha5 = "";
                $options = array(
                    "fields" => array(
                        "EntradasInput.ingresos"
                    ),
                    "conditions" => array(
                        "EntradasInput.fecha" => '2014-08-15 00:00:00',
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
//                $id2 = $dato["input"]["usuariocertificate"];
//                debug($dato);die;
//                $sql2 = "SELECT username FROM users WHERE id = $id2";
                $sql = "SELECT descripcion FROM categorias WHERE id= $id ";
                $res = $this->Input->query($sql);
//                $res2 = $this->User->query($sql2);
                $usuario = "";
//            debug($dato["person"]["diligenciamiento"]); die;
//                if ($res2 != array()) {
//                    $usuario = $res2[0]['users']['username'];
//                }
                if ($res != array()) {
                    $categoria = $res[0]['categorias']['descripcion'];
                }
                $aux = array(
                    "Fecha" => $dato["person"]["diligenciamiento"],
                    "Nombre" => $dato["person"]["pers_primNombre"],
                    "Apellido" => $dato["person"]["pers_primApellido"],
                    "Documento" => $dato["person"]["pers_documento"],
                    "Lugar" => $dato["person"]["pers_expedicion"],
                    "Tipo" => $categoria,
                    "Telefono" => $dato["person"]["pers_telefono"],
                    "Email" => $dato["person"]["pers_mail"],
                    "Direccion" => $dato["person"]["pers_direccion"],
                    "Municipio" => $dato["person"]["ciudad"],
                    "Institucion" => $dato["person"]["pers_institucion"],
                    "Cargo" => $dato["person"]["pers_cargo"],
                    "Fecha2" => $dato['input']['fechacertificate'],
                    "Impreso" => $usuario,
                    "Agosto-1" => $fecha1,
                    "Agosto-2" => $fecha2,
                    "Agosto-3" => $fecha3,
                );
                $datos2[$i] = $aux;
                $i++;
                $pos++;
            }
//        debug($datos2);


            $this->set("datos", $datos2);
        }
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
            "conditions" => array(
                "Event.even_fechFinal >= NOW()"
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

}
