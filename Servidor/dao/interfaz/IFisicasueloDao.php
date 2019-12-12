<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Muerte a todos los humanos!  \\


interface IFisicasueloDao {

    /**
     * Guarda un objeto Fisicasuelo en la base de datos.
     * @param fisicasuelo objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($fisicasuelo);
    /**
     * Modifica un objeto Fisicasuelo en la base de datos.
     * @param fisicasuelo objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($fisicasuelo);
    /**
     * Elimina un objeto Fisicasuelo en la base de datos.
     * @param fisicasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($fisicasuelo);
    /**
     * Busca un objeto Fisicasuelo en la base de datos.
     * @param fisicasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($fisicasuelo);
    /**
     * Lista todos los objetos Fisicasuelo en la base de datos.
     * @return Array<Fisicasuelo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!