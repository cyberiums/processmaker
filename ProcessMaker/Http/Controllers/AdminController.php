<?php

namespace ProcessMaker\Http\Controllers;

use ProcessMaker\Models\Group;
use ProcessMaker\Models\Permission;
use ProcessMaker\Models\Process;
use Illuminate\Http\Request;
use ProcessMaker\Models\ProcessCategory;
use ProcessMaker\Models\ProcessPermission;
use ProcessMaker\Models\Screen;
use ProcessMaker\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
 
class AdminController extends Controller
{
    public function index()
    {
        switch (\Auth::user()->canAny('view-users|view-groups')) {
            case 'view-users':
                return redirect()->route('users.index');
            case 'view-groups':
                return redirect()->route('groups.index');
            default:
                throw new AuthorizationException();
        }
    }
}