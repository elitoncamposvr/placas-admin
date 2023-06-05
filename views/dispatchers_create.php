<div class="breadcrumb">
    <div class="breadcrumb-title">
        <span>Despachantes</span>
        <i class="fa-solid fa-angle-right breadcrumb-icon"></i>
        <span>Adicionar</span>
    </div>
    <span>
        <a href="<?php echo BASE_URL; ?>dispatchers">Voltar</a>
    </span>
</div>
<form method="post">
    <div class="table-line mb-2.5">
        <div class="w-5/12 pr-1">
            <label for="company_name">Nome da Empresa</label>
            <input type="text" name="company_name" id="company_name" class="w-full" required>
        </div>
        <div class="w-4/12 pr-1">
            <label for="social_reason">Razão Social</label>
            <input type="text" name="social_reason" id="social_reason" class="w-full">
        </div>
        <div class="w-3/12">
            <label for="cnpj">CNPJ</label>
            <input type="text" name="cnpj" id="cnpj" class="w-full">
        </div>
    </div>

    <div class="table-line mb-2.5">
        <div class="w-1/4 pr-1">
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email" class="w-full">
        </div>
        <div class="w-1/4 pr-1">
            <label for="site">Website</label>
            <input type="text" name="site" id="site" class="w-full">
        </div>
        <div class="w-1/4 pr-1">
            <label for="phone">Telefone</label>
            <input type="text" name="phone" id="phone" class="w-full">
        </div>
        <div class="w-1/4">
            <label for="mobile_phone">Celular/Whatsapp</label>
            <input type="text" name="mobile_phone" id="mobile_phone" class="w-full">
        </div>
    </div>

    <h1 class="text-center my-5 border-b border-slate-300">Endereço</h1>

    <div class="table-line mb-2.5">
        <div class="w-1/4 pr-1">
            <label for="address_zipcode">CEP</label>
            <input type="text" name="address_zipcode" id="address_zipcode" onblur="pesquisacep(this.value);" class="w-full">
        </div>
        <div class="w-2/4 pr-1">
            <label for="address">Endereço</label>
            <input type="text" name="address" id="address" class="w-full">
        </div>
        <div class="w-1/4">
            <label for="address_number">Número</label>
            <input type="text" name="address_number" id="address_number" class="w-full">
        </div>
    </div>

    <div class="table-line mb-2.5">
        <div class="w-4/12 pr-1">
            <label for="address2">Complemento</label>
            <input type="text" name="address2" id="address2" class="w-full">
        </div>
        <div class="w-3/12 pr-1">
            <label for="address_neighb">Bairro</label>
            <input type="text" name="address_neighb" id="address_neighb" class="w-full">
        </div>
        <div class="w-3/12 pr-1">
            <label for="address_city">Cidade</label>
            <input type="text" name="address_city" id="address_city" class="w-full">
        </div>
        <div class="w-2/12">
            <label for="address_state">Estado</label>
            <input type="text" name="address_state" id="address_state" class="w-full">
        </div>
    </div>

    <div class="table-line justify-center">
        <button class="btn" type="submit"><i class="fa-solid fa-plus"></i> Adicionar Despachante</button>
    </div>
</form>

<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/general_mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/cep.js"></script>