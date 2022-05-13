<?php
    
    namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use App\Models\User;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Redirect;
    use DB;
    use Exception;
    use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    

    function __construct()
    {
         $this->middleware('permission:user-edit|user-list|user-create|user-delete', ['only' => ['index','show']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
         View::share('title', 'User');
         View::share('mainModel', new User());

         
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->query('name');


        $items = User::orderBy('id','DESC');


        if(!empty($name)) 
        {
            $items =  $items->where('name', 'like', '%' . $name . '%');
        }
        

        $items =  $items->paginate(10);

        return view('backend.users.index',compact('items','name'));
        ;
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =   [
            'name' => 'required',
            'email'=>'required|unique:users,email',
            'profile_file' => 'image|mimes:jpeg,png,jpg|max:10000',

        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {

            return Redirect::back()->withInput()->withErrors($validator);
        }else{
                $data = $request->all();
                $data['password'] = Hash::make($request->password);

               // dd($data);

            try{
               

                if($request->hasFile('profile_photo')) {
                    $icon = date('Ymd') . '_' . time() . '.' . $request->file('profile_photo')->getClientOriginalExtension();
                    $request->profile_photo->move(public_path('uploads'), $icon);
                    $data['profile_photo']= $icon;

                }

                $user = User::create($data);

                if(!empty($request->roles))
                {
    
                    // dd($request->roles);
                $user->assignRole($request->input('roles'));
                }

                return redirect('backend/user')
                ->with('success','User created successfully');
            }
            catch(Exception $e){
                return redirect()->back()->with('error',$e->getMessage());
                
            }
          
        
           
        }

    
    }
   
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $user = User::where('id', $id)->first();

        $userRole = $user->roles->pluck('name','name')->all();

       
        
      
        return view('backend.users.edit',compact('model','userRole','roles'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules =   [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'profile_photo' => 'image|mimes:jpeg,png,jpg|max:10000',

                ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {

            return Redirect::back()->withInput()->withErrors($validator);
        }else{


           // dd($request->all());

            try{
                $user = User::find($id);
                $user->name = $request->input('name');
                $user->phone = $request->phone;
                if(!empty($request->status_id)){
                $user->status_id = $request->status_id;
                }
                if(!empty($request->password)){
                    $user->password = Hash::make($request->password);
                }
                if($request->hasFile('profile_photo')) {
                    $icon = date('Ymd') . '_' . time() . '.' . $request->file('profile_photo')->getClientOriginalExtension();
                    $request->profile_photo->move(public_path('uploads'), $icon);
                    $user->profile_photo = $icon;
                }

                if(!empty($request->roles)){
                    DB::table('model_has_roles')->where('model_id',$id)->delete();
    
                $user->assignRole($request->input('roles'));
                }
                 
                $user->save();

                if(Auth::id()==$user->id){
                  return redirect('backend/user/profile')->with('success','Profile updated successfully');

                }
            
                return redirect('backend/user')->with('success','User updated successfully');
            }
            catch(Exception $e){
                return redirect('backend/user')
                ->with('error',$e->getMessage());
            }
          

        
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("users")->where('id',$id)->delete();
        return redirect('backend/user')
                        ->with('success','User deleted successfully');
    }

    /**
     * update status
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id,$status)
    {
       $item = User::where('id',$id)->first();

       if(empty($item)){
        return redirect('backend/user')
        ->with('error','Record not Found !');
       }
       
       $item->status_id = $status;
       $item->save();

        return redirect('backend/user')
                        ->with('success','Status Updated successfully');
    }


     /**
     * update status
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bulkDelete(Request $request)
    {

        $request->validate([
            'ids'          => 'required',
        ]);
        $ids = $request->ids;
       try {
            $items=User::find($ids)->each(function ($product, $key) {
                $product->delete();
                });
            return response(['message' => 'Users Deleted Successfully']);

        }
        catch(Exception $e) {
         return response(['message' => $e->getMessage()]);
        }
    }

     /**
     * update own profile
     *
     * @return \Illuminate\Http\Response
     */


    public function myProfile(){
        $model = Auth::user();
        return view('backend.users.profile',[
            'model' => $model,
        ]);
    }
}