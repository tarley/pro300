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
}