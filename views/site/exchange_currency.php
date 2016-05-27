<?php

$this->title = 'Exchange rates';
?>
<div class="container" ng-controller="currencyExchangeCtrl">
    <div class="td-style">
        <div class="name-style content-block center-block label-pos-list" >
            <span class="rates-style">Exchange rates</span>
        </div>
        <div class="hr-black"></div>

        <div class="row ce-style">
            <div class="col-md-6" style="padding-top: 10px">
                <h4><span style="font-size: 25px">Date: </span>{{dt | date:'fullDate' }}</h4>
                <div style="display:inline-block; min-height:290px;">
                    <uib-datepicker ng-model="dt" class="well well-sm" datepicker-options="options"></uib-datepicker>
                </div>
            </div>

            <div class="col-md-6" style="text-align: center">
                <h2>Table with data</h2>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Engine</th>
                        <th>Browser</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 4.0</td>
                    </tr>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.0</td>
                    </tr>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.5</td>
                    </tr>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.5</td>

                    </tr>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.5
                        </td>

                    </tr>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.5</td>
                    </tr>
                    </tbody>
                </table>
            </div>


        </div>

        <div class="hr-lists"></div>
        <div class=" ce-style" style="text-align: center">
            <h1>Graphics dynamic</h1>
        </div>
    </div>
</div>