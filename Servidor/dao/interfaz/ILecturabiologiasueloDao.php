<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No te olvides de quitar mis comentarios  \\


interface ILecturabiologiasueloDao {

    /**
     * Guarda un objeto Lecturabiologiasuelo en la base de datos.
     * @param lecturabiologiasuelo objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($lecturabiologiasuelo);
    /**
     * Modifica un objeto Lecturabiologiasuelo en la base de datos.
     * @param lecturabiologiasuelo objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($lecturabiologiasuelo);
    /**
     * Elimina un objeto Lecturabiologiasuelo en la base de datos.
     * @param lecturabiologiasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($lecturabiologiasuelo);
    /**
     * Busca un objeto Lecturabiologiasuelo en la base de datos.
     * @param lecturabiologiasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($lecturabiologiasuelo);
    /**
     * Lista todos los objetos Lecturabiologiasuelo en la base de datos.
     * @return Array<Lecturabiologiasuelo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!