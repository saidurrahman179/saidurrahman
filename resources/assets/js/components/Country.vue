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
        <h4 class="modal-title"  >Add New Speciality</h4>
      </div>
      <div class="modal-body">
       <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Country: <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input v-model="inputData.country" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
             <span v-if="formErrors['country']" class="error text-danger">{{ formErrors['country']['0'] }}</span> 
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
        <h4 class="modal-title"  >Edit Speciality</h4>
      </div>
      <div class="modal-body">
       <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Country: <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input v-model="fillItem.country" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
             <span v-if="formUpdateErrors['country']" class="error text-danger">{{ formUpdateErrors['country']['0'] }}</span> 
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
        <h2>All Country </h2>
        <ul class="nav navbar-right panel_toolbox">
          <button data-toggle="modal" data-target=".bs-example-modal-lg"  class="btn btn-primary">Add New</button>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
      
        <table id="datatable-buttons" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Country Name</th>
              <th>Status</th>
              <th>Action</th>
              
            </tr>
          </thead>


          <tbody>
            <tr v-for="item in allData">
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
         
            inputData:{country:""},
            formErrors:{},
            formUpdateErrors:{},
            allData:[],
            fillItem : {'country':'','id':''},
            
            }
        },
        created(){
          this.getData();
        },
        methods:{
                createItem: function(){
              
              var inputData = this.inputData;
              
              this.$http.post('/manage/country',inputData).then(response => {

                // get body data
                inputData.country="";
               $("#create-item").modal('hide');
                toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
             
              }, (response) => {
                // error callback
               this.formErrors = response.data;
              });

              this.getData();


        },

          getData:function(){
            this.$http.get('/all/country').then(response => {
                 
                // get body data
                this.allData = response.data;
                
             
              }, (response) => {
                // error callback
               //this.formErrors = response.data;
              });
          },

         
          itemDelete:function(item){
           var action = confirm('Are you want to delete this');
             if(action){
              this.$http.get('/delete/country/'+item.id).then(response => {
                 
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
          
          this.fillItem.country=item.country_name;
          this.fillItem.id = item.id;
          $("#edit-item").modal('show');
          },

          updateItem:function(id){
          var inputData = this.fillItem;
              
              this.$http.post('/update/country/'+id,inputData).then(response => {

                // get body data
                inputData.country="";
               $("#edit-item").modal('hide');
                toastr.success('Item Update Successfully.', 'Success Alert', {timeOut: 5000});
             
              }, (response) => {
                // error callback
               this.formUpdateErrors = response.data;
              });

              this.getData();

          }
        }
    }
</script>
