<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Sólo relájate y deja que alguien más lo haga  \\


interface IBiologiasueloDao {

    /**
     * Guarda un objeto Biologiasuelo en la base de datos.
     * @param biologiasuelo objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($biologiasuelo);
    /**
     * Modifica un objeto Biologiasuelo en la base de datos.
     * @param biologiasuelo objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($biologiasuelo);
    /**
     * Elimina un objeto Biologiasuelo en la base de datos.
     * @param biologiasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($biologiasuelo);
    /**
     * Busca un objeto Biologiasuelo en la base de datos.
     * @param biologiasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($biologiasuelo);
    /**
     * Lista todos los objetos Biologiasuelo en la base de datos.
     * @return Array<Biologiasuelo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!