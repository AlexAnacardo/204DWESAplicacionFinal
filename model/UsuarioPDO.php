<?php
/*
 * @version 2024/12/19
 * @author Alex Asensio Sanchez
 */

/**
 * Clase UsuarioPDO que implementa la interfaz UsuarioDB.
 * 
 * Esta clase se utiliza para interactuar con la base de datos en relación con la tabla T01_Usuario.
 * Proporciona métodos para validar usuarios, registrar conexiones, y realizar otras operaciones relacionadas 
 * con la gestión de usuarios en la aplicación.
 */
class UsuarioPDO implements UsuarioDB {

    /**
     * Valida un usuario en la base de datos.
     * 
     * Este método valida un usuario comparando el código del usuario y su contraseña (codificada en SHA-256) 
     * con los registros de la base de datos. Si el usuario es válido, se actualiza su número de conexiones 
     * y se devuelve un objeto con los datos del usuario. Si el usuario no existe o los datos son incorrectos, 
     * devuelve null.
     * 
     * @param string $codUsuario Código del usuario.
     * @param string $password Contraseña del usuario.
     * 
     * @return Usuario|null Un objeto Usuario con los datos del usuario si es válido, null si no lo es.
     */
    public static function validarUsuario($codUsuario, $password) {        
        // Concatenamos el código de usuario y la contraseña, luego la codificamos con SHA-256.
        $contraseñaCodificada = hash('sha256', $codUsuario . $password);

        $sentenciaSQL = <<< FIN
                            select * from T01_Usuario where T01_CodUsuario= ? and T01_Password= ?
                            FIN;
        $parametros = [$codUsuario, $contraseñaCodificada];

        // Ejecutamos la consulta SQL.
        $sql = DBPDO::ejecutaConsulta($sentenciaSQL, $parametros);

        // Guardamos el resultado de la consulta en un objeto.
        $oResultado = $sql->fetchObject();
        
        //Si existe un usuario con el codigo que hemos proporcionado, entraremos en este "if"
        if (isset($oResultado->T01_CodUsuario)) {
            // Creamos un objeto Usuario con los datos obtenidos.
            $oUsuarioEnCurso = new Usuario(
                $oResultado->T01_CodUsuario,
                $oResultado->T01_Password,
                $oResultado->T01_DescUsuario,
                $oResultado->T01_NumConexiones,
                date_format(new DateTime("now"), "Y-m-d h:m:s"),
                $oResultado->T01_FechaHoraUltimaConexion,
                $oResultado->T01_Perfil
            );
            
            // Si el objeto Usuario se crea correctamente, actualizamos la conexión y retornamos el usuario.
            if ($oUsuarioEnCurso) {
                self::registrarUltimaConexion($oUsuarioEnCurso);
                return $oUsuarioEnCurso;
            } else {
                return null;
            }
        }
    }

    /**
     * Registra la última conexión del usuario en la base de datos.
     * 
     * Este método actualiza el número de conexiones y la fecha y hora de la última conexión 
     * de un usuario en la base de datos.
     * 
     * @param Usuario $oUsuario El objeto Usuario cuyo registro será actualizado.
     */
    public static function registrarUltimaConexion($oUsuario) {       
        $sentenciaSQL = "update T01_Usuario set T01_NumConexiones=T01_NumConexiones+1, T01_FechaHoraUltimaConexion=now() where T01_CodUsuario= ?";
        $parametros = [$oUsuario->getCodUsuario()];
        $sql = DBPDO::ejecutaConsulta($sentenciaSQL, $parametros);
    }

    
    public static function altaUsuario() {
        
    }

    
    public static function modificarusuario() {
        
    }

    
    public static function borrarUsuario() {
        
    }

    
    public static function validarCodNoExiste() {
        
    }
}
?>