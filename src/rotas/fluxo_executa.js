function fluxo_executa(req, res) {
    res.render(
        'fluxo_executa', {
            head: {
                title: 'page title 1'
            },
            content: {
                title: 'post title',
                description: 'description'
            }
        }
    );
}

module.exports = fluxo_executa;