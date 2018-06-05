<?php

class BlogControler{
	
	
	public function showBlog(){
		

		try {

			if(!empty($_POST)){

//				BlogModel::setCommentaire($_POST["commentaire"],$_POST["idBil"],$_POST["membre_id"]);
                BlogModel::setCommentaire($_POST["commentaire"],$_POST["idBil"],$_SESSION['membre_id']);

            }

			$data = BlogModel::getBilletsCommentaires();
			extract($data);

		} catch (Exception $e) {
			$data = BlogModel::getBilletsCommentaires();
			extract($data);
			$warning = $e->getMessage();
		}
		require_once 'blog.php';
	}

	public function setCommentaire($text,$idBil,$idUsr){
		try {
			BlogModel::setCommentaire($text,$idBil,1);
		} catch (Exception $e) {
			$warning = $e->getMessage();
		}
	}
}

?>