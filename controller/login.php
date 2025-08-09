<?php

class Login
{

	public function validar($datos)
	{
		include_once('controlador.php');

		$correoElectronico = addslashes(strtolower($_POST['email']));
		$hashContrasena = addslashes($_POST['password']);

		$consulta = "SELECT * FROM usuario WHERE correoElectronico = '$correoElectronico' and hashContrasena = '$hashContrasena' LIMIT 1 ";
		$DB = new db();
		$resultado = $DB->leer($consulta);

		if ($resultado <> NULL) {
			$usuario = $resultado[0];
			$ca = "";

			$_SESSION['email'] = $usuario['correoElectronico'];
			$_SESSION['password'] = $usuario['hashContrasena'];
			$_SESSION['nombre'] = $usuario['nombre'];
			$_SESSION['apellidos'] = $usuario['apellidos'];
			$_SESSION['admin'] = $usuario['userAdmin'];

			var_dump($_SESSION);
			echo '<br>SET SESSION<br>';

			//Guarda carrito temporal en bd con el login
			if (isset($_POST["tempCarrito"])) {
				$tempCarrito = $_POST["tempCarrito"];

				$ca = $this->actualizarCarrito($correoElectronico, $tempCarrito);

				print_r($ca);
				echo '<br> ACTUALIZADO <br>';
			}

			return $ca == NULL ? 'no carrito' : $ca;
		} else {
			return false;
		}
	}


	public function actualizarCarrito($correoElectronico, $tempCarrito)
	{
		$return = "";
		$consulta = "SELECT * FROM entrada_usuario WHERE Usuario_correoElectronico = '$correoElectronico';";
		$DB = new db();
		$entradas = $DB->leer($consulta);

		var_dump($entradas);
		echo '<br> ACTUAL CARRITO <br>';

		if ($entradas <> NULL) {
			foreach ($tempCarrito as $entrada => $valor) {
				$consulta = "SELECT * FROM entrada_usuario WHERE Eventos_idEventos='$entrada' AND Usuario_correoElectronico='$correoElectronico'";
				$DB = new db();
				$resultado = $DB->leer($consulta);

				var_dump($tempCarrito);
				echo '<br> TEMP CARRITO <br>';
				var_dump($entrada);
				echo '<br> ENTRADA <br>';
				var_dump($valor);
				echo '<br> VALOR <br>';

				var_dump($resultado);
				echo '<br> RESULTADO <br>';

				if ($resultado <> NULL) {
					return "Estás al limite";
				} else {
					$consulta = "INSERT INTO entrada_usuario (Eventos_idEventos, Usuario_correoElectronico) values ('$entrada', '$correoElectronico')";
					$DB = new db();
					$ok = $DB->escribir($consulta);
					$return .= '<br> combo: ' . $ok;
				}
			}

		} else {
			foreach ($tempCarrito as $entrada) {
				$consulta = "INSERT INTO entrada_usuario (Eventos_idEventos, Usuario_correoElectronico)
				values ('$entrada', '$correoElectronico')";
				$DB = new db();
				$entradas = $DB->escribir($consulta);
				$return .= '<br> temp: ' . $entradas;
			}
		}
		return $return;
	}
}
