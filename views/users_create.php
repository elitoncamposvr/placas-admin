<div class="breadcrumb">
    <div class="breadcrumb-title">
        <span>Usuários</span>
        <i class="fa-solid fa-angle-right breadcrumb-icon"></i>
        <span>Adicionar Usuário</span>
    </div>
    <span>
        <a href="<?php echo BASE_URL; ?>users">Voltar</a>
    </span>
</div>

<?php if (isset($error) && !empty($error)) : ?>
    <div class="warning mb-2.5"><?php echo $error; ?></div>
<?php endif; ?>

<form method="post">
    <div class="table-line mb-4">
        <div class="w-1/2 pr-1">
            <label for="email">E-mail (login)</label>
            <input type="email" name="email" id="email" class="w-full" required>
        </div>
        <div class="w-1/2">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" class="w-full" required>
        </div>
    </div>

    <div class="table-line justify-center">
        <button class="btn" type="submit"><i class="fa-solid fa-plus"></i> Adicionar Usuário</button>
    </div>
</form>