<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Sabías que hay una vida afuera de tu cuarto?  \\


interface IBalancehidricoDao {

    /**
     * Guarda un objeto Balancehidrico en la base de datos.
     * @param balancehidrico objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($balancehidrico);
    /**
     * Modifica un objeto Balancehidrico en la base de datos.
     * @param balancehidrico objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($balancehidrico);
    /**
     * Elimina un objeto Balancehidrico en la base de datos.
     * @param balancehidrico objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($balancehidrico);
    /**
     * Busca un objeto Balancehidrico en la base de datos.
     * @param balancehidrico objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($balancehidrico);
    /**
     * Lista todos los objetos Balancehidrico en la base de datos.
     * @return Array<Balancehidrico> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!