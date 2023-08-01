<?php

class Gerenciar_Usuarios extends Controller{

    public function __construct(){
        if(!Sessao::estaLogado()):
            URL::redirecionar('usuarios/login');
        endif;

        $this->gerenciarUsuarioModel = $this->model('Usuario');
    }
    
    public function index(){

        $dados = [
            'usuarios' => $this->gerenciarUsuarioModel->listarTodos()
        ];

        $this->view('gerenciar_usuarios/index', $dados);
    }

    public function cadastrar(){

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [
                'nome' => trim($formulario['nome']),
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
                'nivel' => trim($formulario['nivel']),
            ];

            if (in_array("", $formulario)) :

                if (empty($formulario['nome'])) :
                    $dados['nome_erro'] = 'Preencha o campo nome';
                endif;

                if (empty($formulario['email'])) :
                    $dados['email_erro'] = 'Preencha o campo e-mail';
                endif;

                if (empty($formulario['senha'])) :
                    $dados['senha_erro'] = 'Preencha o campo senha';
                endif;

            else :

                if ($this->gerenciarUsuarioModel->armazenar($dados)) :
                    Sessao::mensagem('gerenciar_usuarios', 'Cadastro realizado com sucesso');
                    URL::redirecionar('gerenciar_usuarios/index');
                else :
                    die("Erro ao armazenar usuario no banco de dados");
                endif;

            endif;
        else :
            $dados = [
                'nome' => '',
                'email' => '',
                'senha' => '',
                'confirma_senha' => '',
                'nome_erro' => '',
                'email_erro' => '',
                'senha_erro' => '',
                'nivel' => '',
            ];

        endif;


        $this->view('gerenciar_usuarios/cadastrar', $dados);
    }

    public function editar($id){

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [
                'id' => $id,
                'nome' => trim($formulario['nome']),
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
                'nivel' => trim($formulario['nivel']),
            ];

            if (in_array("", $formulario)) :

                if (empty($formulario['nome'])) :
                    $dados['nome_erro'] = 'Preencha o campo nome';
                endif;

                if (empty($formulario['email'])) :
                    $dados['email_erro'] = 'Preencha o campo e-mail';
                endif;

                if (empty($formulario['senha'])) :
                    $dados['senha_erro'] = 'Preencha o campo senha';
                endif;

            else :

                if ($this->gerenciarUsuarioModel->atualizar($dados)) :
                    Sessao::mensagem('gerenciar_usuarios', 'Atualização realizada com sucesso');
                    URL::redirecionar('gerenciar_usuarios/index');
                else :
                    die("Erro ao atualizar usuario no banco de dados");
                endif;

            endif;
        else :

            $usuarios = $this->gerenciarUsuarioModel->listarPorId($id);

            $dados = [
                'id' => $id,
                'nome' => $usuarios->nome,
                'email' => $usuarios->email,
                'senha' => $usuarios->senha,
                'nivel' => $usuarios->nivel,
            ];

        endif;


        $this->view('gerenciar_usuarios/editar', $dados);
    }

    public function excluir($id){

        $id = (int) $id;
            

            if ($this->gerenciarUsuarioModel->destruir($id)) :
                Sessao::mensagem('gerenciar_usuarios', 'Exclusão realizada com sucesso');
                URL::redirecionar('gerenciar_usuarios/index');
            else :
                die("Erro ao excluir usuario no banco de dados");
            endif;


        $this->view('gerenciar_usuarios/index', $dados);
    }
}