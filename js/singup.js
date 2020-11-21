// $("#signup-btn").click(
// function showSuccess(success) {

//     const successDiv = document.createElement("div");

//     const card = document.querySelector(".card");
//     const heading = document.querySelector(".heading");

//     successDiv.className = "alert alert-success";

//     successDiv.appendChild(document.createTextNode(success));

//     card.insertBefore(successDiv, heading);
//     setTimeout(clearSuccess, 2500);

//     function clearSuccess() {
//     document.querySelector(".alert").remove();
// }});

// VALIDATION SYSTEM FOR STRONG PASSWORDS

var pwdGlobal;
function passwordRepeatValidation(pwdRepeat) {
  let pwdRepeatMsg = document.querySelector(".pwd-repeat-msg");
  let pwdRepeatCheck = document.querySelector(".pwd-repeat-msg");
  if (pwdGlobal === pwdRepeat) {
    pwdStrength = "<strong>A senha confere.</strong>";
    color = "#28a745";
    document.getElementById("signup-btn").disabled = false;
    pwdRepeatMsg.innerHTML = pwdStrength;
    pwdRepeatCheck.style.color = color;
  } else {
    pwdStrength = "<strong>A senha não confere.</strong>";
    color = "#dc3545";
    document.getElementById("signup-btn").disabled = true;
    pwdRepeatMsg.innerHTML = pwdStrength;
    pwdRepeatCheck.style.color = color;
  }
}

function passwordValidation(password) {
  console.log(password);

  let passwordMessage = document.querySelector(".pwd-msg");
  let passwordStrength = document.querySelector(".pwd-msg");

  // WHEN THE PASSWORD LEGNTH IS ZERO, SHOW NOTHING
  if ((password.length = 0)) {
    passwordMessage = "";
  }

  // ARRAY WITH THE POSSIBLE CHARACTERS
  let possibleCharArr = new Array();
  possibleCharArr.push("[$@$!%*#?&]"); // SPECIAL CHARACTERS
  possibleCharArr.push("[A-Z]"); // UPPERCASE
  possibleCharArr.push("[0-9]"); // NUMBERS
  possibleCharArr.push("[a-z]"); // LOWERCASE

  // CHECK THE CHARACTERS
  let checker = 0;
  for (let i = 0; i < possibleCharArr.length; i++) {
    if (new RegExp(possibleCharArr[i]).test(password)) {
      checker++;
    }
  }
  // CHECK PASSWORD SIZE
  if (checker > 2 && password.lenght > 6) {
    checker++;
  }

  // MESSAGE CONDITIONS
  let color = "";
  let pwdStrength = "";
  if (checker === 0 || password.length < 6) {
    document.getElementById("signup-btn").disabled = true;
    pwdStrength =
      "<span style='font-style: italic;'>A senha precisa conter pelo menos 6 caracteres (letras e números).</span>";
  } else if (checker === 1 && checker < 2 && password.length >= 6) {
    pwdStrength = "<strong>Senha fraca.</strong>";
    color = "#dc3545";
    document.getElementById("signup-btn").disabled = true;
  } else if (checker === 2 && checker < 3 && password.length > 6) {
    pwdStrength = "<strong>Senha razoável.</strong>";
    color = "#ffc107";
    document.getElementById("signup-btn").disabled = false;
  } else if (checker === 3 && checker < 4 && password.length > 6) {
    pwdStrength = "<strong>Senha forte.</strong>";
    color = "#007bff";
    document.getElementById("signup-btn").disabled = false;
  } else if (checker === 4 && password.length > 6) {
    pwdStrength = "<strong>Senha muito forte</strong>";
    color = "#28a745";
    document.getElementById("signup-btn").disabled = false;
  }
  passwordMessage.innerHTML = pwdStrength;
  passwordStrength.style.color = color;
  pwdGlobal = password;
}

$(document).ready(function () {
  //inserindo mascara nos campos
  $(".cpf").mask("999.999.999-99");
  $(".cep").mask("99999-999");
  $(".celular").mask("(99) 99999-9999");
  $("#signup-form").submit(function () {
    $(".cpf").unmask();
    $(".celular").unmask();
  });

  //trabalhando com o formulario

  let usernameError = false;
  let emailError = false;
  let cpfError = false;
  let signUpErrors = false;

  function errorFunction() {
    if (usernameError || emailError || cpfError) {
      signUpErrors = true;
    } else {
      signUpErrors = false;
    }
  }

  $("input").on("blur", function () {
    let uid = $("#uid").val();
    let cpf = $("#cpf").val();
    let email = $("#mail").val();
    let password = $("#pwd").val();
    cpf = cpf.replace(/\D/g, "");
    if (uid) {
      $.ajax({
        type: "GET",
        url: "includes/signup.inc.php",
        data: { uid: uid },
        success: function (data) {
          $("#error-uid").remove();
          if (data == "0") {
            $(
              "<span id='error-uid' style='color: red'><strong>Este usuário já está cadastrado</strong></span>"
            ).insertAfter($("#uid"));
            usernameError = true;
            errorFunction();
          } else {
            usernameError = false;
            errorFunction();
            $("#error-uid").remove();
          }
          console.log(
            "usernameError is " + usernameError + "",
            " and signupError is " + signUpErrors
          );
          if (signUpErrors != false) {
            document.getElementById("signup-btn").disabled = true;
          } else {
            document.getElementById("signup-btn").disabled = false;
          }
        },
      });
    } else {
    }
    if (email) {
      $.ajax({
        type: "GET",
        url: "includes/signup.inc.php",
        data: { mail: email },
        success: function (data) {
          $("#error-mail").remove();
          if (data == "0") {
            $(
              "<span id='error-mail' style='color: red'><strong>Já existe um funcionário com este email</strong></span>"
            ).insertAfter($("#mail"));
            emailError = true;
            errorFunction();
          } else {
            emailError = false;
            errorFunction();
            $("#error-mail").remove();
          }
          console.log(
            "emailError is " + emailError + "",
            " and signupError is " + signUpErrors
          );
          if (signUpErrors != false) {
            document.getElementById("signup-btn").disabled = true;
          } else {
            document.getElementById("signup-btn").disabled = false;
          }
        },
      });
    }

    if (cpf) {
      $.ajax({
        type: "GET",
        url: "includes/signup.inc.php",
        data: { cpf: cpf },
        success: function (data) {
          $("#error-cpf").remove();

          if (data == "0") {
            $(
              "<span id='error-cpf' style='color: red'><strong>Já existe um funcionário com este CPF</strong></span>"
            ).insertAfter($("#cpf"));
            cpfError = true;
            errorFunction();
          } else {
            cpfError = false;
            errorFunction();
            $("#error-cpf").remove();
          }
          console.log(
            "cpfError is " + cpfError + "",
            " and signupError is " + signUpErrors
          );
          if (signUpErrors != false) {
            document.getElementById("signup-btn").disabled = true;
          } else {
            document.getElementById("signup-btn").disabled = false;
          }
        },
      });
    }
    if (password) {
      $.ajax({
        type: "GET",
        url: "includes/signup.inc.php",
        data: { pwd: password },
        success: function (data) {
          if (data == 0) {
            console.log("senha fraca");
          } else {
            console.log("senha forte");
          }
        },
      });
    }
  });

  $("#signup-btn").submit(function (e) {
    if ((signUpErrors = true)) {
      console.log("Cadastrou direitinho");
    } else {
      console.log("Deu algo errado nesse cadastro ai");
      e.preventDefault();
      return false;
    }
  });

  var total_registros = 0;
  $("#formulario-cadastro").submit(function (e) {
    var id_linha = $("#id_linha").val();
    var nome = $("#nome").val();
    var uid = $("#uid").val();
    var cpf = $("#cpf").val();
    var email = $("#mail").val();
    var celular = $("#celular").val();
    var cep = $("#cep").val();
    var rua = $("#rua").val();
    var numero = $("#numero").val();
    var complemento = $("#complemento").val();
    var bairro = $("#bairro").val();
    var cidade = $("#cidade").val();
    var estado = $("#estado").val();

    //verifica se existe id_linha pare remover antes de inserir
    if (id_linha != "") {
      $("#linha_" + id_linha).remove();
    }

    //monta tr para inserir na tabela
    var html_tabela =
      '<tr id="linha_' +
      total_registros +
      '">' +
      '<td class="nome"> ' +
      nome +
      " </td>" +
      '<td class="cpf"> ' +
      cpf +
      " </td>" +
      '<td class="email"> ' +
      email +
      " </td>" +
      '<td class="celular"> ' +
      celular +
      " </td>" +
      '<td class="cep"> ' +
      cep +
      " </td>" +
      '<td class="rua"> ' +
      rua +
      " </td>" +
      '<td class="numero"> ' +
      numero +
      " </td>" +
      '<td class="complemento"> ' +
      complemento +
      " </td>" +
      '<td class="bairro"> ' +
      bairro +
      " </td>" +
      '<td class="cidade"> ' +
      cidade +
      " </td>" +
      '<td class="estado"> ' +
      estado +
      " </td>" +
      "<td>" +
      '<img src="img/edit.png" width="30" class="editar" id="' +
      total_registros +
      '" />' +
      '<img src="img/remove.png" width="30" class="remover" id="' +
      total_registros +
      '" />' +
      "</td>" +
      "</tr>";

    $("#conteudo-tabela").append(html_tabela);

    total_registros++;

    $("#formulario").fadeOut();
    $("#formulario input").val("");
    $("#tabela").slideDown();

    return false;
  });

  $("#btn-cadastrar-novo").click(function () {
    $("#tabela").slideUp();
    $("#formulario").fadeIn();
  });

  $(document).on("click", ".editar", function () {
    //id da linha
    var id = $(this).attr("id");

    //insere campos
    $("#nome").val(
      $("#linha_" + id)
        .find(".nome")
        .html()
    );
    $("#cpf").val(
      $("#linha_" + id)
        .find(".cpf")
        .html()
    );
    $("#email").val(
      $("#linha_" + id)
        .find(".email")
        .html()
    );
    $("#celular").val(
      $("#linha_" + id)
        .find(".celular")
        .html()
    );
    $("#cep").val(
      $("#linha_" + id)
        .find(".cep")
        .html()
    );
    $("#rua").val(
      $("#linha_" + id)
        .find(".rua")
        .html()
    );
    $("#numero").val(
      $("#linha_" + id)
        .find(".numero")
        .html()
    );
    $("#complemento").val(
      $("#linha_" + id)
        .find(".complemento")
        .html()
    );
    $("#bairro").val(
      $("#linha_" + id)
        .find(".bairro")
        .html()
    );
    $("#cidade").val(
      $("#linha_" + id)
        .find(".cidade")
        .html()
    );
    $("#estado").val(
      $("#linha_" + id)
        .find(".estado")
        .html()
    );

    $("#id_linha").val(id);
    $("#tabela").slideUp();
    $("#formulario").fadeIn();
  });

  $(document).on("click", ".remover", function () {
    //id da linha
    var id = $(this).attr("id");

    Swal.fire({
      title: "Espere!",
      text: "Tem certeza que deseja remover este registro?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Sim, quero apagar!",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.value) {
        $("#linha_" + id).fadeOut();
        $("#linha_" + id).remove();
      }
    });
  });

  $(document).on("click", "#remover-tarefa", function () {
    Swal.fire({
      title: "Espere!",
      text: "Tem certeza que deseja deletar esta tarefa?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Sim, quero apagar!",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        $("#remover-tarefa").removeAttr("onclick");
        $("#remover-tarefa").click();
        Swal.fire("Deletado!", "Sua tarefa foi deletada com ", "sucesso!");
      }
    });
  });

  $("#btn-enviar-ajax").click(function () {
    $.ajax({
      type: "post",
      url: "ajax.php",
      data: {
        nomeMarcelo: "Marcelo Augusto Souza Rocha",
        nomeJhonatan: "Jhonatan Junio KBCA",
        nomeBruno: "Bruno Santos da Fonseca",
      },
      beforeSend: function (data) {
        $("#loader").show();
      },
      success: function (data) {
        $("#conteudo-ajax").html(data);

        /*if(data == 'teste_php'){
                  $("#conteudo-ajax").html('<h1> Este é o conteúdo do PHP: '+data+'</h1>');
              }
              else{
                  $("#conteudo-ajax").html('<h1> O conteúdo do PHP não é igual a: teste_php </h1>');
              }*/

        $("#loader").hide();
      },
      error: function (error) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Ocorreu uma falha ao carregar o ajax",
        });
      },
    });
  });

  function validarCPF(cpf) {
    cpf = cpf.replace(/[^\d]+/g, "");
    if (cpf == "") return false;

    // Elimina CPFs invalidos conhecidos
    if (
      cpf.length != 11 ||
      cpf == "00000000000" ||
      cpf == "11111111111" ||
      cpf == "22222222222" ||
      cpf == "33333333333" ||
      cpf == "44444444444" ||
      cpf == "55555555555" ||
      cpf == "66666666666" ||
      cpf == "77777777777" ||
      cpf == "88888888888" ||
      cpf == "99999999999"
    )
      return false;

    // Valida 1o digito
    add = 0;
    for (i = 0; i < 9; i++) add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11) rev = 0;
    if (rev != parseInt(cpf.charAt(9))) return false;

    // Valida 2o digito
    add = 0;
    for (i = 0; i < 10; i++) add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11) rev = 0;
    if (rev != parseInt(cpf.charAt(10))) return false;

    return true;
  }

  $("#cpf").blur(function () {
    var cpf = $(this).val();

    if (!validarCPF(cpf)) {
      Swal.fire({
        title: "Ops!",
        text: "CPF Inválido",
        icon: "error",
        showCancelButton: false,
      });
    }
  });

  $(".userDeleteBtn").click(function () {
    var deleteid = $(this).data('id');

    // alert("click no botão")

    $.ajax({
      url: '../includes/users-processor.inc.php',
      type: 'POST',
      data: { id:deleteid },
      success: function(response){
        if(response == 1){
          alert("alguma coisa");
          window.location.reload();
          // Swal.fire("Deleted!", "Usuário deletado com sucesso.", "success").then(
          //   function () {
              
          //   }
          // );
        } else {
          window.location.reload();
          alert("nada");
          // Swal.fire("Cancelado!", "Usuário Não deletado.", "failed");
        }
      }
      
    
    })

    // Swal.fire({
    //   title: "Você tem certeza?",
    //   text: "Você não será capaz de desfazer essas alterações",
    //   icon: "warning",
    //   showCancelButton: true,
    //   confirmButtonColor: "#3085d6",
    //   cancelButtonColor: "#d33",
    //   confirmButtonText: "Sim, deletar!",
      
    // }).then((result) => {
    //   if (result.isConfirmed) {
        
    //     }
    // });
  });
});

//  https://www.youtube.com/watch?v=-T6nwKoBGNM olhar esse
