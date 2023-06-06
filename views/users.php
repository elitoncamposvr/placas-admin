<div class="breadcrumb">
    <div class="breadcrumb-title">
        <span>Usuários</span>
    </div>
</div>

<div class="menu-data">
    <div class="menu_data--left">
        <div>
            <a class="btn btn--data-menu" href="<?php echo BASE_URL; ?>users/create"><i class="fa-solid fa-plus"></i> Novo</a>
        </div>
    </div>
</div>

<!-- Cabeçalho da Tabela (Table Header) -->
<?php if ($users_list) : ?>
    <div class="table-header">
        <div class="w-4/6">E-mail</div>
        <div class="w-1/6">Status</div>
        <div class="w-1/6"></div>
    </div>


    <!-- Dados da Tabela (Table Data) -->
    <?php foreach ($users_list as $users) : ?>
        <div class="table-data">
            <div class="w-4/6"><?php echo $users['email']; ?></div>
            <div class="w-1/6">
                <?php
                $status = match ($users['status']) {
                    1 => '<span class="badge badge-success">Ativo</span>',
                    2 => '<span class="badge badge-canceled">Bloqueado</span>',
                };
                echo ($status);
                ?>
            </div>
            <div class="w-1/6 text-right">
                <div class="text-sky-950">
                    <?php if ($users['status'] == 1) : ?>
                        <a href="<?php echo BASE_URL; ?>users/block/<?php echo $users['id']; ?>" onclick="return confirm('Deseja realmente bloquear usuário?')"><i class="fa-solid fa-lock text-red-600"></i></a>
                    <?php endif; ?>
                    <?php if ($users['status'] == 2) : ?>
                        <a href="<?php echo BASE_URL; ?>users/unblock/<?php echo $users['id']; ?>" onclick="return confirm('Deseja realmente debloquear usuário?')"><i class="fa-solid fa-lock-open text-sky-600"></i></a>
                    <?php endif; ?>
                    <a class="mx-2" href="<?php echo BASE_URL; ?>users/update/<?php echo $users['id']; ?>"><i class="fas fa-edit"></i></a>
                    <a href="<?php echo BASE_URL; ?>users/destroy/<?php echo $users['id']; ?>" onclick="return confirm('Deseja realmente excluir?')"><i class="fas fa-trash-alt"></i></a>
                    </ul>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

<?php else : ?>
    <div class="flash-info">
        <p><i class="fas fa-exclamation-circle fa-2x px"></i></p><span>Nenhum registro encontrado!</span>
    </div>
<?php endif; ?>