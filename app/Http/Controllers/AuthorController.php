<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        if ($authors->isEmpty()) {
            return response()->json([
                'status' => 200,
                'data' => $authors,
                'message' => 'Table is empty'
            ]);
        }
        else {
            return response()->json([
                'status' => 200,
                'data' => $authors,
                'message' => 'Data retrieved successfully'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author = new Author();
        $author->name = $request['name'];
        $author->date_of_birth = $request['date_of_birth'];
        $author->place_of_birth = $request['place_of_birth'];
        $author->gender = $request['gender'];
        $author->email = $request['email'];
        $author->hp = $request['hp'];
        $author->save();

        return response()->json([
            'status' => 201,
            'data' => $author,
            'message' => 'Data created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = Author::find($id);
        
        if ($author) {
            return response()->json([
                'status' => 200,
                'data' => $author,
                'message' => 'Data retrieved successfully'
            ]);
        }
        else {
            return response()->json([
                'status' => 404,
                'data' => $author,
                'message' => 'Data is not found'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $author = Author::find($id);
        if ($author) {
            $author->name = $request->name ? $request->name : $author->name;
            $author->date_of_birth = $request->date_of_birth ? $request->date_of_birth : $author->date_of_birth;
            $author->place_of_birth = $request->place_of_birth ? $request->place_of_birth : $author->place_of_birth;
            $author->gender = $request->gender ? $request->gender : $author->gender;
            $author->email = $request->email ? $request->email : $author->email;
            $author->hp = $request->hp ? $request->hp : $author->hp;
            $author->save();
    
            return response()->json([
                'success' => 200,
                'data' => $author,
                'message' => 'Data updated successfully'
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'data' => $author,
                'message' => $id.' Data does not exists'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Author::destroy($id);
        return response()->json([
            'status' => 200,
            'message' => 'Data deleted successfully'
        ]);
    }
}
