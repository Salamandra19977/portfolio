<template>
        <section class="tables">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">Таблица работ</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <works-table></works-table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</template>

<script>
    import WorksTable from './WorksTable'

    export default {
        name: "Index",
        components: {WorksTable}

    }
</script>

<style scoped>

</style>