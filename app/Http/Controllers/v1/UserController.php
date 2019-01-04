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
    	return response()->json( array( 'success' => true, 'data' => User::all(), 'message' => '' ), 200 );
    }

    /**
     * Get user's details
     * @return  [type] [description]
     * @author Anil <anilprz3@gmail.com>
     * @version 1.0
     */
    public function show($id)
    {
        $user = [];
        $message = '';
        $success = false;
        try{
            $user = User::find($id);
            $success = true;
        } catch( Exception $e )
        {
            $message = $e->getMessage();
            $success = false;
        }
        return response()->json( array( 'success' => $success, 'data' => $user, 'message' => $message ), 200 );
    }

    /**
     * Insert new record to users table
     * @return  void
     * @author Anil <anilprz3@gmail.com>
     * @version 1.0
     */
    public function store( Request $request )
    {
        $message = '';
        $success = false;
        $user = [];
        try{
            $this->validate($request, [
                'name' => 'sometimes',
                'username' => 'required|unique:users',
                'email'  => 'required|unique:users',
                'group' => 'sometimes',
                'password' => 'sometimes',
                'remember_token' => 'sometimes',
                'active' => 'sometimes'
            ]);
            $success = true;
        } catch( \Illuminate\Validation\ValidationException $e )
        {
            $message = "Validation Error: ". $e->getMessage();
            $success = false;
        }
        if( $success )
        {
           try{
                $user   = new User;
                $user->name  = $request->input('name');
                $user->username  = $request->input('username');
                $user->email  = $request->input('email');
                $user->group  = $request->input('group');
                $user->password  = Hash::make( $request->input('password') );
                $user->remember_token  = $request->input('remember_token');
                $user->active  = $request->input('active');
                $user->save();
                $success = true;
            } catch( Exception $e )
            {
                $message = $e->getMessage();
                $success = false;
            }
        }
        return response()->json( array( 'success' => $success, 'data' => $user, 'message' => $message ), 200 );
    }
    
    /**
     * Update User's details
     * @return  [type] [description]
     * @author Anil <anilprz3@gmail.com>
     * @version 1.0
     */
    public function update( $id, Request $request )
    {
        $message = '';
        $success = false;
        $user = [];        
        try{
            $this->validate($request, [
                'name'  => 'sometimes',
                'username' => 'sometimes',
                'email'  => 'sometimes',
                'password' => 'sometimes',
                'remember_token'  => 'sometimes',
                'active'  => 'sometimes'
            ]);
            $success = true;
        } catch( \Illuminate\Validation\ValidationException $e )
        {
            $message = "Validation Error: ". $e->getMessage();
            $success = false;
        }
        if( $success )
        {
            try{
                $user    = User::find($id);
                if( !empty( $request->all() ) )
                {
                    if($request->has('name')){
                        $user->name  = $request->input('name');
                    }
                    if($request->has('username')){
                        $user->username  = $request->input('username');
                    }
                    if($request->has('email')){
                        $user->email   = $request->input('email');
                    }
                    if($request->has('group')){
                        $user->group  = $request->input('group');
                    }
                    if($request->has('password')){
                        $user->password = Hash::make( $request->input('password') );
                    }
                    if($request->has('remember_token')){
                        $user->remember_token  = $request->input('remember_token');
                    }
                    if($request->has('active')){
                        $user->active  = $request->input('active');
                    }
                    $user->save();
                }
                $success = true;
            } catch( Exception $e )
            {
                $message = $e->getMessage();
                $success = false;
            }
        }
        return response()->json( array( 'success' => $success, 'data' => $user, 'message' => $message ), 200 );
    }

    /**
     * Delete user
     * @return  [type] [description]
     * @author Anil <anilprz3@gmail.com>
     * @version 1.0
     */
    public function destroy( $id, Request $request )
    {
        $message = '';
        $success = false;
        $user = [];

        try{
            $this->validate($request, [
                'id' => 'required|exists:users'
            ]);
            $success = true;
        } catch( \Illuminate\Validation\ValidationException $e )
        {
            $message = "Validation Error: ". $e->getMessage();
            $success = false;
        }
        if( $success )
        {
            if( $request->has("id") && $request->input('id') === $id )
            {
                try{
                    $user = User::find($request->input('id'));
                    $user->delete();
                    $success = true;
                } catch( Exception $e )
                {
                    $message = $e->getMessage();
                    $success = false;
                }
            }
            else {
                $success = false;
                $message = "Data Error: The given data was invalid";
            }
        }
        return response()->json( array( 'success' => $success, 'data' => $user, 'message' => $message ), 200 );
    }
}