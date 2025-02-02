<?php
class DepartamentoPDO implements DepartamentoBD{
    
    public static function ListarDepartamentos() {
        $sql = DBPDO::ejecutaConsulta('select * from T02_Departamento');
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
    
    public static function BuscarDepartamentoPorDescripcion($descripcion) {
        $descripcion='%'.$descripcion.'%';
        $sql = DBPDO::ejecutaConsulta('select * from T02_Departamento where T02_DescDepartamento like ?', [$descripcion]);
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
    
    public static function AñadirDepartamento($codigo, $descripcion, $volumen){
        $sql = DBPDO::ejecutaConsulta('insert into T02_Departamento values("'.$codigo.'","'.$descripcion.'", now(),"'.$volumen.'", null)');
    }
}
?>