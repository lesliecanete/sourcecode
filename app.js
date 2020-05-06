 var app = angular.module('customer_app', []);
  app.controller('customer_controller', function($scope, $http){
    $scope.btnText = "Save";
    $scope.success = false;
    $scope.messageType="success";
    //fetch all customers
   $scope.fetchData = function(){
    $http({
     method:"POST",
     url:"fetch.php",
     data:{search_query:$scope.search_query}
    }).success(function(data){
     $scope.searchData = data;
    });
   };
   //called when add button is clicked
    $scope.addData = function(){
      $scope.modalTitle = 'Add Customer';
      $scope.btnText = 'Save';
      $scope.btnAction="Insert";
      $scope.formData = {};
      $scope.customerForm.$setPristine()
      $scope.openModal();
    };  
    //called when create or update button is clicked
    $scope.save = function(isValid) {
       if (isValid){
            $http.post(
                "save.php", {
                    'firstname': $scope.formData.Firstname,
                    'lastname': $scope.formData.Lastname,
                    'gender':$scope.formData.Gender,
                    'address': $scope.formData.Address,
                    'city': $scope.formData.City,
                    'postalcode': $scope.formData.PostalCode,
                    'country': $scope.formData.Country,
                    'telnumber': $scope.formData.TelNumber,
                    'id': $scope.formData.Id,
                    'btnAction': $scope.btnAction
                }
            ).success(function(data) {
                $scope.fetchData();
                $scope.closeModal();
                $scope.selectedRecord={};
                $scope.successMessage=data.message;
                if (data.error){
                  $scope.messageType='danger';
                }
                $scope.success=true;
            });
        }
    }
    //called when edit is clicked
    $scope.update = function(id) {
        //fetch data with current id
        $scope.fetchSingleData(id);
        $scope.modalTitle = 'Edit Customer';
        $scope.btnText = "Update";
        $scope.btnAction="Update";
        $scope.openModal();
    }
    //fetch a single data with a given id
    $scope.fetchSingleData = function (id){
      $http({
       method:"POST",
       url:"fetch.php",
       data:{id : id}
      }).success(function(data){
        $scope.formData=data;
        $scope.formData.Id=id;
      });
    }
    //deletes the customer
    $scope.delete= function(id) {
        if (confirm("Are you sure you want to delete the customer?")) {
            $http.post("delete.php", {
                    'Id': id
                })
                .success(function(data) {
                    $scope.successMessage=data.message;
                    $scope.success=true;
                    if (data.error){
                      $scope.messageType='danger';
                    }
                    $scope.fetchData();
                });
        } else {
            return false;
        }
    }
    $scope.openModal = function(){
      var modal_popup = angular.element('#crudmodal');
      modal_popup.modal('show');
     };
  
    $scope.closeModal = function(){
      var modal_popup = angular.element('#crudmodal');
      modal_popup.modal('hide');
     };
  });