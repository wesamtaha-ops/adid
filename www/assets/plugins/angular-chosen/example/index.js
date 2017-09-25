// Generated by CoffeeScript 1.6.2
(function() {
  angular.module('chosenExampleApp', ['localytics.directives']).config([
    '$parseProvider', function($parseProvider) {
      return $parseProvider.unwrapPromises(true);
    }
  ]).controller('IndexCtrl', [
    '$scope', '$q', '$timeout', function($scope, $q, $timeout) {
      var simulateAjax;

      simulateAjax = function(result) {
        var deferred, fn;

        deferred = $q.defer();
        fn = function() {
          return deferred.resolve(result);
        };
        $timeout(fn, 3000);
        return deferred.promise;
      };
      simulateAjax(['grooo', 'wowowowow', 'lakakalakakl', 'yadayada', 'insight', 'delve', 'synergy']).then(function(result) {
        return $scope.optionsFromQuery = result;
      });
      $scope.optionsFromQueryAsHash = (function() {
        var result;

        result = {
          win: "Brilliant Escape",
          fail: "Untimely Demise"
        };
        return simulateAjax(result);
      })();
      $scope.$watch('emptyCollection', function(empty) {
        return $scope.emptyOptions = simulateAjax(empty ? [] : ['look', 'i', 'have', 'data']);
      });
      $scope.directiveOptions = {
        no_results_text: "SO SORRY"
      };
      $scope.myPets = ['cat'];
      $scope.pets = {
        cat: 'Cat',
        dog: 'Dog',
        hamster: 'Hamster'
      };
      $timeout(function() {
        return $scope.$apply(function() {
          return $scope.myPets.push('hamster');
        });
      }, 1000);
      return $scope.disabled = true;
    }
  ]);

}).call(this);