<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Quédate con quien te quiera por tu back-end, no por tu front-end  \\


interface IMetricaevotranspiracionDao {

    /**
     * Guarda un objeto Metricaevotranspiracion en la base de datos.
     * @param metricaevotranspiracion objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($metricaevotranspiracion);
    /**
     * Modifica un objeto Metricaevotranspiracion en la base de datos.
     * @param metricaevotranspiracion objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($metricaevotranspiracion);
    /**
     * Elimina un objeto Metricaevotranspiracion en la base de datos.
     * @param metricaevotranspiracion objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($metricaevotranspiracion);
    /**
     * Busca un objeto Metricaevotranspiracion en la base de datos.
     * @param metricaevotranspiracion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($metricaevotranspiracion);
    /**
     * Lista todos los objetos Metricaevotranspiracion en la base de datos.
     * @return Array<Metricaevotranspiracion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!