<?php
header('Access-Control-Allow-Origin: *');
header("Access-Contro-Allow-Headers: X-Requested-With");

$file_text = file_get_contents('./todo.json');
$todo_list = json_decode($file_text);


if (isset($_POST['newTodo'])) {
    $newTodoText = [
        'text' => $_POST['newTodo'],
        'done' => false,
    ];
    array_push($todo_list, $newTodoText);
    file_put_contents('./todo.json', json_encode($todo_list));

} else if (isset($_POST['toggleTodoIndex'])) {
    $todoIndex = $_POST['toggleTodoIndex'];

    if ($todo_list[$todoIndex]->done == 1) {
        $todo_list[$todoIndex]->done = '';

    } else {
        $todo_list[$todoIndex]->done = 1;
    }

    file_put_contents('./todo.json', json_encode($todo_list));

} else if (isset($_POST['deleteTodoIndex'])) {
    $todoIndex = $_POST['deleteTodoIndex'];
    array_splice($todo_list, $todoIndex, 1);
    file_put_contents('./todo.json', json_encode($todo_list));

} else {
    header('Content-Type: application/json');
    echo json_encode($todo_list);

}


?>