function DialogService() {

    var displayLength = 4000;

    return {
        showMessage: function(message, params = []) {
            var template = jQuery.validator.format(message);
            Materialize.toast(template(params), displayLength);
        },
        showResponse: function(response) {
            if (response.data.mensagem)
                this.showMessage(response.data.mensagem);
            else if (response.data)
                console.log(response.data);
            else
                console.log(response);
        },
        showError: function(response) {
            if(response.status == '401')
                console.log("Usuário não possui permissão para acessar o recurso.");
            else
                this.showMessage("{0} - {1}", [response.status, response.statusText]);
        }
    };
}