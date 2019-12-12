<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Me han encontrado! ¡No sé cómo pero me han encontrado!  \\


interface ILecturabalancehidricoDao {

    /**
     * Guarda un objeto Lecturabalancehidrico en la base de datos.
     * @param lecturabalancehidrico objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($lecturabalancehidrico);
    /**
     * Modifica un objeto Lecturabalancehidrico en la base de datos.
     * @param lecturabalancehidrico objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($lecturabalancehidrico);
    /**
     * Elimina un objeto Lecturabalancehidrico en la base de datos.
     * @param lecturabalancehidrico objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($lecturabalancehidrico);
    /**
     * Busca un objeto Lecturabalancehidrico en la base de datos.
     * @param lecturabalancehidrico objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($lecturabalancehidrico);
    /**
     * Lista todos los objetos Lecturabalancehidrico en la base de datos.
     * @return Array<Lecturabalancehidrico> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!