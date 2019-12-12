<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tu alma nos pertenece... Salve Mr. Arciniegas  \\


interface IUsuario_has_hojarutaDao {

    /**
     * Guarda un objeto Usuario_has_hojaruta en la base de datos.
     * @param usuario_has_hojaruta objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($usuario_has_hojaruta);
    /**
     * Modifica un objeto Usuario_has_hojaruta en la base de datos.
     * @param usuario_has_hojaruta objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($usuario_has_hojaruta);
    /**
     * Elimina un objeto Usuario_has_hojaruta en la base de datos.
     * @param usuario_has_hojaruta objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($usuario_has_hojaruta);
    /**
     * Busca un objeto Usuario_has_hojaruta en la base de datos.
     * @param usuario_has_hojaruta objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($usuario_has_hojaruta);
    /**
     * Lista todos los objetos Usuario_has_hojaruta en la base de datos.
     * @return Array<Usuario_has_hojaruta> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Lista todos los objetos Usuario_has_hojaruta en la base de datos que coincidan con la llave primaria.
     * @param usuario_has_hojaruta objeto con la(s) llave(s) primaria(s) para consultar
     * @return Array<Usuario_has_hojaruta> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listByUsuario_idusuario($usuario_has_hojaruta);
    /**
     * Lista todos los objetos Usuario_has_hojaruta en la base de datos que coincidan con la llave primaria.
     * @param usuario_has_hojaruta objeto con la(s) llave(s) primaria(s) para consultar
     * @return Array<Usuario_has_hojaruta> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listByHojaRuta_idhojaRuta($usuario_has_hojaruta);
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!