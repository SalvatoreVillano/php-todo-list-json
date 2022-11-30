<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>

    <main class="container w-50 py-5 mt-5">
        <div id="app">
            <div class="col-12 text-center">
                <label class="fw-bold display-5">To-Do List</label>
                <div class="d-flex">
                    <input placeholder="Aggiungi una task!" v-model="newTodo" @keyup.enter="addTodo()"
                        class="form-control" type="text" />
                    <button @click="addTodo" class="btn btn-dark ms-2">Aggiungi</button>
                </div>
            </div>
            <div class="col-12">
                <ul class="list-group">
                    <li v-for="(todo, i) in todoList" class="list-group-item d-flex">
                        <span class="p-1" v-if="todo.done"><i class="fa-solid fa-check green"></i></span>
                        <div @click="makeDone(i)" class="me-auto">
                            <p v-if="todo.done == true" class="mb-0 text-success text-decoration-line-through fw-bold">
                                {{todo.text}}</p>
                            <p v-else class="mb-0">{{todo.text}}</p>
                        </div>
                        <span role="button" @click="removeTask(i)" class="badge bg-danger rounded">Elimina</span>
                    </li>
                </ul>
            </div>
        </div>
    </main>


    <script src="./js/main.js"></script>
</body>



</html>