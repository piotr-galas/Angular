var symfonyControllers = angular.module('symfonyControllers', []);


symfonyControllers.controller('LoginCtrl', function ($scope, send, $location) {

    $scope.submitForm =  function(){
        send.post( $scope.form, Routing.generate('fos_user_security_check') ,function(response)
        {
            if(response.error){
                alert(response.error);
            }else{
                alert('login successfull redirect to youtr page');
                $location.path('/sample_array')
            }
        });
    }
});

symfonyControllers.controller('RegisterCtrl', function($scope, send){

    $scope.submitForm =  function(){
        console.log($scope.form);

        send.post( $scope.form, Routing.generate('override_fos_user_registration_register') ,function(response)
        {
            if(response.error){
                alert(response.error);
            }else{
                alert('login successfull redirect to youtr page');
            }
        });
    }
});

