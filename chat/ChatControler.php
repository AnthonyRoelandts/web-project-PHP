<?php

class ChatControler{
	
	
	public function showMessage(){
		

		try {

			if(!empty($_POST)){
				ChatModel::setMessage($_POST["message"],$_POST["membre_id"]);
			}

			$data = ChatModel::getMessage();
		} catch (Exception $e) {
			$data = ChatModel::getMessage();
			$warning = $e->getMessage();
		}
		require_once 'chat.php';
	}

}
?>