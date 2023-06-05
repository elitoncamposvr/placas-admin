<div class="content">
	<div class="breadcrumb">
		<h2>Despachantes</h2>
	</div>

	<div class="menu-data">
		<div class="menu_data--left">
			<div>
				<a class="btn btn--data-menu" href="<?php echo BASE_URL; ?>dispatchers/create"><i class="fa-solid fa-plus"></i> Novo</a>
			</div>
		</div>
		<div class="menu_data--right">
			<form class="form-search-right" method="post" action="<?php echo BASE_URL; ?>dispatchers/search">
				<span class="mb-2 w-100">
					<input type="text" class="w-100" name="dispatchers_search" id="dispatchers_search" placeholder="Pesquisar Despachante" required>
				</span>
			</form>
		</div>
	</div>

	<!-- Cabeçalho da Tabela (Table Header) -->
	<?php if ($dispatchers) : ?>
		<div class="table-header">
			<div class="w-2/12">Nome do Despachante</div>
			<div class="w-3/12">Razão Social</div>
			<div class="w-2/12">Telefone</div>
			<div class="w-2/12">Celular</div>
			<div class="w-2/12">E-mail</div>
			<div class="w-1/12"></div>
		</div>


		<!-- Dados da Tabela (Table Data) -->
		<?php foreach ($dispatchers as $disp) : ?>
			<div class="table-data">
				<div class="w-2/12"><?php echo $disp['company_name']; ?></div>
				<div class="w-3/12"><?php echo $disp['social_reason']; ?></div>
				<div class="w-2/12"><?php echo $disp['phone']; ?></div>
				<div class="w-2/12"><?php echo $disp['mobile_phone']; ?></div>
				<div class="w-2/12"><?php echo $disp['email']; ?></div>
				<div class="w-1/12 text-right">
					<div class="text-sky-950">
						<a class="mx-2" href="<?php echo BASE_URL; ?>dispatchers/update/<?php echo $disp['id']; ?>"><i class="fas fa-edit"></i></a>
						<a href="<?php echo BASE_URL; ?>dispatchers/destroy/<?php echo $disp['id']; ?>" onclick="return confirm('Deseja realmente excluir?')"><i class="fas fa-trash-alt"></i></a>
						</ul>
					</div>
				</div>
			</div>
</div>
<?php endforeach; ?>

<!-- <?php if ($p_count > 1) { ?>
	<div class="pagination">
		<a class="pag_item" href="<?php echo BASE_URL; ?>students?p=1">Primeira</a>
		<?php
			for ($q = $p - 5; $q <= $p - 1; $q++) {
				if ($q >= 1) { ?>
				<a class="pag_item" href="<?php echo BASE_URL; ?>students?p=<?php echo $q; ?>"><?php echo $q; ?></a>
		<?php }
			} ?>
		<div class="pag_item pag_active"><?php echo "$q"; ?></div>
		<?php for ($q = $p + 1; $q <= $p + 5; $q++) {
				if ($q <= $p_count) { ?>
				<a class="pag_item" href="<?php echo BASE_URL; ?>students?p=<?php echo $q; ?>"><?php echo $q; ?></a>
		<?php }
			}
		?>
		<a class="pag_item" href="<?php echo BASE_URL; ?>students?p=<?php echo $p_count; ?>">Última</a>
	</div>

<?php } ?> -->

<?php else : ?>
	<div class="flash_info my-x">
		<p><i class="fas fa-exclamation-circle fa-2x px"></i></p><span>Nenhum registro encontrado!</span>
	</div>
<?php endif; ?>
</div>

<!-- Script Dropdown Itens -->
<script src="<?php echo BASE_URL; ?>assets/js/dropdown_itens.js"></script>