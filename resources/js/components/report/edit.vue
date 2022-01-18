   

<template>
  
  <div>

 <div class="row">
  <router-link to="/report" class="btn btn-primary">All Report </router-link>
   
 </div>



    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"> Report Update</h1>
                  </div>

      <form class="user" @submit.prevent="reportUpdate">

        <div class="form-group">

          <div class="form-row">

              <div class="col-md-12"><br>
 	<label for="exampleFormControlTextarea1"><b>Report Name</b></label>
         <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Report Name" v-model="form.name">
  <small class="text-danger" v-if="errors.name"> {{ errors.name[0] }} </small> 
            </div>



            <div class="col-md-12"><br>
         <label for="exampleFormControlTextarea1"><b>Report Details</b></label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="form.details"></textarea>
  <small class="text-danger" v-if="errors.details"> {{ errors.details[0] }} </small> 
            </div> 

            
          </div>
        </div>
       
         
 


        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Update</button>
        </div>
        
      </form>
                  <hr>
                  <div class="text-center">
  
  
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</template>



<script type="text/javascript">
  
  export default {
    created(){
      if (!User.loggedIn()) {
        this.$router.push({name: '/'})
      }
    },

    data(){
    return {
      form:{
        name: '',
        details:''
       
        
      },
      errors:{}
    }
  },
  created(){
  	let id = this.$route.params.id
  	axios.get('/api/report/'+id)
  	.then(({data}) => (this.form = data))
  	.catch(console.log('error'))
  },

  methods:{
    
  reportUpdate(){
  	  let id = this.$route.params.id
       axios.patch('/api/report/'+id,this.form)
       .then(() => {
        this.$router.push({ name: 'report'})
        Notification.success()
       })
       .catch(error =>this.errors = error.response.data.errors)
     },
  } 


  }
   
</script>


<style type="text/css">
  
</style>