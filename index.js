// requires
var express = require('express');
var mustacheExpress = require('mustache-express');


// objetos do app
var app = express();


// configura o express
app.engine('html', mustacheExpress());
app.set('view engine', 'html');
app.set('views', 'public/views');
app.use(
    express.static(__dirname + '/public')
);


// app
var nr_porta = 3001;

app.get('/', require('./src/rotas/fluxo_lista.js'));
app.get('/fluxo/executa', require('./src/rotas/fluxo_executa.js'));
app.get('/fluxo/final', require('./src/rotas/fluxo_final.js'));

// inicia o serviço
app.listen(nr_porta, function () {
  console.log('Servidor na porta: ' + nr_porta);
});

module.exports = app;