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
                    <button type="button" v-on:click="del(work.id, index)" class="btn btn-primary"><i class="fa fa-trash"></i></button>
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
                    .catch(error => {
                        if (error.response.status == 401){
                            window.location.href = 'portfolio';
                        }
                    });
            },
            del(id, index) {
                if (confirm("Вы действительно хотите удалить работу?")) {
                    var app = this;
                    axios.get('/api/works/del/' + id)
                        .then(r => this.works = r.data)
                        .catch(error => {
                            if (error.response.status == 401){
                                window.location.href = 'portfolio';
                            }
                        });
                }
            }
        },
        created() {
            this.getWorks()
        }
    }
</script>

<style scoped>

</style>