<div class="col-xl-4 col-md-6 mx-auto p-5">
    <div class="card">
        <div class="card-header bg-secondary text-white">
            Cadastrar Usuário
        </div>
        <div class="card-body">
            <form name="cadastrarGerenciar" method="POST" action="<?= URL ?>/gerenciar_usuarios/cadastrar" class="mt-4">
                <div class="form-group">
                    <label for="nome">Nome: <sup class="text-danger">*</sup></label>
                    <input type="text" name="nome" id="nome" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">E-mail: <sup class="text-danger">*</sup></label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="senha">Senha: <sup class="text-danger">*</sup></label>
                    <input type="password" name="senha" id="senha" class="form-control">
                </div>
                <div class="form-group">
                    <label for="senha">Nível: <sup class="text-danger">*</sup></label>
                    <select class="form-control" name="nivel" id="nivel">
                      <option value="1">Administrador Geral</option>
                      <option value="2">Administração</option>
                      <option value="3">Funcionário</option>
                      <option value="4">Jornal</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <input type="submit" value="Cadastrar" class="btn btn-info btn-block">
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>