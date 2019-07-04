<div id="page-content">
    @if($value = \Illuminate\Support\Facades\Session::pull('PasswordChange'))
        <div class="alert alert-success alert-dismissible" style="z-index: 9999">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{$value}}
        </div>
    @endif
        @if($value = \Illuminate\Support\Facades\Session::pull('ProfileChange'))
            <div class="alert alert-success alert-dismissible" style="z-index: 9999">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{$value}}
            </div>
        @endif
    <h3 class="page-header">Користувачі</h3>
    <form action="{{route('main-admin')}}" method="get" class="form-horizontal form-box">
        <div class="form-box-content">
            <div class="form-group">
                <label class="control-label col-md-2" for="example-select-multiple">Роль</label>
                <div class="col-md-2">
                    <select id="example-select-multiple" name="role_id[]" class="form-control" multiple>
                        <option value="1" @if(request()->get('role_id')){{ in_array(1, request()->get('role_id')) ? 'selected' : '' }} @endif>Адміністратор</option>
                        <option value="2" @if(request()->get('role_id')){{in_array(2, request()->get('role_id')) ? 'selected' : ''}} @endif>Користувач</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="example-input-small">Email:</label>
                <div class="col-md-3">
                    <input type="text" id="example-input-small" name="email" class="form-control input-sm" value="{{request()->get('email')}}">
                </div>
            </div>
            <div class="form-group form-actions">
                <div class="col-md-10 col-md-offset-2">
                    <input type="submit" value="Фільтрувати" class="btn btn-success">
                </div>
            </div>
        </div>
    </form>
    <table class="table table-borderless">
        <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Користувач</th>
            <th class="hidden-xs hidden-sm"><i class="fa fa-envelope-o"></i> Email</th>
            <th class="hidden-xs hidden-sm"><i class="fa fa-envelope-o"></i> Роль</th>
            <th class="cell-small text-center"><i class="fa fa-bolt"></i> Функції</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $man)
            <tr>
                <td class="text-center">{{$man->id}}</td>
                <td>{{$man->name}}</td>
                <td class="hidden-xs hidden-sm">{{$man->email}}</td>
                <td class="hidden-xs hidden-sm">
                    @foreach($man->roles as $role)
                        @php
                        $roleName = $role->name;
                        $roleId = $role->id;
                        @endphp
                    @endforeach
                    {{$roleName}}
                    </td>
                <td class="text-center">

                    <div class="btn-group">
                        <a href="{{'/adm/user/set-role/' . $man->id}}" data-toggle="tooltip" title="Зробити {{$roleId == \App\Models\User::ROLE_ADMIN ? 'Користувачем' : 'Адміністратором'}}" class="btn btn-xs btn-{{$roleId == \App\Models\User::ROLE_ADMIN ? 'default' : 'success'}}"><i class="fa fa-check"></i></a>
                        <a href="{{'/adm/user/delete/' . $man->id}}" {{\Illuminate\Support\Facades\Auth::user()->id == $man->id ? 'disabled' : ''}} data-toggle="tooltip" title="Видалити" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>