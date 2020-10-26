$(".cep").blur(function() {
    $("#loader").show();
    //Nova variável "cep" somente com dígitos.
    var cep = $(this).val().replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            $(".endereco").fadeIn();
            $(".rua").val("...");
            $(".bairro").val("...");
            $(".cidade").val("...");
            $(".estado").val("...");

            //Consulta o webservice viacep.com.br/
            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                if (!("erro" in dados)) {
                    //Atualiza os campos com os valores da consulta.
                    $(".rua").val(dados.logradouro);
                    $(".bairro").val(dados.bairro);
                    $(".cidade").val(dados.localidade);
                    $(".estado").val(dados.uf);
                }
            });
        } 
        $("#loader").hide();
        $("#numero").focus();
        
    }
    else {
        $("#loader").hide();
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Insira um CEP para buscar o seu endereço'                            
        });
    }
});