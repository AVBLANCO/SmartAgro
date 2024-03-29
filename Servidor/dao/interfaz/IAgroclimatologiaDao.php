<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Antes que me hubiera apasionado por mujer alguna, jugué mi corazón al azar y me lo ganó la Violencia.  \\


interface IAgroclimatologiaDao {

    /**
     * Guarda un objeto Agroclimatologia en la base de datos.
     * @param agroclimatologia objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($agroclimatologia);
    /**
     * Modifica un objeto Agroclimatologia en la base de datos.
     * @param agroclimatologia objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($agroclimatologia);
    /**
     * Elimina un objeto Agroclimatologia en la base de datos.
     * @param agroclimatologia objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($agroclimatologia);
    /**
     * Busca un objeto Agroclimatologia en la base de datos.
     * @param agroclimatologia objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($agroclimatologia);
    /**
     * Lista todos los objetos Agroclimatologia en la base de datos.
     * @return Array<Agroclimatologia> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!