
<div class="container" ng-controller="todoCtrl">
    <div class="row" style="padding-top: 4%; padding-bottom: 8%">
        <div class="name-style content-block center-block label-pos-list" >
                <span style="font-size: 60px">To Do List</span>
                <i style="color: #060e80; background-color: white; cursor: pointer" class="fa fa-plus-circle" ng-click="openAdd()"
                   tooltip-placement="right" uib-tooltip="Add Task">
                </i>
        </div>
        <div class="hr-black"></div>

        <div ng-if="!tasks || tasks.length < 1" style="font-size: 40px;text-align: center">
            No tasks found.
        </div>
            <div class="col-sm-3" ng-repeat="task in tasks" style="padding-bottom: 10px;">
                <div class="card text-xs-center" style="cursor: pointer; border: 1px solid black; border-radius: 5px" ng-click="openTask(task)">
                    <div class="card-header" style="background-color: #0000aa">
                        <span style="font-size: 20px; color: white">{{task.item_name}}</span><div class="pull-right"></div>
                    </div>
                    <div class="card-block">
                        <label style="font-size: 16px">Description:</label>
                        <textarea class="description" disabled="disabled"  rows="3" >{{task.item_description}}</textarea>
                    </div>
                    <div class="card-footer" style="background-color: #dfdad8">
                        Created at: {{task.item_data_create | date:'short'}}
                    </div>
                </div>
            </div>

    </div>
</div>