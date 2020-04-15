<template>
    <div class="com">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Автор</th>
                <th>ID Работы</th>
                <th>Коментарий</th>
                <th>Дата написания</th>
                <th>Настройки</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(comment,index) in comments.data">
                <th scope="row">{{comment.id}}</th>
                <td>{{comment.user.name}}</td>
                <td>{{comment.work_id}}</td>
                <td>{{comment.text}}</td>
                <td>{{comment.created_at}}</td>
                <td>
                    <div class="card-body p-0 text-center d-flex justify-content-lg-start">
                        <button type="button" v-on:click="del(comment.id, index)" class="btn btn-primary"><i class="fa fa-trash"></i></button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <pagination :data="comments" @pagination-change-page="getResults"></pagination>
    </div>

</template>

<script>
    export default {
        name: "CommentsTable",
        data() {
            return {
                comments: {}
            }
        },
        methods: {
            getResults(page = 1) {
                axios.get('/api/comments?page=' + page)
                    .then(response => {
                        this.comments = response.data;
                    });
            },
            getComments() {
                axios.get('/api/comments')
                    .then(r => this.comments = r.data)
                    .catch(error => {
                        console.log(error.response.status);
                        if (error.response.status == 401){
                            window.location.href = 'portfolio';
                        }
                    });
            },
            del(id, index) {
                if (confirm("Вы действительно хотите удалить коментарий?")) {
                    var app = this;
                    axios.get('/api/comments/del/' + id)
                        .then(r => this.comments = r.data)
                        .catch(error => {
                            console.log(error.response.status);
                            if (error.response.status == 401){
                                window.location.href = 'portfolio';
                            }
                        });
                }
            }
        },
        created() {
            this.getComments()
        }
    }
</script>

<style scoped>

</style>