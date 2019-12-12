<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Un tequila, antes de que empiecen los trancazos  \\


interface ILecturaquimicasueloDao {

    /**
     * Guarda un objeto Lecturaquimicasuelo en la base de datos.
     * @param lecturaquimicasuelo objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($lecturaquimicasuelo);
    /**
     * Modifica un objeto Lecturaquimicasuelo en la base de datos.
     * @param lecturaquimicasuelo objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($lecturaquimicasuelo);
    /**
     * Elimina un objeto Lecturaquimicasuelo en la base de datos.
     * @param lecturaquimicasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($lecturaquimicasuelo);
    /**
     * Busca un objeto Lecturaquimicasuelo en la base de datos.
     * @param lecturaquimicasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($lecturaquimicasuelo);
    /**
     * Lista todos los objetos Lecturaquimicasuelo en la base de datos.
     * @return Array<Lecturaquimicasuelo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!