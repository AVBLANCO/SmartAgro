<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Los animales, asombrados, pasaron su mirada del cerdo al hombre, y del hombre al cerdo; y, nuevamente, del cerdo al hombre; pero ya era imposible distinguir quién era uno y quién era otro.  \\


interface IMetricabalancehidricoDao {

    /**
     * Guarda un objeto Metricabalancehidrico en la base de datos.
     * @param metricabalancehidrico objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($metricabalancehidrico);
    /**
     * Modifica un objeto Metricabalancehidrico en la base de datos.
     * @param metricabalancehidrico objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($metricabalancehidrico);
    /**
     * Elimina un objeto Metricabalancehidrico en la base de datos.
     * @param metricabalancehidrico objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($metricabalancehidrico);
    /**
     * Busca un objeto Metricabalancehidrico en la base de datos.
     * @param metricabalancehidrico objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($metricabalancehidrico);
    /**
     * Lista todos los objetos Metricabalancehidrico en la base de datos.
     * @return Array<Metricabalancehidrico> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!