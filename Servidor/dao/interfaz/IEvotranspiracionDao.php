<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Quédate con quien te quiera por tu back-end, no por tu front-end  \\


interface IEvotranspiracionDao {

    /**
     * Guarda un objeto Evotranspiracion en la base de datos.
     * @param evotranspiracion objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($evotranspiracion);
    /**
     * Modifica un objeto Evotranspiracion en la base de datos.
     * @param evotranspiracion objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($evotranspiracion);
    /**
     * Elimina un objeto Evotranspiracion en la base de datos.
     * @param evotranspiracion objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($evotranspiracion);
    /**
     * Busca un objeto Evotranspiracion en la base de datos.
     * @param evotranspiracion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($evotranspiracion);
    /**
     * Lista todos los objetos Evotranspiracion en la base de datos.
     * @return Array<Evotranspiracion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!