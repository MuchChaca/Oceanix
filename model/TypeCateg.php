<?php
class TypeCateg{
   private $_lettreCategorie, $_numOrdre, $_libelle;

   public function __construct($lettreCategorie, $numOrdre, $libelle){
      $this->_lettreCategorie = $lettreCategorie;
      $this->_numOrdre=$numOrdre;
      $this->_libelle=$libelle;
   }

   ##============  - CRUD -  ============##
   ##==>  - RETRIEVE
   public function retrieve(){
      include "connexionDB.php";
      $req=$db->prepare("SELECT *
                        FROM TypeCateg
                        WHERE lettreCategorie = :lettreCategorie AND numOrdre = :numOrdre;");
      $req->execute([":lettreCategorie" => $this->_lettreCategorie,
                             ":numOrdre" => $this->_numOrdre]);
      $result= $req->fetch();
      $this->_libelle=$result['libelle'];
   }
   ##============  - FINDALL -  ============##
   public static function findAll(){
      include "connexionDB.php";
      $typeCategs=array();
      $req=$db->query("SELECT *
                       FROM TypeCateg;");
      while($result = $req->fetch()){
         $typeCateg= new TypeCateg($result['lettreCategorie'], $result['numOrdre'], $result['libelle']);
         //$typeCateg->retrieve();
         array_push($typeCategs, $typeCateg);
      }
      return $typeCategs;
   }

   ##============  - GETTERS -  ============##
   public function lettreCateg(){ return $this->_lettreCategorie; }
   public function numOrdre(){ return $this->_numOrdre; }
   public function libelle(){ return $this->_libelle; }
}
