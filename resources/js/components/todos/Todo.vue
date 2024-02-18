<template>
    <div class=" d-flex flex-column align-items-center justify-content-center" style="width: 100%;">
        <form @submit.prevent="createTodos" action="#" class="row d-flex flex-column align-items-center justify-content-center">
            <div class="my-3 col-12">
                <label for="exampleFormControlTextarea1" class="form-label">Isi Todo</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="body"></textarea>
            </div>
            <div class="my-3 col-12">
                <select class="form-select" aria-label="Default select example" v-model="selected_category">
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
            categories: [],
            body: null,
            selected_category: null
        }
    },
    props: {
        todos: Array
    },
    methods: {
        createTodos() {
            axios.post('/todos', {
                body: this.body,
                category_id: this.selected_category // Sertakan selected_category dalam data yang dikirimkan
            }).then((response) => {
                // console.log("ini adalah body " + this.selected_category)
                this.todos.unshift(response.data);
                // console.log(response.data)
                // console.log(this.todos)
                this.body = null;
            }).catch(err => {
                console.log(err);
            });
        }
    },
    mounted() {
        // mengambil data json pada endpoint /categories
        axios.get('/categories').then((response) => {
            this.categories = response.data
        }).catch((err) => {
            console.log(err);
        });
    }
}
</script>
