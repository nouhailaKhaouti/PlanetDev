<?php
require_once ('../config/db.php');
class Category{
	//les attributes d'une Category
	private $id;
	private $label;

    //constructeur:
	public function __construct($label) {
		$this->label= $label;
	}

//les getters et setters:
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
       $this->id=$id;
     }
	public function getlabel() {
		return $this->label;
	}
	public function setlabel($label) {
       $this->label=$label;
     }
	
	//Insertion d'une Category
	public function create() {
		$database = new Dbconnect();
		$bdd = $database->connect_pdo();
		$req = $bdd->prepare("INSERT INTO category(label)VALUES(:label)")or die(print_r($bdd-> errorInfo()));
		$req->bindParam(':label', $this->label);
		$CategoryI=$req->execute();
		return ($CategoryI);
    }

	  //Modifier Category
	  public function update($id) {
		$database = new Dbconnect();
		$bdd = $database->connect_pdo();
		$req = $bdd->prepare("UPDATE category SET label =:label WHERE id =:ID")or die(print_r($bdd-> errorInfo()));
		$req->bindParam(':label', $this->label);
		$req->bindParam(':ID',$id);
		$CategoryU=$req->execute();
      	return ($CategoryU);
      }

	 //Suppression d'une Category
	  public static function delete($ID) {
		$database = new Dbconnect();
		$bdd = $database->connect_pdo();
		$req = $bdd->prepare('Delete FROM category WHERE id = :id')or die(print_r($bdd-> errorInfo()));
		$req->bindParam(':id',$ID);
		$CategoryD = $req->execute();
      	return ($CategoryD);
    }

	  public static function getAll(){
		$database = new Dbconnect();
		$bdd = $database->connect_pdo();
		$sql="SELECT * FROM category";
		$all= $bdd->query($sql);
		return ($all);
	  }
}
?>