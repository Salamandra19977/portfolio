<template>
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Таблица изображений</h3>
                        </div>
                        <div class="card-body">
                            <images-table></images-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import ImagesTable from './ImagesTable'

    export default {
        name: "Index",
        components: {ImagesTable}
    }
</script>

<style scoped>

</style>