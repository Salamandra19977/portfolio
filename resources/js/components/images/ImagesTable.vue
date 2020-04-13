<template>
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Название</th>
            <th>Изображение</th>
            <th>Размер</th>
            <th>Расширение</th>
            <th>ID работы</th>
            <th>Дата загрузки</th>
            <th>Настройки</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(image,index) in images">
            <th scope="row">{{image.id}}</th>
            <td>{{image.name}}</td>
            <th>{{image.patch_cover}}</th>
            <td>{{image.size}}</td>
            <td>{{image.extension}}</td>
            <td>{{image.work_id}}</td>
            <td>{{image.created_at}}</td>
            <td>
                <div class="card-body p-0 text-center d-flex justify-content-lg-start">
                    <button type="button" class="btn btn-primary mr-2"><i class="fas fa-download"></i></button>
                    <button type="button" class="btn btn-primary"><i class="fa fa-trash"></i></button>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        name: "ImagesTable",
        data() {
            return {
                images: []
            }
        },
        methods: {
            getImages() {
                axios.get('/api/images')
                    .then(r => this.images = r.data)
            }
        },
        created() {
            console.log("++");
            this.getImages()
        }
    }
</script>

<style scoped>

</style>