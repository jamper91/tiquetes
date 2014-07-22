/*
Created		29/06/2014
Modified		21/07/2014
Project		
Model		
Company		
Author		
Version		
Database		mySQL 5 
*/


Create table `people` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`document_type_id` Bigint UNSIGNED NOT NULL,
	`city_id` Bigint UNSIGNED NOT NULL,
	`pers_documento` Varchar(20) NOT NULL,
	`pers_primNombre` Varchar(20) NOT NULL,
	`pers_segNombre` Varchar(20),
	`pers_primApellido` Varchar(20) NOT NULL,
	`pers_segApellido` Varchar(20),
	`pers_direccion` Varchar(20),
	`pers_barrio` Varchar(20),
	`pers_telefono` Decimal(10,0),
	`pers_celular` Decimal(10,0),
	`pers_fechNacimiento` Date,
	`pers_tipoSangre` Varchar(20),
	`pers_mail` Varchar(20),
	UNIQUE (`pers_documento`),
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `document_types` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`tido_descripcion` Varchar(50) NOT NULL,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `companies` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`person_id` Bigint UNSIGNED NOT NULL,
	`city_id` Bigint UNSIGNED NOT NULL,
	`empr_nit` Varchar(20) NOT NULL,
	`empr_nombre` Varchar(20),
	`empr_telefono` Decimal(10,0),
	`empr_mail` Varchar(20),
	`empr_direccion` Varchar(20),
	`empr_barrio` Varchar(20),
	`empr_pagiWeb` Varchar(20),
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `cities` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`state_id` Bigint UNSIGNED NOT NULL,
	`name` Varchar(50) NOT NULL,
	UNIQUE (`name`),
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `states` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`country_id` Bigint UNSIGNED NOT NULL,
	`name` Varchar(50) NOT NULL,
	UNIQUE (`name`),
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `countries` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`name` Varchar(50) NOT NULL,
	UNIQUE (`name`),
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `users` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`username` Varchar(50),
	`password` Varchar(50),
	`estado` Bool,
	`person_id` Bigint UNSIGNED NOT NULL,
	`type_user_id` Int NOT NULL,
	`department_id` Bigint UNSIGNED NOT NULL,
	`validodesde` Date,
	`validohasta` Date,
	`identificador` Varchar(50) NOT NULL,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `type_users` (
	`id` Int NOT NULL AUTO_INCREMENT,
	`descripcion` Varchar(50) NOT NULL,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `events` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`stage_id` Bigint UNSIGNED NOT NULL,
	`event_type_id` Bigint UNSIGNED NOT NULL,
	`even_nombre` Varchar(20) NOT NULL,
	`even_numeResolucion` Varchar(20) NOT NULL,
	`even_palaClave` Varbinary(20) NOT NULL,
	`even_observaciones` Varbinary(20),
	`even_estado` Bool,
	`even_imagen1` Varchar(20) NOT NULL,
	`even_imagen2` Varchar(20),
	`even_fechInicio` Date NOT NULL,
	`even_fechFinal` Date NOT NULL,
	`even_publicar` Bool NOT NULL,
	`even_codigo` Varchar(20) NOT NULL,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `papers` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`event_id` Bigint UNSIGNED NOT NULL,
	`shelf_id` Bigint UNSIGNED NOT NULL,
	`func_nombre` Varchar(50) NOT NULL,
	`func_fechInicio` Date NOT NULL,
	`func_fechFinal` Date NOT NULL,
	`func_cortesia` Bool NOT NULL,
	`func_estado` Varchar(50) NOT NULL,
	`func_imagen` Varchar(50) NOT NULL,
	`func_palaClaves` Varchar(50) NOT NULL,
	`func_cantEntradas` Decimal(10,0) NOT NULL,
	`func_cantAlerta` Decimal(10,0) NOT NULL,
	`func_codigo` Varchar(50) NOT NULL,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `payments` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`mepa_descripcion` Varchar(50) NOT NULL,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `events_payments` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`payment_id` Bigint UNSIGNED NOT NULL,
	`event_id` Bigint UNSIGNED NOT NULL,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `inputs` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`input_state_id` Bigint UNSIGNED NOT NULL,
	`person_id` Bigint UNSIGNED NOT NULL,
	`entr_imagen` Varchar(50) NOT NULL,
	`entr_titulo` Varchar(50) NOT NULL,
	`entr_fuenTitulo` Varchar(50) NOT NULL,
	`entr_tamaTitulo` Decimal(10,0) NOT NULL,
	`entr_fecha` Date NOT NULL,
	`entr_fuenFecha` Varchar(50) NOT NULL,
	`entr_tamaFecha` Decimal(10,0) NOT NULL,
	`entr_fuenCliente` Varchar(50) NOT NULL,
	`entr_tamaCliente` Decimal(10,0) NOT NULL,
	`entr_direccion` Varchar(50) NOT NULL,
	`entr_fuenDireccion` Varchar(50) NOT NULL,
	`entr_tamaDireccion` Decimal(10,0) NOT NULL,
	`entr_codigo` Varchar(20) NOT NULL,
	`entr_identificador` Varchar(20),
	`entr_impreso` Bool,
	`events_registration_type_id` Int NOT NULL,
	`category_id` Bigint UNSIGNED NOT NULL,
	`cantidad_reingresos` Int,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `paper_inputs` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`paper_id` Bigint UNSIGNED NOT NULL,
	`input_id` Bigint UNSIGNED NOT NULL,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `delivery_methods` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`descripcion` Varchar(50) NOT NULL,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `delivery_methods_inputs` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`delivery_method_id` Bigint UNSIGNED NOT NULL,
	`input_id` Bigint UNSIGNED NOT NULL,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `shelves` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`location_id` Bigint UNSIGNED NOT NULL,
	`esta_nombre` Varchar(50) NOT NULL,
	`esta_estado` Varchar(50),
	`esta_precio` Double,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `stages` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`city_id` Bigint UNSIGNED NOT NULL,
	`esce_nombre` Varchar(50) NOT NULL,
	`esce_direccion` Varchar(50),
	`esce_telefono` Decimal(10,0),
	`esce_mapa` Varchar(50),
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `event_types` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`nombre` Varchar(50),
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `locations` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`loca_nombre` Varchar(50) NOT NULL,
	`stage_id` Bigint UNSIGNED NOT NULL,
	`parent_id` Bigint UNSIGNED NOT NULL,
	`loca_fila` Varchar(50),
	`loca_colomnna` Varchar(50),
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `companies_events` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`company_id` Bigint UNSIGNED NOT NULL,
	`event_id` Bigint UNSIGNED NOT NULL,
	`role_company_id` Bigint UNSIGNED NOT NULL,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `role_companies` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`nombre` Varchar(50) NOT NULL,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `input_states` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`nombre` Varchar(50) NOT NULL,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `hotels` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`hote_nombre` Varchar(50) NOT NULL,
	`hote_mit` Varchar(50),
	`hote_direccion` Varchar(50),
	`hote_telefono` Varchar(20),
	`hote_email` Varchar(50),
	`hote_pagiWeb` Varchar(50),
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `events_hotels` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`event_id` Bigint UNSIGNED NOT NULL,
	`hotel_id` Bigint UNSIGNED NOT NULL,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `authorizations` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`nombre` Varchar(50),
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `authorizations_users` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`user_id` Bigint UNSIGNED NOT NULL,
	`authorization_id` Bigint UNSIGNED NOT NULL,
	`estado` Bool,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `committees` (
	`id` Int NOT NULL AUTO_INCREMENT,
	`nombre` Varchar(50),
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `committees_events` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`committee_id` Int NOT NULL,
	`event_id` Bigint UNSIGNED NOT NULL,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `committees_events_people` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`person_id` Bigint UNSIGNED NOT NULL,
	`committees_event_id` Bigint UNSIGNED NOT NULL,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `registration_types` (
	`id` Int NOT NULL,
	`nombre` Varchar(50) NOT NULL,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `events_registration_types` (
	`id` Int NOT NULL AUTO_INCREMENT,
	`registration_type_id` Int NOT NULL,
	`event_id` Bigint UNSIGNED NOT NULL,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `departments` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`descripcion` Varchar(50) NOT NULL,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `sales` (
	`sale_id` Serial NOT NULL AUTO_INCREMENT,
	`cantidad` Int,
	`tipo_de_pago` Char(50) NOT NULL,
	`fecha` Date,
 Primary Key (`sale_id`)) ENGINE = MyISAM;

Create table `inputs_sales` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`input_id` Bigint UNSIGNED NOT NULL,
	`sale_id` Bigint UNSIGNED NOT NULL,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `personal_data` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`descripcion` Varchar(50),
	`id_padre` Int,
	`tipo` Varchar(20),
	`obligatorio` Bool,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `datas` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`descripcion` Varchar(50),
	`person_id` Bigint UNSIGNED NOT NULL,
	`forms_personal_data_id` Bigint UNSIGNED NOT NULL) ENGINE = MyISAM;

Create table `forms` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`event_id` Bigint UNSIGNED NOT NULL,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `entradas` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`paper_id` Bigint UNSIGNED,
	`descripcion` Varchar(50),
	`category_id` Bigint UNSIGNED NOT NULL,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `validations` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`descripcion` Varchar(50),
	`fechainicio` Date,
	`fechafin` Date,
	`cantidad_reingresos` Int,
	`categoria` Int,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `categories` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`descripcion` Varchar(50) NOT NULL,
	`precio` Double,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `log` (
	`id_log` Serial NOT NULL AUTO_INCREMENT,
	`id` Bigint UNSIGNED NOT NULL,
	`fecha_realizado` Timestamp,
	`descripcion` Varchar(50),
 Primary Key (`id_log`)) ENGINE = MyISAM;

Create table `discounts` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`porcentaje` Int,
	`fecha_inicio` Date,
	`fecha_fin` Date,
	`categoria` Int,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `gifts` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`descripcion` Varchar(50) NOT NULL,
	`cantidad` Int,
	`categoria` Int,
 Primary Key (`id`)) ENGINE = MyISAM;

Create table `forms_personal_data` (
	`id` Serial NOT NULL AUTO_INCREMENT,
	`personal_datum_id` Bigint UNSIGNED NOT NULL,
	`form_id` Bigint UNSIGNED NOT NULL,
 Primary Key (`id`)) ENGINE = MyISAM;


Alter table `companies` add Foreign Key (`person_id`) references `people` (`id`) on delete  restrict on update  restrict;
Alter table `users` add Foreign Key (`person_id`) references `people` (`id`) on delete  restrict on update  restrict;
Alter table `inputs` add Foreign Key (`person_id`) references `people` (`id`) on delete  restrict on update  restrict;
Alter table `committees_events_people` add Foreign Key (`person_id`) references `people` (`id`) on delete  restrict on update  restrict;
Alter table `datas` add Foreign Key (`person_id`) references `people` (`id`) on delete  restrict on update  restrict;
Alter table `people` add Foreign Key (`document_type_id`) references `document_types` (`id`) on delete  restrict on update  restrict;
Alter table `companies_events` add Foreign Key (`company_id`) references `companies` (`id`) on delete  restrict on update  restrict;
Alter table `people` add Foreign Key (`city_id`) references `cities` (`id`) on delete  restrict on update  restrict;
Alter table `companies` add Foreign Key (`city_id`) references `cities` (`id`) on delete  restrict on update  restrict;
Alter table `stages` add Foreign Key (`city_id`) references `cities` (`id`) on delete  restrict on update  restrict;
Alter table `cities` add Foreign Key (`state_id`) references `states` (`id`) on delete  restrict on update  restrict;
Alter table `states` add Foreign Key (`country_id`) references `countries` (`id`) on delete  restrict on update  restrict;
Alter table `authorizations_users` add Foreign Key (`user_id`) references `users` (`id`) on delete  restrict on update  restrict;
Alter table `log` add Foreign Key (`id`) references `users` (`id`) on delete  restrict on update  restrict;
Alter table `users` add Foreign Key (`type_user_id`) references `type_users` (`id`) on delete  restrict on update  restrict;
Alter table `papers` add Foreign Key (`event_id`) references `events` (`id`) on delete  restrict on update  restrict;
Alter table `events_payments` add Foreign Key (`event_id`) references `events` (`id`) on delete  restrict on update  restrict;
Alter table `companies_events` add Foreign Key (`event_id`) references `events` (`id`) on delete  restrict on update  restrict;
Alter table `events_hotels` add Foreign Key (`event_id`) references `events` (`id`) on delete  restrict on update  restrict;
Alter table `committees_events` add Foreign Key (`event_id`) references `events` (`id`) on delete  restrict on update  restrict;
Alter table `events_registration_types` add Foreign Key (`event_id`) references `events` (`id`) on delete  restrict on update  restrict;
Alter table `forms` add Foreign Key (`event_id`) references `events` (`id`) on delete  restrict on update  restrict;
Alter table `paper_inputs` add Foreign Key (`paper_id`) references `papers` (`id`) on delete  restrict on update  restrict;
Alter table `entradas` add Foreign Key (`paper_id`) references `papers` (`id`) on delete  restrict on update  restrict;
Alter table `events_payments` add Foreign Key (`payment_id`) references `payments` (`id`) on delete  restrict on update  restrict;
Alter table `paper_inputs` add Foreign Key (`input_id`) references `inputs` (`id`) on delete  restrict on update  restrict;
Alter table `delivery_methods_inputs` add Foreign Key (`input_id`) references `inputs` (`id`) on delete  restrict on update  restrict;
Alter table `inputs_sales` add Foreign Key (`input_id`) references `inputs` (`id`) on delete  restrict on update  restrict;
Alter table `delivery_methods_inputs` add Foreign Key (`delivery_method_id`) references `delivery_methods` (`id`) on delete  restrict on update  restrict;
Alter table `papers` add Foreign Key (`shelf_id`) references `shelves` (`id`) on delete  restrict on update  restrict;
Alter table `events` add Foreign Key (`stage_id`) references `stages` (`id`) on delete  restrict on update  restrict;
Alter table `locations` add Foreign Key (`stage_id`) references `stages` (`id`) on delete  restrict on update  restrict;
Alter table `events` add Foreign Key (`event_type_id`) references `event_types` (`id`) on delete  restrict on update  restrict;
Alter table `shelves` add Foreign Key (`location_id`) references `locations` (`id`) on delete  restrict on update  restrict;
Alter table `locations` add Foreign Key (`parent_id`) references `locations` (`id`) on delete  restrict on update  restrict;
Alter table `companies_events` add Foreign Key (`role_company_id`) references `role_companies` (`id`) on delete  restrict on update  restrict;
Alter table `inputs` add Foreign Key (`input_state_id`) references `input_states` (`id`) on delete  restrict on update  restrict;
Alter table `events_hotels` add Foreign Key (`hotel_id`) references `hotels` (`id`) on delete  restrict on update  restrict;
Alter table `authorizations_users` add Foreign Key (`authorization_id`) references `authorizations` (`id`) on delete  restrict on update  restrict;
Alter table `committees_events` add Foreign Key (`committee_id`) references `committees` (`id`) on delete  restrict on update  restrict;
Alter table `committees_events_people` add Foreign Key (`committees_event_id`) references `committees_events` (`id`) on delete  restrict on update  restrict;
Alter table `events_registration_types` add Foreign Key (`registration_type_id`) references `registration_types` (`id`) on delete  restrict on update  restrict;
Alter table `inputs` add Foreign Key (`events_registration_type_id`) references `events_registration_types` (`id`) on delete  restrict on update  restrict;
Alter table `users` add Foreign Key (`department_id`) references `departments` (`id`) on delete  restrict on update  restrict;
Alter table `inputs_sales` add Foreign Key (`sale_id`) references `sales` (`sale_id`) on delete  restrict on update  restrict;
Alter table `forms_personal_data` add Foreign Key (`personal_datum_id`) references `personal_data` (`id`) on delete  restrict on update  restrict;
Alter table `forms_personal_data` add Foreign Key (`form_id`) references `forms` (`id`) on delete  restrict on update  restrict;
Alter table `inputs` add Foreign Key (`category_id`) references `categories` (`id`) on delete  restrict on update  restrict;
Alter table `entradas` add Foreign Key (`category_id`) references `categories` (`id`) on delete  restrict on update  restrict;
Alter table `datas` add Foreign Key (`forms_personal_data_id`) references `forms_personal_data` (`id`) on delete  restrict on update  restrict;


