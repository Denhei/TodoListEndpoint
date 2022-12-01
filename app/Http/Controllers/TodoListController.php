<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoListController extends Controller
{
    public function getAllTodo() {
      $todo = Todo::get()->toJson(JSON_PRETTY_PRINT);
        return response($todo, 200);
    }

    public function updateTodo(Request $request, $id) {
      if (Todo::where('id', $id)->exists()) {
        $todo = Todo::find($id);
        $todo->title = is_null($request->title) ? $student->title : $request->title;
        $todo->description = is_null($request->description) ? $student->description : $request->description;
        $todo->save();

        return response()->json([
            "message" => "records updated successfully"
        ], 200);
        }
        else
        {
            return response()->json([
                "message" => "Todo not found"
            ], 404);
        }
    }

    public function createTodo(Request $request) {
        $result = json_decode($request->getContent(), true);

        $todo = new Todo;
        $todo->title = $result['title'];
        $todo->description = $result['description'];
        $todo->save();

        return response()->json([
              "message" => json_encode($todo)
          ], 201);
    }

    public function deleteTodo ($id) {
      if(Todo::where('id', $id)->exists()) {
        $todo = Todo::find($id);
        $todo->delete();

        return response()->json([
          "message" => "records deleted"
        ], 202);
      } else {
        return response()->json([
          "message" => "Todo not found"
        ], 404);
      }
    }
}
