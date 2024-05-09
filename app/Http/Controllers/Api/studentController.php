<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class studentController extends Controller
{
    // Obtain all students data
    public function index()
    {
        $students = Student::all();

        if ($students->isEmpty()) {
            $data = [
                'message' => 'No students found',
                'status' => 200,
            ];
            return response()->json($data, 404);
        }

        return response()->json($students, 200);
    }

    // Save student data
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:student',
            'phone' => 'required|digits:10',
            'language' => 'required|in:en,es,fr',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Data validation error',
                'errors' => $validator->errors(),
                'status' => 400,
            ];
            return response()->json($data, 400);
        }
        // $student = Student::create($request->all());
        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'language' => $request->language,
        ]);

        if (!$student) {
            $data = [
                'message' => 'Error creating student',
                'status' => 500,
            ];
            return response()->json($data, 500);
        }

        $data = [
            'student' => $student,
            'status' => 201,
        ];
        return response()->json($data, 201);
    }

    // Find student data
    public function show($id)
    {
        $student = Student::find($id);
        if (!$student) {
            $data = [
                'message' => 'Student not found',
                'status' => 404,
            ];
            return response()->json($data, 404);
        }
        $data = [
            'student' => $student,
            'status' => 200,
        ];
        return response()->json($data, 200);
    }

    // Delete student data
    public function delete($id)
    {
        $student = Student::find($id);
        if (!$student) {
            $data = [
                'message' => 'Studient not found',
                'status' => 404,
            ];
            return response()->json($data, 404);
        }
        $student->delete();
        $data = [
            'message' => 'Student data deleted',
            'status' => 200,
        ];
        return response()->json($data, 200);
    }

    // Update student data (all data from a student)
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if (!$student) {
            $data = [
                'message' => 'Student not found',
                'status' => 404,
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:student',
            'phone' => 'required|digits:10',
            'language' => 'required|in:en,es,fr',
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Data validation error',
                'errors' => $validator->errors(),
                'status' => 400,
            ];
            return response()->json($data, 400);
        }
        // $student->update($request->all());
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->language = $request->language;

        $student->save();

        $data = [
            'message' => 'Student data updated',
            'student' => $student,
            'status' => 200,
        ];
        return response()->json($data, 200);
    }

    // Update student data (some data from a student)
    public function parcialUpdate(Request $request, $id)
    {
        $student = Student::find($id);
        if (!$student) {
            $data = [
                'message' => 'Student not found',
                'status' => 404,
            ];
            return response()->json($data, 404);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'max:255',
            'email' => 'email|unique:student',
            'phone' => 'digits:10',
            'language' => 'in:en,es,fr',
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Data validation error',
                'status' => 400,
            ];
            return response()->json($data, 400);
        }
        if ($request->has('name')) {
            $student->name = $request->name;
        }
        if ($request->has('email')) {
            $student->email = $request->email;
        }
        if ($request->has('phone')) {
            $student->phone = $request->phone;
        }
        if ($request->has('language')) {
            $student->language = $request->language;
        }

        $student->save();

        $data = [
            'message' => 'Student data updated',
            'student' => $student,
            'status' => 200,
        ];
        return response()->json($data, 200);
    }
}
