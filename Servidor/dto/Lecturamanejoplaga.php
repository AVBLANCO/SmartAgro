<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tienes que considerar la posibilidad de que a Dios no le caes bien.  \\


class Lecturamanejoplaga {

  private $idlecturaManejoPlaga;
  private $valorLecturaManejoPlagacol;
  private $fechaLecturaManejoPlaga;
  private $metricaManejoPlagas_idmetricaManejoPlagas;

    /**
     * Constructor de Lecturamanejoplaga
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idlecturaManejoPlaga
     * @return idlecturaManejoPlaga
     */
  public function getIdlecturaManejoPlaga(){
      return $this->idlecturaManejoPlaga;
  }

    /**
     * Modifica el valor correspondiente a idlecturaManejoPlaga
     * @param idlecturaManejoPlaga
     */
  public function setIdlecturaManejoPlaga($idlecturaManejoPlaga){
      $this->idlecturaManejoPlaga = $idlecturaManejoPlaga;
  }
    /**
     * Devuelve el valor correspondiente a valorLecturaManejoPlagacol
     * @return valorLecturaManejoPlagacol
     */
  public function getValorLecturaManejoPlagacol(){
      return $this->valorLecturaManejoPlagacol;
  }

    /**
     * Modifica el valor correspondiente a valorLecturaManejoPlagacol
     * @param valorLecturaManejoPlagacol
     */
  public function setValorLecturaManejoPlagacol($valorLecturaManejoPlagacol){
      $this->valorLecturaManejoPlagacol = $valorLecturaManejoPlagacol;
  }
    /**
     * Devuelve el valor correspondiente a fechaLecturaManejoPlaga
     * @return fechaLecturaManejoPlaga
     */
  public function getFechaLecturaManejoPlaga(){
      return $this->fechaLecturaManejoPlaga;
  }

    /**
     * Modifica el valor correspondiente a fechaLecturaManejoPlaga
     * @param fechaLecturaManejoPlaga
     */
  public function setFechaLecturaManejoPlaga($fechaLecturaManejoPlaga){
      $this->fechaLecturaManejoPlaga = $fechaLecturaManejoPlaga;
  }
    /**
     * Devuelve el valor correspondiente a metricaManejoPlagas_idmetricaManejoPlagas
     * @return metricaManejoPlagas_idmetricaManejoPlagas
     */
  public function getMetricaManejoPlagas_idmetricaManejoPlagas(){
      return $this->metricaManejoPlagas_idmetricaManejoPlagas;
  }

    /**
     * Modifica el valor correspondiente a metricaManejoPlagas_idmetricaManejoPlagas
     * @param metricaManejoPlagas_idmetricaManejoPlagas
     */
  public function setMetricaManejoPlagas_idmetricaManejoPlagas($metricaManejoPlagas_idmetricaManejoPlagas){
      $this->metricaManejoPlagas_idmetricaManejoPlagas = $metricaManejoPlagas_idmetricaManejoPlagas;
  }


}
//That`s all folks!