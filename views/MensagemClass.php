<?php

class Mensagem
{
    public $id;
    public $email;
    public $mensagem;

    // define um método construtor na classe e recebe um parâmetro opcional $id
    public function __construct($id = false)
	{
        // verifica se a variável $id foi definida
		if ($id){
            // atribui o valor de $id à propriedade $id do objeto
            $this->id = $id;                
            // chama o método carregar() para carregar as informações da turma correspondente ao id
            $this->carregar();
        }
	}

    public function inserir()
    {
        // Define a string SQL de inserção de dados na tabela "tb_turmas"
        $sql = "INSERT INTO mensagens (email, mensagem) VALUES (
            '" .$this->email. "' ,
            '" .$this->mensagem. " '
        )";

        // Cria uma nova conexão PDO com o banco de dados "sis-escolar"
        $conexao = new PDO('mysql:host=Localhost;dbname=VoltaAoMundo', 'root', '');

        // Executa a string SQL na conexão, inserindo os dados na tabela "tb_turmas"
        $conexao->exec($sql);

        header("Location: fale-conosco-sucesso.html");
    }

    public function listar()
	{
        $sql = "SELECT id, email, mensagem
        FROM mensagens";

        $conexao = new PDO('mysql:host=Localhost;dbname=VoltaAoMundo', 'root', '');
        $resultado = $conexao->query($sql);
        $mensagens = $resultado->fetchAll();
        return $mensagens;
	}

    public function excluir()
	{
        // Define a string de consulta SQL para deletar um registro
        // da tabela "tb_turmas" com base no seu ID
        $sql = "DELETE FROM mensagens WHERE id=".$this->id;

        // Cria uma nova conexão PDO com o banco de dados "sis-escolar" localizado
        // no servidor "127.0.0.1" e autentica com o usuário "root" (sem senha)
        $conexao = new PDO('mysql:host=Localhost;dbname=VoltaAoMundo', 'root', '');

        // Executa a instrução SQL de exclusão utilizando o método
        // "exec" do objeto de conexão PDO criado acima
        $conexao->exec($sql);
	}

    public function carregar()
    {
        // Query SQL para buscar uma turma no banco de dados pelo id
        $sql = "SELECT * FROM mensagens WHERE id=" . $this->id;
        $conexao = new PDO('mysql:host=Localhost;dbname=VoltaAoMundo', 'root', '');

        // Execução da query e armazenamento do resultado em uma variável
        $resultado = $conexao->query($sql);
        // Recuperação da primeira linha do resultado como um array associativo
        $linha = $resultado->fetch();

        // Atribuição dos valores dos campos da turma recuperados do banco às propriedades do objeto
        $this->email = $linha['email'];
        $this->mensagem = $linha['mensagem'];
    }

    public function atualizar()
    {
        // Query SQL para atualizar uma turma no banco de dados pelo id
        $sql = "UPDATE mensagens SET 
                    email = '$this->email' ,
                    mensagem = '$this->mensagem'                   
                WHERE id = $this->id ";

        $conexao = new PDO('mysql:host=Localhost;dbname=VoltaAoMundo', 'root', '');
        $conexao->exec($sql);
    }

}
