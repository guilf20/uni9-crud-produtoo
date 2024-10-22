<?php

class Aluno {
    private $conn;   
    private $host = "mysql.jrcf.dev";
    private $db = "escola";
    private $user = "usrapp";
    private $pass = "010203";
    
    public function __construct() {
      
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

        
        if ($this->conn->connect_error) {
            die("Erro na conexão: " . $this->conn->connect_error);
        }
    }
    
    
    public function adicionarAluno($nome, $email) {
        $sql = "INSERT INTO aluno (nome, email) VALUES (?, ?)";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("ssdi", $nome, $email);
            if ($stmt->execute()) {
                echo "Aluno adicionado com sucesso!";
            } else {
                echo "Erro ao adicionar o aluno: " . $this->conn->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta: " . $this->conn->error;
        }
    }

  
    public function listarAluno() {
        $sql = "SELECT * FROM aluno";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $alunos = [];
            while ($row = $result->fetch_assoc()) {
                $alunos[] = $row;
            }
            return $alunos;
        } else {
            return [];
        }
    }

    
    public function alterarProduto($nome, $email) {
        $sql = "UPDATE produtos SET nome = ?, email = ? WHERE nome = ?";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("ssdii", $nome, $email);
            if ($stmt->execute()) {
                echo "Produto atualizado com sucesso!";
            } else {
                echo "Erro ao atualizar o produto: " . $this->conn->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta: " . $this->conn->error;
        }
    }

    
    public function excluirAluno($id) {
        $sql = "DELETE FROM aluno WHERE nome = ?";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("i", $nome);
            if ($stmt->execute()) {
                echo "Produto excluído com sucesso!";
            } else {
                echo "Erro ao excluir o produto: " . $this->conn->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta: " . $this->conn->error;
        }
    }

    // Fechar a conexão com o banco de dados
    public function fecharConexao() {
        $this->conn->close();
    }
}
?>
