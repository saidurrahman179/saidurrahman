<template>
<div class="page-title">

<!-- code for add new -->

<div id="create-item"  class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" v-on:submit.prevent="createItem">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title"  >Add New Doctor Hello</h4>
      </div>
      <div class="modal-body">

       <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input name="name" v-model="inputData.name" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
             <span v-if="formErrors['name']" class="error text-danger">{{ formErrors['name']['0'] }}</span> 
          </div>
        </div>

        <div class="form-group" v-if="picture">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">preview</label>
          <div class="col-sm-7 controls">
            <img style="width: 100px;display: block;" :src="picture">
            <button type="button" v-on:click="removeImage" class="btn btn-primary">Remove Image</button>
          </div>

        </div>
       
        
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" >Profile Picture</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            
          <!-- The file input field used as target for the file upload widget -->
          <input v-on:change="previewThumbnail" type="file"  name="picture">
          
          </span> 
          <br><span v-if="formErrors['picture']" class="error text-danger">{{ formErrors['picture']['0'] }}</span>
          </div>

        </div>



       <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Designation <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input name="designation" v-model="inputData.designation" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
             <span v-if="formErrors['designation']" class="error text-danger">{{ formErrors['designation']['0'] }}</span> 
          </div>
        </div>

       <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input name="address" v-model="inputData.address" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
             <span v-if="formErrors['address']" class="error text-danger">{{ formErrors['address']['0'] }}</span> 
          </div>
        </div>

       <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Education: <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input name="education" v-model="inputData.education" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
             <span v-if="formErrors['education']" class="error text-danger">{{ formErrors['education']['0'] }}</span> 
          </div>
        </div>

       <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Professional Experience: <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
           <textarea name="experience" v-model="inputData.experience" id="message" required="required" class="form-control" ></textarea>
             <span v-if="formErrors['experience']" class="error text-danger">{{ formErrors['experience']['0'] }}</span> 
          </div>
        </div>

       <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Special Interests: <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
           <textarea name="message" v-model="inputData.interests" id="message" required="required" class="form-control"  ></textarea>
             <span v-if="formErrors['interests']" class="error text-danger">{{ formErrors['interests']['0'] }}</span> 
          </div>
        </div>

       <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Short Discription: <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
           <textarea name="short_discription" v-model="inputData.short_discription" id="message" required="required" class="form-control" ></textarea>
             <span v-if="formErrors['short_discription']" class="error text-danger">{{ formErrors['short_discription']['0'] }}</span> 
          </div>
        </div>

       <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Discription: <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
           <textarea name="discription" v-model="inputData.discription" id="message" required="required" class="form-control"  ></textarea>
             <span v-if="formErrors['discription']" class="error text-danger">{{ formErrors['discription']['0'] }}</span> 
          </div>
        </div>

       <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Country: <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
           <select  name="country" class="form-control" v-on:change="changeCity()" v-model="fillItem.country">
              
               <!-- v-on:change="onChange()" -->
        
                <option v-for="country in allCountryList" v-bind:value="country.id"  >{{country.country_name}}</option>
               
            </select>
            <span v-if="formErrors['country']" class="error text-danger">{{ formErrors['country']['0'] }}</span>
             
          </div>
        </div>

       <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">City: <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
           <select name="city" class="form-control" v-model="inputData.city">
              
               <!-- v-on:change="onChange()" -->
                <option v-for="city in allCityList" v-bind:value="city.id"  >{{city.city_name}}</option>
               
            </select>
            <span v-if="formErrors['city']" class="error text-danger">{{ formErrors['city']['0'] }}</span>
             
          </div>
        </div>

       <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Area: <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
           <select name="area"  class="form-control" v-model="inputData.area">
              
               <!-- v-on:change="onChange()" -->
                <option v-for="country in allCountryList" v-bind:value="country.id"  >{{country.country_name}}</option>
               
            </select>
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


<!-- code for Edit add new -->

<div id="edit-item"  class="modal fade edit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" v-on:submit.prevent="updateItem(fillItem.id)">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title"  >Edit Speciality</h4>
      </div>
      <div class="modal-body">
       <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Speciality <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input v-model="fillItem.specialitie" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
             <span v-if="formUpdateErrors['specialitie']" class="error text-danger">{{ formUpdateErrors['specialitie']['0'] }}</span> 
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
        <h2>All Speciality </h2>
        <ul class="nav navbar-right panel_toolbox">
          <button data-toggle="modal" data-target=".bs-example-modal-lg"  class="btn btn-primary">Add New</button>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
      
        <table id="datatable-buttons" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Speciality Name</th>
              <th>Status</th>
              <th>Action</th>
              
            </tr>
          </thead>


          <tbody>
            <tr v-for="item in allData">
              <td>{{item.specialitie_name}}</td>
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
            formStatus:false,
            inputData:{specialitie:""},
            formErrors:{},
            formUpdateErrors:{},
            allData:[],
            fillItem : {'specialitie':'','id':'','country':''},
             allCountryList:[],
             allCityList:[],
            picture:"",
           
            }
        },
        created(){
          this.getData();
           this.allCountry();
        },
        methods:{
                createItem: function(){
              
            

              // somewhere in your Vue app.js file
              Vue.http.options.emulateJSON = true;

              // then in your code...
              let formData = new FormData(document.getElementById('demo-form2'));

              this.$http.post('/manage/doctor',formData).then(response => {

                // get body data
               
               $("#create-item").modal('hide');
                toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
             
              }, (response) => {
                // error callback
               this.formErrors = response.data;
              });

              this.getData();


        },

          getData:function(){
            this.$http.get('/all/speciality').then(response => {
                 
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

          changeCity:function(){
          var id = this.fillItem.country;

            this.$http.get('/all/city/by/country/'+id).then(response => {
                 
                // get body data
                this.allCityList = response.data;
                
             
              }, (response) => {
                // error callback
               //this.formErrors = response.data;
              });
          },


         
          itemDelete:function(item){
           var action = confirm('Are you want to delete this');
             if(action){
              this.$http.get('/delete/speciality/'+item.id).then(response => {
                 
                // get body data
                //this.allData = response.data;
                 this.getData();
             
              }, (response) => {
                // error callback
               //this.formErrors = response.data;
               alert('error');
              });
             }
             
          },
          editItem:function(item){

          this.fillItem.specialitie=item.specialitie_name;
          this.fillItem.id = item.id;
          $("#edit-item").modal('show');
          },

          updateItem:function(id){
          var inputData = this.fillItem;
              
              this.$http.post('/update/speciality/'+id,inputData).then(response => {

                // get body data
                inputData.specialitie="";
               $("#edit-item").modal('hide');
                toastr.success('Item Update Successfully.', 'Success Alert', {timeOut: 5000});
             
              }, (response) => {
                // error callback
               this.formUpdateErrors = response.data;
              });

              this.getData();

          },

              previewThumbnail:function(event){
              var input = event.target;
                 if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    var vm = this;

                    reader.onload = function(e) {
                        vm.picture = e.target.result;
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            },
            removeImage :function(){
              this.picture = "";
             
            }
        }
    }
</script>
