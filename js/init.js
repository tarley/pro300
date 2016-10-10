var tarefa = new tarefa();
var tblTarefa = $("#tblTarefa");
var btnCadastrarTarefa = $("#btnCadastrarTarefa");
var btnAlterarTarefa = $("#btnAlterarTarefa");

(function($){
  $(function(){
      $('.modal-trigger').leanModal();
      
      tarefa.listarTarefas(tblTarefa.find("tbody"));


      btnCadastrarTarefa.click(function(){
        tarefa.inserir($("#formCadastro"));
      });
      
      btnAlterarTarefa.click(function(){
        tarefa.executaAlteracao($("#formAlteracao"));
      });
  }); // end of document ready
})(jQuery); // end of jQuery name space