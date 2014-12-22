(function(){
    var validationApp = angular.module('loginApp', []);


    validationApp.controller('loginController', function($scope) {
          function cambiar()
          {
            document.location.href = "index.php";
          }

          function errorFormulario ()
          {
            $(".alert").remove();
            $( "section" ).before('<div class="alert alert-danger alert-dismissible fade in" role="alert" id="equivocar"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>    <strong>Upss!</strong> Parece que tu contraseña o nombre de usuario son incorrectos. :(  </div>');      
          }


        $scope.submitForm = function(isValid) {

            var datos =
            {
                'username': $scope.username,
                'password': $scope.password
            }

            if (isValid) 
            {
                $.ajax({
                    url: 'php/validar.php',
                    type: 'POST',
                    async: true,
                    data: datos,
                    error: errorFormulario
                      })
                .done(function(e){
                e == 'logeado' ? cambiar() : errorFormulario(); ;
            });

            }

        };

    });

})();