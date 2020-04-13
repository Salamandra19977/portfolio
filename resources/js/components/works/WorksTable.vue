<template>
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Название</th>
            <th>Описание работы</th>
            <th>Автор</th>
            <th>Дата создания</th>
            <th>Настройки</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(work,index) in works">
            <th scope="row">{{work.id}}</th>
            <td>{{work.name}}</td>
            <td>{{work.description}}</td>
            <td>{{work.user.name}}</td>
            <td>{{work.created_at}}</td>
            <td>
                <div class="card-body p-0 text-center d-flex justify-content-lg-start">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary mr-2"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-primary"><i class="fa fa-trash"></i></button>
                    <!-- Modal-->
                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
                        <div role="document" class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 id="exampleModalLabel" class="modal-title">Редактирование работы</h4>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label>Название работы</label>
                                            <input type="text" placeholder="Название работы" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Описание работы</label>
                                            <input type="text" placeholder="Описание работы" class="form-control">
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
        name: "WorksTable.vue",
        data() {
            return {
                works: []
            }
        },
        methods: {
            getWorks() {
                axios.get('/api/works')
                    .then(r => this.works = r.data)
            }
        },
        created() {
            this.getWorks()
        }
    }
</script>

<style scoped>

</style>