<template>
<div class="page-title">


<!--code for add new-->

<div id="create-item"  class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" v-on:submit.prevent="createItem">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title"  >Add New City</h4>
      </div>
      <div class="modal-body">
         <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Country:</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select  class="form-control" v-model="inputData.country" v-on:change="changeCityByCountry" >
              
               <!-- v-on:change="onChange()" -->
                <option v-for="country in allCountryList" v-bind:value="country.id" >{{country.country_name}}</option>
                
              
            </select>
            <span v-if="formErrors['country']" class="error text-danger">{{ formErrors['country']['0'] }}</span>
          </div>
        </div>
         <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Country:</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select v-model="inputData.city" class="form-control"  v-on:change="changeCityByCountryEit" >
              
               <!-- v-on:change="onChange()" -->
                <option v-for="city in selectCityList" v-bind:value="city.id" >{{city.city_name}}</option>
                
              
            </select>
            <span v-if="formErrors['city']" class="error text-danger">{{ formErrors['city']['0'] }}</span>
          </div>
        </div>

       

       <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Area <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input v-model="inputData.area" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
             <span v-if="formErrors['area']" class="error text-danger">{{ formErrors['area']['0'] }}</span> 
          </div>
        </div>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
     </form> 
    </div>
  </div>
</div>


<!--code for Edit add new-->
<div id="edit-item"  class="modal fade edit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" v-on:submit.prevent="updateItem(fillItem.id)">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title"  >Edit City</h4>
      </div>
      <div class="modal-body">
         <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Country:</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select  class="form-control" v-model="fillItem.country">
              
               <!-- v-on:change="onChange()" -->
                <option v-for="country in allCountryList" v-bind:value="country.id" v-bind:selected="country.id === fillItem.country"  >{{country.country_name}}</option>
                
              
            </select>

            <span v-if="formErrors['country']" class="error text-danger">{{ formErrors['country']['0'] }}</span>
          </div>
        </div>
         <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Country:</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            
            <select  class="form-control" v-model="fillItem.city">
              
               <!-- v-on:change="onChange()" -->
                <option v-for="city in selectCityList" v-bind:value="city.id" v-bind:selected="city.id === citySelect"  >{{citySelect+city.city_name+city.id+city.id}}</option>
                
              
            </select>
            <span v-if="formErrors['city']" class="error text-danger">{{ formErrors['city']['0'] }}</span>
          </div>
        </div>

       

       <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Area <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input v-model="fillItem.area" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
             <span v-if="formErrors['area']" class="error text-danger">{{ formErrors['area']['0'] }}</span> 
          </div>
        </div>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
     </form> 
    </div>
  </div>
</div>
 
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>All Area  </h2>
        <ul class="nav navbar-right panel_toolbox">
          <button data-toggle="modal" data-target=".bs-example-modal-lg"  class="btn btn-primary">Add New</button>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
      
        <table id="datatable-buttons" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Area Name</th>
              <th>City Name</th>
              <th>Country Name</th>
              <th>Status</th>
              <th>Action</th>
              
            </tr>
          </thead>


          <tbody>
            <tr v-for="item in allData">
              <td>{{item.area_name}}</td>
              <td>{{item.city_name}}</td>
              <td>{{item.country_name}}</td>
              <td><p v-if="item.status == 1">Active</p><p v-if="item.status == 0">Un Active</p></td>
              <td><button v-on:click="editItem(item)"  class="btn btn-primary">Edit</button><button v-on:click="itemDelete(item)" class="btn btn-primary">Delete</button></td>
            </tr>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
</template>

<script>
    export default {
        data(){
        return{
         
            inputData:{'area':'','city':'','country':''},
            formErrors:{},
            formUpdateErrors:{},
            allData:[],
            fillItem : {'country':'','id':'','area':'','city':''},
            allCountryList:[],
            selectCityList:'',
            citySelect:'',
            }
        },
        created(){
          this.getData();
          this.allCountry();
        },
        methods:{
                createItem: function(){
              
              var inputData = this.inputData;
              
              this.$http.post('/manage/area',inputData).then(response => {

                // get body data
                this.inputData.area="";
                this.inputData.city="";
                this.inputData.country="";
               $("#create-item").modal('hide');
                this.getData();
                toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
             
              }, (response) => {
                // error callback
               this.formErrors = response.data;
              });

             


        },

        changeCityByCountry:function(){
            var id = this.inputData.country;
          this.$http.get('/all/city/by/country/'+id).then(response => {
                 
                // get body data
                this.selectCityList = response.data;

              }, (response) => {
                // error callback
               //this.formErrors = response.data;
              });

            
        },

         changeCityByCountryEit:function(){
            var id = this.fillItem.country;
            alert('ok them');
            alert(id);
          this.$http.get('/all/city/by/country/'+id).then(response => {
                 
                // get body data
                this.selectCityList = response.data;

              }, (response) => {
                // error callback
               //this.formErrors = response.data;
              });

            
        },
        
          getData:function(){
            this.$http.get('/all/area').then(response => {
                 
                // get body data
                this.allData = response.data;
                
             
              }, (response) => {
                // error callback
               //this.formErrors = response.data;
              });
          },

            allCountry:function(){
            this.$http.get('/all/country').then(response => {
                 
                // get body data
                this.allCountryList = response.data;
                
             
              }, (response) => {
                // error callback
               //this.formErrors = response.data;
              });
          },

         
          itemDelete:function(item){
           var action = confirm('Are you want to delete this');
             if(action){
              this.$http.get('/delete/area/'+item.id).then(response => {
                 
                // get body data
               
                 this.getData();
             
              }, (response) => {
                // error callback
               //this.formErrors = response.data;
               alert('error');
              });
             }
             
          },
          editItem:function(item){
          
               this.citySelect = item.city_id;
              this.fillItem.city = item.city_id;
              this.fillItem.country = item.country_id;
              this.fillItem.area = item.area_name;
              this.fillItem.id = item.id;
               $("#edit-item").modal('show');
              
           
         
         
          },

          updateItem:function(id){
          var inputData = this.fillItem;
             
              this.$http.post('/update/city/'+id,inputData).then(response => {

                // get body data
                 this.fillItem.country = "";
                 this.fillItem.city = "";
                 this.fillItem.id = "";
              $("#edit-item").modal('hide');
                toastr.success('Item Update Successfully.', 'Success Alert', {timeOut: 5000});
             
              }, (response) => {
                // error callback
               this.formErrors = response.data;
              });

              this.getData();

          }
        }
    }
</script>
