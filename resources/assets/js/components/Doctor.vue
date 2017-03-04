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
           <textarea name="interests" v-model="inputData.interests" id="message" required="required" class="form-control"  ></textarea>
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
           <select name="city" class="form-control" v-on:change="changeArea()" v-model="fillItem.city">
              
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
                <option v-if="allCityList" v-for="area in allAreaList" v-bind:value="area.id"  >{{area.area_name}}</option>
               
            </select>
            <span v-if="formErrors['area']" class="error text-danger">{{ formErrors['area']['0'] }}</span>
             
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Speciality: <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
           <select name="speciality"  class="form-control" >
              
               <!-- v-on:change="onChange()" -->
                <option  v-for="Speciality in allSpecialityList" v-bind:value="Speciality.id"  >{{Speciality.specialitie_name}}</option>
               
            </select>
            <span v-if="formErrors['speciality']" class="error text-danger">{{ formErrors['speciality']['0'] }}</span>
             
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">status: <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
           <select name="status"  class="form-control" >
              
               <!-- v-on:change="onChange()" -->
                <option value="1"  >Published</option>
                <option value="0"  >Un Published</option>
               
            </select>
            <span v-if="formErrors['status']" class="error text-danger">{{ formErrors['status']['0'] }}</span>
             
          </div>
        </div>


      </div>
      <div class="modal-footer">
        <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button v-if="loading" disabled type="submit" class="btn btn-primary">Loading....</button>
        <button v-if="!loading" type="submit" class="btn btn-primary">Submit</button>
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
        <h4 class="modal-title"  >Edit Doctor</h4>
      </div>
      <div class="modal-body">
       <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input name="name" v-model="filldoctor.name" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
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
       
       <div class="form-group" v-if="filldoctor.picture">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Image:</label>
          <div class="col-sm-7 controls">
          
            <img :src="baseUrl+'/uploads/doctor/img/'+filldoctor.picture" width="150px">
           
          </div>

        </div>

       
       
        
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" >Change Profile Picture</label>
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
            <input name="designation" v-model="filldoctor.designation" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
             <span v-if="formErrors['designation']" class="error text-danger">{{ formErrors['designation']['0'] }}</span> 
          </div>
        </div>

       <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input name="address" v-model="filldoctor.address" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
             <span v-if="formErrors['address']" class="error text-danger">{{ formErrors['address']['0'] }}</span> 
          </div>
        </div>

       <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Education: <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input name="education" v-model="filldoctor.education" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
             <span v-if="formErrors['education']" class="error text-danger">{{ formErrors['education']['0'] }}</span> 
          </div>
        </div>

       <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Professional Experience: <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
           <textarea name="experience" v-model="filldoctor.experience" id="message" required="required" class="form-control" ></textarea>
             <span v-if="formErrors['experience']" class="error text-danger">{{ formErrors['experience']['0'] }}</span> 
          </div>
        </div>

       <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Special Interests: <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
           <textarea name="interests" v-model="filldoctor.interests" id="message" required="required" class="form-control"  ></textarea>
             <span v-if="formErrors['interests']" class="error text-danger">{{ formErrors['interests']['0'] }}</span> 
          </div>
        </div>

       <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Short Discription: <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
           <textarea name="short_discription" v-model="filldoctor.short_discription" id="message" required="required" class="form-control" ></textarea>
             <span v-if="formErrors['short_discription']" class="error text-danger">{{ formErrors['short_discription']['0'] }}</span> 
          </div>
        </div>

       <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Discription: <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
           <textarea name="discription" v-model="filldoctor.discription" id="message" required="required" class="form-control"  ></textarea>
             <span v-if="formErrors['discription']" class="error text-danger">{{ formErrors['discription']['0'] }}</span> 
          </div>
        </div>

       <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Country: <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
           <select v-model="fillItem.country"  name="country" class="form-control" v-on:change="changeCity()" >
              
               <!-- v-on:change="onChange()" -->
        
                <option v-for="country in allCountryList" v-bind:value="country.id" v-bind:selected="filldoctor.country === country.country_name"  >{{country.country_name}}</option>
               
            </select>
            <span v-if="formErrors['country']" class="error text-danger">{{ formErrors['country']['0'] }}</span>
             
          </div>
        </div>

       <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">City: <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
           <select name="city" class="form-control" v-on:change="changeArea()" v-model="fillItem.city">
              
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
                <option v-if="allCityList" v-for="area in allAreaList" v-bind:value="area.id"  >{{area.area_name}}</option>
               
            </select>
            <span v-if="formErrors['area']" class="error text-danger">{{ formErrors['area']['0'] }}</span>
             
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Speciality: <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
           <select name="speciality"  class="form-control" >
              
               <!-- v-on:change="onChange()" -->
                <option  v-for="Speciality in allSpecialityList" v-bind:value="Speciality.id" v-bind:selected="filldoctor.specialitie_name === Speciality.specialitie_name"  >{{Speciality.specialitie_name}}</option>
               
            </select>
            <span v-if="formErrors['speciality']" class="error text-danger">{{ formErrors['speciality']['0'] }}</span>
             
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">status: <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
           <select name="status"  class="form-control" >
              
               <!-- v-on:change="onChange()" -->
                <option value="1" v-bind:selected="filldoctor.status === 1" >Published</option>
                <option value="0" v-bind:selected="filldoctor.status === 0" >Un Published</option>
               
            </select>
            <span v-if="formErrors['status']" class="error text-danger">{{ formErrors['status']['0'] }}</span>
             
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button v-if="loading" type="submit" class="btn btn-primary">Loading...</button>
        <button v-if="!loading" type="submit" class="btn btn-primary">Submit</button>
      </div>
     </form> 
    </div>
  </div>
</div>

//code for item show

<div id="show-item"  class="modal fade edit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" v-on:submit.prevent="updateItem(fillItem.id)">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title"  >Details Doctor</h4>
      </div>
      <div class="modal-body">
            <div class="single_item">
                <p style="color:green;font-weight:bold;">Name:</p>
                <p>{{filldoctor.name}}</p>
            </div><hr>

            <div class="single_item">
                <p style="color:green;font-weight:bold;">Image:</p>
                <img :src="baseUrl+'/uploads/doctor/img/'+filldoctor.picture" width="150px">
            </div><hr>

           <div class="single_item">
                <p style="color:green;font-weight:bold;">Designation:</p>
                <p>{{filldoctor.designation}}</p>
            </div><hr>

           <div class="single_item">
                <p style="color:green;font-weight:bold;">Specialitie:</p>
                <p>{{filldoctor.specialitie_name}}</p>
            </div><hr>

           <div class="single_item">
                <p style="color:green;font-weight:bold;">Education:</p>
                <p>{{filldoctor.education}}</p>
            </div><hr>

           <div class="single_item">
                <p style="color:green;font-weight:bold;">Country:</p>
                <p>{{filldoctor.country}}</p>
            </div><hr>

           <div class="single_item">
                <p style="color:green;font-weight:bold;">City:</p>
                <p>{{filldoctor.city}}</p>
            </div><hr>

           <div class="single_item">
                <p style="color:green;font-weight:bold;">Area:</p>
                <p>{{filldoctor.area}}</p>
            </div><hr>

           <div class="single_item">
                <p style="color:green;font-weight:bold;">Address:</p>
                <p>{{filldoctor.address}}</p>
            </div><hr>

           <div class="single_item">
                <p style="color:green;font-weight:bold;">Experience:</p>
                <p>{{filldoctor.experience}}</p>
            </div><hr>

           <div class="single_item">
                <p style="color:green;font-weight:bold;">Interests:</p>
                <p>{{filldoctor.interests}}</p>
            </div><hr>


           <div class="single_item">
                <p style="color:green;font-weight:bold;">Short Discription:</p>
                <p>{{filldoctor.short_discription}}</p>
            </div><hr>


           <div class="single_item">
                <p style="color:green;font-weight:bold;">Discription:</p>
                <p>{{filldoctor.discription}}</p>
            </div><hr>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
     </form> 
    </div>
  </div>
</div>


  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>All Doctor </h2>
        <ul class="nav navbar-right panel_toolbox">
          <button data-toggle="modal" data-target=".bs-example-modal-lg"  class="btn btn-primary">Add New</button>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
      
        <table id="datatable-buttons" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th> Image</th>
              <th> Name</th>
              <th> Designation</th>
              <th> Speciality</th>
              <th>Education</th>
              <th>Status</th>
              <th>Action</th>
              
            </tr>
          </thead>


          <tbody>
            <tr v-for="item in allData">
              <td>
              <img :src="baseUrl+'/uploads/doctor/img/'+item.picture" width="150px">
              </td>
              <td>{{item.name}}</td>
              <td>{{item.designation}}</td>
              <td>{{item.specialitie_name}}</td>
              <td>{{item.education}}</td>
            
              <td><p v-if="item.status == 1">Active</p><p v-if="item.status == 0">Un Active</p></td>
              <td>
               
                <button v-on:click="itemDelete(item)" class="btn btn-primary">Delete</button>
                <p class="btn btn-success" v-on:click="itemView(item)">View</p>
                <p class="btn btn-success" v-on:click="itemEdit(item)">Edit</p>
             </td>
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
            
            inputData:{specialitie:""},
            formErrors:{},
            formUpdateErrors:{},
            allData:[],
            fillItem : {'specialitie':'','id':'','country':'','city':''},
            filldoctor : {'name':'','id':'','picture':'','address':'','education':'','short_discription':'','discription':'','country':'','city':'','area':'','experience':'','interests':'','designation':'','specialitie_name':'','status':''},
        
             allCountryList:[],
             allCityList:[],
             allAreaList:[],
             allSpecialityList:[],
             loading:false,
            picture:"",
             baseUrl: Laravel.baseUrl,

         
           
            }
        },
        created(){
          this.getData();
           this.allCountry();
           this.allSpeciality();
           

        },
        methods:{
                createItem: function(){


              
               this.loading=false;

              // somewhere in your Vue app.js file
              Vue.http.options.emulateJSON = true;

              // then in your code...
              let formData = new FormData(document.getElementById('demo-form2'));

              this.$http.post('/manage/doctor',formData).then(response => {

                // get body data
                this.loading=true;
               
                toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
                $("#create-item").modal('hide');
              }, (response) => {
                // error callback
               this.formErrors = response.data;
              });

              this.getData();


        },

        itemView:function(item){
           
          
            this.filldoctor.name=item.name;
            this.filldoctor.picture=item.picture;
            this.filldoctor.address=item.address;
            this.filldoctor.education=item.education;
            this.filldoctor.short_discription=item.short_discription;
            this.filldoctor.discription=item.discription;
            this.filldoctor.country=item.country_name;
            this.filldoctor.city=item.city_name;
            this.filldoctor.area=item.area_name;
            this.filldoctor.experience=item.professional_experience;
            this.filldoctor.interests=item.special_interests;
            this.filldoctor.designation=item.designation;
            this.filldoctor.specialitie_name=item.specialitie_name;
       
            
             $("#show-item").modal('show');
        },

        itemEdit:function(item){

            this.filldoctor.name=item.name;
            this.filldoctor.picture=item.picture;
            this.filldoctor.address=item.address;
            this.filldoctor.education=item.education;
            this.filldoctor.short_discription=item.short_discription;
            this.filldoctor.discription=item.discription;
            this.filldoctor.country=item.country_name;
            this.filldoctor.city=item.city_name;
            this.filldoctor.area=item.area_name;
            this.filldoctor.experience=item.professional_experience;
            this.filldoctor.interests=item.special_interests;
            this.filldoctor.designation=item.designation;
            this.filldoctor.specialitie_name=item.specialitie_name;
            this.filldoctor.status=item.status;

             $("#edit-item").modal('show');
        },

          getData:function(){
          
            this.$http.get('/all/doctor').then(response => {
                 
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

          changeArea:function(){
          var id = this.fillItem.city;

            this.$http.get('/all/area/by/country/'+id).then(response => {
                 
                // get body data
                this.allAreaList = response.data;
                
             
              }, (response) => {
                // error callback
               //this.formErrors = response.data;
              });
          },

          allSpeciality:function(){
          this.$http.get('/all/speciality').then(response => {
                 
                // get body data
                this.allSpecialityList = response.data;
                
             
              }, (response) => {
                // error callback
               //this.formErrors = response.data;
              });
          },

         
          itemDelete:function(item){

     
           var action = confirm('Are you want to delete this');
             if(action){
              this.$http.get('/delete/doctor/'+item.id).then(response => {
                 
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
