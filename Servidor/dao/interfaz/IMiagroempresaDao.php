<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Estadistas informan que una linea de código equivale a un sorbo de café  \\


interface IMiagroempresaDao {

    /**
     * Guarda un objeto Miagroempresa en la base de datos.
     * @param miagroempresa objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($miagroempresa);
    /**
     * Modifica un objeto Miagroempresa en la base de datos.
     * @param miagroempresa objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($miagroempresa);
    /**
     * Elimina un objeto Miagroempresa en la base de datos.
     * @param miagroempresa objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($miagroempresa);
    /**
     * Busca un objeto Miagroempresa en la base de datos.
     * @param miagroempresa objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($miagroempresa);
    /**
     * Lista todos los objetos Miagroempresa en la base de datos.
     * @return Array<Miagroempresa> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!