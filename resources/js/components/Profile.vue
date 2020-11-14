<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header text-white" style="background: url('./img/user.jpg');background-position: center center;background-size: cover; height:200px;">
                    <h3 class="widget-user-username text-right">Elizabeth Pierce</h3>
                    <h5 class="widget-user-desc text-right">Web Designer</h5>
                </div>
                <div class="widget-user-image" style="top:150px;">
                    <img class="img-circle" :src="getProfilePhoto()" style="border:0; height:90px;width:90px;" alt="User Photo">
                </div>
                <div class="card-footer">
                    <div class="row">
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                        <h5 class="description-header">3,200</h5>
                        <span class="description-text">SALES</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                        <h5 class="description-header">13,000</h5>
                        <span class="description-text">FOLLOWERS</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                        <div class="description-block">
                        <h5 class="description-header">35</h5>
                        <span class="description-text">PRODUCTS</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane" id="activity">
                    <!-- Post -->
                        <h2 class="text-center">Display User Activity</h2>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->

                  <!-- /.tab-pane -->

                  <div class="tab-pane active" id="settings">
                    <form @submit.prevent="updateInfo" class="form-horizontal">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input v-model="form.name" type="text" name="name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" id="inputName" placeholder="Name">
                          <has-error :form="form" field="name"></has-error>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input v-model="form.email" type="email" name="email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" id="inputEmail" placeholder="Email">
                          <has-error :form="form" field="email"></has-error>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea v-model="form.bio" class="form-control" name="bio" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Profile Photo</label>
                        <div class="col-sm-10">
                          <input type="file" @change="updateProfile" name="photo" id="" placeholder="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-4 col-form-label">Password (leave empty if not changing)</label>
                        <div class="col-sm-10">
                          <input v-model="form.password" type="password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" id="inputSkills" name="password" placeholder="Password">
                          <has-error :form="form" field="password"></has-error>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-2 col-form-label">
                          <button type="submit" class="btn btn-success pl-4 pr-4">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
        </div>
    </div>
</template>

<style>

.widget-user-header{

}

</style>

</style>

<script>
    export default {
        data() {
            return {
                form: new Form({
                    id:'',
                    name: '',
                    email: '',
                    password: '',
                    type: '',
                    bio: '',
                    photo: '',
                })
            }
        },
        created(){
            axios.get('api/profile')
            .then(({data}) => (this.form.fill(data)));
        },
        methods:{
          getProfilePhoto() {
              let prefix = (this.form.photo.match(/\//) ? '' : '/img/profile/');
              if(!this.form.photo){return '';} //if the photo doesn't get ready return nothing
              return prefix + this.form.photo; //else return the photo
          },
          updateInfo(){
              this.$Progress.start();

              if(this.form.password == ""){ // because if someone write an password and clear it
                  this.form.password = undefined;
              }

              this.form.put('api/profile')
              .then(() => {
                  this.$Progress.finish();
              })
              .catch(() => {
                  this.$Progress.fail();
              });
          },
          updateProfile(e){ // Profile image
            let file = e.target.files[0];
            console.log(file);
            let reader = new FileReader();

            if(file['size'] < 2097152){ // if the file less than 2MB then convert the image to Base46
                reader.onloadend = (file) => {
                //console.log('RESULT', reader.result);
                this.form.photo = reader.result;
                }
                reader.readAsDataURL(file);
            }else{ // You should upload image less than 2MB
                Swal.fire({
                    icon:'error',
                    title:'Oops...',
                    text:'Your image must be less than 2MB',
                })
            }
          },
        },
    }
</script>
