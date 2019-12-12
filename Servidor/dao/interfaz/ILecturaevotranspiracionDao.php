<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Has escuchado hablar del grandioso señor Arciniegas?  \\


interface ILecturaevotranspiracionDao {

    /**
     * Guarda un objeto Lecturaevotranspiracion en la base de datos.
     * @param lecturaevotranspiracion objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($lecturaevotranspiracion);
    /**
     * Modifica un objeto Lecturaevotranspiracion en la base de datos.
     * @param lecturaevotranspiracion objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($lecturaevotranspiracion);
    /**
     * Elimina un objeto Lecturaevotranspiracion en la base de datos.
     * @param lecturaevotranspiracion objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($lecturaevotranspiracion);
    /**
     * Busca un objeto Lecturaevotranspiracion en la base de datos.
     * @param lecturaevotranspiracion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($lecturaevotranspiracion);
    /**
     * Lista todos los objetos Lecturaevotranspiracion en la base de datos.
     * @return Array<Lecturaevotranspiracion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!