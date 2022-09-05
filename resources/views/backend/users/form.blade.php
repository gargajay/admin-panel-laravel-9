<?php 
use Spatie\Permission\Models\Role;
$roles = Role::pluck('name', 'name')->all();
$modelId = $model ? $model->id:"";
?>
<div class="row">
    <div class="col-md-6">
        <x-c-input name="name"   value="{{$model ? $model->name:''}}" />
    </div>
    <div class="col-md-6">
        <x-c-input name="email" type="email"  value="{{$model ? $model->email:''}}" />
    </div>
    @if(auth()->user()->id != $modelId)

    <div class="col-md-6">
        <x-c-input name="password" type="password"  value="" />
    </div>
    @endif
    <div class="col-md-6">
        <x-c-input name="phone" value="{{$model ? $model->phone:''}}" />
    </div>
    @php
        $v = $mainModel->getStatus();
    @endphp
        @if(auth()->user()->id != $modelId)
            <div class="col-md-6">
                <x-c-input name="status_id" type="select" :option="$v"   value="{{$model ? $model->status_id:''}}" />
            </div>
        @endif

    @if(auth()->user()->id != $modelId)
    <div class="col-md-6">
        <div class="form-group ">
            <label class="custom_label" >Roles</label>
    
        <select class="custom_input" name="roles" id="">
            @forelse ($roles as $key => $value)
                <option value="{{$key}}" @if(in_array($key,$userRole))
                    selected
                @endif>{{$value}}</option>
            @empty
                
            @endforelse
        </select>
        </div>
    </div>
    @endif
    <div class="col-md-12">
        <div class="drop_outer">
            <div class="drop_inner">
                <div class="upload__files" >
                @if(!empty($model))
                   <img src="{{$model->profile_photo}}" alt="" width="100%" height="200px">
                @else
              
                    <img src="{{asset('backend/assets/images/Camera.png')}}"  alt="Camera">
                <p>Drag Your Images to Upload
                or <span>Browse</span></p>

               
                @endif
            </div>
               
                <input type="file" name="profile_photo" id="profile">
                <p>Drag Your Images to Upload
                    or <span>Browse</span></p>

                
            </div>
        </div>
    </div>
   
      
</div>

<script>
   
</script>
