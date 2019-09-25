function setaDadosModal(id,nome) {
    document.querySelector('#textoModal').innerHTML = "Deseja excluir a categoria " + nome + "?";
    document.querySelector('#link-exclusao').href = "/excluir-categoria?id=" + id;
}