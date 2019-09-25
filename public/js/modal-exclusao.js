function setaDadosModal(id,nome,rotaExclusao) {
    document.querySelector('#textoModal').innerHTML = "Deseja excluir a categoria " + nome + "?";
    document.querySelector('#link-exclusao').href = rotaExclusao + id;
}