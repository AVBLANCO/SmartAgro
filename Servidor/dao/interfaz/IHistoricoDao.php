<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Esta es una frase no referenciada  \\


interface IHistoricoDao {

    /**
     * Guarda un objeto Historico en la base de datos.
     * @param historico objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($historico);
    /**
     * Modifica un objeto Historico en la base de datos.
     * @param historico objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($historico);
    /**
     * Elimina un objeto Historico en la base de datos.
     * @param historico objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($historico);
    /**
     * Busca un objeto Historico en la base de datos.
     * @param historico objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($historico);
    /**
     * Lista todos los objetos Historico en la base de datos.
     * @return Array<Historico> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!