<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Vine a Comala porque me dijeron que acá vivía mi padre, un tal Pedro Páramo.  \\


interface IMetricaquimicasueloDao {

    /**
     * Guarda un objeto Metricaquimicasuelo en la base de datos.
     * @param metricaquimicasuelo objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($metricaquimicasuelo);
    /**
     * Modifica un objeto Metricaquimicasuelo en la base de datos.
     * @param metricaquimicasuelo objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($metricaquimicasuelo);
    /**
     * Elimina un objeto Metricaquimicasuelo en la base de datos.
     * @param metricaquimicasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($metricaquimicasuelo);
    /**
     * Busca un objeto Metricaquimicasuelo en la base de datos.
     * @param metricaquimicasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($metricaquimicasuelo);
    /**
     * Lista todos los objetos Metricaquimicasuelo en la base de datos.
     * @return Array<Metricaquimicasuelo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!