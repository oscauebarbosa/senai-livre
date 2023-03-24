<?php
    include("../config/cabecalho.php");
?>

<form action="" method="POST">
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" placeholder="Informe seu nome" required>

    <label for="email">E-mail</label>
    <input type="email" name="email" id="email" placeholder="Informe seu e-mail" required>

    <label for="login">Login</label>
    <input type="text" name="login" id="login" placeholder="Informe seu login" required>

    <label for="senha">Senha</label>
    <input type="password" name="senha" id="senha" placeholder="Informe sua senha" required>

    <button type="submit">Enviar</button>
    <button type="reset">Limpar</button>

<?php
    include("../conexao.php");
?>

<?php
    include("../config/rodape.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $login = $_POST["login"];
        $senha = $_POST["senha"];

        $sql = "INSERT INTO usuario(nome, email, login, senha) VALUES (:nome, :email, :login, :senha)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":nome",$nome);
        $stmt->bindValue(":email",$email);
        $stmt->bindValue(":login",$login);
        $stmt->bindValue(":senha",$senha);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            echo "Registrado com sucesso";
        }else {
            echo "Falha ao registrar o usuário";
        }
    }
?>