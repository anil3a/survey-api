<?php 
namespace App\Http\Controllers\v1;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Survey; //loads the Survey model
use Illuminate\Http\Request; //loads the Request class for retrieving inputs

class SurveyController extends BaseController
{
    /**
     * Get All Survey
     * @return  Object
     * @author Anil <anilprz3@gmail.com>
     * @version 1.0
     */
    public function index()
    {
    	return Survey::all();
    }

    /**
     * Get survey's details
     * @return  [type] [description]
     * @author Anil <anilprz3@gmail.com>
     * @version 1.0
     */
    public function show($id)
    {
    	return Survey::find($id);
    }

    /**
     * Insert new record to Survey table
     * @return  JSON object
     * @author Anil <anilprz3@gmail.com>
     * @version 1.0
     */
    public function store( Request $request )
    {
    	$this->validate($request, [
            'name' => 'required',
	        'description' => 'sometimes',
            'start_date'  => 'sometimes',
            'end_date'  => 'sometimes',
            'no_of_question' => 'sometimes',
            'extra' => 'sometimes',
            'active' => 'sometimes'
	    ]); 
	    $survey   = new Survey;
	    $survey->name  = $request->input('name');
	    $survey->description  = $request->input('description');
        $survey->start_date  = $request->input('start_date');
        $survey->end_date  = $request->input('end_date');
        $survey->no_of_question  = $request->input('no_of_question');
        $survey->extra  = $request->input('extra');
        $survey->active  = $request->input('active');
	    $survey->save();

        return response()->json( array( 'success' => true, 'data' => $survey ), 200 );
    }
    
    /**
     * Update Survey's details
     * @return  [type] [description]
     * @author Anil <anilprz3@gmail.com>
     * @version 1.0
     */
    public function update( $id, Request $request )
    {
    	$this->validate($request, [
	        'name'  => 'required',
	        'description' => 'sometimes',
            'start_date' => 'sometimes',
            'end_date'  => 'sometimes',
            'no_of_question' => 'sometimes',
            'extra'  => 'sometimes',
	        'active'  => 'sometimes'
	    ]);
	    $survey    = Survey::find($id);
        $survey->name  = $request->input('name');
        $survey->description  = $request->input('description');
	    $survey->start_date   = $request->input('start_date');
        $survey->end_date  = $request->input('end_date');
	    $survey->no_of_question = $request->input('no_of_question');
	    $survey->extra  = $request->input('extra');
        $survey->active  = $request->input('active');
	    $survey->save();

        return response()->json( array( 'success' => true, 'data' => $survey ), 200 );
    }

    /**
     * Delete Survey
     * @return  [type] [description]
     * @author Anil <anilprz3@gmail.com>
     * @version 1.0
     */
    public function destroy( $id, Request $request )
    {
    	$this->validate($request, [
	        'id' => 'required|exists:surveys'
	    ]);
	    $survey = Survey::find($request->input('id'));
	    $survey->delete();

        return response()->json( array( 'success' => true, 'data' => $survey ), 200 );
    }
}