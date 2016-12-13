function index(req, res) {
    res.render(
        'fluxo_lista', {
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

module.exports = index;