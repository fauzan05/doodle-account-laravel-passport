<template>
    <div class=" d-flex flex-column align-items-center justify-content-center" style="width: 100%;">
        <form action="" class="row d-flex flex-column align-items-center justify-content-center">
            <div class="my-3 col-12">
                <label for="exampleFormControlTextarea1" class="form-label">Isi Todo</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="my-3 col-12">
                <select class="form-select" aria-label="Default select example">
                        <option value="" disabled selected>Pilih</option>
                        <option :value="category.id" v-for="(category, index) in categories" :key="index">{{ category.name }}</option>
                </select>
            </div>
            <button type="submit" class="btn btn-dark">Buat Todo</button>
        </form>
    </div>
</template>
<script>
export default {
    data() {
        return {
            categories: []
        }
    },
    mounted() {
        // mengambil data json pada endpoint /categories
        axios.get('/categories').then((response) => {
            this.categories = response.data
            console.log(this.categories)
        }).catch((err) => {
            console.log(err);
        });
    }
}
</script>