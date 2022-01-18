

<template>

</template>



<script type="text/javascript">
	
export default {
   created(){
    localStorage.removeItem('token')
    localStorage.removeItem('user')

// Swal.fire({
//   title: 'Are you sure?',
//   text: "You won't be able to revert this!",
//   icon: 'warning',
//   showCancelButton: true,
//   confirmButtonColor: '#3085d6',
//   cancelButtonColor: '#d33',
//   confirmButtonText: 'Yes, delete it!'
//       }).then((result) => {
//          localStorage.removeItem('token')
//          localStorage.removeItem('user')

//          this.$router.push({ name: '/'})
//          .catch(() => {
//                 this.$router.push({name: 'home'})
//                  })

//   if (result.isConfirmed) {
//     Swal.fire(
//       'Deleted!',
//       'Your file has been deleted.',
//       'success'
//     )
//   }
// })
             

    Toast.fire({
          icon: 'success',
          title: 'Logout successfully'
      
   })
   this.$router.push({ name: '/'})
    

   }
 

}

</script>


<style type="text/css">
	
</style>