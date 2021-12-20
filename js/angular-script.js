var crudApp = angular.module('crudApp',[]);
crudApp.controller("DbController",['$scope','$http', function($scope,$http){
$scope.loginDetails = function(user){
$http.post('databaseFiles/loginDetails.php',{"email":user.email,"password":user.password}).success(function(data){
if (data == true) {
	window.location.href = '/dimoc/templates/complications/index.html';
}else{
	alert("username and password not match");
}
});
}

}]);


crudApp.controller("ComplicationsController",['$scope','$http', function($scope,$http){
// Function to get employee details from the database
getInfo();
function getInfo(){
// Sending request to EmpDetails.php files 
$http.post('../../databaseFiles/complications/complications.php').success(function(data){

// Stored the returned data into scope 
$scope.activities = data;
});
}
// Enabling show_form variable to enable Add employee button
$scope.show_form = true;
// Function to add toggle behaviour to form
$scope.formToggleActivities =function(){
$('#empForm').slideToggle();
$('#editForm').css('display', 'none');
}
$scope.insertActivities = function(info){
$photos= $('#file_name').val();
$http.post('../../databaseFiles/complications/insertDetails.php',
{"id":info.id,"complications":info.complications,"image":$photos}).success(function(data){
if (data == true) {
getInfo();
$('#empForm').css('display', 'none');
}
});
}
$scope.deleteInfo = function(info){
$http.post('../../databaseFiles/complications/deleteDetails.php',{"id":info.id}).success(function(data){
if (data == true) {
getInfo();
}
});
}
$scope.currentUser = {};
$scope.editInfo = function(info){
$scope.currentUser = info;
$('#empForm').slideUp();
$('#editForm').slideToggle();
}
$scope.UpdateActivities = function(info){
$photos= $('#file_names').val();
$http.post('../../databaseFiles/complications/updateDetails.php',
{"id":info.id,"complications":info.complications,"image":$photos}).success(function(data){
$scope.show_form = true;
if (data == true) {
getInfo();
}
});
}
$scope.updateMsg = function(id){
$('#editForm').css('display', 'none');
}
}]);

/* ===================================================================== */

crudApp.controller("ComplicationsDetailsController",['$scope','$http', function($scope,$http){
// Function to get employee details from the database
getInfo();
function getInfo(){
// Sending request to EmpDetails.php files 
$http.post('../../databaseFiles/complicationsDetails/complications.php').success(function(data){

// Stored the returned data into scope 
$scope.activities = data;
});
}
// Enabling show_form variable to enable Add employee button
$scope.show_form = true;
// Function to add toggle behaviour to form
$scope.formToggleActivities =function(){
$option = $('#complicationscontroller').html();
$('#complications_list').html($option);
$('#empForm').slideToggle();
$('#editForm').css('display', 'none');
} 	
$scope.insertActivities = function(info){
$texts = $('textarea#editor').val();
$http.post('../../databaseFiles/complicationsDetails/insertDetails.php',
{"id":info.id,"complications_id":info.complications_id,"complications_list":info.complications_list,"complications_details":$texts}).success(function(data){
if (data == true) {
getInfo();
$('#empForm').css('display', 'none');
}
});
}
$scope.deleteInfo = function(info){
$http.post('../../databaseFiles/complicationsDetails/deleteDetails.php',{"id":info.id}).success(function(data){
if (data == true) {
getInfo();
}
});
}
$scope.currentUser = {};
$scope.editInfo = function(info){
$scope.currentUser = info;
$('#empForm').slideUp();
$('#editForm').slideToggle();
setTimeout(function(){
	$textarea_des= $('#text_edit').val();
	$texts = $('.ck-editor__editable p').text($textarea_des);
},50); 
}
$scope.UpdateActivities = function(info){
$texts = $('textarea#editor1').val();
$http.post('../../databaseFiles/complicationsDetails/updateDetails.php',
{"id":info.id,"complications_id":info.complications_id,"complications_list":info.complications_list,"complications_details":$texts}).success(function(data){
$scope.show_form = true;
if (data == true) {
getInfo();
}
});
}
$scope.updateMsg = function(id){
$('#editForm').css('display', 'none');
}
}]);

