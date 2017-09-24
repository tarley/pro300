function StringUtils() {
    this.isNullOrEmpty = function(value) {
        if(typeof value === 'string')
            return value == undefined || value == null || value.trim().length == 0;
        else
            return value == undefined || value == null;
    }
    
    this.isNotNullOrEmpty = function(value) {
        return !this.isNullOrEmpty(value);
    }
    
    this.isNumber = function(value) {
        return this.isNotNullOrEmpty(value) && /^\d+$/.test(value);
    }
    
    this.isNotNumber = function(value) {
        return !this.isNumber(value);
    }
    
    this.formatarTelefone = function(value) {
        if(this.isNullOrEmpty(value))
            return "";
        
        if(value.trim().length == 11)
            return '(' + value.substr(0, 2) + ') ' + value.substring(2, 7) + 
                    '-' + value.substring(7, 11);
        else
            return '(' + value.substr(0, 2) + ') ' + value.substring(2, 6) + 
                    '-' + value.substring(6, 10);
    }
}