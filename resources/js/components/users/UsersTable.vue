<template>
    <div class="usrt">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Пол</th>
                <th>Роль</th>
                <th>Дата регистрации</th>
                <th>Настройки</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(user,index) in users.data">
                <th scope="row">{{user.id}}</th>
                <td>{{user.name}}</td>
                <td>{{user.email}}</td>
                <td>{{user.sex}}</td>
                <td>{{user.role.name}}</td>
                <td>{{user.created_at}}</td>
                <td>
                    <button type="button" data-toggle="modal" v-on:click="insertData(index)" data-target="#myModal" class="btn btn-primary"><i class="fa fa-edit"></i></button>
                </td>
            </tr>
            </tbody>
            <pagination :data="users" @pagination-change-page="getResults"></pagination>
        </table>
        <div class="card-body p-0 text-center d-flex justify-content-lg-start">
            <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
                <div role="document" class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Редактирование пользователя</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="">
                                <div class="form-group">
                                    <label>Имя</label>
                                    <input v-model="user.name" type="text" placeholder="Имя" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input v-model="user.email" type="email" placeholder="Email Address" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Пол</label>
                                    <select class="form-control" name="sex" v-model="user.sex">
                                        <option class="form-control" disabled selected>Выберите пол</option>
                                        <option class="form-control" value="мужской">Мужской</option>
                                        <option class="form-control" value="женский">Женский</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Роль</label>
                                    <select class="form-control" name="role_id" v-model="user.role_id">
                                        <option class="form-control" disabled selected>Выберите роль</option>
                                        <option class="form-control" value="1">Администратор</option>
                                        <option class="form-control" value="3">Пользователь</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Пароль</label>
                                    <input v-model="user.password" type="password" placeholder="Password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="button" data-dismiss="modal" value="Сохранить" @click="updateUser" class="btn btn-primary">
                                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Закрыть</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

    export default {
        name: "UsersTable",
        data() {
            return {
                users: {},
                user: {
                    id: '',
                    name: '',
                    email: '',
                    city: '',
                    sex:'',
                    role_id: '',
                    password: ''
                },
            }
        },
        methods: {
            getResults(page = 1) {
                axios.get('/api/users?page=' + page)
                    .then(response => {
                        this.users = response.data;
                    });
            },
            getUsers() {
                axios.get('/api/users')
                    .then(r => this.users = r.data)
                    .catch(error => {
                        console.log(error.response.status);
                        if (error.response.status == 401){
                            window.location.href = 'portfolio';
                        }
                    });
            },
            updateUser() {
                axios.post('/admin/users/update',this.user)
                    .then(r => this.users = r.data)
                    .catch(error => {
                        if (error.response.status == 500){
                            alert("Уже есть пользователь с таким email");
                        }
                        if (error.response.status == 401){
                            window.location.href = 'portfolio';
                        }
                    });
            },
            insertData(index) {
                this.user.id = this.users.data[index].id;
                this.user.name = this.users.data[index].name;
                this.user.email = this.users.data[index].email;
                this.user.city = this.users.data[index].city;
                this.user.sex = this.users.data[index].sex;
                this.user.role_id = this.users.data[index].role_id;
                this.user.password = null;
            },
            onChangeSex(event) {
                this.user.sex = event.target.value;
            },
            onChangeRole(event) {
                if(event.target.value == 1) {
                    console.log(event.target.value);
                    this.user.role_id = 1
                }
                if(event.target.value == 2) {
                    console.log(event.target.value);
                    this.user.role_id = 3
                }
            }
        },
        created() {
            this.getUsers()
        }
    }
</script>

<style scoped>

</style>