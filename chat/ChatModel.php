<?php


class ChatModel
{

	private static $_query1 = "select * from chat as c, membre as m where c.id_membre = m.id order by id_ch DESC limit 0,10";
	private static $_query2 = "insert into chat(date_ch,texte_ch,id_membre) value(?,?,?)";

	public static function getMessage(){
		try {
			$bdd = getDatabase();
			$data = $bdd->query(self::$_query1);

		} catch (Exception $e) {
			throw ($e);
		}

		return $data;
	}

	public static function setMessage($texte,$idUsr){
		try {
		
			$bdd = getDatabase();
			$req = $bdd->prepare(self::$_query2);
			$today = date("Y-m-d");
			$res = $req->execute(array($today,$texte,$idUsr) );
			if(!$res)
				throw new Exception("le Message na pas ete enregiste");
				
		} catch (Exception $e) {
			$warning = $e->getMessage();

			throw ($e);
		}
	}
}


?>