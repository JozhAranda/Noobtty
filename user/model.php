<?php
	# Importar modelo de abstracción de base de datos
	require_once('../core/db_abstract_model.php');
	
	class Usuario extends DBAbstractModel {
		############################### PROPIEDADES ################################
		public $titulo;
		public $articulo_corto;
		public $articulo_largo;
		public $imagen;
		public $fecha;
		################################# MÉTODOS ##################################
		# Traer datos de un usuario
		public function get($title_id='') {
			if($title_id != '') {
				$this->query = "SELECT titulo, articulo_corto, articulo_largo, imagen, fecha FROM articulos";
				$this->get_results_from_query();
			}
			if(count($this->rows) == 1) {
				foreach ($this->rows[0] as $propiedad=>$valor) {
					$this->$propiedad = $valor;
				}
				$this->mensaje = 'Post encontrado';
			} else {
				$this->mensaje = 'Post no encontrado';
			}
		}
		# Crear un nuevo usuario
		public function set($title_data=array()) {
			if(array_key_exists('titulo', $title_data)) {
				$this->get($title_data['titulo']);
				if($title_data['titulo'] != $this->titulo) {
					foreach ($title_data as $campo=>$valor) {
						$$campo = $valor;
					}
					$this->query = "INSERT INTO articulos(titulo, articulo_corto, articulo_largo, imagen, fecha) VALUES('$titulo', '$articulo_corto', '$articulo_largo', '$imagen', '$fecha')";
					$this->execute_single_query();
					$this->mensaje = 'Post agregado exitosamente';
				} else {
					$this->mensaje = 'El post ya existe';
				}
			} else {
				$this->mensaje = 'No se ha agregado el post';
			}
		}
		# Modificar un usuario
		/*public function edit($title_data=array()) {
		foreach ($title_data as $campo=>$valor) {
		$$campo = $valor;
		}
		$this->query = "
		UPDATE usuarios
		SET nombre='$nombre',
		apellido='$apellido'
		WHERE email = '$email'
		";
		$this->execute_single_query();
		$this->mensaje = 'Usuario modificado';
		}
		# Método constructor
		function __construct() {
		$this->db_name = 'book_example';
		}
		# Método destructor del objeto
		function __destruct() {
		unset($this);
		}*/
	}
?>