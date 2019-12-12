<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Cansado de escribir bugs? tranquilo, los escribimos por ti  \\


interface ILecturamanejointegradoenfermedadesDao {

    /**
     * Guarda un objeto Lecturamanejointegradoenfermedades en la base de datos.
     * @param lecturamanejointegradoenfermedades objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($lecturamanejointegradoenfermedades);
    /**
     * Modifica un objeto Lecturamanejointegradoenfermedades en la base de datos.
     * @param lecturamanejointegradoenfermedades objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($lecturamanejointegradoenfermedades);
    /**
     * Elimina un objeto Lecturamanejointegradoenfermedades en la base de datos.
     * @param lecturamanejointegradoenfermedades objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($lecturamanejointegradoenfermedades);
    /**
     * Busca un objeto Lecturamanejointegradoenfermedades en la base de datos.
     * @param lecturamanejointegradoenfermedades objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($lecturamanejointegradoenfermedades);
    /**
     * Lista todos los objetos Lecturamanejointegradoenfermedades en la base de datos.
     * @return Array<Lecturamanejointegradoenfermedades> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!