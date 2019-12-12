<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Eres capaz de hackear mi Facebook?  \\


interface IMetricamanejointegradoenfermedadesDao {

    /**
     * Guarda un objeto Metricamanejointegradoenfermedades en la base de datos.
     * @param metricamanejointegradoenfermedades objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($metricamanejointegradoenfermedades);
    /**
     * Modifica un objeto Metricamanejointegradoenfermedades en la base de datos.
     * @param metricamanejointegradoenfermedades objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($metricamanejointegradoenfermedades);
    /**
     * Elimina un objeto Metricamanejointegradoenfermedades en la base de datos.
     * @param metricamanejointegradoenfermedades objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($metricamanejointegradoenfermedades);
    /**
     * Busca un objeto Metricamanejointegradoenfermedades en la base de datos.
     * @param metricamanejointegradoenfermedades objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($metricamanejointegradoenfermedades);
    /**
     * Lista todos los objetos Metricamanejointegradoenfermedades en la base de datos.
     * @return Array<Metricamanejointegradoenfermedades> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!