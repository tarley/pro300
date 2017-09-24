function ListaUtils() {
    return {
        isNullOrEmpty : function(lista) {
            return lista == undefined || lista == null || lista.length == 0;
        }
    }
}