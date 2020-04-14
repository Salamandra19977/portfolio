<template>
    <ul class="list-unstyled">
        <router-link tag="li" active-class="active" to="/dashboard/home"><a><i class="fa fa-home"></i>Главная </a></router-link>
        <router-link tag="li" active-class="active" to="/dashboard/users"><a><i class="fa fa-users"></i>Пользователи </a></router-link>
        <router-link tag="li" active-class="active" to="/dashboard/works"><a><i class="fa fa-object-ungroup"></i>Работы </a></router-link>
        <router-link tag="li" active-class="active" to="/dashboard/images"><a><i class="fa fa-image"></i>Изображения </a></router-link>
        <router-link tag="li" active-class="active" to="/dashboard/comments"><a><i class="fa fa-comments"></i>Коментарии </a></router-link>
    </ul>
</template>

<script>
    export default {
        name: "Navigation"
    }
</script>

<style scoped>

</style>