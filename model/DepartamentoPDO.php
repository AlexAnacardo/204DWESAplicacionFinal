<?php
class DepartamentoPDO implements DepartamentoBD{
    
    public static function ContarDepartamentos($opcion){
        switch($opcion){
            case "todos":
                $sql= DBPDO::ejecutaConsulta('select count(*) from T02_Departamento'); 
            break;
        
            case "activos":
                $sql= DBPDO::ejecutaConsulta('select count(*) from T02_Departamento where T02_FechaBajaDepartamento is null');
            break;
        
            case "inactivos":
                $sql= DBPDO::ejecutaConsulta('select count(*) from T02_Departamento where T02_FechaBajaDepartamento is not null');
            break;
        }
               
        return floatval($sql->fetchColumn());
    }

    
    public static function ListarDepartamentos($opcionBusqueda, $paginaTabla=0) { 
        switch($opcionBusqueda){
            case 'todos':
                $sql = DBPDO::ejecutaConsulta('select * from T02_Departamento limit '.$paginaTabla.',5');
            break;
        
            case 'activos':
                $sql = DBPDO::ejecutaConsulta('select * from T02_Departamento where T02_FechaBajaDepartamento is null limit '.$paginaTabla.',5');
            break;
        
            case 'inactivos':                
                $sql = DBPDO::ejecutaConsulta('select * from T02_Departamento where T02_FechaBajaDepartamento is not null limit '.$paginaTabla.',5');
            break;
            default:
                $sql = DBPDO::ejecutaConsulta('select * from T02_Departamento limit '.$paginaTabla.',5');
        }
        
        $aDepartamentos=[];
        while ($oDepartamento = $sql->fetchObject()){
            if(isset($oDepartamento->T02_CodDepartamento)){
                $aDepartamentos[$oDepartamento->T02_CodDepartamento]=new Departamento(
                    $oDepartamento->T02_CodDepartamento,
                    $oDepartamento->T02_DescDepartamento,
                    $oDepartamento->T02_FechaCreacionDepartamento,
                    $oDepartamento->T02_VolumenDeNegocio,
                    $oDepartamento->T02_FechaBajaDepartamento
                );
            }
        }
        
        return $aDepartamentos;
    }
    
    public static function ObtenerDepartamento($codigo) {
        $sql = DBPDO::ejecutaConsulta('select * from T02_Departamento where T02_CodDepartamento="'.$codigo.'"');
        $devolucion=$sql->fetchObject();
        return new Departamento($devolucion->T02_CodDepartamento, $devolucion->T02_DescDepartamento, $devolucion->T02_FechaCreacionDepartamento, $devolucion->T02_VolumenDeNegocio, $devolucion->T02_FechaBajaDepartamento);        
    }
        
    public static function BuscarDepartamentoPorDescripcion($descripcion, $opcionBusqueda, $paginaTabla=0) {
        $descripcion='%'.$descripcion.'%';
        
        switch($opcionBusqueda){
            case 'todos':
                $sql = DBPDO::ejecutaConsulta('select * from T02_Departamento where T02_DescDepartamento like ? limit '.$paginaTabla.',5', [$descripcion]);
            break;
        
            case 'activos':
                $sql = DBPDO::ejecutaConsulta('select * from T02_Departamento where T02_FechaBajaDepartamento is null and T02_DescDepartamento like ? limit '.$paginaTabla.',5', [$descripcion]);
            break;
        
            case 'inactivos':                
                $sql = DBPDO::ejecutaConsulta('select * from T02_Departamento where T02_FechaBajaDepartamento is not null and T02_DescDepartamento like ? limit '.$paginaTabla.',5', [$descripcion]);
            break;
        }
        
        $aDepartamentos = [];
        if (isset($sql)) {
            while ($oDepartamento = $sql->fetchObject()) {
                if (isset($oDepartamento->T02_CodDepartamento)) {
                    $aDepartamentos[$oDepartamento->T02_CodDepartamento] = new Departamento(
                            $oDepartamento->T02_CodDepartamento,
                            $oDepartamento->T02_DescDepartamento,
                            $oDepartamento->T02_FechaCreacionDepartamento,
                            $oDepartamento->T02_VolumenDeNegocio,
                            $oDepartamento->T02_FechaBajaDepartamento
                    );
                }
            }
        }

        return $aDepartamentos;
    }
    
    public static function AñadirDepartamento($codigo, $descripcion, $volumen){
        $sql = DBPDO::ejecutaConsulta('insert into T02_Departamento values("'.$codigo.'","'.$descripcion.'", now(),"'.$volumen.'", null)');
    }
    
    public static function ActualizarDepartamento($descripcion, $volumen, $codigo){
        $sql = DBPDO::ejecutaConsulta('update T02_Departamento set T02_DescDepartamento="'.$descripcion.'", T02_VolumenDeNegocio="'.$volumen.'" where T02_CodDepartamento="'.$codigo.'"');
    }
    
    public static function BorrarDepartamento($codigo){
        $sql = DBPDO::ejecutaConsulta('delete from T02_Departamento where T02_CodDepartamento="'.$codigo.'"');
    }
    
    public static function AltaDepartamento($codigo){
        DBPDO::ejecutaConsulta('update T02_Departamento set T02_FechaBajaDepartamento=null where T02_CodDepartamento="'.$codigo.'"');
    }
    
    public static function BajaDepartamento($codigo){        
        DBPDO::ejecutaConsulta('update T02_Departamento set T02_FechaBajaDepartamento=now() where T02_CodDepartamento="'.$codigo.'"');
    }
    
    
    public static function ExportarDepartamentos() {    
        $departamentos = self::ListarDepartamentos('todos');

        
        $aDepartamentos = [];
        foreach ($departamentos as $departamento) {
            $aDepartamentos[] = [
                'CodDepartamento' => $departamento->getCodDepartamento(),
                'DescDepartamento' => $departamento->getDescripcion(),
                'FechaCreacion' => $departamento->getAlta(),
                'VolumenDeNegocio' => $departamento->getVolumen(),
                'FechaBaja' => $departamento->getBaja(),
            ];
        }

        
        $jsonDepartamentos = json_encode($aDepartamentos, JSON_PRETTY_PRINT);

        
        $nombreArchivo = 'departamentos ' . date('Y-m-d') . '.json';

        
        header('Content-Type: application/json');
        header('Content-Disposition: attachment; filename="' . $nombreArchivo . '"');
        header('Content-Length: ' . strlen($jsonDepartamentos));

        
        echo $jsonDepartamentos;
        exit;
    }    

    public static function ImportarDepartamentos() {
        // Comprobar si se ha enviado un archivo
        if (isset($_FILES['archivo_json']) && $_FILES['archivo_json']['error'] == 0) {
            // Obtener el contenido del archivo
            $archivo = $_FILES['archivo_json']['tmp_name'];

            // Leer el contenido del archivo JSON
            $departamentosJson = file_get_contents($archivo);

            // Decodificar el JSON en un array asociativo
            $arrayJson = json_decode($departamentosJson, true);  // Usamos `true` para obtener un array asociativo
            
            
            // Verificar que la decodificación fue exitosa
            if ($arrayJson === null) {
                echo "Error: El archivo JSON no es válido.";
                return;
            }
            
            
            // Insertar cada departamento en la base de datos
            foreach ($arrayJson as $oDepartamento) {
                // Preparar la consulta SQL para insertar el departamento
                $sentenciaSQL = "INSERT INTO T02_Departamento VALUES (?, ?, ?, ?, ?)";
                $parametros = [
                    $oDepartamento['CodDepartamento'],  // Extraemos el valor del JSON
                    $oDepartamento['DescDepartamento'],
                    $oDepartamento['FechaCreacion'],
                    $oDepartamento['VolumenDeNegocio'],
                    $oDepartamento['FechaBaja']
                ];

                // Ejecutar la consulta SQL
                DBPDO::ejecutaConsulta($sentenciaSQL, $parametros);
            }
        }
    }    
}
?>