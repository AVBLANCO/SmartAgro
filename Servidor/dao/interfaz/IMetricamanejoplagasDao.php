<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Traigo una pizza para ¿y se la creyó?  \\


interface IMetricamanejoplagasDao {

    /**
     * Guarda un objeto Metricamanejoplagas en la base de datos.
     * @param metricamanejoplagas objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($metricamanejoplagas);
    /**
     * Modifica un objeto Metricamanejoplagas en la base de datos.
     * @param metricamanejoplagas objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($metricamanejoplagas);
    /**
     * Elimina un objeto Metricamanejoplagas en la base de datos.
     * @param metricamanejoplagas objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($metricamanejoplagas);
    /**
     * Busca un objeto Metricamanejoplagas en la base de datos.
     * @param metricamanejoplagas objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($metricamanejoplagas);
    /**
     * Lista todos los objetos Metricamanejoplagas en la base de datos.
     * @return Array<Metricamanejoplagas> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!