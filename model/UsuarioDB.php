<?php
    /*
     * @version 2024/12/19
     * @author Alex Asensio Sanchez                          
     */

    interface UsuarioDB{
        /**
         * Valida un usuario en la base de datos
         * 
         * @param string $codUsuario Código del usuario
         * @param string $password Contraseña del usuario
         * @return object|null Objeto del usuario si es válido, null en caso contrario. 
         */
        public static function validarUsuario($codUsuario, $password);
    }
?>