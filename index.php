<!DOCTYPE html>
<html>
  <head>
    <title>Angular CRUD with PHP and Mysql</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
      .form-group.required .control-label:after {
      content:"*";
      color:red;
      }
    </style>
  <body>
    <div class="container" ng-app="customer_app" ng-controller="customer_controller" ng-init="fetchData()">
      <br />
      <h3 align="center">AngularJS CRUD using PHP Mysql</h3>
      <br />
      <div class="alert alert-{{messageType}} alert-dismissible" ng-show="success" >
        {{successMessage}}
      </div>
      <div class="row">
        <div class="form-group col-md-12 text-right">
          <button type="button" name="add_button" ng-click="addData()" class="btn btn-success">Add</button>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon">Search</span>
          <input type="text" name="search_query" ng-model="search_query" ng-keyup="fetchData()" placeholder="Search by Customer Details" class="form-control" />
        </div>
      </div>
      <br />
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Address</th>
            <th>City</th>
            <th>Postal Code</th>
            <th>Country</th>
            <th>Tel Number</th>
            <th>Action</th>
            <td></td>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="data in searchData">
            <td>{{ data.Firstname }}</td>
            <td>{{ data.Lastname}}</td>
            <td>{{ data.Gender }}</td>
            <td>{{ data.Address }}</td>
            <td>{{ data.City }}</td>
            <td>{{ data.PostalCode }}</td>
            <td>{{ data.Country }}</td>
            <td>{{ data.TelNumber }}</td>
            <td><button type="button" ng-click="update(data.ID)" class="btn btn-warning btn-xs">Edit</button></td>
            <td><button type="button" ng-click="delete(data.ID)" class="btn btn-danger btn-xs">Delete</button></td>
          </tr>
        </tbody>
      </table>
      <div class="modal fade" tabindex="-1" role="dialog" id="crudmodal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form method="post" ng-submit="save(customerForm.$valid)" novalidate name="customerForm">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{modalTitle}}</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="form-group required col-md-6">
                    <label class="control-label">First Name</label>
                    <input type="text" name="firstname" ng-model="formData.Firstname" class="form-control" required/>
                    <p ng-show="customerForm.firstname.$invalid && !customerForm.firstname.$pristine" class="help-block">Firstname is required.</p>
                  </div>
                  <div class="form-group required col-md-6">
                    <label class="control-label">Last Name</label>
                    <input type="text" name="lastname" ng-model="formData.Lastname" class="form-control" required/>
                    <p ng-show="customerForm.lastname.$invalid && !customerForm.lastname.$pristine" class="help-block">Lastname is required.</p>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6 col-md-offset">
                    <label>Gender</label>
                    <br><label class="radio-online"><input type="radio" name="gender" ng-model="formData.Gender" value="Male" ng-checked="(formData.Gender == 'Male')">&nbsp;Male</label>
                    &nbsp;<label class="radio-online"><input type="radio" id="gender_female" name="gender" ng-model="formData.Gender" value="Female" ng-checked="(formData.Gender == 'Female')">&nbsp;Female</label>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group required col-md-12">
                    <label class="control-label">Address</label>
                    <input type="text" name="address" ng-model="formData.Address" class="form-control" required/>
                    <p ng-show="customerForm.address.$invalid && !customerForm.address.$pristine" class="help-block">Address is required.</p>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>City</label>
                    <input type="text" name="city" ng-model="formData.City" class="form-control"/>
                  </div>
                  <div class="form-group required col-md-6">
                    <label class="control-label">Country</label>
                    <input type="text" name="country" ng-model="formData.Country" class="form-control" required/>
                    <p ng-show="customerForm.country.$invalid && !customerForm.country.$pristine" class="help-block">Country is required.</p>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group required col-md-6">
                    <label class="control-label">Postal Code</label>
                    <input type="text" name="postalcode" ng-model="formData.PostalCode" class="form-control" required/>
                    <p ng-show="customerForm.postalcode.$invalid && !customerForm.postalcode.$pristine" class="help-block">Postal Code is required.</p>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Tel Number</label>
                    <input type="text" name="telnumber" ng-model="formData.TelNumber" class="form-control"/>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="submit" id="submit" class="btn btn-info" ng-disabled="customerForm.$invalid">{{btnText}}</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="app.js"></script>
  </body>
</html>
