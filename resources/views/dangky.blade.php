<template>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="btn btn-danger">Đăng ký</h1>
                    <form action="" method="post" v-on:submit.prevent="onSubmit">
 
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Họ tên</td>
                                    <td><input type="text" name="name" v-model="user.name" class="form-control" placeholder="Nhập họ tên"></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input type="email" name="email" v-model="user.email" class="form-control" placeholder="Nhập email"></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td><input type="username" name="username" v-model="user.username" class="form-control" placeholder="Nhập username"></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><input type="password" name="pass" v-model="user.pass" class="form-control" placeholder="Nhập password"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button class="btn btn-warning">Đăng ký</button>
                                    <label class="label label-success" v-if="check">Đăng ký thành công</label><br/>
                                    <router-link :to="{name:'ListUser'}" class="label label-primary" v-if="check">Back List User</router-link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
         
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                user:{},
                check:false
            }
        },
        methods:{
            onSubmit(){
                this.axios.post("https://localhost:1000/fashion/dangky",this.user).then((response)=>{
                    this.check=true;
                     
                });
            }
        }
    }
</script>
