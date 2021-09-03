<template>
<div>
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Update</h1>
		</div>
		<div class="card shadow mb-4">
			<div class="card-header">
				<router-link :to="{name: 'EmployeesIndex'}" class="btn btn-primary">Back</router-link>
			</div>
			<div class="card-body">
				<form @submit.prevent="updateEmployee()">
					<div class="row">
						<div class="col-8 offset-2">
							<div class="row">
								<label for="first_name" class="col-md-4 col-form-label">First Name</label>
								<input id="first_name" v-model="form.first_name" type="text" class="form-control" required>
							</div>
							<div class="row">
								<label for="middle_name" class="col-md-4 col-form-label">Middle Name</label>
								<input id="middle_name" v-model="form.middle_name" type="text" class="form-control" required>
							</div>
							<div class="row">
								<label for="last_name" class="col-md-4 col-form-label">Last Name</label>
								<input id="last_name" v-model="form.last_name" type="text"  class="form-control" required>
							</div>
							<div class="row">
								<label for="address" class="col-md-4 col-form-label">Address</label>
								<input id="address" v-model="form.address" type="text"  class="form-control" required>
							</div>
							<div class="row">
								<label class="col-md-4 col-form-label">Department</label>
								<select v-model="form.department_id"  class="form-control" aria-label="Default select example">
									<option v-for="department in departments" :key="department.id" :value="department.id">{{department.name}}</option>
								</select>
							</div>
							<div class="row">
								<label class="col-md-4 col-form-label">Country</label>
								<select v-model="form.country_id" @change="getStates()"  class="form-control" aria-label="Default select example">
									<option v-for="country in countries" :key="country.id" :value="country.id">{{country.name}}
									</option>
								</select>
							</div>
							<div class="row">
								<label class="col-md-4 col-form-label">State</label>
								<select 
								v-model="form.state_id"
								 @change="getCities()"
								 
							     class="form-control">
									<option v-for="state in states" :key="state.id" :value="state.id">
									{{state.name}}
								    </option>
								</select>
							</div>
							<div class="row">
								<label class="col-md-4 col-form-label">City</label>
								<select v-model="form.city_id" class="form-control">
									<option v-for="city in cities" :key="city.id" :value="city.id">{{city.name}}</option>
								</select>
							</div>
							<div class="row">
								<label for="zip_code" class="col-md-4 col-form-label">Zip Code</label>
								<input id="zip_code" v-model="form.zip_code" type="text" class="form-control" required>
							</div>
							<div class="form-group row mt-2">
								<label for="birthday" class="col-md-4 col-form-label">Birthday</label>
								<div class="col-md-12">
									<datepicker v-model="form.birthday" input-class="form-control"></datepicker>
								</div>
								
							</div>
							<div class="form-group row mt-2">
								<label for="date_hired" class="col-md-4 col-form-label">Date Hired</label>
								<div class="col-md-12">
									<datepicker v-model="form.date_hired" input-class="form-control"></datepicker>
								</div>
								
							</div>
							<div class="row">
								<div class="row pt-4 pl-2">
									<button class="btn btn-primary">Update</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';
import moment from 'moment';
export default {

	components:{
		Datepicker
	},
	data(){
		return {
			countries: [],
			states: [],
			departments: [],
			cities: [],

			form:{
				first_name: "",
				last_name: "",
				middle_name: "",
				address: "",
				country_id: "",
				state_id: "",
				department_id: "",
				city_id: "",
				zip_code: "",
				birthday: null,
				date_hired: null

			}
		};
	},
	created(){
		this.getCountries();
		this.getDepartments();
		this.getEmployees();
		
	},
	methods:{
		 //show method
	    getEmployees(){
	        axios.get('/api/employees/' + this.$route.params.id)
	        .then(res =>{
	           this.form = res.data.data
	           this.getStates();
			   this.getCities();
	        }).catch(err => {
	            console.log(err);
	        });
	    },
		getCountries(){
			axios.get("/api/employees/countries")
			.then(res => {
				this.countries = res.data
			}).catch(error =>{
				console.log(error)
			});
		},
		getStates(){
			axios.get("/api/employees/" + this.form.country_id + "/states")
			.then(res => {
				this.states = res.data
			}).catch(error =>{
				console.log(error)
			});
		},
		getCities(){
			axios.get("/api/employees/" + this.form.state_id + "/cities")
			.then(res => {
				this.cities = res.data
			}).catch(error =>{
				console.log(error)
			});
		},
			getDepartments(){
			axios.get("/api/employees/departments")
			.then(res => {
				this.departments = res.data
			}).catch(error =>{
				console.log(error)
			});
		},
		updateEmployee(){
			axios.put("/api/employees/" + this.$route.params.id, {
				first_name: this.form.first_name,
				middle_name: this.form.middle_name,
				last_name: this.form.last_name,
				address: this.form.address,
				country_id: this.form.country_id,
				state_id: this.form.state_id,
				city_id: this.form.city_id,
				department_id: this.form.department_id,
				zip_code: this.form.zip_code,
				birthday: this.format_date(this.form.birthday),
				date_hired: this.format_date(this.form.date_hired)
			}).then(res => {
				this.$router.push({name: 'EmployeesIndex'});
			});
		},
		format_date(value){
			if (value) {
				return moment(String(value)).format('YYYYMMDD');
			}
		}
	}
};
</script>

<style lang="css" scoped>
</style>
