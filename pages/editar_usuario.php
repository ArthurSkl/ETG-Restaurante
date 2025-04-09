<?php
session_start();
$titulo_page = "Editar Usuário";

include_once("../includes/menu.php");

echo "<script src='../assets/js/modais.js'> </script>";

require __DIR__."/../vendor/autoload.php";

$titulo_page = 'Minha Conta';

//REGRAS DE NEGOCIO ABAIXO 

use App\Entity\Perfil; 

use App\Entity\Usuario;
 
$objUsuario = new Usuario();
$perfil= new Perfil();
$erro = false;

$area_edit = '';
// var_dump($_GET);exit;
$id_modificar = isset($_GET['id_user']) ? $_GET['id_user'] : $_SESSION['id_user'];

$dados_editar = $objUsuario->getDadosById($id_modificar)[0];  
$foto = $dados_editar['foto'];

// var_dump($dados_editar);

$id_perfil = $dados_editar["id_perfil"];
// echo($id_perfil);

$dados_perfil = $perfil->getDados();
// var_dump($dados_perfil);exit;
$option_perfis="";
foreach($dados_perfil as $elemento) {
	if($id_perfil==$elemento["id"]){
		$option_perfis .= '<option value="'.$elemento["id"].'" selected>'.$elemento["nome"].'</option>';
		continue;
	}
	$option_perfis .= '<option value="'.$elemento["id"].'">'.$elemento["nome"].'</option>';
	// var_dump($elemento);
	// echo("<br>");
	// echo("<br>");
	// echo("<br>");
}
// echo($option_perfis);
// exit;





if(!isset($_GET['id_user'])){

    $sla = '<h1 class="titulo-perfil">Minha Conta</h1>';

    $voltar = '<a href="listar_recados.php" class="botao-voltar-submit" >VOLTAR</a>';
    
    $area_edit = '<section class="editar_senha">
    <section class="titulo_alterar_senha">
        <h1>Alterar Senha</h1>
    </section>

    <div class="centralizar-back"> 
        <section class="centralizar_input_alterar_senha">

            
           
            <div class="input_senha_group field">
                <input name="senhaantiga" type="password" class="input_senha_field" placeholder="Name">
                <label for="name" class="input_senha_label">Senha antiga</label> <!--Alterar para o nome do input-->
            </div>

            <div class="input_senha_group field2">
                <input name="novasenha" type="password" class="input_senha_field" placeholder="Name">
                <label for="name" class="input_senha_label">Criar nova senha</label> <!--Alterar para o nome do input-->
            </div>

            <div class="input_senha_group field3">
                <input name="confirmarnovasenha" type="password" class="input_senha_field" placeholder="Name" >
                <label for="name" class="input_senha_label">Confirmar nova senha</label> <!--Alterar para o nome do input-->
            </div>
            </section> 
        </div> 

    </section>';
    
    if(isset($_FILES['foto'])){

        if(strlen($_FILES['foto']['name']) > 0 ){ 
        
            
            $name_img = $_FILES['foto']['name'];
            $new_name  = uniqid(). '-' . substr($name_img, 0, 20);
            $path = '../assets/imgs/users/';
            move_uploaded_file($_FILES['foto']['tmp_name'], $path.$new_name);
            
            // unlink($path . $dados_editar['foto']);
        
            $objUsuario->setImage($dados_editar['email'],$new_name);

            $_SESSION["msg_edit"]='Alterações realizadas com sucesso!';

        }
    }
    if(isset($_POST['btn_submit'])){
        
        // setar nome 
			




        if(isset($_POST['nome'])){


            $objUsuario -> setName($_POST['nome'],$dados_editar['email']);  
            // header("Location: {$_SERVER['PHP_SELF']}");
            $_SESSION["msg_edit"]='Alterações realizadas com sucesso!';


        }else{

            $objUsuario -> setName($dados_editar['nome'],$dados_editar['email']); 
            $_SESSION["msg_edit"]='Alterações realizadas com sucesso!';

        }
        
        if (strlen($_POST['senhaantiga']) > 0 and strlen($_POST['novasenha']) > 0 and strlen($_POST['confirmarnovasenha']) > 0 )
        {
            

            if ($_POST['novasenha'] == $_POST['confirmarnovasenha']){
                $objUsuario -> setPasswordByEmail($dados_editar['email'],$_POST['novasenha']); 
                $_SESSION["msg_edit"]='Alterações realizadas com sucesso!';
            
                
            }else{
                
                $erro = true;

            } 
        } 
        else
        {
            $erro = true; 
        } 

        if(isset($_POST['email'])){
    
            if(strlen($_POST['email']) > 0 and strlen($_POST['matricula']) > 0){
        
        
                try{
        
                    $dadosByEmail     = Usuario::getDadosByEmail($_POST['email']);
                    $dadosByMatricula = Usuario::getDadosByMatricula($_POST['matricula']);
        
        
                    if(empty($dadosByEmail) || empty($dadosByMatricula)){
        
                        if(empty($dadosByEmail)){
                            
                            Usuario::setEmail($_GET['id_user'],$_POST['email']);
                            $_SESSION["msg_edit"]='Alterações realizadas com sucesso!';
            
                        }else{
                            // retornar que E-Mail ja esta sendo utilizado por outro usuario
                        }
                        
                        if(empty($dadosByMatricula)){ 
        
                            Usuario::setMatricula($_GET['id_user'],$_POST['matricula']);
        
                            $_SESSION["msg_edit"]='Alterações realizadas com sucesso!';
                        
                        }else{
                            // retornar que matricula ja esta sendo utilizado por outro usuario
                        }
        
                    }
                    
                }catch(PDOException $e){
                    echo($e->getMessage());
                }
        
            }
        }

        
        
        
    }

    if(isset($_SESSION['msg_edit'])){
        echo"<script>modalStatus('Alterações realizadas com sucesso!','success',()=>{
            location.href='editar_usuario.php'
        })</script>";
        
        unset($_SESSION['msg_edit']);
    }


}else{

    $sla = '<h1 class="titulo-perfil">Editar Usuário</h1>';

    $voltar = '<a href="visualizar_usuario.php" class="botao-voltar-submit" >VOLTAR</a>';

    $area_edit = '
    <section class="editar_senha">
    <section class="titulo_alterar_senha">
        <h1>E-Mail</h1>
    </section>

    <div class="centralizar-back"> 
        <section class="centralizar_input_alterar_senha">

            <div class="input_senha_group field">
                <i class="bi bi-pencil-square kkk"></i>
                <input name="email" type="text" class="input_senha_field" placeholder="Name" value="'.$dados_editar['email'].'">
                <label for="name" class="input_senha_label">E-Mail</label> <!--Alterar para o nome do input-->
            </div>

        </section> 
    </div> 

    <section class="titulo_alterar_senha">
        <h1>Perfil</h1>
    </section>

    <div class="centralizar-back"> 
        <section class="centralizar_input_alterar_senha">

            <div class="input_senha_group field">
				<select class="select_perfil" name="select_perfil" id="">
					'.$option_perfis.'
				</select>
            </div>
			<div class="barra"></div> 

        </section> 
    </div> 


    <section class="titulo_alterar_senha">
        <h1>Matrícula</h1>
    </section>

    <div class="centralizar-back"> 
        <section class="centralizar_input_alterar_senha">

            <div class="input_senha_group field">
                <i class="bi bi-pencil-square kkk"></i>
                <input name="matricula" type="text" class="input_senha_field" placeholder="Name" value="'.$dados_editar['matricula'].'">
                <label for="name" class="input_senha_label">Número de Matrícula</label> <!--Alterar para o nome do input-->
            </div>

        </section> 
    </div> 

    </section>';

    

if(isset($_FILES['foto'])){

    if(strlen($_FILES['foto']['name']) > 0 ){ 
      
         
        $name_img = $_FILES['foto']['name'];
        $new_name  = uniqid(). '-' . substr($name_img, 0, 20);
        $path = '../assets/imgs/users/';
        move_uploaded_file($_FILES['foto']['tmp_name'], $path.$new_name);
        
        // unlink($path . $dados_editar['foto']);
    
        $objUsuario->setImage($dados_editar['email'],$new_name);
        // header("Location: Refresh: 0");

        $_SESSION["msg_edit"]='Alterações realizadas com sucesso!';

    }
}
if(isset($_POST['btn_submit'])){
     
    // setar nome 
	$id_perfil_select = $_POST["select_perfil"];
	$objUsuario->setPerfil(id_usuario: $id_modificar, id_perfil: $id_perfil_select);
     
    if(isset($_POST['nome'])){


	$objUsuario -> setName($_POST['nome'],$dados_editar['email']);  
	// header("Location: {$_SERVER['PHP_SELF']}");
	$_SESSION["msg_edit"]='Alterações realizadas com sucesso!';


    }else{

        $objUsuario -> setName($dados_editar['nome'],$dados_editar['email']); 
        $_SESSION["msg_edit"]='Alterações realizadas com sucesso!';

    }
    $_POST['senhaantiga'] = isset($_POST['senhaantiga']) ? $_POST['senhaantiga'] : "";
    $_POST['novasenha'] = isset($_POST['novasenha']) ? $_POST['novasenha'] : "";
    $_POST['confirmarnovasenha'] = isset($_POST['confirmarnovasenha']) ? $_POST['confirmarnovasenha'] : "";
    $new_name = isset($new_name) ? $new_name : "";
    if (strlen($_POST['senhaantiga']) > 0 and strlen($_POST['novasenha']) > 0 and strlen($_POST['confirmarnovasenha']) > 0 )
    {
        
         

        if ($_POST['novasenha'] == $_POST['confirmarnovasenha']){
            $objUsuario -> setPasswordByEmail($dados_editar['email'],$_POST['novasenha']); 
            $_SESSION["msg_edit"]='Alterações realizadas com sucesso!';
          
             
            $name_img = $_FILES['foto']['name'];
            $new_name  = uniqid(). '-' . substr($name_img, 0, 20);
            $path = '../assets/imgs/users/';
            move_uploaded_file($_FILES['foto']['tmp_name'], $path.$new_name);
            
        }else{
            
            $erro = true;

        } 
    } 
    else
    {
        $erro = true; 
    } 

    if(isset($_POST['email'])){
 
        if(strlen($_POST['email']) > 0 and strlen($_POST['matricula']) > 0){
    
    
            try{
    
                $dadosByEmail     = Usuario::getDadosByEmail($_POST['email']);
                $dadosByMatricula = Usuario::getDadosByMatricula($_POST['matricula']);
    
     
                if(empty($dadosByEmail) || empty($dadosByMatricula)){
    
                    if(empty($dadosByEmail)){
                        
                        Usuario::setEmail($_GET['id_user'],$_POST['email']);
                        $_SESSION["msg_edit"]='Alterações realizadas com sucesso!';
        
            $objUsuario->setImage($dados_editar['email'],$new_name);
            // header("Location: Refresh: 0");
    
                        Usuario::setMatricula($_GET['id_user'],$_POST['matricula']);
    
                        $_SESSION["msg_edit"]='Alterações realizadas com sucesso!';
                    
                    }else{
                        // retornar que matricula ja esta sendo utilizado por outro usuario
                    }
    
                }
                 
            }catch(PDOException $e){
                echo($e->getMessage());
            }
    
        }
    }
    if(isset($_POST['btn_submit'])){
		
        // setar nome

        
         
        if(isset($_POST['nome'])){
    
    
            $objUsuario -> setName($_POST['nome'],$dados_editar['email']);  
            // header("Location: {$_SERVER['PHP_SELF']}");
            $_SESSION["msg_edit"]='Alterações realizadas com sucesso!';
    
    
        }else{
    
            $objUsuario -> setName($dados_editar['nome'],$dados_editar['email']); 
            $_SESSION["msg_edit"]='Alterações realizadas com sucesso!';
    
        }
        
        // if (strlen($_POST['senhaantiga']) > 0 and strlen($_POST['novasenha']) > 0 and strlen($_POST['confirmarnovasenha']) > 0 )
        // {
             
    
        //     if ($_POST['novasenha'] == $_POST['confirmarnovasenha']){
        //         $objUsuario -> setPasswordByEmail($dados_editar['email'],$_POST['novasenha']); 
        //         $_SESSION["msg_edit"]='Alterações realizadas com sucesso!';
              
                
        //     }else{
                
        //         $erro = true;
    
        //     } 
        // } 
        // else
        // {
        //     $erro = true; 
        // } 
    
        if(isset($_POST['email'])){
     
            if(strlen($_POST['email']) > 0 and strlen($_POST['matricula']) > 0){
        
        
                try{
        
                    $dadosByEmail     = Usuario::getDadosByEmail($_POST['email']);
                    $dadosByMatricula = Usuario::getDadosByMatricula($_POST['matricula']);
        
         
                    if(empty($dadosByEmail) || empty($dadosByMatricula)){
        
                        if(empty($dadosByEmail)){
                            
                            Usuario::setEmail($_GET['id_user'],$_POST['email']);
                            $_SESSION["msg_edit"]='Alterações realizadas com sucesso!';
            
                        }else{
                            // retornar que E-Mail ja esta sendo utilizado por outro usuario
                        }
                        
                        if(empty($dadosByMatricula)){ 
        
                            Usuario::setMatricula($_GET['id_user'],$_POST['matricula']);
        
                            $_SESSION["msg_edit"]='Alterações realizadas com sucesso!';
                        
                        }else{
                            // retornar que matricula ja esta sendo utilizado por outro usuario
                        }
        
                    }
                     
                }catch(PDOException $e){
                    echo($e->getMessage());
                }
        
            }
        }  
    }

    if(isset($_SESSION['msg_edit'])){
        echo"<script>modalStatus('Alterações realizadas com sucesso!','success',()=>{
            location.href='visualizar_usuario.php'
        })</script>";
        
        unset($_SESSION['msg_edit']);
    }


}}



require("../includes/header/header.php"); 
include_once("../includes/menu.php");
require("../includes/main/main_editar_usuario.php");

if(isset($_SESSION['msg_edit'])){
    echo"<script>modalStatus('Alterações realizadas com sucesso!','success',()=>{
        location.href='editar_usuario.php'
    })</script>";
    
    unset($_SESSION['msg_edit']);
}

//FIM DAS REGRAS DE NEGOCIO
require("../includes/footer/footer.php");
?>

