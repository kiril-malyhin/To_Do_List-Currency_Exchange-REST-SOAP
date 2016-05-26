'use strict';

app.controller("todoCtrl", function($scope, $http, $state, $timeout,Alertify,$uibModal) {

    var getAll = function(){
        $http.post('index.php?r=site/get_all_items').success(function(response){
            $scope.tasks = response;
        });
    };

    getAll();

    $scope.openTask = function(taskInfo){
        $uibModal.open({

            templateUrl: 'templates/site/task.html',
            controller: function ($scope, $uibModalInstance,taskId,taskName,taskDescription,taskDate) {

                $scope.taskInfo = {
                    taskName: taskName,
                    taskDescription: taskDescription,
                    taskDate: taskDate
                };

                $scope.deleteTask = function () {

                    var data = {
                        taskId: taskId,
                        taskName: $scope.taskInfo.taskName,
                        taskDescription: $scope.taskInfo.taskDescription,
                        taskDate: new Date()
                    };

                    alertify.confirm("Do You really want to delete this task?", function (e) {
                        if (e) {
                            $http.post('index.php?r=site/delete_task',data).success(function(response){

                                if(JSON.parse(response) != "bad"){
                                    $scope.autoClose();
                                    Alertify.success('Task successfully deleted!');
                                    getAll();
                                }
                            }).error(function(error){
                                console.error(error);
                            });
                        } else {
                            Alertify.error("Task was not deleted!");
                        }
                    });
                };

                $scope.updateTask = function (){
                    var data = {
                        taskId: taskId,
                        taskName: $scope.taskInfo.taskName,
                        taskDescription: $scope.taskInfo.taskDescription,
                        taskDate: new Date()
                    };

                    alertify.confirm("Update this task?", function (e) {
                        if (e) {
                            $http.post('index.php?r=site/update_task',data).success(function(response){

                                if(JSON.parse(response) != "bad"){
                                    $scope.autoClose();
                                    Alertify.success('Task successfully updated!');
                                    getAll();
                                }
                            }).error(function(error){
                                console.error(error);
                            });
                        } else {
                            Alertify.error("Task was not updated!");
                        }
                    });
                };

                $scope.autoClose = function () {
                    $uibModalInstance.dismiss('Cancel');
                };


            },
            size: 'sm',
            resolve:{
                taskId: function () {
                    return taskInfo.item_id;
                },
                taskName: function () {
                    return taskInfo.item_name;
                },
                taskDescription: function () {
                    return taskInfo.item_description;
                },
                taskDate: function () {
                    return taskInfo.item_data_create;
                }
            }
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

                            Alertify.success('Task successfully added!');
                            getAll();
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
