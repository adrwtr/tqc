function index(req, res) {
    res.render(
        'fluxo_final', {
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