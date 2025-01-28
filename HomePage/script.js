function loadContent(page) {
    const contentDiv = document.getElementById('dynamic-content');
    // Limpa o conteúdo atual enquanto carrega
    contentDiv.innerHTML = '<p>Carregando...</p>';

    // Carrega o novo conteúdo
    fetch(page)
        .then(response => {
            if (!response.ok) throw new Error(`Erro ao carregar ${page}`);
            return response.text();
        })
        .then(html => {
            contentDiv.innerHTML = html;
        })
        .catch(error => {
            contentDiv.innerHTML = `<p>Erro: ${error.message}</p>`;
        });
}
