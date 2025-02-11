<?php
class DepartamentoPDO implements DepartamentoBD{
    
    public static function ListarDepartamentos($opcionBusqueda) {        
        switch($opcionBusqueda){
            case 'todos':
                $sql = DBPDO::ejecutaConsulta('select * from T02_Departamento');
            break;
        
            case 'activos':
                $sql = DBPDO::ejecutaConsulta('select * from T02_Departamento where T02_FechaBajaDepartamento is null');
            break;
        
            case 'inactivos':                
                $sql = DBPDO::ejecutaConsulta('select * from T02_Departamento where T02_FechaBajaDepartamento is not null');
            break;
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
        
    public static function BuscarDepartamentoPorDescripcion($descripcion, $opcionBusqueda) {
        $descripcion='%'.$descripcion.'%';
        
        switch($opcionBusqueda){
            case 'todos':
                $sql = DBPDO::ejecutaConsulta('select * from T02_Departamento where T02_DescDepartamento like ?', [$descripcion]);
            break;
        
            case 'activos':
                $sql = DBPDO::ejecutaConsulta('select * from T02_Departamento where T02_FechaBajaDepartamento is null and T02_DescDepartamento like ?', [$descripcion]);
            break;
        
            case 'inactivos':                
                $sql = DBPDO::ejecutaConsulta('select * from T02_Departamento where T02_FechaBajaDepartamento is not null and T02_DescDepartamento like ?', [$descripcion]);
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
    
    public static function ExportarDepartamentos(){
        $aDepartamentos=self::ListarDepartamentos('todos');
        $fechaActual=date_format(new DateTime("now"), "Y-m-d");
        file_put_contents("../tmp/".$fechaActual."departamentos.json", json_encode($departamentos));
    }
}
?>