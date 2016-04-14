var objApplication = angular.module(
    'Application',
    []
);

objApplication.controller(
    'formularioAtividadeController',
    function ($scope, $http) {

        // $scope.ds_nome = '';
        // $scope.ds_descricao = '';

        $scope.enviarForm = function()
        {
            var arrDados = {
                cd_atividade : $scope.cd_atividade,
                cd_processo : $scope.cd_processo,
                ds_descricao : $scope.ds_descricao,
                ds_detalhes : $scope.ds_detalhes,
                nr_ordem : $scope.nr_ordem
            };

            // verifica se login já existe
            $http.post(
                './persistir',
                arrDados
            )
            .success(
                function(data){
                    //console.log(data);
                    document.location = '../processos/visualizar?cd_processo=' + data.cd_processo;
                }
            );
        };

        $scope.voltar = function()
        {
            document.location = '../processos/visualizar?cd_processo=' + $scope.cd_processo;
        };
    }
);

