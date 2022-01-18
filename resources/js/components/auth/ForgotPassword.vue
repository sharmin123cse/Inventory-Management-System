<template>

<div>
		<div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                  </div>

              <!-- this is Form -->
            <form autocomplete="off" @submit.prevent="requestResetPassword" method="post">
              <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
              </div>
              <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
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

<script>
export default {
  created(){
      if (!User.loggedIn()) {
        this.$router.push({name: 'Forgotpassword'})
      }
    },


    
    data() {
      return {
        email: null,
        has_error: false
      }
    },
    methods: {
        requestResetPassword() {
          
            axios.post("/api/auth/Forgotpassword/", {email: this.email}).then(result => {
              
                this.response = result.data;
                console.log(result.data);
                Toast.fire({
                icon: 'success',
                title: 'Password Updated successfully'
        })
                
            }
            
            , error => {
                console.error(error);
            });
        }
    }
}
</script>

