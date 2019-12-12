<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Trabajo individual singifica ganancia individual  \\


interface IMetricabiologiasueloDao {

    /**
     * Guarda un objeto Metricabiologiasuelo en la base de datos.
     * @param metricabiologiasuelo objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($metricabiologiasuelo);
    /**
     * Modifica un objeto Metricabiologiasuelo en la base de datos.
     * @param metricabiologiasuelo objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($metricabiologiasuelo);
    /**
     * Elimina un objeto Metricabiologiasuelo en la base de datos.
     * @param metricabiologiasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($metricabiologiasuelo);
    /**
     * Busca un objeto Metricabiologiasuelo en la base de datos.
     * @param metricabiologiasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($metricabiologiasuelo);
    /**
     * Lista todos los objetos Metricabiologiasuelo en la base de datos.
     * @return Array<Metricabiologiasuelo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!