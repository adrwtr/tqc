var objApplication = angular.module(
    'Application',
    []
);

objApplication.controller(
    'formularioProcessoController',
    function ($scope, $http) {

        // $scope.ds_nome = '';
        // $scope.ds_descricao = '';

        $scope.enviarForm = function()
        {
            var arrDados = {
                id : $scope.id,
                ds_nome : $scope.ds_nome,
                ds_descricao : $scope.ds_descricao
            };

            // verifica se login já existe
            $http.post(
                './persistir',
                arrDados
            )
            .success(
                function(data){
                    document.location = '../processos';
                }
            );
        }

        $scope.voltar = function()
        {
            document.location = '../processos';
        }
    }
);