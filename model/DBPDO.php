<?php
/**
 * Clase para ejecutar consultas a la base de datos utilizando PDO.
 * 
 * Esta clase proporciona un método estático para ejecutar consultas SQL en una base de datos. 
 * En caso de error, maneja las excepciones y redirige al usuario a una página de error.
 */
class DBPDO{
    
    /**
     * Ejecuta una consulta SQL en la base de datos.
     *
     * Este método prepara y ejecuta una consulta SQL utilizando PDO, pasando los parámetros necesarios 
     * para la consulta. Si ocurre un error durante la ejecución, se captura la excepción y se almacena 
     * en la sesión antes de redirigir al usuario a la página de error.
     * 
     * @param string $sentenciaSQL La sentencia SQL que se va a ejecutar.
     * @param array|null $parametros Un array opcional de parámetros para la consulta SQL.
     * 
     * @return PDOStatement Devuelve el objeto PDOStatement si la consulta se ejecuta correctamente.
     * 
     * @throws PDOException Si ocurre un error en la ejecución de la consulta SQL, este será atrapado y 
     *                      se manejará mediante una redirección a la página de error.
     */
    public static function ejecutaConsulta($sentenciaSQL, $parametros = null){
        try{
            // Creamos la conexion usando las variables constantes del archivo confDBPDO
            $miDB = new PDO(CONEXION, USUARIO, CONTRASEÑA);
            
            // Preparamos la sentencia SQL
            $sql = $miDB->prepare($sentenciaSQL);
            
            // Ejecutamos la consulta con los parámetros proporcionados
            $sql->execute($parametros);
            
            // Devolvemos el objeto PDOStatement
            return $sql;
        } catch (PDOException $ex) {
            // Si se produce un error, se crea un objeto de la clase ErrorApp
            $error = new ErrorApp(
                $ex->getCode(),
                $ex->getMessage(),
                $ex->getFile(),
                $ex->getLine(),
                $_SESSION['paginaAnterior']
            );
            //Guardamos el objeto ErrorApp en la sesion
            $_SESSION['error'] = $error;
            $_SESSION['paginaEnCurso'] = 'error';
            
            // Redirigir al usuario a la página de error
            header('Location: indexLoginLogoffTema6.php');
            exit();
        } finally {
            // Finalizamos la conexión a la base de datos
            unset($miDB);
        }
    }
}
?>