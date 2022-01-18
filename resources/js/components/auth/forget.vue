

<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Forget Password</h1>
                  </div>
      <form class="user" @submit.prevent="onSubmit">
        <div class="form-group">
          <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
            placeholder="Enter Existing Email Address" v-model="form.email">
                 </div>
        
        
   
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Forget Password </button>
        </div>
        <hr>
        
      </form>
                  <hr>
                  <div class="text-center">
 <router-link to="/" class="font-weight-bold small">Back to Login!</router-link>
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
     
    },
    
    data(){
    return {
      form:{
        email: null
      },
      errors:{}     
    }
  }, 
  methods:{
    forget(){
      axios.post('/api/auth/forget',this.form)
      .then(res => {
        User.responseAfterForget(res) 
         Toast.fire({
          icon: 'success',
          title: 'We have emailed your Email Password Reset Link'
        })
        
      })   
        
      .catch(error =>this.errors = error.response.data.errors)
      .catch(
            Toast.fire({
              icon: 'warning',
              title: 'Invalid Email '
            })        
        )
       
    }
  }


  } 

  
</script>


<style type="text/css">
  
</style>