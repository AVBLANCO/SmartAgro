<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Me ayudas con la tesis?  \\


interface ILecturafisicasueloDao {

    /**
     * Guarda un objeto Lecturafisicasuelo en la base de datos.
     * @param lecturafisicasuelo objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($lecturafisicasuelo);
    /**
     * Modifica un objeto Lecturafisicasuelo en la base de datos.
     * @param lecturafisicasuelo objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($lecturafisicasuelo);
    /**
     * Elimina un objeto Lecturafisicasuelo en la base de datos.
     * @param lecturafisicasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($lecturafisicasuelo);
    /**
     * Busca un objeto Lecturafisicasuelo en la base de datos.
     * @param lecturafisicasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($lecturafisicasuelo);
    /**
     * Lista todos los objetos Lecturafisicasuelo en la base de datos.
     * @return Array<Lecturafisicasuelo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!