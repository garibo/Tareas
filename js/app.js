(function(){

  	"use strict";

	angular.module('tareas',[
		'ngRoute',
		'ngResource'
	])

	.config(function($routeProvider){
		$routeProvider
		.when('/tareas',{
			templateUrl: 'modules/tareas.html',
			controller: 'tareasController'
		})
		.when('/horario',{
			templateUrl: 'modules/horario.html'
		})
		.otherwise({
			redirectTo: '/tareas'
		});
	})


	.factory('Tareas',function($resource){
        return $resource('http://localhost/tareas/php/rest/api/:id',{
            id : '@id'
        },{
            'update': { method:'PUT' }
        });
    })


	.controller('tareasController',function($scope, Tareas){

		$scope.tareas = Tareas.query();

		$scope.editar = {};

		$scope.submitForm = function(isValid)
		{
			if(isValid)
			{
				var record = new Tareas();
				var ultimo = $scope.tareas.length - 1;
				record.id = $scope.tareas.length == 0 ? 1 : parseInt($scope.tareas[ultimo].id) + 1;
				record.tarea = $scope.textoTarea;
				record.materia = $scope.materiaTarea;

				record.$save(function(response){
                	$scope.tareas.push(record);
           		});
			}
		}

		$scope.EditForm = function(isValid)
		{
			var record = new Tareas();
        	record.id = $scope.editar.id;
        	record.tarea = $scope.textoEditar;

        	Tareas.update({ id: $scope.editar.id }, record);

        	for(var i=0,len=$scope.tareas.length;i<len;i++){
                if($scope.tareas[i].id == $scope.editar.id){
                    $scope.tareas[i].id = record.id;
                    $scope.tareas[i].tarea = record.tarea;
                    break;
                }
            }
		}

		$scope.setEditar = function(tareaEditar)
		{
			$scope.editar = tareaEditar;
		}

		$scope.eliminar = function(tareaEliminar)
		{
			tareaEliminar.$remove(function(){
                for(var i=0,len=$scope.tareas.length;i<len;i++){
                    if($scope.tareas[i].id === tareaEliminar.id){
                        $scope.tareas.splice(i,1);
                        break;
                    }
                }
            });
		}

		
		$scope.existe = function(materia)
		{
			var cantidad = 0;
			for(var i=0,len=$scope.tareas.length;i<len;i++)
			{
		        if($scope.tareas[i].materia === materia){
		        	cantidad++;
		        break;
	       		}
	        }
	        return cantidad;
		};
	});

	
})();