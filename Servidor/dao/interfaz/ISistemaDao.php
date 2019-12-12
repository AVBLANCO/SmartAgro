<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Si crees que las mujeres son difíciles, no conoces Anarchy  \\


interface ISistemaDao {

    /**
     * Guarda un objeto Sistema en la base de datos.
     * @param sistema objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($sistema);
    /**
     * Modifica un objeto Sistema en la base de datos.
     * @param sistema objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($sistema);
    /**
     * Elimina un objeto Sistema en la base de datos.
     * @param sistema objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($sistema);
    /**
     * Busca un objeto Sistema en la base de datos.
     * @param sistema objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($sistema);
    /**
     * Lista todos los objetos Sistema en la base de datos.
     * @return Array<Sistema> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!