<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/preloader.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Student Record</title>
</head>
<body>




<!-- Preloader -->
<div class='body'>
  <span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
  </span>
  <div class='base'>
    <span></span>
    <div class='face'></div>
  </div>
</div>
<br><br>
<div class='longfazers'>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
</div>
<!-- Preloader -->








<div class="container" id="app">
<div class="card card-body mt-5">
<div class="card-header">
<h3 class="text-center text-white">STUDENT RECORD</h3>
</div>
<div class="card-content">
<table class="table table-striped">
    <div v-if="er" class="alert alert-warning">
        <p>{{ er  }}</p>
    </div>
    <div v-if="suc" class="alert alert-success">
        <p>{{ suc  }}</p>
    </div>
    <tr>
    <td><input type="text" class="form-control p-2" placeholder="Name"  v-model="name" required></td>
    <td><input type="text" class="form-control p-2" placeholder="01XXXXXX" v-model="phone" required></td>
    <td><input type="email" class="form-control p-2" placeholder="xyz@email.com" v-model="email" required></td>
    <td><input type="text" class="form-control p-2" placeholder="University" v-model="university" required></td>
    <td><button class="btn btn-success" @click="addRecord">Add</button></td>
    </tr>
</table>
<hr>
<table   class="table table-striped table-hover">
    <thead class="bg-info text-white">
    <tr>
    <th>Name</th>
    <th>Phone</th>
    <th>Email</th>
    <th>University</th>
    <th>Action</th>
    </tr>
    </thead>

    <tr v-for="(records, index) in records.data">
    <td>{{ records.name }}</td>
    <td>{{ records.phone }}</td>
    <td>{{ records.email }}</td>
    <td>{{ records.university }}</td>
    <td><button class="btn btn-info mr-2" @click="editrecord(records.id)">Edit</button><span><button @click="deleterecord(records.id)" class="btn btn-danger">Delete</button></span></td>
    </tr>

</table>
</div>
</div>



<!-- Modal -->




<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Record</h5>
        <button type="button" class="close" data-dismiss="modal" @click="closemodal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

      
    <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input" v-model="name" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Phone</span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input"  v-model="phone"  aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input"  v-model="email"  aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">University</span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input"  v-model="university"  aria-describedby="inputGroup-sizing-default">
    </div>





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" @click="closemodal" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" @click="updateRecord">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal End -->





</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<script>

    var app = new Vue({
        el: '#app',
        data: {
            name: '',
            phone:'',
            email:'',
            university:'',
            er:'',
            suc:'',
            selectedRecord:0,
            records:[]
        },
        mounted(){
            var vm =this;
            vm.fetchRecord();
        },

        methods: {

            

            addRecord(){
                let vm = this;
                let name = vm.name;
                let phone = vm.phone;
                let email = vm.email;
                let university = vm.university;
                if(name.length>0 && name.length<255 &&phone.length>0 && phone.length<255 && email.length>0 && email.length<255 &&university.length>0 && university.length<255  ){
                    const SingleRecord = new URLSearchParams();
                    SingleRecord.append('name', name);
                    SingleRecord.append('phone', phone);
                    SingleRecord.append('email', email);
                    SingleRecord.append('university', university);

                    axios.post('api/add.php', SingleRecord)
                    .then(function(response){
                        console.log(response);
                        vm.fetchRecord();
                    })
                    .catch(function(error){
                        console.log(error);
                    });
                    vm.name = '';
                    vm.phone = '';
                    vm.email = '';
                    vm.university = '';
                    vm.suc = 'Record Added';
                    vm.er = '';
                }
                else{
                    vm.er = 'Data Error';
                    vm.suc = '';
                }

            },

            deleterecord(recordIndex){
                let vm = this;
                const SingleRecord = new URLSearchParams();
                SingleRecord.append('id',recordIndex);
                console.log();
                axios.post('api/delete.php', SingleRecord)
                .then(function(response){
                    console.log(response);
                    vm.fetchRecord();
                })
                .catch(function(error){
                    console.log(error);
                });
                vm.suc = 'Record Deleted Successfully!';
                vm.er = '';

            },
            editrecord(recordIndex){
                $('#editModal').modal('show');
                let vm = this;
                vm.selected = recordIndex;
                axios('api/show.php?id='+recordIndex)
                .then(function(response){
                    console.log(response);
                    vm.name = response.data.data[0].name;
                    vm.phone = response.data.data[0].phone;
                    vm.email = response.data.data[0].email;
                    vm.university = response.data.data[0].university;
                })
                .catch(function(error){
                    console.log(error);
                });

            },
            updateRecord(recordIndex){


                let vm = this;
                let name = vm.name;
                let phone = vm.phone;
                let email = vm.email;
                let university = vm.university;
                    const SingleRecord = new URLSearchParams();
                    SingleRecord.append('name', name);
                    SingleRecord.append('phone', phone);
                    SingleRecord.append('email', email);
                    SingleRecord.append('university', university);
                    SingleRecord.append('id', vm.selected);

                    axios.post('api/edit.php', SingleRecord)
                    .then(function(response){
                    $('#editModal').modal('hide');
                    console.log(response);
                    vm.fetchRecord();
                    vm.name = '';
                    vm.phone = '';
                    vm.email = '';
                    vm.university = '';
                    vm.suc = 'Record Updated';
                    vm.er = '';
                    })
                    .catch(function(error){
                        console.log(error);
                    });
                    
                
                

            },
            closemodal(){
                let vm =this;
                vm.name = '';
                vm.phone = '';
                vm.email = '';
                vm.university = '';
            },

            fetchRecord(){
                var vm = this;
                axios.get('api/records.php')
                .then(function(response){
                    vm.records = response.data;
                    
                })
                .catch(function(error){
                    console.log(error);
                })
            }

        }





    })
</script>
</body>
</html>