<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La segunda regla de Anarchy es no hablar de Anarchy  \\


interface IMetricassueloDao {

    /**
     * Guarda un objeto Metricassuelo en la base de datos.
     * @param metricassuelo objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($metricassuelo);
    /**
     * Modifica un objeto Metricassuelo en la base de datos.
     * @param metricassuelo objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($metricassuelo);
    /**
     * Elimina un objeto Metricassuelo en la base de datos.
     * @param metricassuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($metricassuelo);
    /**
     * Busca un objeto Metricassuelo en la base de datos.
     * @param metricassuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($metricassuelo);
    /**
     * Lista todos los objetos Metricassuelo en la base de datos.
     * @return Array<Metricassuelo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!