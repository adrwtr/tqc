function index(req, res) {
    res.render(
        'fluxo_lista', {
            head: {
                title: 'page title 12'
            },
            content: {
                title: 'post title',
                description: 'description'
            }
        }
    );
}

module.exports = index;