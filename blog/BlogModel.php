<?php


class BlogModel
{
	
	private static $_query1 = "select * from comment as c, membre as m where c.id_membre = m.id";
	private static $_query2 = "insert into comment(date_com,texte_com,id_bil,id_membre) value(?,?,?,?)";

	private static $_query = "select * from post";


	public static function getAllBillets(){
		$reponse;
		try {
			$bdd = getDatabase();
			$reponse = $bdd->query(self::$_query);
		} catch (Exception $e) {
			throw ($e);
		}
		return $reponse;

	}

	public static function getBilletsCommentaires(){
		$data;
		try {
			$reponseBil =  self::getAllBillets();
			$reponseCom =  self::getCommentaires();

			$data = compact('reponseBil','reponseCom');

		} catch (Exception $e) {
			throw ($e);
		}

		return $data;
	}

	private static function getCommentaires(){
		$reponse;
		try {
			$bdd = getDatabase();
			$reponse = $bdd->query(self::$_query1);
			
		} catch (Exception $e) {
			throw ($e);
		}
		return $reponse;
	}


	public static function setCommentaire($texte,$idBil,$idUsr){
		try {
			
			$bdd = getDatabase();
			$req = $bdd->prepare(self::$_query2);
			$today = date("Y-m-d");
			$res = $req->execute(array($today,$texte,$idBil,$idUsr));
			if(!$res)
				throw new Exception("le commentaire na pas ete enregiste");
				
		} catch (Exception $e) {
			$warning = $e->getMessage();
			throw ($e);
		}
	}
}

?>