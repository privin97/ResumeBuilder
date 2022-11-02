<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EductionRecord;
use App\Models\WorkExperience;
use Session;

class ResumeBuilder extends Controller
{
    public function index (Request $request) {

        $request->session()->regenerate();

        return view('resume_builder.pages.index');
    }

    public function addEducation(Request $request) {

        $session = Session::getId();

        $checksession = EductionRecord::where('session_token', $session)->get()->count();

        if ($checksession < 3)
        {
            $newrecord = EductionRecord::create([
                'session_token' => $session,
                'course_of_education' => $request->course_of_education,
                'place_of_education' => $request->place_of_education,
                'start_of_education' => $request->start_of_education,
                'end_of_education' => $request->end_of_education,
            ]);

            return '1';
            
        } else {
            return '0';
        }
        
    }

    public function getEducation(Request $request) {
        $session = Session::getId();

        $getData = EductionRecord::where('session_token', $session)->get()->toJson();

        return $getData;
    }

    public function deleteEducation(Request $request, $id) {
        $session = Session::getId();

        $deleteData = EductionRecord::where('id', $id)->first()->delete();

        return 'Successful';
    }

    public function addExperience(Request $request) {

        $session = Session::getId();

        $checksession = WorkExperience::where('session_token', $session)->get()->count();

        if ($checksession < 3)
        {
            $newrecord = WorkExperience::create([
                'session_token' => $session,
                'name_of_employer' => $request->name_of_employer,
                'position_of_job' => $request->position_of_job,
                'start_of_employer' => $request->start_of_employer,
                'end_of_employer' => $request->end_of_employer,
                'present' => $request->present,
            ]);

            if($newrecord)
            {
                $response = ['message' => '1', 'url' => $session, 'responseCode' => 200];

                return response($response, 200);
            }
            else
            {

                $response = ['message' => 'Unable to save the info', 'responseCode' => 400];

                return response($response, 400);
            }

        } else {
            return '0';
        }
        
    }

    public function getExperience(Request $request) {
        $session = Session::getId();

        $getData = WorkExperience::where('session_token', $session)->get()->toJson();

        return $getData;
    }

    public function deleteExperience(Request $request, $id) {
        $session = Session::getId();

        $deleteData = WorkExperience::where('id', $id)->first()->delete();

        return 'Successful';
    }

    public function viewResume (Request $request, $session) {

        $retrieveEducation = EductionRecord::where('session_token', $session)->get();

        $retrieveExperience = WorkExperience::where('session_token', $session)->get();

        // dd($retrieveEducation);

        return view('resume_builder.pages.resume', [
            'education' => $retrieveEducation,
            'experience' => $retrieveExperience
        ]);
        
    }
}
