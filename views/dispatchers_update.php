<div class="breadcrumb">
	<div class="breadcrumb-title">
		<span>Despachantes</span>
		<i class="fa-solid fa-angle-right breadcrumb-icon"></i>
		<span>Editar</span>
	</div>
	<span>
		<a href="<?php echo BASE_URL; ?>dispatchers">Voltar</a>
	</span>
</div>

<div class="table-line justify-end">
	<?php
	if ($dispatchers_info['status'] == '1') {
		echo '<a class="btn-cancel" href="' . BASE_URL . 'dispatchers/block/' . $dispatchers_info['id'];
		echo '"><i class="fa-solid fa-lock"></i> Bloquear</a>';
	}
	?>
	<?php
	if ($dispatchers_info['status'] == '2') {
		echo '<a class="btn-secondary" href="' . BASE_URL . 'dispatchers/unblock/' . $dispatchers_info['id'];
		echo '"><i class="fa-solid fa-unlock"></i> Desbloquear</a>';
	}
	?>

</div>

<form method="post">
	<div class="table-line mb-2.5">
		<div class="w-5/12 pr-1">
			<label for="company_name">Nome da Empresa</label>
			<input type="text" name="company_name" id="company_name" class="w-full" required value="<?php echo $dispatchers_info['company_name']; ?>">
		</div>
		<div class="w-4/12 pr-1">
			<label for="social_reason">Razão Social</label>
			<input type="text" name="social_reason" id="social_reason" class="w-full" value="<?php echo $dispatchers_info['social_reason']; ?>">
		</div>
		<div class="w-3/12">
			<label for="cnpj">CNPJ</label>
			<input type="text" name="cnpj" id="cnpj" class="w-full" value="<?php echo $dispatchers_info['cnpj']; ?>">
		</div>
	</div>

	<div class="table-line mb-2.5">
		<div class="w-1/4 pr-1">
			<label for="email">E-mail</label>
			<input type="text" name="email" id="email" class="w-full" value="<?php echo $dispatchers_info['email']; ?>">
		</div>
		<div class="w-1/4 pr-1">
			<label for="site">Website</label>
			<input type="text" name="site" id="site" class="w-full" value="<?php echo $dispatchers_info['site']; ?>">
		</div>
		<div class="w-1/4 pr-1">
			<label for="phone">Telefone</label>
			<input type="text" name="phone" id="phone" class="w-full" value="<?php echo $dispatchers_info['phone']; ?>">
		</div>
		<div class="w-1/4">
			<label for="mobile_phone">Celular/Whatsapp</label>
			<input type="text" name="mobile_phone" id="mobile_phone" class="w-full" value="<?php echo $dispatchers_info['mobile_phone']; ?>">
		</div>
	</div>

	<h1 class="text-center my-5 border-b border-slate-300">Endereço</h1>

	<div class="table-line mb-2.5">
		<div class="w-1/4 pr-1">
			<label for="address_zipcode">CEP</label>
			<input type="text" name="address_zipcode" id="address_zipcode" onblur="pesquisacep(this.value);" class="w-full" value="<?php echo $dispatchers_info['address_zipcode']; ?>">
		</div>
		<div class="w-2/4 pr-1">
			<label for="address">Endereço</label>
			<input type="text" name="address" id="address" class="w-full" value="<?php echo $dispatchers_info['address']; ?>">
		</div>
		<div class="w-1/4">
			<label for="address_number">Número</label>
			<input type="text" name="address_number" id="address_number" class="w-full" value="<?php echo $dispatchers_info['address_number']; ?>">
		</div>
	</div>

	<div class="table-line mb-2.5">
		<div class="w-4/12 pr-1">
			<label for="address2">Complemento</label>
			<input type="text" name="address2" id="address2" class="w-full" value="<?php echo $dispatchers_info['address2']; ?>">
		</div>
		<div class="w-3/12 pr-1">
			<label for="address_neighb">Bairro</label>
			<input type="text" name="address_neighb" id="address_neighb" class="w-full" value="<?php echo $dispatchers_info['address_neighb']; ?>">
		</div>
		<div class="w-3/12 pr-1">
			<label for="address_city">Cidade</label>
			<input type="text" name="address_city" id="address_city" class="w-full" value="<?php echo $dispatchers_info['address_city']; ?>">
		</div>
		<div class="w-2/12">
			<label for="address_state">Estado</label>
			<input type="text" name="address_state" id="address_state" class="w-full" value="<?php echo $dispatchers_info['address_state']; ?>">
		</div>
	</div>

	<div class="table-line justify-center">
		<button class="btn" type="submit"><i class="fas fa-edit"></i> Editar Despachante</button>
	</div>
</form>

<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/general_mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/cep.js"></script>