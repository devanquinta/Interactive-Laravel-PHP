<?php

namespace App\Views;

class MenuViewComposer
{
    public function compose($view)
    {
        try {
            $roleUser = auth()->user()->role;

            $modulesFiltered = session()->get('modules') ?: [];

            if (!$modulesFiltered) {
                foreach ($roleUser->modules as $key => $module) {
                    $modulesFiltered[$key]['name'] = $module->name;

                    foreach ($module->resources as $resource) {
                        if ($resource->roles->contains($roleUser)) {
                            $modulesFiltered[$key]['resources'][] = $resource;
                        }
                    }
                }

                session()->put('modules', $modulesFiltered);
            }
            return $view->with('modules', $modulesFiltered);
        } catch (\Exception) {
            return redirect()->back();
        }
    }

}