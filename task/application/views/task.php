<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="http://localhost/ci/public/js/login.js"></script>
        <link href="http://localhost/ci/public/css/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    </head>
    <body>
        <div  ng-app="myApp" ng-controller="myCtrl" ng-cloak>

            <div class="container">
                <div class="row" style="margin-top: 20px">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="table-responsive" ng-cloak="" >
                            <table class="table table-striped" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>father name</th>
                                        <th>Email</th>
                                        <th>contact</th>
                                        <th>edit</th>
                                        <th>delete</th>
                                    </tr>
                                </thead>
                                <tbody id="club-data">
                                    <tr ng-repeat="item in items">
                                        <td>{{item.studentName}}</td>
                                        <td>{{item.fatherName}}</td>
                                        <td>{{item.email}}</td>
                                        <td>{{item.contact}}</td>
                                        <td ng-click="edit(item)" style="cursor: pointer;"> edit</td>
                                        <td ng-click="delete(item)" style="cursor: pointer;"> delete</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <center> Insert student data
                            <form ng-submit="postData()">
                                Student Name: <input type="text" required ng-model="student.studentName"><br><br>
                                Father Name: <input type="text" required ng-model="student.fatherName"><br><br>
                                Email: <input type="email" required ng-model="student.email"><br><br>
                                Contact: <input type="text" required ng-model="student.contact"><br><br>
                                <input type="hidden" ng-model="student.id">
                                <button class="button button-block"/>{{submitButton}}</button><br><br>
                            </form>
                        </center>
                    </div>
                </div>

                <div class="row">
                </div>
            </div>
        </div>

        <script>
            var app = angular.module('myApp', []);
            app.controller('myCtrl', function ($scope, $http, $window, $location) {
                $scope.student = {};
                $scope.items = {};
                $scope.submitButton = 'submit';
                $scope.getData = function () {
                    $http.get('http://18.222.99.146/task/task/index.php/login/getAllData').then(function (response) {
                        $scope.items = response.data;
                    });
                }

                $scope.postData = function () {
                    var url = "http://18.222.99.146/task/task/index.php/login/postStudentData";
                    $http.post(url, $scope.student).then(function (response) {
                        $scope.student = {};
                        $scope.submitButton = 'submit';
                        $scope.getData();

                    });
                }

                $scope.edit = function (data) {
                    $scope.submitButton = 'update';
                    $scope.student = data;
                }

                $scope.delete = function (data) {
                    var url = 'http://18.222.99.146/task/task/index.php/login/delete?id=' + data.id;
                    $http.get(url).then(function (response) {
                        $scope.getData();
                        alert('Deleted Successfully');
                    });
                }

                $scope.getData();
            });
        </script>
    </body>
</html>
