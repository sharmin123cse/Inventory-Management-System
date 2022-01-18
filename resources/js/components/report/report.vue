   

<template>
  
  <div>

 <div class="row">
  <router-link to="/store-report" class="btn btn-primary">Add Report </router-link>
   
 </div>
<br>
   <input type="text" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Search Here">


<br>

   <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Report List</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                          <th>Report Name </th>
                        <th>Details</th>                      
                        <th>Date</th>
                          <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="report in filtersearch" :key="report.id">
                          <td> {{ report.name }} </td>
                        <td> {{ report.details }} </td>                       
                        <td> {{ report.report_date }} </td>
                       
            <td>
   <router-link :to="{name: 'edit-report', params:{id:report.id}}" class="btn btn-sm btn-primary">Edit</router-link>

 <a @click="deleteReport(report.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></a>
            </td>
                      </tr>
                    
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->


   
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
      return{
        reports:[],
        searchTerm:''
      }
    },
    computed:{
      filtersearch(){
      return this.reports.filter(report => {
         return report.report_date.match(this.searchTerm)
      }) 
      }
    },
 
  methods:{
    allReport(){
      axios.get('/api/report/')
      .then(({data}) => (this.reports = data))
      .catch()
    },
  deleteReport(id){
             Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {
                axios.delete('/api/report/'+id)
               .then(() => {
                this.reports = this.reports.filter(report => {
                  return report.id != id
                })
               })
               .catch(() => {
                this.$router.push({name: 'report'})
               })
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
              }
            })

  } 

  },
  created(){
    this.allReport();
  } 
  

  } 
</script>


<style type="text/css">
  #em_photo{
    height: 40px;
    width: 40px;
  }
</style>