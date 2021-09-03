<template>
	<div>
		<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Employees</h1>
    </div>

<div class="card shadow mb-4">
  <div v-if="showMessage">
    <div class="alert alert-success">
        {{message}}
    </div>
</div>
    <div class="card-header">
        <div class="float-right">
        	<router-link :to="{name: 'EmployeesCreate'}" class="btn btn-primary">Create</router-link>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Department</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                
                <tbody>
        
                    <tr v-for="employee in employees" :key="employee.id">
                        <td>{{employee.id}}</td>
                        <td>{{employee.first_name}}</td>
                        <td>{{employee.last_name}}</td> 
                        <td>{{employee.address}}</td>
                        <td>{{employee.department.name}}</td>
                       <td>
                        <router-link :to="{name: 'EmployeesEdit', params:{id: employee.id}}" class="btn btn-primary">Edit</router-link>
                           <button class="btn btn-danger" @click="deleteEmployee(employee.id)">Delete</button>
                        </td>
                    </tr>
                  
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
	</div>
</template>

<script>
export default {

  data() {
    return {
        employees:[],
        showMessage: false,
        message: ''
    };
  },
  created(){
    this.getEmployees();
  },
  methods:{
    //index method
    getEmployees(){
        axios.get('api/employees/')
        .then(res =>{
           this.employees = res.data.data
        }).catch(err => {
            console.log(err);
        });
    },
    //destroy method
    deleteEmployee(id){
        axios.delete('api/employees/' + id)
        .then(res => {
            this.showMessage = true;
            this.message = res.data;
            this.getEmployees();
            
        });
    }
  }
};
</script>

<style lang="css" scoped>
</style>
