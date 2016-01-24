@extends('dashboard')

@section('meta')

@endsection

@section('content')
<div class="adminbg"></div>
<div class="admin" ng-app="app" ng-controller="InterviewController">
  <div class="row container">
    <h3>Edit Interview</h3>

    <div class="input-field col s12">
      <input placeholder="Interviewee" ng-model="person" type="text" class="validate">
    </div>
    <div class="input-field col s12">
      <textarea class="materialize-textarea"  ng-model="intro" placeholder="Introduction"></textarea>
    </div>
    <div class="input-field col s12">
      <a ng-click="add()" class="btn-floating btn-small waves-effect"><i class="material-icons">add</i></a>
    </div>

    <div ng-show="addnew" class="col s12" style="padding-top:20px">
      <div class="input-field col s12">
        <textarea class="materialize-textarea" placeholder="question" ng-model="question"></textarea>
      </div>
      <div class="input-field col s12">
        <textarea class="materialize-textarea"  ng-model="answer" placeholder="answer"></textarea>
      </div>
      <div class="input-field col s12">
        <a class="btn waves-effect" ng-click="append(question,answer)">Add</a>
      </div>
    </div>

    <div class="col s12">
      <div class="interviewitem">
        <div class="dialog" ng-repeat="d in details">
          <a ng-click="remove($index)" class="btn-floating btn-small waves-effect"><i class="material-icons">remove</i></a>
          <a ng-click="edit($index)" class="btn-floating btn-small waves-effect"><i class="material-icons">edit</i></a>
          <ul class="collection">
                <li class="collection-item"><div class="box bubble-left">@{{d.q}}</div></li>
                <li class="collection-item"><div class="box right bubble-right">@{{d.a}}</div></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="input-field col s12">
      <a ng-click="save()" class="btn-floating btn-small waves-effect"><i class="material-icons">save</i></a>
    </div>

  </div>
</div>

@endsection


@section('script')
  {!! Html::script('js/angular.min.js') !!}
  {!! Html::script('js/angular-resource.min.js') !!}
  <script>
  (function() {
    'use strict';
    angular.module('app', ['ngResource'])
    .constant("CSRF_TOKEN", '{!! csrf_token() !!}')
    .factory('InterviewResource',function ($resource) {
        return $resource("{{url("dashboard/interviews/".$id."/edit")}}", {},
        {
            get:{method:'GET', cache:false,isArray:false,url:'{{url("dashboard/interviews/rest/".$id)}}'},
            post: {method:'POST',cache:false,isArray:false}
        });
    })
    .controller('InterviewController', function($scope,InterviewResource){

        InterviewResource.get({},function(response){
          console.log(response);
          $scope.details = response.content;
          $scope.person = response.person;
          $scope.intro = response.intro;
        });
        $scope.addnew = false;
        $scope.toEdit = 0;
        $scope.isEdit = false;
        $scope.add = function(){
          $scope.addnew = true;
        }
        $scope.append = function(q,a){
          var d = {q:q,a:a};
          if($scope.isEdit){
            $scope.details[$scope.toEdit] = d;
            $scope.isEdit = false;
          }else{
            $scope.details.push(d);
          }
          $scope.addnew = false;
          set('','');
        }

        $scope.remove = function(index){
          $scope.details.splice(index,1);
        }
        $scope.edit = function(index){
          $scope.isEdit = true;
          $scope.toEdit = index;
          $scope.addnew = true;
          var d = $scope.details[$scope.toEdit];
          set(d.q,d.a);
        }

        $scope.save = function(){
          var r = new InterviewResource();
          r.person = $scope.person;
          r.intro = $scope.intro;
          var details = [];
          for (var i=0;i<$scope.details.length;i++) {
            var obj = $scope.details[i];
            details.push({q:obj.q,a:obj.a});
          }
          r.content = JSON.stringify(details);
          r.$post({},function(response){
            console.log(response);
            window.location.href="{{url('dashboard/interviews')}}";
            $scope.isgenerated = false;
          },function(response){
            console.log(response);
          });
        }

        var set = function(q,a){
          $scope.question = q;
          $scope.answer = a;
        }
    });

  })();

  </script>
@endsection
