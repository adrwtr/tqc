var objApplication = angular.module(
    'Application',
    []
);

objApplication.controller(
    'visualizarProcessoController',
    function ($scope, $http) {

        $scope.ds_nome = '';
        $scope.ds_descricao = '';

        $scope.editarProcesso = function(cd_processo)
        {
            document.location = './formulario?cd_processo=' + cd_processo;
        }

        $scope.excluirProcesso = function(cd_processo)
        {
            var sn_excluir = confirm(
                'O processo e as atividades serão excluidos. Confirmar?'
            );

            if (sn_excluir == true) {
                document.location = './excluir?cd_processo=' + cd_processo;
            }
        }

        $scope.voltar = function()
        {
            document.location = '../processos';
        }

        $scope.novaAtividade = function(cd_processo)
        {
            document.location = '../atividades/formulario?cd_processo=' + cd_processo;
        }



        $('[data-toggle="tooltip"]').tooltip();

    }
);