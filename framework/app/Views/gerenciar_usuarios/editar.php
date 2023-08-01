<div class="col-xl-4 col-md-6 mx-auto p-5">
    <div class="card">
        <div class="card-header bg-secondary text-white">
            Editar Usuário
        </div>
        <div class="card-body">
            <form name="editar" method="POST" action="<?= URL ?>/gerenciar_usuarios/editar/<?= $dados['id'] ?>" class="mt-4">
                <div class="form-group">
                    <label for="nome">Nome: <sup class="text-danger">*</sup></label>
                    <input type="text" name="nome" id="nome" value="<?= $dados['nome'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">E-mail: <sup class="text-danger">*</sup></label>
                    <input type="text" name="email" id="email" value="<?= $dados['email'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="senha">Nível: <sup class="text-danger">*</sup></label>
                    <select class="form-control" name="nivel" id="nivel">
                      <option value="1" <?php if($dados['nivel'] == '1'){ echo 'selected'; } ?>>Administrador Geral</option>
                      <option value="2" <?php if($dados['nivel'] == '2'){ echo 'selected'; } ?>>Administração</option>
                      <option value="3" <?php if($dados['nivel'] == '3'){ echo 'selected'; } ?>>Funcionário</option>
                      <option value="4" <?php if($dados['nivel'] == '4'){ echo 'selected'; } ?>>Jornal</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <input type="submit" value="Atualizar" class="btn btn-info btn-block">
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>