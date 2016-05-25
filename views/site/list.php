
<div class="container" ng-controller="todoCtrl">
    <div class="row" style="padding-top: 4%; padding-bottom: 8%">
        <div class="name-style content-block center-block label-pos-list" >
                <span style="font-size: 60px">To Do List</span>
                <i style="color: #060e80; background-color: white;" class="fa fa-plus-circle" ng-click="openAdd()"
                   tooltip-placement="right" uib-tooltip="Add Task">
                </i>
        </div>
        <div class="hr-black"></div>
            <div class="col-sm-3" ng-repeat="task in tasks">
                <div class="card text-xs-center">
                    <div class="card-header">
                        {{task.item_name}}
                    </div>
                    <div class="card-block">
                        <h4 class="card-title">Special title treatment</h4>
                        <p class="card-text">{{task.item_description}}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    <div class="card-footer text-muted">
                        {{task.item_data_create}}
                    </div>
                </div>
            </div>

    </div>
</div>