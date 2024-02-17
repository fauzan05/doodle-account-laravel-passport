<template>
    <div class="card">
        <div class="card-header">Timeline</div>
        <div class="card-body py-3">
            <todo-component :todos="todos">
            </todo-component>
            <hr>
            <div class="media py-3" v-for="(todo, index) in todos" :key="index">
                <img class="mr-3" src="https://placehold.it/64x64" alt="">
                <div class="media-body">
                    <h5 class="mt-0">{{ todo.user.name }}</h5>
                    <h6><strong>Category : {{ todo.category ? todo.category.name : '' }}</strong></h6>
                    {{ todo.body }}
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Todo from "./Todo.vue";
export default {
    data () {
        return {
            todos: []
        }
    },
    components: {
        Todo
    },
    mounted () {
        // mengambil data json pada endpoint /todos
        axios.get('/todos').then((response) => {
            this.todos = response.data;
        }).catch((err) => {
            console.log(err);
        });
    }
}
</script>