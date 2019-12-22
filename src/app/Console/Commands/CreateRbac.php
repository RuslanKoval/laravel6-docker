<?php

namespace App\Console\Commands;

use App\Models\User\User;
use Illuminate\Console\Command;
use PHPZen\LaravelRbac\Model\Permission;
use PHPZen\LaravelRbac\Model\Role;

/**
 * Class CreateRbac
 */
class CreateRbac extends Command
{
    protected $signature = 'rbac';
    protected $description = 'Generate rbac roles';

    public function handle()
    {
        $ids = collect(Role::all())->pluck('id');
        Role::destroy($ids);
        $ids = collect(Permission::all())->pluck('id');
        Permission::destroy($ids);


        $createRoles = $this->createRoles();
        $createPermission = $this->createPermission();

        $user = User::find(2);
        $user->roles()->attach($createRoles->adminRole->id);

        $user = User::find(1);
        $user->roles()->attach($createRoles->editorRole->id);

        $createRoles->adminRole->permissions()->attach($createPermission->createUser->id);
        $createRoles->adminRole->permissions()->attach($createPermission->updateUser->id);
    }

    /**
     * @return \stdClass
     */
    private function createRoles()
    {
        $adminRole = new Role();
        $adminRole->name = 'Administrator';
        $adminRole->slug = 'administrator';
        $adminRole->description = 'System Administrator';
        $adminRole->save();

        $editorRole = new Role();
        $editorRole->name = 'Editor';
        $editorRole->slug = 'editor';
        $editorRole->description = 'Editor';
        $editorRole->save();

        $stdClass = new \stdClass();
        $stdClass->adminRole = $adminRole;
        $stdClass->editorRole = $editorRole;

        return $stdClass;
    }

    /**
     * @return \stdClass
     */
    private function createPermission()
    {
        $createUser = new Permission();
        $createUser->name = 'Create user';
        $createUser->slug = 'user.create';
        $createUser->description = 'Permission to create user';
        $createUser->save();

        $updateUser = new Permission();
        $updateUser->name = 'Update user';
        $updateUser->slug = 'user.update';
        $updateUser->description = 'Permission to update user';
        $updateUser->save();

        $stdClass = new \stdClass();
        $stdClass->createUser = $createUser;
        $stdClass->updateUser = $updateUser;

        return $stdClass;
    }

}
