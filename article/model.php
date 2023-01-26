<?php
include_once('../config/db.php');
class Article {
	//les attributes d'une Article
	private $id;
	private $CreatedOn;
	private $autor;
	private $content;
	private $title;
    private $icon;
    private $category;

    //constructeur:
	public function __construct($title,$content,$icon,$category,$CreatedOn,$autor) {
		$this->category= $category;
		$this->content= $content;
		$this->icon=$icon;
		$this->title= $title;
        $this->autor=$autor;
		$this->CreatedOn= $CreatedOn;
	}

	//Insertion d'une Article
	public function create() {
		$database = new Dbconnect();
		$bdd = $database->connect_pdo();
		$req = $bdd->prepare("INSERT INTO article(autor,content,title,icon,createOn,category)VALUES(:autor,:content,:title,:icon,:CreatedOn,:category)")or die(print_r($bdd-> errorInfo()));
		$req->bindParam(':autor', $this->autor);
		$req->bindParam(':content',$this->content);
		$req->bindParam(':title',$this->title);
		$req->bindParam(':icon',$this->icon);
        $req->bindParam(':category',$this->category);
		$req->bindParam(':CreatedOn',$this->CreatedOn);
		$ArticleI=$req->execute();
		return ($ArticleI);
    }

	  //Modifier Article
	  public function update($id) {
		$database = new Dbconnect();
		$bdd = $database->connect_pdo();
		// echo "<pre>" ;
		// 	var_dump($bdd) ;
		// echo "<pre>" ;
		// die() ;
		$req = $bdd->prepare("UPDATE article SET content = :content ,title = :title, icon = :icon, updatedOn = :CreatedOn, category =:category  WHERE id =:ID")or die(print_r($bdd-> errorInfo()));
		$req->bindParam(':content',$this->content);
		$req->bindParam(':title',$this->title);
		$req->bindParam(':icon',$this->icon);
        $req->bindParam(':category',$this->category);
		$req->bindParam(':CreatedOn',$this->CreatedOn);
		$req->bindParam(':ID',$id);
		$ArticleU=$req->execute();
		print_r($req) ;
      	return ($ArticleU);
      }

	 //Suppression d'une Article
	  public static function delete($ID) {
		$database = new Dbconnect();
		$bdd = $database->connect_pdo();
		$req = $bdd->prepare('Delete FROM article WHERE id = :id')or die(print_r($bdd-> errorInfo()));
		$req->bindParam(':id',$ID);
		$ArticleD = $req->execute();
      	return ($ArticleD);
    }
     //Rechecrher une Article
	public static function fetchById($ID) {
		global $bdd;
		$sql='SELECT * FROM article WHERE id= ' . $ID;
		$Article = $bdd->query($sql);
		return ($Article);
      }
	//la liste  des Articles de l'application:
	public static function getAll() {
		$database = new Dbconnect();
		$bdd = $database->connect_pdo();
		$sql="SELECT * FROM article JOIN category on article.category=category.id";
		$all= $bdd->query($sql);
		return ($all);
    }
    //recuperer le prenombre des Articles
	public static function nbreArticle(){
		$database = new Dbconnect();
		$bdd = $database->connect_pdo();
		$sql="SELECT count(id) as nbre FROM article";
		$pass = $bdd->prepare($sql);
		$pass->execute();
		return ($pass->fetchColumn());
	}

	public static function nbreArticleByCat($cat){
		$database = new Dbconnect();
		$bdd = $database->connect_pdo();
		$sql="SELECT count(id) as nbre FROM article WHERE category=$cat";
		$pass = $bdd->prepare($sql);
		$pass->execute();
		return ($pass->fetchColumn());
	}

	public static function nbreArticleByMaxCat(){
		$database = new Dbconnect();
		$bdd = $database->connect_pdo();
		$sql="select category.label as label,max(nor) as nbr from 
		(select category,count(*) as nor from article group by category) category JOIN category ON category.id=category";
		$pass = $bdd->prepare($sql);
		$pass->execute();
		return ($pass->fetch(PDO::FETCH_ASSOC));
	}


}
