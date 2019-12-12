<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ...y esta no es la única frase que encontrarás...  \\


interface IEscenarioDao {

    /**
     * Guarda un objeto Escenario en la base de datos.
     * @param escenario objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($escenario);
    /**
     * Modifica un objeto Escenario en la base de datos.
     * @param escenario objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($escenario);
    /**
     * Elimina un objeto Escenario en la base de datos.
     * @param escenario objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($escenario);
    /**
     * Busca un objeto Escenario en la base de datos.
     * @param escenario objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($escenario);
    /**
     * Lista todos los objetos Escenario en la base de datos.
     * @return Array<Escenario> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!