<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No se fije en el corte de cabello, soy mucho muy rico  \\


interface ILecturamanejoplagaDao {

    /**
     * Guarda un objeto Lecturamanejoplaga en la base de datos.
     * @param lecturamanejoplaga objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($lecturamanejoplaga);
    /**
     * Modifica un objeto Lecturamanejoplaga en la base de datos.
     * @param lecturamanejoplaga objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($lecturamanejoplaga);
    /**
     * Elimina un objeto Lecturamanejoplaga en la base de datos.
     * @param lecturamanejoplaga objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($lecturamanejoplaga);
    /**
     * Busca un objeto Lecturamanejoplaga en la base de datos.
     * @param lecturamanejoplaga objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($lecturamanejoplaga);
    /**
     * Lista todos los objetos Lecturamanejoplaga en la base de datos.
     * @return Array<Lecturamanejoplaga> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!