<div class="breadcrumb">
	<div class="breadcrumb-title">
		<span>Despachantes</span>
		<i class="fa-solid fa-angle-right breadcrumb-icon"></i>
		<span>Resultado da Pesquisa</span>
	</div>
	<span>
		<a href="<?php echo BASE_URL; ?>dispatchers">Voltar</a>
	</span>
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
				<input type="text" class="w-100" name="search" id="search" placeholder="Pesquisar Despachante" required>
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
	<?php endforeach; ?>

<?php else : ?>
	<div class="flash-info">
		<p><i class="fas fa-exclamation-circle fa-2x px text-sky-700 px-2"></i></p><span> Nenhum registro encontrado!</span>
	</div>
<?php endif; ?>