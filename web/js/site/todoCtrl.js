'use strict';

app.controller("todoCtrl", function($scope, $http, $state, $timeout,Alertify,$uibModal) {

    $http.post('index.php?r=site/get_all_items').success(function(response){
        //console.log(response);
        $scope.tasks = response;
        });

    $scope.getAll = function(){
        $http.post('index.php?r=site/get_all_items').success(function(response){
            //console.log(response);
            $scope.tasks = response;
        });
    };

    $scope.openAdd = function () {
        $uibModal.open({

            templateUrl: 'templates/site/newTask.html',
            controller: function ($scope, $uibModalInstance) {

                $scope.taskInfo = {
                    taskName: undefined,
                    taskDescription: undefined
                };

                $scope.Cancel = function () {
                    $uibModalInstance.dismiss('Cancel');
                };

                $scope.autoClose = function () {
                    $uibModalInstance.dismiss('Cancel');
                };

                $scope.addTask = function (){
                    var data = {
                        taskName: $scope.taskInfo.taskName,
                        taskDescription: $scope.taskInfo.taskDescription,
                        taskDate: new Date()
                    };

                    $http.post('index.php?r=site/add_task', data).success(function(response){

                        if(JSON.parse(response) != "bad"){

                            $scope.autoClose();

                            Alertify.alert('Task successfully added!');
                            $http.post('index.php?r=site/get_all_items').success(function(response){
                                $scope.tasks = response;
                            });
                        }
                        else {

                            Alertify.error("Error! Task with such name exists!");
                        }
                    }).error(function(error){
                        console.error(error);
                    });
                };
            },
            size: 'sm'
        });
    };
});
