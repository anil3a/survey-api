<?php 
namespace App\Http\Controllers\v1;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\User; //loads the User model
use Illuminate\Http\Request; //loads the Request class for retrieving inputs
use Illuminate\Support\Facades\Hash; //load this to use the Hash::make method

class UserController extends BaseController
{
    /**
     * Get All users
     * @return  Object
     * @author Anil <anilprz3@gmail.com>
     * @version 1.0
     */
    public function index()
    {
    	return User::all();
    }

    /**
     * Get user's details
     * @return  [type] [description]
     * @author Anil <anilprz3@gmail.com>
     * @version 1.0
     */
    public function show($id)
    {
    	return User::find($id);
    }

    /**
     * Insert new record to users table
     * @return  void
     * @author Anil <anilprz3@gmail.com>
     * @version 1.0
     */
    public function store( Request $request )
    {
    	$this->validate($request, [
            'name' => 'sometimes',
	        'username' => 'required',
            'email'  => 'required|unique:users',
            'group' => 'sometimes',
            'password' => 'sometimes',
            'remember_token' => 'sometimes',
            'active' => 'sometimes'
	    ]); 
	    $user   = new User;
	    $user->name  = $request->input('name');
	    $user->username  = $request->input('username');
        $user->email  = $request->input('email');
        $user->group  = $request->input('group');
        $user->password  = Hash::make( $request->input('password') );
        $user->remember_token  = $request->input('remember_token');
        $user->active  = $request->input('active');
	    $user->save();

        return response()->json( array( 'success' => true, 'data' => $user ), 200 );
    }
    
    /**
     * Update User's details
     * @return  [type] [description]
     * @author Anil <anilprz3@gmail.com>
     * @version 1.0
     */
    public function update( $id, Request $request )
    {
    	$this->validate($request, [
	        'name'  => 'required',
	        'username' => 'required',
            'email'  => 'required',
            'password' => 'sometimes',
            'remember_token'  => 'sometimes',
	        'active'  => 'required'
	    ]); 
	    $user    = User::find($id);
        $user->name  = $request->input('name');
        $user->username  = $request->input('username');
	    $user->email   = $request->input('email');
        $user->group  = $request->input('group');
	    if($request->has('password')){
	        $user->password = Hash::make( $request->input('password') );
	    }
        $user->remember_token  = $request->input('remember_token');
        $user->active  = $request->input('active');
	    $user->save();

        return response()->json( array( 'success' => true, 'data' => $user ), 200 );
    }

    /**
     * Delete user
     * @return  [type] [description]
     * @author Anil <anilprz3@gmail.com>
     * @version 1.0
     */
    public function destroy( Request $request )
    {
    	$this->validate($request, [
	        'id' => 'required|exists:users'
	    ]);
	    $user = User::find($request->input('id'));
	    $user->delete();

        return response()->json( array( 'success' => true, 'data' => $user ), 200 );
    }
}