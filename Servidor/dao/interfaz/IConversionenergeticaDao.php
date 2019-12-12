<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En un lugar de La Mancha, de cuyo nombre no quiero acordarme...  \\


interface IConversionenergeticaDao {

    /**
     * Guarda un objeto Conversionenergetica en la base de datos.
     * @param conversionenergetica objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($conversionenergetica);
    /**
     * Modifica un objeto Conversionenergetica en la base de datos.
     * @param conversionenergetica objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($conversionenergetica);
    /**
     * Elimina un objeto Conversionenergetica en la base de datos.
     * @param conversionenergetica objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($conversionenergetica);
    /**
     * Busca un objeto Conversionenergetica en la base de datos.
     * @param conversionenergetica objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($conversionenergetica);
    /**
     * Lista todos los objetos Conversionenergetica en la base de datos.
     * @return Array<Conversionenergetica> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!