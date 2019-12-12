<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En lo que a mí respecta, señor Dix, lo imprevisto no existe  \\


interface IManejointegradoplagasDao {

    /**
     * Guarda un objeto Manejointegradoplagas en la base de datos.
     * @param manejointegradoplagas objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($manejointegradoplagas);
    /**
     * Modifica un objeto Manejointegradoplagas en la base de datos.
     * @param manejointegradoplagas objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($manejointegradoplagas);
    /**
     * Elimina un objeto Manejointegradoplagas en la base de datos.
     * @param manejointegradoplagas objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($manejointegradoplagas);
    /**
     * Busca un objeto Manejointegradoplagas en la base de datos.
     * @param manejointegradoplagas objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($manejointegradoplagas);
    /**
     * Lista todos los objetos Manejointegradoplagas en la base de datos.
     * @return Array<Manejointegradoplagas> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!