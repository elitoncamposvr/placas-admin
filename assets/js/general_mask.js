$(function(){

	$('input[id=cpf]').mask('000.000.000-00');
	$('input[id=cnpj]').mask('00.000.000/0000-00');
	$('input[id=phone]').mask('(00)00000-0000');
	$('input[id=mobile_phone]').mask('(00)00000-0000');
	$('input[id=address_zipcode]').mask('00.000-000');
	$('input[id=bank_account]').mask('00000000-0', {reverse:true, placeholder:"000000-0"});

	

});