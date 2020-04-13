<template>
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
        <tr v-for="(user,index) in users">
            <th scope="row">{{user.id}}</th>
            <td>{{user.name}}</td>
            <td>{{user.email}}</td>
            <td>{{user.sex}}</td>
            <td>{{user.role.name}}</td>
            <td>{{user.created_at}}</td>
            <td>
                <div class="card-body p-0 text-center d-flex justify-content-lg-start">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="fa fa-edit"></i></button>
                    <!-- Modal-->
                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
                        <div role="document" class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 id="exampleModalLabel" class="modal-title">Редактирование пользователя</h4>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label>Имя</label>
                                            <input type="text" placeholder="Имя" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" placeholder="Email Address" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Пол</label>
                                            <input type="email" placeholder="Email Address" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Роль</label>
                                            <input type="email" placeholder="Email Address" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Пароль</label>
                                            <input type="password" placeholder="Password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Сохранить" class="btn btn-primary">
                                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Закрыть</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>

    export default {
        name: "UsersTable",
        data() {
            return {
                users: []
            }
        },
        methods: {
            getUsers() {
                axios.get('/api/users')
                    .then(r => this.users = r.data)
            }
        },
        created() {
            this.getUsers()
        }
    }
</script>

<style scoped>

</style>