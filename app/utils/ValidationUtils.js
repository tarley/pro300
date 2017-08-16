function ValidationUtils() {

    this.configValidation = function(formID, obj) {
        $(document).ready(function() {
            obj.debug = true;
            obj.errorElement = 'div';
            obj.errorPlacement = function(error, element) {
                error.insertAfter(element);
                $(error).addClass('erro');
            };
            obj.errorClass = 'invalid';
            obj.validClass = 'valid';
            obj.highlight = function(element, errorClass, validClass) {
                $(element).addClass('invalid').removeClass('');
            };
            obj.unhighlight = function(element, errorClass, validClass) {
                $(element).removeClass(errorClass).addClass(validClass);
            };

            $('#' + formID).validate(obj);
        });
    }
}
