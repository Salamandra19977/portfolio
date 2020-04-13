<template>
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Таблица пользователей</h3>
                        </div>
                        <div class="card-body">
                            <users-table></users-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import UsersTable from './UsersTable'

    export default {
        name: "Index",
        components: {UsersTable}
    }
</script>

<style scoped>

</style>