var App = angular.module(
    'main_app',
    [
        'ngMaterial',
        'ngMdIcons'
    ]
);

App.controller(
    'Controller',
    [
        '$scope',
        '$http',
        'filterFilter',
        '$mdDialog',
        '$mdMedia',
        '$mdToast',
        '$timeout',
        '$mdSidenav',
        '$element',
        createController
    ]
);


function createController(
    $scope,
    $http,
    filterFilter,
    $mdDialog,
    $mdMedia,
    $mdToast,
    $timeout,
    $mdSidenav,
    $element
) {
    $scope.arrHistoricoRecente = [];
    $scope.arrLabels = [];
var imagePath = 1;

    $scope.phones = [
      {
        type: 'Home',
        number: '(555) 251-1234',
        who: '(555) 251-1234',
        options: {
          icon: 'communication:phone'
        }
      },
      {
        type: 'Cell',
        number: '(555) 786-9841',
        who: '(555) 786-9841',
        options: {
          icon: 'communication:phone',
          avatarIcon: true
        }
      },
      {
        type: 'Office',
        number: '(555) 314-1592',
        options: {
          face : imagePath
        }
      },
      {
        type: 'Offset',
        number: '(555) 192-2010',
        options: {
          offset: true,
          actionIcon: 'communication:phone'
        }
      }
    ];
    $scope.todos = [
      {
        face : imagePath,
        what: 'Brunch this weekend?',
        who: 'Min Li Chan',
        when: '3:08PM',
        notes: " I'll be in your neighborhood doing errands"
      },
      {
        face : imagePath,
        what: 'Brunch this weekend?',
        who: 'Min Li Chan',
        when: '3:08PM',
        notes: " I'll be in your neighborhood doing errands"
      },
      {
        face : imagePath,
        what: 'Brunch this weekend?',
        who: 'Min Li Chan',
        when: '3:08PM',
        notes: " I'll be in your neighborhood doing errands"
      },
      {
        face : imagePath,
        what: 'Brunch this weekend?',
        who: 'Min Li Chan',
        when: '3:08PM',
        notes: " I'll be in your neighborhood doing errands"
      },
      {
        face : imagePath,
        what: 'Brunch this weekend?',
        who: 'Min Li Chan',
        when: '3:08PM',
        notes: " I'll be in your neighborhood doing errands"
      },
    ];


}
