function DataService() {

    this.configDatePicker = function() {
        var currentTime = new Date();

        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year
            currentTime: currentTime,
            monthsFull: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            weekdaysFull: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'],
            weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
            weekdaysLetter: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
            format: 'dd/mm/yyyy',
            today: 'Hoje',
            clear: 'Limpar',
            close: 'Fechar'
        });
    }
    
    this.format = function(data, valorPadrao = '-', formato = 'DD/MM/YYYY') {
        if (data == undefined || data == "" || data == '0000-00-00 00:00:00')
            return valorPadrao;

        return moment(data).format(formato);
    }
    
    this.isBefore = function(valor1, valor2, formato = 'DD/MM/YYYY') {

        if (valor1 == null || valor1.trim().length == 0)
            return true;

        if (valor2 == null || valor2.trim().length == 0)
            return true;

        var data1 = moment(valor1, 'DD/MM/YYYY');
        var data2 = moment(valor2, 'DD/MM/YYYY');

        return data1.isBefore(data2);
    }
}
