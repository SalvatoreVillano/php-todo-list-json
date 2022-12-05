const { createApp } = Vue;

createApp({
    data(){
        return{
            newTodo: '',
            todoList: [],
            apiUrl: './server.php',
                }
    },
methods: {
    getTodo(){
        axios.get(this.apiUrl).then((response) => {
            this.todoList = response.data;
        });
    },
    addTodo(){
        const data = {
            newTodo: this.newTodo,
        }
        axios.post(this.apiUrl, data, {headers: {'Content-Type': 'multipart/form-data'}}).then((response) =>{
            console.log(response.data)
            this.getTodo();
            this.newTodo = '';
        });
    },
    makeDone(i){
        const todoFormData = {
            toggleTodoIndex: i,
        }
        axios.post(this.apiUrl,todoFormData,{headers: {'Content-Type': 'multipart/form-data'}}).then((response) =>{
            this.getTodo();
    });

    },
    removeTask(i){
        const todoFormData = {
            deleteTodoIndex: i,
        }
        axios.post(this.apiUrl,todoFormData,{headers: {'Content-Type': 'multipart/form-data'}}).then((response) =>{
            this.getTodo();
        })
    },
},

mounted(){
    this.getTodo();
},
}).mount('#app');