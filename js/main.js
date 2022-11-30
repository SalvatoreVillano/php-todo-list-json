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
        if (this.todoList[i].done == false){
            this.todoList[i].done = true
        }else{
            this.todoList[i].done = false
        }
    },
    removeTask(i){
        this.todoList.splice(i, 1)
    },
},


mounted(){
    this.getTodo();
},
}).mount('#app');