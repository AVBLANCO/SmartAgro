<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No quiero morir sin tener cicatrices.  \\


interface ILecturaconversionenergeticaDao {

    /**
     * Guarda un objeto Lecturaconversionenergetica en la base de datos.
     * @param lecturaconversionenergetica objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($lecturaconversionenergetica);
    /**
     * Modifica un objeto Lecturaconversionenergetica en la base de datos.
     * @param lecturaconversionenergetica objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($lecturaconversionenergetica);
    /**
     * Elimina un objeto Lecturaconversionenergetica en la base de datos.
     * @param lecturaconversionenergetica objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($lecturaconversionenergetica);
    /**
     * Busca un objeto Lecturaconversionenergetica en la base de datos.
     * @param lecturaconversionenergetica objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($lecturaconversionenergetica);
    /**
     * Lista todos los objetos Lecturaconversionenergetica en la base de datos.
     * @return Array<Lecturaconversionenergetica> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!