<?php

class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function listarTodos(){
        $this->db->query("SELECT * FROM usuarios WHERE status = 1 order by usuarios.id desc ");
        return $this->db->resultados();
    }

    public function listarPorId($id){
        $this->db->query("SELECT * FROM usuarios where id = :id AND status = 1 ");
        $this->db->bind('id', $id);

        return $this->db->resultado();
    }

    public function checarEmail($email)
    {
        $this->db->query("SELECT email FROM usuarios WHERE email = :e");
        $this->db->bind(":e", $email);

        if ($this->db->resultado()) :
            return true;
        else :
            return false;
        endif;
    }

    public function armazenar($dados)
    {
        $this->db->query("INSERT INTO usuarios(nome, email, senha, nivel) VALUES (:nome, :email, :senha, 4)");

        $this->db->bind("nome", $dados['nome']);
        $this->db->bind("email", $dados['email']);
        $this->db->bind("senha", $dados['senha']);

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }

    public function atualizar($dados)
    {
        $this->db->query("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, nivel = :nivel WHERE id = :id ");

        $this->db->bind("id", $dados['id']);
        $this->db->bind("nome", $dados['nome']);
        $this->db->bind("email", $dados['email']);
        $this->db->bind("senha", $dados['senha']);
        $this->db->bind("nivel", $dados['nivel']);

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }

    public function destruir($id)
    {
        $this->db->query("UPDATE usuarios SET status = 0 WHERE id = :id ");

        $this->db->bind("id", $id);

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }

    public function checarLogin($email, $senha)
    {
        $this->db->query("SELECT * FROM usuarios WHERE email = :e");
        $this->db->bind(":e", $email);

        if ($this->db->resultado()) : 
            $resultado = $this->db->resultado();
            if(password_verify($senha, $resultado->senha)): 
                return $resultado;
            else:
                return false;
            endif;
        else :
            return false;
        endif;
    }

}
