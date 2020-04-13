<template>
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Таблица коментариев</h3>
                        </div>
                        <div class="card-body">
                            <comments-table></comments-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import CommentsTable from "./CommentsTable";
    export default {
        name: "Index",
        components: {CommentsTable}
    }
</script>

<style scoped>

</style>