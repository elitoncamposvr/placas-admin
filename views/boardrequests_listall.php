<div class="breadcrumb">
    <div class="breadcrumb-title">
        <span>Solicitações</span>
        <i class="fa-solid fa-angle-right breadcrumb-icon"></i>
        <span>Visualizar Todas</span>
    </div>
    <span>
        <a href="<?php echo BASE_URL; ?>boardrequests">Voltar</a>
    </span>
</div>


<div class="menu-data">
    <span>
    
    </span>
    <div class="w-1/4">
        <form class="form-search-right" method="post" action="<?php echo BASE_URL; ?>boardrequests/search">
            <span class="mb-2 w-100">
                <input type="text" class="w-full" name="search" id="search" minlength="2" placeholder="Pesquisar Solicitação" required>
            </span>
            <p class="text-xs font-medium text-slate-600">* Pesquise por PLACA, NOME ou CPF</p>
        </form>
    </div>
</div>

<?php if ($requests_list) : ?>
    <div class="table-header">
        <div class="w-1/12">Número</div>
        <div class="w-1/12">Placa</div>
        <div class="w-2/12">Nome</div>
        <div class="w-1/12">Data</div>
        <div class="w-2/12">CPF</div>
        <div class="w-2/12">Telefone</div>
        <div class="w-1/12 text-center">Tipo</div>
        <div class="w-1/12 text-center">Status</div>
        <div class="w-1/12 text-right">Ação</div>
    </div>

    <?php foreach ($requests_list as $rl) : ?>
        <div class="table-data hover:bg-slate-100">
            <div class="w-1/12">
                <?php echo $rl['id']; ?>
            </div>
            <div class="w-1/12">
                <?php echo $rl['license_plate']; ?>
            </div>
            <div class="w-2/12">
                <?php echo $rl['license_name']; ?>
            </div>
            <div class="w-1/12">
                <?php echo date('d/m/Y', strtotime($rl['request_date'])); ?>
            </div>
            <div class="w-2/12">
                <?php echo $rl['cpf']; ?>
            </div>
            <div class="w-2/12">
                <?php echo $rl['phone']; ?>
            </div>
            <div class="w-1/12">
                <?php
                $types = $rl['plate_type'];
                $plate_type = match ($types) {
                    1 => 'Moto',
                    2 => 'Carro Diant.',
                    3 => 'Carro Tras.',
                    4 => 'Carro Ambas',
                };
                echo ($plate_type);
                ?>
            </div>
            <div class="w-1/12">
                <?php
                $status = match ($rl['status']) {
                    1 => '<div class="badge badge-pending">Pendente</div>',
                    2 => '<div class="badge badge-progress">Em Andamento</div>',
                    3 => '<div class="badge badge-success">Concluído</div>',
                    4 => '<div class="badge badge-canceled">Cancelado</div>',
                    5 => '<div class="badge badge-success">Entregue</div>',
                };
                echo ($status);
                ?>
            </div>
            <div class="w-1/12 text-right">
                <a href="<?php echo BASE_URL; ?>boardrequests/show/<?php echo $rl['id']; ?>">
                    <i class="fa-solid fa-up-right-from-square"></i>
                </a>

            </div>
        </div>
    <?php endforeach; ?>

    <div class="table-line justify-center py-3">
        <span class="font-semibold px-1">Total:</span> <?php echo $requests_count; ?>
    </div>

    <?php if ($p_count > 1) { ?>
		<div class="pagination">
			<a class="pagination-item hover:pagination-active" href="<?php echo BASE_URL; ?>boardrequests/listall?p=1">Primeira</a>
			<?php
			for ($q = $p - 5; $q <= $p - 1; $q++) {
				if ($q >= 1) { ?>
					<a class="pagination-item hover:pagination-active" href="<?php echo BASE_URL; ?>boardrequests/listall?p=<?php echo $q; ?>"><?php echo $q; ?></a>
			<?php }
			} ?>
			<div class="pagination-item pagination-active "><?php echo "$q"; ?></div>
			<?php for ($q = $p + 1; $q <= $p + 5; $q++) {
				if ($q <= $p_count) { ?>
					<a class="pagination-item hover:pagination-active" href="<?php echo BASE_URL; ?>boardrequests/listall?p=<?php echo $q; ?>"><?php echo $q; ?></a>
			<?php }
			}
			?>
			<a class="pagination-item hover:pagination-active" href="<?php echo BASE_URL; ?>boardrequests/listall?p=<?php echo $p_count; ?>">Última</a>
		</div>
	<?php } ?>


<?php else : ?>
    <div class="flash-info">
        <p><i class="fas fa-exclamation-circle fa-2x text-sky-700 px-1"></i></p><span>Nenhum registro encontrado!</span>
    </div>
<?php endif; ?>