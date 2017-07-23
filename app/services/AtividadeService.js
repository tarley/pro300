function AtividadeService(DataService, SelectService) {
    var atividade;

    return {
        setAtividade: function(value) {
            atividade = value;
        },
        getAtividade: function() {
            return atividade;
        },
        configCadastro: function() {
            this.configContadores();
            this.configValidacoes();
            this.configInputs();
            
            DataService.configDatePicker();
            SelectService.configField('#select-curso');
        },
        configContadores: function() {
            $(document).ready(function() {
                $('#input-nome, #text-descricao').characterCounter();
            });
        },
        configValidacoes: function() {
            $(document).ready(function() {

                jQuery.validator.addMethod("beforeTo", function(valueTermino, elementTermino) {
                    var valueInicio = $('#dt-inicio').val();

                    return DataService.isBefore(valueInicio, valueTermino);
                });

                $("#formAtividade").validate({
                    debug: true,
                    rules: {
                        curso: "required",
                        nome: {
                            required: true,
                            maxlength: 100
                        },
                        descricao: {
                            required: true,
                            maxlength: 500
                        },
                        dtInicio: "required",
                        dtTermino: {
                            required: true,
                            beforeTo: "#dt-inicio"
                        }
                    },
                    //For custom messages
                    messages: {
                        curso: "Selecione o curso da atividade",
                        nome: {
                            required: "Informe o nome da atividade.",
                            maxlength: "O nome da atividade não pode conter mais de 100 caracteres."
                        },
                        descricao: {
                            required: "Informe uma descrição para a atividade.",
                            maxlength: 500
                        },
                        dtInicio: "Informe a data de inicio da atividade.",
                        dtTermino: {
                            required: "Informe a data de termino da atividade.",
                            beforeTo: "Data de termino não pode ser menor ou igual a data de inicio."
                        }
                    },
                    errorElement: 'div',
                    errorPlacement: function(error, element) {
                        error.insertAfter(element);
                        $(error).addClass('erro');
                    },
                    errorClass: 'invalid',
                    validClass: 'valid',
                    highlight: function(element, errorClass, validClass) {
                        $(element).addClass('invalid').removeClass('');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).removeClass(errorClass).addClass(validClass);
                    }
                });
            });
        },
        configInputs: function() {
             
        }
    };
}
