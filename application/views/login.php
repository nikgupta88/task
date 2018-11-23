<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
--><html>
    <head>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="http://18.222.99.146/task/ci/public/js/login.js"></script>
        <link href="http://18.222.99.146/task/ci/public/css/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

    </head>
    <body>
        <div  ng-app="myApp" ng-controller="myCtrl">

            <div class="container">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div id="signup">   
                        <h1>Sign Up</h1>

                        <form ng-submit="formSubmit()">

                            <div class="top-row">
                                <div class="field-wrap">
                                    <label>
                                        First Name<span class="req">*</span>
                                    </label>
                                    <input type="text" required autocomplete="off"  ng-model="formData.firstName"/>
                                </div>

                                <div class="field-wrap">
                                    <label>
                                        Last Name<span class="req">*</span>
                                    </label>
                                    <input type="text"required autocomplete="off" ng-model="formData.lastName"/>
                                </div>
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Email Address<span class="req">*</span>
                                </label>
                                <input type="email"required autocomplete="off" ng-model="formData.email" />
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Password<span class="req">*</span>
                                </label>
                                <input type="password"required autocomplete="off" ng-model="formData.password">
                            </div>

                            <div class="field-wrap">
                                <label>
                                    confirm pasword <span class="req">*</span>
                                </label>
                                <input type="password"required autocomplete="off" ng-model="formData.confirmPassword" ng-keyup="confirmPasword()">
                            </div>

                            <button type="submit" class="button button-block" />Sign up</button>

                        </form>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div id="login">   
                        <h1>Login</h1>

                        <form ng-submit="login()">

                            <div class="field-wrap">
                                <label>
                                    Email Address<span class="req">*</span>
                                </label>
                                <input type="email"required autocomplete="off" ng-model="formData.emailLogin">
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Password<span class="req">*</span>
                                </label>
                                <input type="password"required autocomplete="off" ng-model="formData.passwordLogin"/>
                            </div>

                            <p class="forgot"><a href="#">Forgot Password?</a></p>

                            <button class="button button-block"/>Log In</button>

                        </form>

                    </div>
                </div>
            </div><!-- tab-content -->

        </div> <!-- /form -->


        <script>
            var app = angular.module('myApp', []);
            app.controller('myCtrl', function ($scope, $http,$window,$location) {
                $scope.formData = {};
                $scope.confirm = false;

                $scope.formSubmit = function () {
                    if ($scope.confirm) {
                        console.log($scope.formData);
                        var url="http://18.222.99.146/task/index.php/login/signup";
                        $http.post(url,$scope.formData).then(function(response){
                            $scope.formData = {};
                            alert('signup successfully');
                        });
                    } else {
                        alert("please enter correct confirm pasword");
                    }
                }
                
                $scope.login = function () {
                        console.log($scope.formData);
                        var url="http://18.222.99.146/task/index.php/login/login";
                        $http.post(url,$scope.formData).then(function(response){
                            console.log(response.data)
                            if(response.data.success){
                                window.location = "http://18.222.99.146/task/index.php/login";
                            }
//                            $scope.formData = {};
//                            alert('signup successfully');
                        });
                }
                
                $scope.confirmPasword = function () {

                    if ($scope.formData.password == $scope.formData.confirmPassword) {
                        $scope.confirm = true;
                    } else {
                        $scope.confirm = false;
                    }
                }
            });
        </script>




    </body>
</html>