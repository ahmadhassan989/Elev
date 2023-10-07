<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCandidateRequest;
use App\Http\Requests\updateCandidateRequest as UpdateCandidateRequest;
use App\Models\Candidate;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use League\Csv\Writer;




class CandidateController extends Controller
{
    public function index(Request $request)  {
        $query = Candidate::all();

        if ($request->has('f_name')) {
            $query->where('first_name', 'like', '%'.$request->f_name.'%');
        }
    
        if ($request->has('email')) {
            $query->where('email', 'like', '%'.$request->email.'%');
        }

        if ($request->has('job_major')) {
            $query->where('job_major', 'like', '%'.$request->job_major.'%');
        }
        // Check if email is provided for search
        if ($request->has('yoe')) {
            $query->where('years_of_experience', 'like', '%'.$request->yoe.'%');
        }
        if ($request->has('degree_type')) {
            $query->where('degree_type', 'like', '%'.$request->degree_type.'%');
        }
        if ($request->has('gender')) {
            $query->where('gender', 'like', '%'.$request->gender.'%');
        }
        
        $candidates = $query->paginate(10);

        return response()->json(['status' => true, 'Candidate' => $candidates], 200);
        
    }

    // create new candidate
    public function store(CreateCandidateRequest $request) :JsonResponse
    {
        $data = $request->validated();
        // If validation passes, create the Candidate
        $candidate = Candidate::create($data);

        return response()->json(['message' => 'Candidate created successfully', 'Candidate' => $candidate], 201);
    }

    public function update(UpdateCandidateRequest $request, $id) : JsonResponse
    {
        $candidate = Candidate::findorfail($id);

        $data = $request->validated();

        $candidate->update($data);

        return response()->json(['message' => 'Candidate updated successfully', 'candidate' => $candidate]);
    }

    public function show($id)  {
        $candidate = Candidate::findorfail($id);
        return response()->json(['status' => true, 'Candidate' => $candidate]);
        
    }

    public function destroy($id) : JsonResponse {

        $candidate = Candidate::findorfail($id);

        $candidate->delete();
        return response()->json(['status' => true, 'message' => ' Candidate deleted !!']);
    }


    // generate report

    public function generateReport(Request $request)
    {
        // Get all candidates
        $candidates = Candidate::paginate(20);  // we can use chunk too
        // Generate CSV
        $csv = Writer::createFromFileObject(new \SplTempFileObject());

        // Add CSV headers
        $csv->insertOne([
            'ID', 'First Name', 'Last Name', 'Email', 'UUID',
            'Career Level', 'Job Major', 'Years of Experience',
            'Degree Type', 'Skills', 'Nationality', 'City', 'Salary', 'Gender'
        ]);

        // Add candidate data
        foreach ($candidates as $candidate) {
            $csv->insertOne([
                $candidate->id, $candidate->first_name, $candidate->last_name, $candidate->email,
                $candidate->uuid, $candidate->career_level, $candidate->job_major,
                $candidate->years_of_experience, $candidate->degree_type, implode(', ', $candidate->skills),
                $candidate->nationality, $candidate->city, $candidate->salary, $candidate->gender
            ]);
        }

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="candidates_report.csv"'
        ];

        return Response::make($csv->output(), 200, $headers);
    }


}

