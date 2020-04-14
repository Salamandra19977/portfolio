<template>
    <div class="home">
        <section class="dashboard-counts no-padding-bottom pb-4">
            <div class="container-fluid">
                <div class="row bg-white has-shadow">
                    <!-- Item -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="item d-flex align-items-center">
                            <div class="icon bg-violet"><i class="fa fa-users"></i></div>
                            <div class="title"><span>Количество<br>Пользователей</span>
                            </div>
                            <div class="number"><strong>{{stats.count_users}}</strong></div>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="item d-flex align-items-center">
                            <div class="icon bg-red"><i class="fa fa-folder-open"></i></div>
                            <div class="title"><span>Количество<br>Работ</span>
                            </div>
                            <div class="number"><strong>{{stats.count_works}}</strong></div>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="item d-flex align-items-center">
                            <div class="icon bg-green"><i class="fa fa-comments"></i></div>
                            <div class="title"><span>Количество<br>Коментариев</span>
                            </div>
                            <div class="number"><strong>{{stats.count_comments}}</strong></div>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="item d-flex align-items-center">
                            <div class="icon bg-orange"><i class="fa fa-image"></i></div>
                            <div class="title"><span>Количество<br>Изображений</span>
                            </div>
                            <div class="number"><strong>{{stats.count_images}}</strong></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        name: "Home",
        data() {
            return {
                stats:[]
            }
        },
        methods: {
            getData() {
                axios.get('/api/home')
                    .then(r => this.stats = r.data)
                    .catch(error => {
                        if (error.response.status == 401){
                            window.location.href = 'portfolio';
                        }
                    });
            }
        },
        created() {
            this.getData()
        }
    }
</script>

<style scoped>

</style>