<?php
include_once 'ConexionGeneral.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AsignacionDAO
 *
 * @author Angel
 */
class AsignacionDAO extends ConexionGeneral {

    public function obtenerAsignacion($idUsuario) {
        $conexion = $this->abrirConexion();
        $sql = "SELECT * FROM (`asignaciones` JOIN sesion ON sesion_id = sesion.id) 
            JOIN tecnica ON asignaciones.tecnica_id = tecnica.id WHERE  `usuario_id` = '" . mysql_real_escape_string($idUsuario) . "'";
//        echo $sql;
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        $asignaciones = array();
        while ($fila = mysql_fetch_array($resultado)) {
            echo count($asignaciones)+"  ";
            $asignaciones[count($asignaciones)] = $fila;
        }
        $this->cerrarConexion($conexion);
        return $asignaciones;
    }

}

?>
