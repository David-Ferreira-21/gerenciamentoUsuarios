<div class="container py-5">
    <div class="row">
        <div class="col-md-10">
            <h3>Gerenciador de Usuários</h3>
        </div>
        <div class="col-md-2">
            <a href="<?= URL ?>/gerenciar_usuarios/cadastrar" class="btn btn-primary">Cadastrar Usuário</a>
        </div>
        <?= Sessao::mensagem('gerenciar_usuarios') ?>
    </div>
    <table class="table table-hover">
      <thead class="table-dark">
        <tr>
          <th scope="col">Cod</th>
          <th scope="col">Nome</th>
          <th scope="col">Email</th>
          <th scope="col">Ação</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($dados['usuarios'] as $usuarios): ?>
        <tr>
          <th scope="row"><?= $usuarios->id ?></th>
          <td><?= $usuarios->nome ?></td>
          <td><?= $usuarios->email ?></td>
          <td>
            <div class="row">
              <a href="<?= URL ?>/gerenciar_usuarios/editar/<?= $usuarios->id ?>" class="btn btn-warning mr-2">Editar</a>
              <form name="excluir" method="POST" action="<?= URL . '/gerenciar_usuarios/excluir/' . $usuarios->id ?>">
                <input type="submit" value="Excluir" class="btn btn-danger">
              </form>
            </div>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
</div>